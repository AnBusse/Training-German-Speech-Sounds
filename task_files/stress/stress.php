<?php
// stress.php - Generates and displays all content of the type "select a stressed element":
/*
	* Define the stressed Syllable(s) of German Words
*/
session_start();

include "../../my_media_display.php"; // Include the media display function file

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


if(isset($_SESSION['language_ses2']) && $_SESSION['language_ses2'] != ""){
	$lang2 = $_SESSION['language_ses2'];
	?>
	<script>
		my_lang2 = <?php echo $lang2; ?>;
	</script>
	<?php
}
// Fallback: If there is no 2nd language set, set the JS variable to 0
else{
	?>
	<script>
		my_lang2 = "0";
	</script>
	<?php
}

 

// Query and store all Questions for the selected Category in a random order:
	$exe_query = "SELECT str_task_id, str_task_word_id, task_code, str_task_url, str_task_url2, str_task_cat_id, 
	(SELECT word FROM word_table WHERE word_id = str_task_word_id) AS my_word, 
	(SELECT category FROM category_table WHERE category_id = str_task_cat_id) AS my_category 
	FROM stressing_task_table 
	WHERE str_task_cat_id = '$exe_category' ORDER BY RAND()";
	$exe_result = $my_db_object->query($exe_query);
    $row_cnt = $exe_result->num_rows;
	
	while ($task_row = mysqli_fetch_assoc($exe_result)) {
		$exe_array[] = $task_row;
		$category_name = $task_row['my_category'];
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
			

			// Click Handler for what happens when the user clicks on one span element of a task:
			$(".str_task > span").click(function(){
			
			// Get the ID of the parent element / the ID of the task:
				var my_id = $(this).parent().attr('id');
			
			// If the user tries to select more than 2 items, inform the user that that is not possible
			if($('.'+my_id+'> .stress_selected').length > 1 && $(this).hasClass("stress_selected") == false){
			
				alert("You can only select 2 items!");
			}
			// If the user did not select 2 items yet:
			else{	
					$(this).toggleClass("stress_selected");
				}
			});
			
		
// Click Handler for the "Clear" Button:
			$(".stress_clear_button").click(function(){
				$(this).siblings("button").removeClass("no_click"); // Remove the no-click class from the "Check Button"
				$(this).siblings("span").removeClass("no_click"); // Remove the no-click class from the "Check Button"
				// Remove all marker classes from the span tags that are siblings to this button
				$(this).siblings("span").removeClass("stress_selected correct_1 missed_1 wrong_1 correct_2 missed_2 wrong_2");
				//$(this).siblings("span").css("background-color", "white");
			});			
			
			
			
		// Click Handler for checking the user input:
			$(".stress_check_button").click(function(){
				
				if($('span.stress_selected').length > 0){ // If the user selected at least 1 item, proceed:
				
				
				// Remove previous classes here
				
				
				// Store the ID of the word / task in a variable
				var task_id = ($( this ).attr("id"));
				
				// Define variables for later use
								var stress_counter = "";
								var missed_str_counter = "";
								var task_id;
								var first_stress;
								var non_selected_1st_stress;
								var wrong_1st_stress;
								var second_stress;
								var non_selected_2nd_stress;
								var wrong_2nd_stress;
								var category;
								var whole_string;
			
			$("#word_echo").empty(); // empty the container into which the concatenated whole term is inserted
		
		// Loop through all span items
				$('.'+task_id + ' > span').each(function() {
						
				// First Stress Checks:
					
					// If the clicked element does have primary stress and was marked as stressed:	
						if( $(this).hasClass("first_stress") == true && $(this).hasClass("stress_selected") == true ){
							$(this).addClass("correct_1");
							first_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does have primary stress and was not marked as stressed:
						else if($(this).hasClass("first_stress") == true && $(this).hasClass("stress_selected") == false ){
							$(this).addClass("missed_1");
							missed_str_counter = "m_str_one";
							non_selected_1st_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does not have primary stress (or 2nd stress, to avoid wrong 2nd stress marking) and was marked as stressed:
					/* 
					Priorization: If the user has selected a correct first stress, even as 2nd selection, the stress selection is counted as correct. 
					Also, the wrong primary stress can only be set if there is no correct first stress yet. 
					If it is set, the wrong first stress becomes wrong 2nd stress automatically.
					*/
					
						else if($(this).hasClass("stress_selected") == true && $(this).hasClass("first_stress") == false  && $(this).hasClass("2nd_stress") == false && typeof first_stress == 'undefined' && stress_counter !="one"){
							$(this).addClass("wrong_1");
							stress_counter = "one";
							wrong_1st_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
						
				// 2nd Stress Checks:
						
					// If the clicked element does have 2nd stress and was marked as stressed:
						else if( $(this).hasClass("2nd_stress") == true && $(this).hasClass("stress_selected") == true ){
							$(this).addClass("correct_2");
							second_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does have 2nd stress and was not marked as stressed:
						else if($(this).hasClass("2nd_stress") == true && $(this).hasClass("stress_selected") == false){
							$(this).addClass("missed_2");
							non_selected_2nd_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does not have 2nd stress and was marked as stressed:
						else if( $(this).hasClass("first_stress") == false && $(this).hasClass("2nd_stress") == false && $(this).hasClass("stress_selected") == true){
							$(this).addClass("wrong_2");
							wrong_2nd_stress = $(this).html();
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
						
					// If an element was selected but has neither first nor 2nd unstress markings
						else if($(this).hasClass("stress_selected") == true &&  $(this).hasClass("first_stress") == false && $(this).hasClass("2nd_stress") == false){
							if($(this).hasClass("first_stress") == false){
								$(this).addClass("wrong_1");
								wrong_1st_stress = $(this).html();
								$(this).clone().appendTo("#word_echo");
							}
							if($(this).hasClass("2nd_stress") == false){
								$(this).addClass("wrong_2");
								wrong_2nd_stress = $(this).html();
								$(this).clone().appendTo("#word_echo");
							}
						}
						else{
							$(this).clone().appendTo("#word_echo");
						}
	
				});
				
				var whole_string = document.getElementById("word_echo").innerHTML; // Store all contents of the word_echo div, including the html tags, in a variable
				
			// Check if the overall task was correct by checking the whole_string variable for the classes added for (in)correctness, missing selections (see above evaluations)
			if(whole_string.indexOf("first_stress stress_selected correct_1") > -1 && whole_string.indexOf("non_selected_1st_stress") == -1  && whole_string.indexOf("wrong_1st_stress") == -1 ){
					correct_flag_1 = 1; 
				}
			else{ 
				correct_flag_1 = 0;
				}
				
			if(whole_string.indexOf("2nd_stress") != -1){ // if there were more than one stress, check for those classes, too
					if(whole_string.indexOf("2nd_stress stress_selected correct_2") != -1 && whole_string.indexOf("non_selected_2nd_stress") == -1 && whole_string.indexOf("wrong_2nd_stress") == -1){
						correct_flag_2 = 1;
					}else{ 
						correct_flag_2 = 0;
						}
			}else{ // If there is no 2nd stress, pass a dummy value to the 2nd correctness flag
				correct_flag_2 = "not set";
			}
				
				// Store the Category ID in a JS variable
				category = "<?php echo $_SESSION['cat_id']; ?>";
			
			// If the variables are not set, give them a dummy value:
					if(typeof first_stress == 'undefined'){
						first_stress = "not_set";
					}
					
					if(typeof non_selected_1st_stress == 'undefined'){
						non_selected_1st_stress = "not_set";
					}
					
					if(typeof wrong_1st_stress == 'undefined'){
						wrong_1st_stress = "not_set";
					}
					
					if(typeof second_stress == 'undefined'){
						second_stress = "not_set";
					}
					
					if(typeof non_selected_2nd_stress == 'undefined'){
						non_selected_2nd_stress = "not_set";
					}
					
					if(typeof wrong_2nd_stress == 'undefined'){
						wrong_2nd_stress = "not_set";
					}
					
				
					
			// Please note: if both selected stresses are wrong, the order of saved stresses is from left to right within the word, not the order the user clicked on		

			// Define the array to send along to the processing script:
					var ajax_data = {
						category : category,
						my_lang1 : my_lang1,
						my_lang2 : my_lang2,
						task_id : task_id,
						first_stress : first_stress,
						non_selected_1st_stress : non_selected_1st_stress,
						wrong_1st_stress : wrong_1st_stress,
						second_stress : second_stress,
						non_selected_2nd_stress : non_selected_2nd_stress,
						wrong_2nd_stress : wrong_2nd_stress,
						correct_flag_1 : correct_flag_1,
						correct_flag_2 : correct_flag_2,
						whole_string : whole_string
					};	  
			
			
			// Send the data to the processing script:
				$.ajax({
					url: "stress_save.php",
					cache: false,
					data: ajax_data,
					method: "POST",
					success: function(data){
								// On success, remove all non-css classes that mark the status of a clicked-on element and reset the stress counters and the other variables:
								$(this).removeClass("correct_1 missed_1 wrong_1 correct_2 missed_2 wrong_2");
								stress_counter = "not_set";
								missed_str_counter ="not_set";
								task_id = "not_set";
								first_stress = "not_set";
								non_selected_1st_stress = "not_set";
								wrong_1st_stress = "not_set";
								second_stress = "not_set";
								non_selected_2nd_stress = "not_set";
								wrong_2nd_stress = "not_set";
								category = "not_set";
								correct_flag_1 = "";
								correct_flag_2 = "";
								whole_string = "";
								
								$('span').each(function() { // Remove the stress selection class so the next check works properly
								$("span").removeClass("stress_selected"); 
								});
								
								
							  },
				
				});
				$(this).addClass("no_click"); // Make the Check Button unclickable by adding a class with pointer-events: none to it
				$(this).siblings("span").addClass("no_click"); // Make the span elements unclickable by adding a class with pointer-events: none to it
			}else{
				alert("Please select an item!");
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
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=1">Easy</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=2">Medium</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=3">Hard</a></li>
												<li><a href="../multiple_choice/multiple_choice.php?cat_id=13">Expert Mode</a></li>
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
												<li><a href="stress.php?cat_id=7">Easy</a></li>
												<li><a href="stress.php?cat_id=8">Medium</a></li>
												<li><a href="stress.php?cat_id=9">Hard</a></li>
											</ul>
									</li>
									<li><a href="../../practice.php">German Specials</a>
											<ul>
												<li><a href="unstress.php?cat_id=10">The Unstressed "e"</a></li>
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
	
	<h2>Determine the Stressed Syllable</h2>
	<h3><?php echo $category_name; ?></h3>
	
	<p class="indent2">
		Listen to the audio file or watch the video of native speakers pronouncing a word and then click on the stressed syllable(s).<br>
		Once you made your selection, click on "Check" to find out whether you were correct!
	</p>
	<div id="stress_tasks">
		<?php
			foreach ($exe_array as $key => $val) {
			?>
			<div id="single_str_task">
				<div id="stress_word">
				<h4 class="headline">Word: <?php echo $val['my_word'];?> </h4>
				</div>
				
				
			<div id="media_code">
			<?php 
			// Call the media display function to display the media element for the tasks
			my_media_display($val['str_task_word_id'], $val['str_task_url'], $val['str_task_url2'], "audio_stress", "video_stress","","media");
			?>
			</div>
			
			
				<div class="str_task <?php echo $val['str_task_word_id']; ?>" id="<?php echo $val['str_task_word_id']; ?>"> 
					<?php echo $val['task_code'];?>
					
					<br>
					<button class="stress_clear_button" id="<?php echo $val['str_task_word_id']; ?>" value="<?php echo $val['str_task_word_id']; ?>">Clear</button>
					<button class="stress_check_button" id="<?php echo $val['str_task_word_id']; ?>" value="<?php echo $val['str_task_word_id']; ?>">Check</button>
				</div>
				
			</div>
			<?php
			}
		?>
		<div id="word_echo"></div>
	</div>
	<a href="../../practice.php" id="bottom_back_button" class="restyle_link">Finish and return to Practice Overview</a>
				
					<div class="to_top">
						<img src="../../media/img/arrow_up.png" alt="arrow upwards" width="48px" height="64px" id="arrow_img"></img>
						<div id="to_top_text">Back to Top</div>
					</div>
</body>
</html>