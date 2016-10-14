<?php
session_start();

include "../../my_media_display.php"; // Include the media display function file
/*
fill_gap.php
This page displays the tasks of the category type "fill the gap" based on the user selection from practice.php
*/


//Include the Database connection:
require_once "../../helpers/db.php";

//Store the Category in a SESSION variable:
if(isset($_GET['cat_id'])){
	$_SESSION['cat_id'] = $_GET['cat_id'];
	if(!isset($_SESSION['cat_id'])){
	?>
		category_id = <?php echo $_GET['cat_id']; ?>;
	<?php
	}
	
	$exe_category = mysqli_real_escape_string($my_db_object,$_SESSION['cat_id']);// Store the session variable containing the category ID in a normal variable
}
else{
	$exe_category = mysqli_real_escape_string($my_db_object,$_GET['cat_id']);// Store the category ID passed along as a URL parameter in a variable
}




//Store language variables from session:
if(isset($_SESSION['language_ses1'])){
	$lang1 = $_SESSION['language_ses1'];
	?>
	<script>
		var my_lang1 = "<?php echo $lang1; ?>";
	</script>
	<?php
}
// Fallback: If there is no 1st language set, set the JS variable to 0
else{
	?>
	<script>
	var my_lang1 = "0";
	</script>
	<?php
}


if(isset($_SESSION['language_ses2'])){
	$lang2 = $_SESSION['language_ses2'];
	?>
	<script>
		var my_lang2 = "<?php echo $lang2; ?>";
	</script>
	<?php
}
// Fallback: If there is no 2nd language set, set the JS variable to 0
else{
	?>
	<script>
	var my_lang2 = "0";
	</script>
	<?php
}

// Fetch the correct Category Name from the category_table
$get_category = "SELECT category_id, category FROM category_table WHERE category_id = $exe_category";
$category_result = $my_db_object->query($get_category);


	while ($cat_row = mysqli_fetch_assoc($category_result)) { // Store category name in array
		$category_name = $cat_row['category'];
	}

// Query and store all Questions for the selected Category in random order:
	$exe_query = "SELECT word_id, word, english_version, id_of_cluster, transcription, url_to_file, url_to_file2, id_of_category 
					FROM word_table 
					WHERE id_of_category = '$exe_category' ORDER BY RAND()";
	
	// Run Query and Determine Row Count
	$exe_result = $my_db_object->query($exe_query);
    $row_cnt = $exe_result->num_rows;
	
	while ($row = mysqli_fetch_assoc($exe_result)) { // Store Tasks in Array
		$exe_array[] = $row;
	}
	
?>


	
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" href="../../css/main.css">
			<script src="../../js/jquery-1.12.1.min.js"></script>
			
		<script>
    // JQuery code
    $(document).ready(function() {
			
			category_id = <?php echo $_GET['cat_id']; ?>;
			
			$('#final_r_text').hide(); // Hide the German Specials task instruction text initially
			
			if(category_id == 11 || category_id == 12){ // if the category is of the type German Specials and Fill the Gap
				$('#fill_gap_text').hide();
				$('#final_r_text').show(); // and show the German Specials type task instruction text
			}
			
			// When the user selected an answer option by clicking on it:
			$(".fill_gap_check_button").click(function(){
				
				// Store the ID of the word / task in a variable
				var task_id = ($(this).attr("id"));
				
				// Set a variable for getting all text input
				var combined_inputs = '';
				
				// Set a variable for the actual, correct word
				var correct_word = $(this).val();
				
				// Collect all text inputs that are children of the tag with the correct word_id...
				  $('.'+task_id + ' > input').each(function() {
					// and concatenate all values found
					combined_inputs += $(this).val();
				  });
				
				
				// If the combined input of all fields per task combine to match the word from the database,
				// set a flag to mark it as correct
				var correct_flag;
				
				if(combined_inputs == correct_word){
					correct_flag = "1";
				}
				else{
					correct_flag = "0";
				}
		
		// Create an array with data to be sent to the processing script:
		var data_array = {
					word_id: task_id,
					user_input: combined_inputs,
					is_correct: correct_flag,
					category_id : category_id
					}
		
		// Check if the result is correct with AJAX. Apply CSS depending on correctness of the answer
				$.ajax({
					url: "fill_gap_save.php",
					cache: false,
					data: data_array,
					method: "POST",
					success: function(data){
									// If the user gave a correct answer, turn the background green
									if(data.indexOf("Correct!") > -1){
										// Remove previous CSS
										$("p." + task_id).css("background-color", "");
										// Set background to Green
										$("p." + task_id).css({"background-color" : "green",
																"border-top" : "8px solid green"
																});
										// Empty the explanations DIV from previous content
										$("#explanations_" + task_id).empty();
										// Insert new content
										$("#explanations_" + task_id).prepend(data);
										// Style new content
										$("#explanations_" + task_id).css({"border" : "5px solid green",
																			"background-color" : "white",
																			"font-weight" : "bold",
																			"text-align" : "center"
																			});
									}
									// If not, turn it red
									else{
										// Remove previous CSS
										$("p." + task_id).css("background-color", "");
										// Set background to Red
										$("p." + task_id).css({"background-color" : "red",
																"border-top" : "8px solid red"
															});
										
										// Empty the explanations DIV from previous content
										$("#explanations_" + task_id).empty();
										// Insert new content
										$("#explanations_" + task_id).append(data);
										// Style new content
										$("#explanations_" + task_id).css({"border" : "5px solid red",
																			"background-color" : "white",
																			"font-weight" : "bold",
																			"text-align" : "center"
																			});
									}
							  },
				
				});
	
			});
		
			// JQuery for the Scroll Back to Top Button that is appearing at the bottom of each category when one is clicked:
				/*
				The Back to Top Button was inspired by:
				Doicaru, Dan. "Create Floating Back to Top Button with JQuery." Http://html-tuts.com. N.p., 22 Feb. 2015. Web. 10 May 2016. http://html-tuts.com/back-to-top-button-jquery/ .
				*/
			$("body").delegate(".to_top", "click", function(){
				$('html, body').animate({
						scrollTop: 0
					}, 700);
					return false;	
			});
		
	});
		</script>
			
</head>
<body>
	<div class="head_wrap">
			<div id="main_logo">
				<img src="../../media/img/logo.png" alt="Logo" id="logo">
			</div>
			<div class="head_content">
		
				<h1>Training German Speech Sounds:</h1>
				<h2>A Digital Tool for Pronunciation Training</h2>
			</div>
	</div>
	<div>
			<!--
				The CSS Dropdown Menu is based on the instructions from:
				Nagy, Andor. "How to Create a Pure CSS Dropdown Menu." Http://webdesignerhut.com/. N.p., 6 Mar. 2015. Web. 03 May 2016. http://webdesignerhut.com/css-dropdown-menu/ .
				-->
			<nav class="my_nav_bar">
						<ul>
							<li><a href="../../index.php">Home</a>
								<ul>
								</ul>
							</li>
							<li><a href="../../practice.php" class="current">Practice Section</a>
								<ul>
									<li><a href="../../practice.php">Identify the Correct Pronunciation</a>
											<ul>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=1">Easy</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=2">Medium</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=3">Hard</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=13">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="../../practice.php">Complete the Word</a>
											<ul>
												<li><a href="fill_gap.php?cat_id=4">Easy</a></li>
												<li><a href="fill_gap.php?cat_id=5">Medium</a></li>
												<li><a href="fill_gap.php?cat_id=6">Hard</a></li>
											</ul>
									</li>
									<li><a href="../../practice.php">Select the Correct Stress</a>
											<ul>
												<li><a href="../stress/stress.php?cat_id=7">Easy</a></li>
												<li><a href="../stress/stress.php?cat_id=8">Medium</a></li>
												<li><a href="../stress/stress.php?cat_id=9">Hard</a></li>
											</ul>
									</li>
									<li><a href="../../practice.php">German Specials</a>
											<ul>
												<li><a href="../stress/unstress.php?cat_id=10">The Unstressed "e"</a></li>
												<li><a href="fill_gap.php?cat_id=11">The Final "r"</a></li>
												<li><a href="fill_gap.php?cat_id=12">Final Devoicing</a></li>
											</ul>
									</li>
								</ul>
							</li>
							<li><a href="../../german_sounds.php">German Sounds</a>
								<ul>
									<li><a href="../../german_sounds.php#vowel_div">Vowels</a></li>
									<li><a href="../../german_sounds.php#diphthongs_div">Diphthongs</a></li>
									<li><a href="../../german_sounds.php#consonants_div">Consonants</a></li>
									<li><a href="../../german_sounds_upsid_own.php">UPSID to IPA Correspondences</a></li>
								</ul>
							</li>
							<li><a href="../../about.php">About This Website</a>
								<ul>
								</ul>
							</li>
							<li><a href="../../sources.php">Sources</a>
							</li>
						</ul>
			</nav>
	</div>
	
	<a href="../../practice.php" id="back_button" class="restyle_link">Back to Practice Overview</a>
	
	<h2 class="indent2">Listen/Watch and Complete the Word</h2>
	<h3 class="indent2"><?php echo $category_name; ?></h3>
	
	<p class="indent2" id="fill_gap_text">Here, you can practice your proficiency of the German sound/letter correspondences.<br>
		Watch the video or listen to the sound file of a native speaker pronounce a word and then complete the word according to what you hear. 
		If you find that you need to enter a special German letter (like an umlaut), you can copy and paste those from the box provided. Please also keep in mind that in German, 
		capitalization matters and a wrong capitalization of an otherwise correct answer will therefore be marked as wrong.<br>
		Click on "Check" to see if you are correct!<br><br>
	</p>
	
	<p class="indent2" id="final_r_text">
			In some situations in the pronunciation of German, the "r" is being vocalized and is therefore not immediately recognizable as an "r". 
			This can be misleading when you try to write down something you hear.
			Here, you can practice your knowledge of the German final r and when to employ it. Is there an "r" in the following words? Fill in the Gap and click on "Check" to find out.
	</p>
	<div id="ger_chars">
		<h4 id="ger_char_heading">German Characters</h4>
		<table>
			<tr>
				<td><span>&Auml;</span><span>&auml;</span></td>
				<td><span>&Ouml;</span><span>&ouml;</span></td>
				<td><span>&Uuml;</span><span>&uuml;</span></td>
				<td><span>&Eacute;</span><span>&eacute;</span></td>
				<td><span>&szlig;</span></td>
			</tr>
		</table>
	</div>
	<?php 
		
		// Loop through the resultset and query for the answering options for each question:
	    for ($i = 0; $i < count($exe_array); $i++) {
				
				// Define the word_id that each task is based on:
				$word_id = $exe_array[$i]['word_id'];
				
				// Query for the task elements of that word...
				$ans_query = "SELECT word_id, word, english_version, transcription, url_to_file, url_to_file2, id_of_word2, answer_id, answer_code, id_of_word2 
				FROM word_table, fill_gap_answer_table 
				WHERE word_id = '$word_id' AND id_of_word2 = '$word_id'";
				$ans_result = $my_db_object->query($ans_query);
				$row_cnt1 = $ans_result->num_rows;
				
				// and store the data in an array
				while ($row = mysqli_fetch_assoc($ans_result)) {
					$fill_gap_data[] = $row;
				}

				?>
				
			<div class="fill_gap_question">
						<h4 class="h4_headline">Complete the word:</h4>
								<?php	// Call the media display function to display the media element for the tasks
								my_media_display($exe_array[$i]['word_id'], $exe_array[$i]['url_to_file'], $exe_array[$i]['url_to_file2'], "audio_fill_gap", "video_fill_gap","","");
								?>
								<p class="task_fields <?php echo $exe_array[$i]['word_id']; ?>">
										<span class="<?php echo $exe_array[$i]['word_id']; ?>">
											<?php echo $fill_gap_data[$i]['answer_code']; ?>
										</span>
									<button class="fill_gap_check_button" id="<?php echo $exe_array[$i]['word_id']; ?>" value="<?php echo $exe_array[$i]['word']; ?>">Check</button>
								</p>
								<div id="explanations_<?php echo $exe_array[$i]['word_id']; ?>" class="explanations_text"></div>
			</div>
    <?php
        }
	?>
	<a href="../../practice.php" id="bottom_back_button" class="restyle_link">Finish and return to Practice Overview</a>
	
					<div class="to_top">
						<img src="../../media/img/arrow_up.png" alt="arrow upwards" width="48px" height="64px" id="arrow_img"></img>
						<div id="to_top_text">Back to Top</div>
					</div>
</body>
</html>
