<?php
session_start();
include "../../my_media_display.php"; // Include the media display function file
/*
multiple_choice.php
This file displays the overview of which tasks the user can choose and which have been completed yet, on practice.php
*/

//Include the Database connection:
require_once "../../helpers/db.php";

//Store the Category in a SESSION variable:
if(isset($_GET['cat_id'])){
	$_SESSION['cat_id'] = $_GET['cat_id'];
}

$exe_category = mysqli_real_escape_string($my_db_object,$_SESSION['cat_id']);

//Store language variables from session:
if(isset($_SESSION['language_ses1'])){
	$lang1 = $_SESSION['language_ses1'];
	?>
	<script>
		var my_lang1 = <?php echo $lang1; ?>;
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
		var my_lang2 = <?php echo $lang2; ?>;
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

// Query and store all Questions for the selected Category in a random order:
	$exe_query = "SELECT word_id, word, english_version, id_of_cluster, transcription, url_to_file, url_to_file2, img_path, id_of_category, (SELECT category FROM category_table WHERE category_id = $exe_category) AS category FROM word_table WHERE id_of_category = '$exe_category' ORDER BY RAND()";
	$exe_result = $my_db_object->query($exe_query);
    $row_cnt = $exe_result->num_rows;
	
	while ($row = mysqli_fetch_assoc($exe_result)) {
		$exe_array[] = $row;
		$category_name = $row['category'];
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
			
			// When the user selected an answer option by clicking on it:
			$(".mpc_check_button").click(function(){
				
				my_word_id = $(this).attr('id'); // Get the word ID of the check button / task

				answer_id = $("input:radio:checked").val(); // Retrieve the answer ID of the selected radio button
				
				category = "<?php echo $_SESSION['cat_id']; ?>";
				
				if(answer_id != null){ // If the user selected an answer, send off an AJAX request
				// Check if the result is correct with AJAX. Apply CSS depending on correctness of the answer
				$.ajax({
					url: "identify_save.php",
					cache: false,
					data: {answer_id: answer_id, my_word_id: my_word_id, category_id: category},
					method: "POST",
					success: function(data){
								if(data.indexOf("This is Correct!") > -1){
									$('.media#' + answer_id).css("background-color", "green");
								}
								else{
									$('.media#' + answer_id).css("background-color", "red");
								}
						
						// Uncheck the radio button when everything is done, so as to avoid a wrong answer_id on next click
						$("input:radio:checked").prop('checked', false);		
							  },
				});
				}
				else{
					alert("Please select an answer!");
				}
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
												<li><a href="multiple_choice.php?cat_id=1">Easy</a></li>
												<li><a href="multiple_choice.php?cat_id=2">Medium</a></li>
												<li><a href="multiple_choice.php?cat_id=3">Hard</a></li>
												<li><a href="multiple_choice.php?cat_id=13">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="../../practice.php">Complete the Word</a>
											<ul>
												<li><a href="../fill_gap/fill_gap.php?cat_id=4">Easy</a></li>
												<li><a href="../fill_gap/fill_gap.php?cat_id=5">Medium</a></li>
												<li><a href="../fill_gap/fill_gap.php?cat_id=6">Hard</a></li>
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
												<li><a href="../fill_gap/fill_gap.php?cat_id=11">The Final "r"</a></li>
												<li><a href="../fill_gap/fill_gap.php?cat_id=12">Final Devoicing</a></li>
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

	<h2>Identify the Correct Pronunciation</h2>
	<h3><?php echo $category_name; ?> </h3>
	
	<p class="indent2">
		Listen to the provided sound or video files and identify the correct one.<br>
		Click on "I think this one is correct" under the element you think represents the correct pronunciation and then on the "Check" button underneath to find out whether you are right!
	</p>
	<div id="mpc_container">
	<?php 
		
		// Loop through the resultset and query for the answering options for each question:
	    for ($i = 0; $i < count($exe_array); $i++) {
				
				// ID of the current word / task
				$word_id = $exe_array[$i]['word_id']; 
				
				// Select all answering option for the current task in the loop
				$ans_query = "SELECT answer_id1, answer_ipa, answer_url, answer_url2, id_of_word1, correct_i FROM identify_answer_table WHERE id_of_word1 = '$word_id' ORDER BY RAND()";
				$ans_result = $my_db_object->query($ans_query); // Run the Query
				$row_cnt1 = $ans_result->num_rows; // Determine the row count
				
				?>
		
			<div class="mpc_question">
								<!-- Display each Term as a Headline -->
							<h3 class="headline indent">What is the correct pronunciation of "<?php echo $exe_array[$i]['word'];?>"?</h3>
			<form class="<?php echo $exe_array[$i]['word_id'];?>">				
					<table class="mpc_table">
						<tr>
								<td>
									<?php if ($exe_array[$i]['img_path'] != ""){
									?> <!-- If there is an image stored in the database for this task, display it  -->
									<img src="../../media/<?php echo $exe_array[$i]['img_path'];?>" alt="<?php echo $exe_array[$i]['word'];?>" class="images">
									<?php
									}
									else{
									?>
									<div class="fake_img"> <!-- If there is no image in the database for this task, display a fake image with the same dimensions as one of the actual pictures -->
										<?php echo $exe_array[$i]['word'];?>
									</div>
									<?php
									}
									?>
								<span id="src_img_span"><a href="../../sources.php#img_src" target="_blank">Link to image source</a></span>
								</td>
						
								<?php
							while ($row = mysqli_fetch_assoc($ans_result)) {
								?>
								<td>
									<div class="form_question">
											
											<?php
												$audio_video = $row['answer_url']; // Store URL from the database that leads to the media file
												$audio_video2 = $row['answer_url2']; 
												
											// Call the media display function to display the media element for the tasks
											my_media_display($row['answer_id1'], $audio_video, $audio_video2, "", "video","audio","media");
											
											?>
											<label>
											<input type="radio" class="<?php echo $row['id_of_word1'];?>" name="answer_id" value="<?php echo $row['answer_id1'];?>" rel="<?php echo $row['answer_id1']; ?>">
												I think this one is correct.
											</label>
									</div>
							</td>		
						<?php  } ?>
							
					</tr>
					</table>
			<input type="button" value="Check" id="<?php echo $exe_array[$i]['word_id'];?>" class="mpc_check_button">
			</form>	
			</div>
    <?php
        }
	?>
	<a href="../../practice.php" id="bottom_back_button" class="restyle_link">Finish and return to Practice Overview</a>
	
					<div class="to_top">
						<img src="../../media/img/arrow_up.png" alt="arrow upwards" width="48px" height="64px" id="arrow_img"></img>
						<div id="to_top_text">Back to Top</div>
					</div>
	</div>
					
</body>
</html>
