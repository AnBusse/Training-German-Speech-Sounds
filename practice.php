<?php 

session_start();
// ======================================================

require_once "helpers/db.php";

// Retrieve the language list from the database

	$languages_arr_query ="SELECT lang_id, language FROM languages_table ORDER BY language";
	$lang_result = $my_db_object->query($languages_arr_query);
	
	while ($row = mysqli_fetch_assoc($lang_result)) {
		$lang_array[$row['lang_id']] = $row['language'];
	}

//Retrieve Categories
	$category_query ="SELECT * FROM category_table";
	$category_result = $my_db_object->query($category_query);
	
	while ($row = mysqli_fetch_assoc($category_result)) {
		$category_array[] = $row;
	}	
?>
<!DOCTYPE HTML>
<html>

<head>
			<meta charset="UTF-8">
	
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<link rel="stylesheet" href="css/overlay.css">

			<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
			
			<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	
<script type="text/javascript">
		
	$(document).ready(function(){
				
				/* 
				The Language Selection Overlay was inspired by:
				"Full Screen Overlay Using CSS Only." Http://www.corelangs.com. N.p., n.d. Web. 03 May 2016. http://www.corelangs.com/css/box/fulloverlay.html
				*/
				
				// Check if the overlay with the language-selection dialogue had already been called up 
				// by checking the relevant session-variable
				// If it was not set yet, display overlay
				<?php
					if(!isset($_SESSION['language_ses1'])){
				?>
				//Call Overlay on page load by setting the corresponding CSS from display:none to display: block :
					$("#overlay").css("display", "block");
					$("#opaque_background").css("display", "block");
				<?php
					}
				?>
				
				//	 On Form Submission:
					$("form").submit(function( event ){
						event.preventDefault(); // Prevent default form behavior
						
						var lang1 = $( "#language1" ).val(); // retrieve the first language provided by the user
						var lang2 = $( "#language2" ).val(); // retrieve the 2nd language provided by the user
						
						var language_data = { // Store the data in an array
							language1 : lang1,
							language2 : lang2
						};
						
						$.ajax({ // Send the data to a processing script in which the data is stored to SESSION variables
							url: "helpers/language_save.php",
							cache: false,
							data: language_data,
							method: "POST"
						});
						
						// Hide the Overlay itself and its background
						$("#overlay").hide(); 
						$("#opaque_background").hide();
					});
				
		
// ========================================================================================================		
// ========================================================================================================
	
	// Event Handler for the Reset Buttons of the Statistics Section
	/* This Handler sends the category ID to a Processing Script which then deletes the cookies for that category, or all cookies, depending on 
		what the User clicked upon
	*/
		$(".my_reset").click(function( event ) {
			var my_cat_id = event.target.id;
			$.ajax({
						url: "statistic_cookie_unset.php",
						cache: false,
						data: {my_cat_id: my_cat_id},
						method: "POST",
						success: function(data){
							location.reload();
						},
					});
		});
	
	
	// Event Handler to Close the Language Selection Overlay on Click
	$("#overlay_close").click(function() {
				$("#overlay").css("display", "none");
				$("#opaque_background").css("display", "none");
	});


 });			
	
// =========================================================================================================
// =========================================================================================================
	// Javascript to check if cookies are enabled
	
	// Check if the user has cookies enabled. 
	// If he/she did not, display an alert and send the user back to the start page
					if (navigator.cookieEnabled == false) {
					alert("Please enable cookies!");
					window.location.href = "index.php";
					exit;
					}
			
</script>
			

</head>
<body>
		<div class="head_wrap">
			<div id="main_logo">
				<img src="media/img/logo.png" alt="Logo" id="logo">
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
							<li><a href="index.php">Home</a>
								<ul>
								</ul>
							</li>
							<li><a href="practice.php" class="current">Practice Section</a>
								<ul>
									<li><a href="#">Identify the Correct Pronunciation</a>
											<ul>
												<li><a href="task_files/multiple_choice/multiple_choice.php?cat_id=1" id="1">Easy</a></li>
												<li><a href="task_files/multiple_choice/multiple_choice.php?cat_id=2" id="2">Medium</a></li>
												<li><a href="task_files/multiple_choice/multiple_choice.php?cat_id=3" id="3">Hard</a></li>
												<li><a href="task_files/multiple_choice/multiple_choice.php?cat_id=13" id="13">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Fill the Gap</a>
											<ul>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=4" id="4">Easy - Part 1</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=15" id="15">Easy - Part 2</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=5" id="5">Medium - Part 1</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=14" id="14">Medium - Part 2</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=16" id="16">Medium - Part 3</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=6" id="6">Hard - Part 1</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=17" id="17">Hard - Part 2</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=18" id="18">Hard - Part 3</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Select the Correct Stress</a>
											<ul>
												<li><a href="task_files/stress/stress.php?cat_id=7" id="7">Easy</a></li>
												<li><a href="task_files/stress/stress.php?cat_id=8" id="8">Medium</a></li>
												<li><a href="task_files/stress/stress.php?cat_id=9" id="9">Hard</a></li>
											</ul>
									</li>
									<li><a href="practice.php">German Specials</a>
											<ul>
												<li><a href="task_files/stress/unstress.php?cat_id=10" id="10">The Unstressed "e"</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=11" id="11">The Final "r"</a></li>
												<li><a href="task_files/fill_gap/fill_gap.php?cat_id=12" id="12">Final Devoicing</a></li>
											</ul>
									</li>
								</ul>
							</li>
							<li><a href="german_sounds.php">German Sounds</a>
								<ul>
									<li><a href="german_sounds.php#vowel_div">Vowels</a></li>
									<li><a href="german_sounds.php#diphthongs_div">Diphthongs</a></li>
									<li><a href="german_sounds.php#consonants_div">Consonants</a></li>
									<li><a href="german_sounds_upsid_own.php">UPSID to IPA Correspondences</a></li>
								</ul>
							</li>
							<li><a href="about.php">About This Website</a>
								<ul>
								</ul>
							</li>
							<li><a href="sources.php">Sources</a>
							</li>
						</ul>
						</nav>
		</div>	
		<div id="main">	
						<div id="overlay">
							<div id="overlay_close">X</div>
							<div id="overlay_content">
								
								<p class="lang_select">In order to proceed, please specify your native language and, if you have one, your 2nd language.</p>
								<form id="language_save" method="post">
								<div id="lang1" class="lang_select">
									<label for="language1">Your First Language:</label><br>
									
									<select name="language1" id="language1" size="1" required >
										<option value="">Please select one</option>
									<?php
									foreach ($lang_array as $key => $val) {
									?>
										<option value="<?php echo $key;?>"> 
											<?php echo $val; ?>
										</option>
									<?php
									}
									?>
									</select>
								</div>
								
								<div id="lang2" class="lang_select">
									<label for="language2">Your Second Language:</label><br>
									<select name="language2" id="language2" size="1">
										<option value="">None</option>
									<?php
									foreach ($lang_array as $key => $val) {
									?>
										<option value="<?php echo $key;?>"> 
											<?php echo $val; ?> 
										</option>
									<?php
									}
									?>
									</select>
								</div>
								<div class="lang_select">
									<input type="submit" value="Submit Languages and Close Overlay" id="submit_button">
								</div>	
								</form>
							</div>
						</div>
						<div id="opaque_background" >
						</div>
			
		<div id="practice_detail">
	
			<div id="practice_section">
				<div id="head_text">
				<h2  id="practice_headline">Practice Section</h2>
				<noscript>Please enable JavaScript in your Browser!</noscript>
					<p>Here, you can practice your German pronunciation in the following ways:</p>
				</div>
				
				<div id="statistics">
					<h3 class="center">Statistics</h3>
					<h4>You already completed:</h4>
					<?php require_once "statistics.php"; ?>
				</div>
				<div id="box_container">

						<div class="box" id="first_box">
						<div class="center">
						<h4  class="practice_headline">Identify the Correct Pronunciation of a Word</h4>
						<h5  class="practice_headline">Tasks about Vowels and Diphthongs</h5>
						</div>
								<ul style="padding-left: 10px">
								  <li class="easy"><a href="task_files/multiple_choice/multiple_choice.php?cat_id=1" id="1" class="multiple_choice category_link">Easy Vowels</a></li>
								  <li class="medium"><a href="task_files/multiple_choice/multiple_choice.php?cat_id=2" id="2" class="multiple_choice category_link">Medium Level Vowels</a></li>
								  <li class="hard"><a href="task_files/multiple_choice/multiple_choice.php?cat_id=3" id="3" class="multiple_choice category_link">Hard Vowels and Diphthongs</a></li>
								  <li class="expert"><a href="task_files/multiple_choice/multiple_choice.php?cat_id=13" id="13" class="multiple_choice category_link">Expert Level:<br><div style="padding-left: 100px;">Long vs. Short Vowels</div></a></li>
								</ul>
						</div>
						<div class="box" id="second_box">
						<div class="center">
						<h4  class="practice_headline">Fill the Gap</h4>
						<h5  class="practice_headline">Tasks about Consonants</h5>
						</div>
								<ul>
								  <li class="easy"><a href="task_files/fill_gap/fill_gap.php?cat_id=4" id="4" class="fill_gap category_link">Easy Consonants - Part 1</a></li>
								  <li class="easy"><a href="task_files/fill_gap/fill_gap.php?cat_id=15" id="15" class="fill_gap category_link">Easy Consonants - Part 2</a></li>
								  <li class="medium"><a href="task_files/fill_gap/fill_gap.php?cat_id=5" id="5" class="fill_gap category_link">Medium Level Consonants - Part 1</a></li>
								  <li class="medium"><a href="task_files/fill_gap/fill_gap.php?cat_id=14" id="14" class="fill_gap category_link">Medium Level Consonants - Part 2</a></li>
								  <li class="medium"><a href="task_files/fill_gap/fill_gap.php?cat_id=16" id="16" class="fill_gap category_link">Medium Level Consonants - Part 3</a></li>
								  <li class="hard"><a href="task_files/fill_gap/fill_gap.php?cat_id=6" id="6" class="fill_gap category_link">Hard Consonants - Part 1</a></li>
								  <li class="hard"><a href="task_files/fill_gap/fill_gap.php?cat_id=17" id="17" class="fill_gap category_link">Hard Consonants - Part 2</a></li>
								  <li class="hard"><a href="task_files/fill_gap/fill_gap.php?cat_id=18" id="18" class="fill_gap category_link">Hard Consonants - Part 3</a></li>
								</ul>
						</div>
						<div class="box" id="third_box">
						<div class="center">
						<h4 class="practice_headline">Select the stressed syllable(s) of German words</h4>
						<h5 class="practice_headline">Tasks about learning the correct stress patterns of words</h5>
						</div>
								<ul>
								  <li class="easy"><a href="task_files/stress/stress.php?cat_id=7" id="7" class="stress category_link">Easy Words</a></li>
								  <li class="medium"><a href="task_files/stress/stress.php?cat_id=8" id="8" class="stress category_link">Medium Level Words</a></li>
								  <li class="hard"><a href="task_files/stress/stress.php?cat_id=9" id="9" class="stress category_link">Hard Words</a></li>
								</ul>
						</div>
						<div class="box" id="fourth_box">
						<div class="indent">
						<h4  class="practice_headline">German Specials</h4>
						<h5 class="practice_headline">Tasks about some German peculiarities</h5>
						</div>
								<ul>
								  <li class="hard"><a href="task_files/stress/unstress.php?cat_id=10" id="10" class="stress category_link">The unstressed "e"</a></li>
								  <li class="hard"><a href="task_files/fill_gap/fill_gap.php?cat_id=11" id="11" class="fill_gap category_link">The final "r"</a></li>
								  <li class="hard"><a href="task_files/fill_gap/fill_gap.php?cat_id=12" id="12" class="fill_gap category_link">Final consonant devoicing</a></li>
								</ul>
						</div>
					</div>
					
				</div>
				
				</div>
			</div>
	
</div>

</body>
</html>