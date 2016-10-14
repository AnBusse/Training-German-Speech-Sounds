<?php
/*
	unstress.php
	Script that generates the tasks for the unstressed "e" type task types
*/
session_start();


include "../../my_media_display.php"; // Include the media display function file

//Include the Database connection:
require_once "../../helpers/db.php";

	
//Store the Category in a SESSION variable:
if(isset($_GET['cat_id'])){
	$_SESSION['cat_id'] = $_GET['cat_id'];
}

$exe_category = mysqli_real_escape_string($my_db_object,$_SESSION['cat_id']); // Real escape and store the SESSION variable for the category in a normal variable

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


if(isset($_SESSION['language_ses2']) && $_SESSION['language_ses2'] != ""){ // If there is a 2nd language stored in the SESSION, store it in a JS variable
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
	
	$exe_result = $my_db_object->query($exe_query); // Run the Query
    $row_cnt = $exe_result->num_rows; // Determine the row count
	
	while ($task_row = mysqli_fetch_assoc($exe_result)) { // Store the result array and the category name in an array / a variable
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
			$(".unstr_task > span").click(function(){
				
			// Get the ID of the parent element / the ID of the task:
				var my_id = $(this).parent().attr('id');
			
			// If the user tries to select more than 2 items, inform the user that that is not possible
			if($('.'+my_id+'> .unstressed_e').length > 1 && $(this).hasClass("stress_selected") == false){
			
				alert("You can only select 2 items!");
			}
			// If the user did not select 2 items yet:
			else{	
					$(this).toggleClass("stress_selected");
				}
			});	
	
			
			// Click Handler for the "Clear" Button:
			$(".unstress_clear_button").click(function(){
				$(this).siblings().removeClass("no_click"); // Remove the no-click class from the sibling elements
				// Remove all marker classes from the span tags that are children of the div sibling to this button
				$(this).siblings("div").find("span").removeClass("stress_selected unstr_correct_1 unstr_missed_1 unstr_wrong_1 unstr_correct_2 unstr_missed_2 unstr_wrong_2");
				$(this).siblings("div").find(".tick").css("display", "none"); // Hide a tick if it is displayed
			});	
	
	
			// Click Handler for checking the user input:
			$(".unstress_check_button").click(function(){

				$("#word_echo").empty(); // empty the container into which the concatenated whole term is inserted
				
				// Store the ID of the word / task in a variable
				var task_id = ($( this ).attr("id"));
				
				// Set variables for the unstresses e's selected
						
								var correct_unstress;
								var correct_unstress_2;
								
								var non_selected_unstress;
								var non_selected_unstress_2;
								
								var wrong_unstress;
								var wrong_unstress2;
								
								var unstressed_e_2;
								var unstressed_e;
							
								var category;
								var whole_string = "";
								
		
		
		// Loop through all span items
				$('.'+task_id + ' > span').each(function() {
				
				// Stress Checks:
					
					// If the clicked element does have 1st unstress and was selected:	
						if( $(this).hasClass("unstressed_e") == true && $(this).hasClass("stress_selected") == true ){
							$(this).addClass("unstr_correct_1"); // Add a marker class to mark this item as correct
							correct_unstress = $(this).html(); // Store the element in a variable
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does have 2nd unstress and was selected:	
						else if( $(this).hasClass("unstressed_e_2") == true && $(this).hasClass("stress_selected") == true ){
							$(this).addClass("unstr_correct_2"); // Add a marker class to mark this item as correct
							correct_unstress_2 = $(this).html(); // Store the element in a variable
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does have 1st unstress and was not selected:
						else if($(this).hasClass("unstressed_e") == true && $(this).hasClass("stress_selected") == false ){
							$(this).addClass("unstr_missed_1"); // Add a marker class for missed elements
							non_selected_unstress = $(this).html(); // Store the element in a variable for later use
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If the clicked element does have 2nd unstress and was not selected:
						else if($(this).hasClass("unstressed_e_2") == true && $(this).hasClass("stress_selected") == false ){
							$(this).addClass("unstr_missed_2"); // Add a marker class for missed elements
							non_selected_unstress_2 = $(this).html(); // Store the element in a variable for later use
							$(this).clone().appendTo("#word_echo"); //Append the whole html of the current element (text and html tags) to a container div
						}
					
					// If an element was selected but has neither first nor 2nd unstress markings
						else if($(this).hasClass("stress_selected") == true && $(this).hasClass("unstressed_e") == false && $(this).hasClass("unstressed_e_2") == false){
							
							if($(this).hasClass("str_e") == true){ // If this item was marked as a first unstressed item by having a corresponding CSS class
								wrong_unstress = $(this).html(); // Store this item in a variable
								$(this).addClass("unstr_wrong_1"); // Add a marker class for wrong elements
								// Clone the contents of the current item, including its html structure, and append it to an invisible container where the answer is temporarily stored:
								$(this).clone().appendTo("#word_echo");  
							}
							if($(this).hasClass("str_e_2") == true){ // If this item was marked as a second stress item by having a corresponding CSS class
								wrong_unstress2 = $(this).html(); // Store this item in a variable
								$(this).addClass("unstr_wrong_2"); // Add a marker class for wrong elements
								// Clone the contents of the current item, including its html structure, and append it to an invisible container where the answer is temporarily stored:
								$(this).clone().appendTo("#word_echo");
							}
							
						} // If the current item has a marker for a first or second stress item but was not selected by the user:  
						else if($(this).hasClass("str_e") == true && $(this).hasClass("stress_selected") == false || $(this).hasClass("str_e_2") == true && $(this).hasClass("stress_selected") == false){
							// Clone the contents of the current item, including its html structure, and append it to an invisible container where the answer is temporarily stored:
							$(this).clone().appendTo("#word_echo");
							
						}
						else{
							// For any other items that match none of the above conditions, also clone the contents of the current item, including its html structure, 
							// and append it to an invisible container where the answer is temporarily stored, but do nothing else with it:
							$(this).clone().appendTo("#word_echo");
						}
						
				});
				
				// Store the Category ID in a JS variable
				category = "<?php echo $_SESSION['cat_id']; ?>";
			
				var whole_string = document.getElementById("word_echo").innerHTML; // Store all contents of the word_echo div, including the html tags, in a variable
			
			// If the variables are not set, give them a dummy value:
				
					if(typeof correct_unstress == 'undefined'){
						correct_unstress = "not_set";
					}
					
					if(typeof correct_unstress_2 == 'undefined'){
						correct_unstress_2 = "not_set";
					}
					
					if(typeof non_selected_unstress == 'undefined'){
						non_selected_unstress = "not_set";
					}
					
					if(typeof non_selected_unstress_2 == 'undefined'){
						non_selected_unstress_2 = "not_set";
					}
					
					if(typeof wrong_unstress == 'undefined'){
						wrong_unstress = "not_set";
					}
					
					if(typeof wrong_unstress2 == 'undefined'){
						wrong_unstress2 = "not_set";
					}	
			
			// Check if the overall task was correct by checking the whole_string variable for the classes added for (in)correctness, missing selections (see above evaluations)
			if((whole_string.indexOf("unstressed_e stress_selected unstr_correct_1") != -1 && whole_string.indexOf("non_selected_unstress") == -1 && whole_string.indexOf("wrong_unstress") == -1)){
					correct_flag_1 = 1; 
				} // If there is an item with the first stress class and it was not selected
			else if(whole_string.indexOf("str_e") != -1 && whole_string.indexOf("stress_selected") == -1){
					correct_flag_1 = 1; // mark the task as correct
			}
			else{ 
				correct_flag_1 = 0; // else, mark the task as incorrect
				}
			
			if(whole_string.indexOf("unstressed_e_2") != -1){ // if there were more than one unstressed e's, check for those classes, too
					// If the container contains classes that mark the item as having a 2nd unstressed e element that was selected and marked as correct, 
					// does not have a marker for non selected second unstressed items, wrongly selected second unstressed items and the general secondary stress marker:
					if((whole_string.indexOf("unstressed_e_2 stress_selected unstr_correct_2") != -1 && whole_string.indexOf("non_selected_unstress_2") == -1 && whole_string.indexOf("wrong_unstress_2") == -1) || whole_string.indexOf("str_e_2") != -1){
						correct_flag_2 = 1; // Mark the answer as correct
					}else{ 
						correct_flag_2 = 0; // else, mark it as incorrect
						}
			}else{ // If there is no 2nd unstressed e, pass a dummy value to the 2nd correctness flag
				correct_flag_2 = "not set";
			}
			
			if(whole_string.indexOf("str_e_2") != -1){ // if there is a secondary stress item in the answer container string
				if(whole_string.indexOf("str_e_2 stress_selected") != -1){ // check if it was selected
					correct_flag_2 = 0; // if it was, mark the task as wrong
				}else{
					correct_flag_2 = 1; // else, mark the task as correct
				}
			}
			
			// If there is only one e, it is stressed and not selected, display a tick:
			if(whole_string.indexOf("stress_selected") == -1 && whole_string.indexOf("str_e") != -1){
				$(this).siblings("div").find(".tick").css("display", "inline");
			}
			
					
			// Define the array of result data to send along to the processing script:
					var ajax_data = {
						category : category,
						my_lang1 : my_lang1,
						my_lang2 : my_lang2,
						task_id : task_id,
						correct_unstress : correct_unstress,
						correct_unstress_2 : correct_unstress_2,
						non_selected_unstress : non_selected_unstress,
						non_selected_unstress_2 : non_selected_unstress_2,
						wrong_unstress : wrong_unstress,
						wrong_unstress2 : wrong_unstress2,
						whole_string : whole_string,
						correct_flag_1 : correct_flag_1,
						correct_flag_2 : correct_flag_2
					};	  
			
			
			
			// Send the data to the processing / result saving script:
				$.ajax({
					url: "unstress_save.php",
					cache: false,
					data: ajax_data,
					method: "POST",
					success: function(data){
								// On success, remove all non-css classes that mark the status of a clicked-on element and reset the variables to an empty value:
								$(this).removeClass("unstr_correct_1 unstr_correct_2 unstr_missed_1 unstr_missed_2 unstr_wrong_1 unstr_wrong_2");
								task_id = "not_set";
								correct_unstress = "not_set";
								correct_unstress_2 = "not_set";
								non_selected_unstress = "not_set";
								non_selected_unstress_2 = "not_set";
								non_selected_2nd_stress = "not_set";
								wrong_unstress = "not_set";
								wrong_unstress2 = "not_set";
								category = "not_set";
								whole_string = "";
								
								$('span').each(function() { // Remove the stress selection class so the next check works properly
								$("span").removeClass("stress_selected");
								});
							  },
				
				});
			
				$(this).addClass("no_click"); // Make the Check Button unclickable by adding a class with pointer-events: none to it
				$(this).siblings("span").addClass("no_click"); // Make the span elements unclickable by adding a class with pointer-events: none to it
				
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
	
	<h2><?php echo $category_name; ?></h2>
	
	<p class="indent2">
		In German, the letter "e" can be pronounced in a couple of different ways. Can you recognize an unstressed "e"?<br>
		Listen to the audio file or watch the video of a native speaker pronouncing a word and then click on the unstressed e('s).<br>
		You can select two items per task. Once you made your selection, click on "Check" to find out whether you were correct!
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
			
			
				<div class="unstr_task <?php echo $val['str_task_word_id']; ?>" id="<?php echo $val['str_task_word_id']; ?>"> 
					<?php echo $val['task_code']; ?>
				</div>
				<div class="tick_or_cross">
					<span class="tick">&#x2713;</span>
					<span class="cross">&#x2717;</span>
				</div>
				<br>
				<button class="unstress_clear_button" id="<?php echo $val['str_task_word_id']; ?>" value="<?php echo $val['str_task_word_id']; ?>">Clear</button>
				<button class="unstress_check_button" id="<?php echo $val['str_task_word_id']; ?>" value="<?php echo $val['str_task_word_id']; ?>">Check</button>
				<div id="word_echo"></div>
			</div>
			<?php
			}
		?>
	</div>
	<a href="../../practice.php" id="bottom_back_button" class="restyle_link">Finish and return to Practice Overview</a>
				
					<div class="to_top">
						<img src="../../media/img/arrow_up.png" alt="arrow upwards" width="48px" height="64px" id="arrow_img"></img>
						<div id="to_top_text">Back to Top</div>
					</div>
</body>
</html>