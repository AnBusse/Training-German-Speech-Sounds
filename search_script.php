<?php
// This Script processes the Search Request sent off from the Search Bar on index.php
/*
	The search results can be categorized in 3 ways:
		1. Exact Matches with the word_table
		2. Exact Matches with the cluster_table
		3. Matches (usually of longer words) that contain a term from the word_table
		4. Matches that contain clusters that are contained in the search term
*/

include "my_media_display.php"; // Include the media display function file

//Include the Database connection:
require_once "helpers/db.php";

if(isset($_POST['user_input'])){ // On Search!- Click
	
			$user_input = $_POST['user_input'];
			$user_input = mysqli_real_escape_string($my_db_object,$user_input); // Making the input safe for handling
	
	/*
	Check if the user entered at least 2 characters, the minimum length for conducting a search. 
	If he or she did not not, display an error and exit the script
	*/
	if(strlen ($user_input)< 2){ 
		echo "Please enter at least 2 characters.";
		exit;
	}

	// 1: Check if there is a direct match in the word_table
			$search_query = "SELECT word_id, MAX(`word`) as word, english_version, transcription, url_to_file, url_to_file2, img_path, id_of_category, 
				(SELECT category FROM category_table WHERE category_id = id_of_category) AS my_category FROM word_table WHERE word = '$user_input' GROUP BY word";
			$search_result = $my_db_object->query($search_query);
			$row_cnt = $search_result->num_rows;		
			
		// Create array to which the word_id's will be added so there will be no double hits from the different categories:
		$compare_array = array();
			
				// Store the Result in an array
				while ($result_row = mysqli_fetch_assoc($search_result)) {
					$result_array[] = $result_row;
				}
				
			//If there is a direct hit, display it:
			if($row_cnt > 0){	
			
			?>
			<h3>Exact Matches</h3>	
				<div id="exact_matches">
				<ul> <!-- Display all Results in an unordered list -->
				<?php
				foreach($result_array as $value){
					
					$my_word = $value['word'];
					
					/* Sub-Step: Filtering out double entries from the word_table by querying for entries that contain the same word, but have
								a different word_id and are therefore not caught by the compare array
					*/
						$my_double_word_filter_query = "SELECT word_id, word FROM word_table WHERE word = '$my_word'";
						$double_word_filter_result = $my_db_object->query($my_double_word_filter_query);
						
						// Store the Result in an array
						while ($row = mysqli_fetch_assoc($double_word_filter_result)) {
							$double_result_array[] = $row;
						}
						
						
						foreach($double_result_array as $my_1st_value){
							$compare_array[$my_1st_value['word_id']] = $my_1st_value['word_id']; // Add the search results to the compare array
						}
					
				?>
					<li>
							<h5><?php echo $value['word']; ?> </h5> <!-- the result word itself  -->
							English: <?php echo $value['english_version']; ?> <br> <!-- the english translation of it -->
							
							<?php
								if($value['transcription'] != ""){ // If there is a transcription, display it
									?> / <?php echo $value['transcription'];?> / <?php
								}
								// If there is a file, either audio or video, available for this word
								if($value['url_to_file'] != ""){
									
									// Call the media display function to display the media element for the tasks
									my_media_display($value['word_id'], $value['url_to_file'], $value['url_to_file2'], "audio_fill_gap", "video_fill_gap","media","media");
							
								}
								
								if($value['id_of_category'] != "" && $value['id_of_category'] !="0"){ // if there is a category ID and therefore also a task related to this result row
								?>
								<p>
								<?php echo "This word can be practised in the Category: "; ?> <!-- Display Information as to where this category can be practised -->
								
								<a href="task_files/
								<?php
								if(in_array($value['id_of_category'], array('1','2','3','13'))){
								?>multiple_choice/multiple_choice.php?cat_id=<?php echo $value['id_of_category'];
								}
								if(in_array($value['id_of_category'], array('4','5','6','11','12','14', '15', '16', '17', '18'))){
								?>fill_gap/fill_gap.php?cat_id=<?php echo $value['id_of_category'];
								}
								if(in_array($value['id_of_category'], array('7','8','9'))){
								?>stress/stress.php?cat_id=<?php echo $value['id_of_category'];
								}
								if($value['id_of_category'] == "10"){
								?>stress/unstress.php?cat_id=<?php echo $value['id_of_category'];
								}
								?>"><?php echo $value['my_category']; ?></a>
								</p>
								<?php } ?>
					</li>
				<?php
				}
				?>
				</ul>
				</div>
				<?php
			}

			
					$keys = array_keys($compare_array); // This returns an array with only the keys of the $fuzzy_result array 
					$string = implode(", ",$keys); // Implode the array to a string so it can be used in SQL
					
			
	// 2: Check if there is a direct match in the cluster_table
			$search_cluster_query = "SELECT word_id, MAX(`word`) as word, english_version, transcription, url_to_file, url_to_file2, img_path, id_of_category, 
				(SELECT category FROM category_table WHERE category_id = id_of_category) AS my_category 
				FROM word_table WHERE id_of_cluster IN (SELECT cluster_id FROM cluster_table WHERE orthographic_realization = '$user_input') GROUP BY word";
	
	if(in_array(substr($user_input, -1), array('b','d','g','r'))){ /* if the final character is a character denoting final consonant devoicing or German final 'r' */
	$search_cluster_query .= " AND id_of_cluster IN (SELECT cluster_id FROM cluster_table WHERE cluster_place = '3')";
	}
	elseif(substr($user_input, -1) == "r" && in_array(substr($user_input, -2), array('a','e','i','o','u'))){ /* if the final two characters are vowel + r */
	$search_cluster_query .= " AND id_of_cluster IN (SELECT cluster_id FROM cluster_table WHERE cluster_place = '3')";
	}
	elseif(stripos($user_input,"ch") != false){ // if the user input contains "ch":
		if (stripos($user_input,"ach") != false || stripos($user_input,"och") != false || stripos($user_input,"uch") != false || stripos($user_input,"auch") != false || stripos($user_input,"eu") == false || stripos($user_input,"&auml;u") == false || stripos($user_input,"&ouml;u") == false || stripos("ch",$user_input) == 0){ 
		// search for terms containing the voiceless velar fricative
			$search_cluster_query .= " AND id_of_cluster IN (SELECT cluster_id FROM cluster_table WHERE cluster_code LIKE '&#x00E7;')";
		}
		else{ // search for terms containing any other vowel, diphthong or consonant + "ch", represented by the voiceless palatal fricative
			$search_cluster_query .= "AND id_of_cluster IN (SELECT cluster_id FROM cluster_table WHERE cluster_code LIKE 'x')";
		}
	}
	
			// If there is at least one item in the compare_array, compare the word ID's against it and filter out any double matches with previous results
			if(sizeof($compare_array) > 0){
					
					$search_cluster_query .= " AND word_id NOT IN ('$string')";
				}

				
			$search_cluster_result = $my_db_object->query($search_cluster_query); // Run the next Query
			$cluster_row_cnt = $search_cluster_result->num_rows;		// Determine the amount of rows in the result set
					
				// Store the Result in an array
				while ($cluster_row = mysqli_fetch_assoc($search_cluster_result)) {
					$cluster_array[] = $cluster_row;
						$word = $cluster_row['word'];
				}
			
		
			//If there is a direct hit for the search through the cluster_table, display the word assosciated with that cluster_table entry:
			if($cluster_row_cnt >= 1){
			?>
				<h3>These Words contain Sounds that match your Search Term</h3>
				<div id="part_words">
				<ul>
				<?php
				foreach($cluster_array as $value){
					
					if(in_array($value['word_id'],$compare_array) == false){
						
							/* Sub-Step: Filtering out double entries from the word_table by querying for entries that contain the same word, but have
								a different word_id and are therefore not caught by the compare array
							*/
							$my_word = $value['word'];
							$my_double_word_filter_query = "SELECT word_id, word FROM word_table WHERE word = '$my_word'";
							$double_word_filter_result = $my_db_object->query($my_double_word_filter_query);
							
							// Store the Result in an array
							while ($row = mysqli_fetch_assoc($double_word_filter_result)) {
								$double_result_array[] = $row;
							}
					
							foreach($double_result_array as $my_value){
								$compare_array[$my_value['word_id']] = $my_value['word_id']; // Add the search results to the compare array
							}
						

					$compare_array[$value['word_id']] = $value['word_id'];
					// filter out double results from different search steps by checking if the current Word ID value is in the compare_array already
				?>
					<li>
							<h5><?php echo $value['word']; ?> </h5>
							English: <?php echo $value['english_version']; ?> <br>
							
							<?php
								if($value['transcription'] != ""){
									?> / <?php echo $value['transcription'];?> / <?php
								}
								// If there is a file, either audio or video, available for this word 
								if($value['url_to_file'] != ""){
									
								// Call the media display function to display the media element for the tasks	
								my_media_display($value['word_id'], $value['url_to_file'], $value['url_to_file2'], "audio_fill_gap", "video_fill_gap","media","media");

								}
							?>
					</li>
				<?php
					}
				}
				?>
				</ul>
				</div>
				<?php
			}
			
					$keys = array_keys($compare_array); // This returns an array with only the keys of the array 
					$string = implode(", ",$keys); // Implode the array to a string so it can be used in SQL
			
			// 3: Find words that are contained within the search term
				$part_word_query = "SELECT word_id, word, english_version, transcription, url_to_file, url_to_file2, img_path, id_of_category, 
				(SELECT category FROM category_table WHERE category_id = id_of_category) AS my_category FROM word_table WHERE word LIKE '%$user_input%'";
				
				if(sizeof($compare_array) > 0){
					$part_word_query .= " AND word_id NOT IN ('$string')";
				}
				
				$part_word_result = $my_db_object->query($part_word_query);
				$part_cnt = $part_word_result->num_rows;
			
			
				// If there is a partial hit for the search term in the database, fetch the result, store and display it:
				if($part_cnt > 0){
						// Store the Result in an array
						while ($part_row = mysqli_fetch_assoc($part_word_result)) {
							$part_array[] = $part_row;
						}
						
						// Only display the Headline if the word is not an exact match
						if($part_cnt > 0 && sizeof($compare_array) < $part_cnt){
					?>	
					
						<div id="words_containing_terms">
						<h3>These Words contain the Term you searched for:</h3>
						<ul>
						<?php
						foreach($part_array as $value){
							
							// filter out double results from different search steps by checking if the current value is in the previous array(s) already
							if(in_array($value['word_id'],$compare_array) == false){ // Only display the partial matches if they do not have an already displayed word ID as a marker:
								
								/* Sub-Step: Filtering out double entries from the word_table by querying for entries that contain the same word, but have
								a different word_id and are therefore not caught by the compare array
								*/
									$my_word = $value['word'];
									$my_double_word_filter_query = "SELECT word_id, word FROM word_table WHERE word = '$my_word'";
									$double_word_filter_result = $my_db_object->query($my_double_word_filter_query);
									
									// Store the Result in an array
									while ($row = mysqli_fetch_assoc($double_word_filter_result)) {
										$double_result_array[] = $row;
									}
							
									foreach($double_result_array as $my_value2){
										$compare_array[$my_value2['word_id']] = $my_value2['word_id']; // Add the search results to the compare array
									}
								
								$compare_array[$value['word_id']] = $value['word_id'];
						?>
							<li>
							
							<h5> <?php echo $value['word']; ?> </h5>
							English: <?php echo $value['english_version']; ?> <br>
							
							<?php
								if($value['transcription'] != ""){
									?> / <?php echo $value['transcription'];?> / <?php
								}
								// If there is a file, either audio or video, available for this word, 
								if($value['url_to_file'] != ""){
									
									// Call the media display function to display the media element for the tasks	
									my_media_display($value['word_id'], $value['url_to_file'], $value['url_to_file2'], "audio_fill_gap", "video_fill_gap","media","media");
									
								}
							?>
							</li>
						<?php
						}
						}
						?>
						</ul>
						</div>
				<?php
						}
				}
			
		// 4: Find Clusters that are contained within the search term
				// select all graphemic realizations rows from the database that contain more than one character
				$clusters_query = "SELECT cluster_id, cluster_code, orthographic_realization FROM cluster_table WHERE CHAR_LENGTH(orthographic_realization) > 1";
				$clusters_result = $my_db_object->query($clusters_query);
				$cluster_cnt = $clusters_result->num_rows;
				
				// Store the Result in an array
				while ($clusters_row = mysqli_fetch_assoc($clusters_result)) {
					$clusters_array[] = $clusters_row;
				}
				
				// Create a new array to which the cluster_id is assigned as a key and the orthographic_realization is assigned as a value
				$fuzzy_result = array();
				
				foreach($clusters_array as $key => $value){
					$fuzzy_result[$value['cluster_id']] = $value['orthographic_realization'];
				}
				
				
				foreach($fuzzy_result as $key => $value){
					// compare the array from the database against the user input. 
					// if the user input does not contain the current array value, remove that key-value pair from the array so only the matching ones remain
					if(stripos($user_input,$value) === false){
						unset($fuzzy_result[$key]);
					}
				}
				
					$keys1 = array_keys($compare_array); // This returns an array with only the keys of the array 
					$string1 = implode(", ",$keys1); // Implode the array to a string so it can be used in SQL
				
				$keys = array_keys($fuzzy_result); // This returns an array with only the keys of the $fuzzy_result array 
				$string = implode(", ",$keys); // Implode the array to a string so it can be used in SQL
						
				// Use $string in SQL query with IN ($string)		
				$fuzzy_query = "SELECT word_id, MAX(`word`) as word, english_version, transcription, url_to_file, url_to_file2, img_path, id_of_category, 
				(SELECT category FROM category_table WHERE category_id = id_of_category) AS my_category 
				FROM word_table
				WHERE id_of_cluster IN ('$string') GROUP BY word"; 
				
				if(sizeof($compare_array) > 0){ // If there is at least one item in the compare_array, compare the word ID's against it and filter out any double matches with previous results
					$fuzzy_query .= " AND word_id NOT IN ('$string1')";
				}
				
				
				$fuzzy_search_result = $my_db_object->query($fuzzy_query); // Run the Query
				$fuzzy_row_count = $fuzzy_search_result->num_rows; // Determine the row count
				
				
				//If there is at least one row in the result set:
				if($fuzzy_row_count > 0){
				// Store the Result in an array
				while ($fuzzy_row = mysqli_fetch_assoc($fuzzy_search_result)) { 
					$fuzzy_result_array[] = $fuzzy_row;
				}
				
				if(sizeof($fuzzy_result_array) > sizeof($compare_array)){ // if there are more items in the fuzzy result array than in the compare array
				?>
				<h3>These words contain parts of the Term you searched for:</h3> 
				<div id="part_of_word">
				<ul>
				<?php
				foreach($fuzzy_result_array as $value){ // Display the results for matches for clusters in the search term ...
					if(in_array($value['word_id'],$compare_array) == false){ // but only if they were not already displayed
						
						/* Sub-Step: Filtering out double entries from the word_table by querying for entries that contain the same word, but have
								a different word_id and are therefore not caught by the compare array
						*/
							$my_word = $value['word'];
							$my_double_word_filter_query = "SELECT word_id, word FROM word_table WHERE word = '$my_word'";
							$double_word_filter_result = $my_db_object->query($my_double_word_filter_query);
							
							// Store the Result in an array
							while ($row = mysqli_fetch_assoc($double_word_filter_result)) {
								$double_result_array[] = $row;
							}
					
							foreach($double_result_array as $my_value3){
								$compare_array[$my_value3['word_id']] = $my_value3['word_id']; // Add the search results to the compare array
							}
						
						$compare_array[$value['word_id']] = $value['word_id']; // filter out double results from different search steps by checking if the current value is in the previous array(s) already
				?>
					<li>
							<h5><?php echo $value['word']; ?> </h5>
							English: <?php echo $value['english_version']; ?> <br>
								
							<?php
								if($value['transcription'] != ""){
									?> / <?php echo $value['transcription'];?> / <?php
								}
								
								// If there is a file, either audio or video, available for this word, 
								if($value['url_to_file'] != ""){
									
								// Call the media display function to display the media element for the tasks	
								my_media_display($value['word_id'], $value['url_to_file'], $value['url_to_file2'], "audio_fill_gap", "video_fill_gap","media","media");
			
								}
							?>
					</li>
				<?php
				}
				}
				?>
				</ul>
				</div>
				<?php
				}
				}

?>

</div>
<?php
	if($row_cnt < 1 && $cluster_row_cnt < 1 && $part_cnt < 1 && $fuzzy_row_count < 1){
		echo "Sorry, there were no matches for your search item. Please change your input and try again.";
	}

}
else{ // If someone tries to call up this script without pressing submit on Search Field on index.php
	echo "Invalid Access.";
	exit;
}
?>