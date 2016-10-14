<?php
require_once "helpers/db.php";
// sound_of_day.php - This file generates and displays the Sound of the Day for the index page



if(isset($_COOKIE['my_item'])){ // If there currently is a cookie set for the Sound of the Day Feature, containing the word_id,
	$my_cookie = $_COOKIE['my_item']; // Store the cookie in a standard PHP variable

	// And Query for all relevant elements that are to be displayed in the Sound of the Day DIV from the word_table
	$cookie_sound_query1 = "SELECT word_id, word, id_of_cluster, url_to_file, url_to_file2, transcription 
							FROM word_table 
							WHERE id_of_category != '0' AND url_to_file !='' AND word_id = '$my_cookie'";

	$cookie_sound_result1 = $my_db_object->query($cookie_sound_query1); // Run the Query 
	
	
	
	while ($row = mysqli_fetch_assoc($cookie_sound_result1)) {
			// Store Specific Values in Variables
			$cookie_cluster_id = $row['id_of_cluster'];
			$cookie_transcription = $row['transcription'];
			$cookie_sound_word = $row['word'];
			$cookie_sound_url = $row['url_to_file'];
			$cookie_sound_url2 = $row['url_to_file2'];	
	}
	
	// Query for all relevant elements from the cluster_table
	$cookie_sound_query2 = "SELECT cluster_id, orthographic_realization, cluster_code 
							FROM cluster_table 
							WHERE cluster_id = '$cookie_cluster_id'";

	$cookie_sound_result2 = $my_db_object->query($cookie_sound_query2); // Run the Query 
	
	
	
	while ($row2 = mysqli_fetch_assoc($cookie_sound_result2)) {
			// Store Specific Values in Variables
			$cookie_realization = $row2['orthographic_realization'];
			$cookie_code = $row2['cluster_code'];
	}
	
 }
else{ // If there is no Cookie currently set, Select a new, random element:
	
// Select one random element from the word_table 
$random_sound_query1 = "SELECT word_id, word, id_of_cluster, url_to_file, url_to_file2, transcription 
								FROM word_table 
								WHERE url_to_file != '' AND id_of_category != '0' ORDER BY RAND() LIMIT 1";

$random_sound_result1 = $my_db_object->query($random_sound_query1); // Run the Query

while ($row3 = mysqli_fetch_assoc($random_sound_result1)) {
	$random_element[] = $row3;
	$random_sound_word = $row3['word'];
	$random_cluster_id = $row3['id_of_cluster'];
	$random_sound_url = $row3['url_to_file'];
	$random_sound_url2 = $row3['url_to_file2'];
	$random_transcription = $row3['transcription'];
}

$random_sound_query2 = "SELECT cluster_id, orthographic_realization, cluster_code 
							FROM cluster_table WHERE cluster_id = '$random_cluster_id'";

$random_sound_result2 = $my_db_object->query($random_sound_query2); // Run the Query

while ($row4 = mysqli_fetch_assoc($random_sound_result2)) {
	$random_realization = $row4['orthographic_realization'];
	$random_code = $row4['cluster_code'];
}

?>
<div>
	<p>
		<?php 
		foreach ($random_element as $key => $value) {
			
		// Set a cookie for the new, random element	
		$my_cookie_name = "my_item"; // Give the cookie a name
		$my_cookie_value = $value['word_id']; // Set the cookie value to be the word_id 
		setcookie($my_cookie_name, $my_cookie_value, time() + (86400), "/"); // set the cookie with the above values and set it to expire after 1 day
		}
}
		?>
		
		
		<h2>Sound Of The Day:</h2>
		<!-- Display the Sound Items, either randomized or based on an existing Cookie -->
		<p>Sound: 
		<?php 
		if(isset($cookie_code) && $cookie_code != ""){
			echo $cookie_code;
		}
		if(isset($random_code) && $random_code != ""){
			echo $random_code;
		}	
		?>
		</p>
		<p>
		Orthographic Realization: 
		<?php 
		if(isset($cookie_realization) && $cookie_realization != ""){
			echo $cookie_realization;
		}
		if(isset($random_realization) && $random_realization != ""){
			echo $random_realization;
		}	
		?>
		</p>
		<p>
		Example:
		<?php
		if(isset($cookie_sound_word) && $cookie_sound_word != ""){
			echo $cookie_sound_word;
		}
		if(isset($random_sound_word) && $random_sound_word != ""){
			echo $random_sound_word;
		}	
		?>
		</p>
	<?php
		if(isset($cookie_sound_url) || isset($random_sound_url)){ // If the element displayed is retrieved from the value stored in the cookie, display the corresponding media file:
			if ((isset($cookie_sound_url) && $cookie_sound_url!="" && (strpos($cookie_sound_url, '.mp3') !== false)) || (isset($random_sound_url) && $random_sound_url !="" && (strpos($random_sound_url, '.mp3') !== false))) {
									?>
									<div class="audio" >
										<audio controls style="width: 250px;">
											  <source src="media/<?php if(isset($cookie_sound_url)){echo $cookie_sound_url;} if(isset($random_sound_url)){echo $random_sound_url;}?>" type="audio/mpeg">
											  <source src="media/<?php if(isset($cookie_sound_url2)){echo $cookie_sound_url2;} if(isset($random_sound_url2)){echo $random_sound_url2;}?>" type="audio/wav">
											  Your browser does not support the audio tag.
										</audio>
									</div>
								
									<?php								
			}
			elseif ((isset($cookie_sound_url) && $cookie_sound_url!="" && (strpos($cookie_sound_url, '.mp4') !== false)) || (isset($random_sound_url) && $random_sound_url !="" && (strpos($random_sound_url, '.mp4') !== false))){
									?>
								
										<div class="video">
											<video width="240" height="140" controls preload="auto">
												<source src="media/<?php if(isset($cookie_sound_url)){echo $cookie_sound_url;} if(isset($random_sound_url)){echo $random_sound_url;}?>" type="video/mp4">
												<source src="media/<?php if(isset($cookie_sound_url2)){echo $cookie_sound_url2;} if(isset($random_sound_url2)){echo $random_sound_url2;}?>" type="video/ogg">
												Your browser does not support the video tag.
											</video>
										</div>
									<?php
			}	
		}
		?>
	</p>
</div>