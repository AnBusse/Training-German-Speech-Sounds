<?php
session_start();
require_once "helpers/db.php";
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			
			<link rel="shortcut icon" href="media/img/logo.png"/>
			<link rel="icon" type="image/png" sizes="32x32" href="media/img/favicons/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="media/img/favicons/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="media/img/favicons/favicon-16x16.png">
			
			<title>Learning German</title>
			<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	
<script type="text/javascript">
			
	$(document).ready(function(){
		
		// Loads the sound of the day feature:
		$('#sound_of_day').load("sound_of_day.php");
		
		
		<?php
		// If the user already gave the consent to the use of cookies, remove the banner from the start page:
		if(isset($_COOKIE['user_cookie_consent'])){
		?>
		$('#footer').remove();
		<?php
		}
		?>
		
		// Closes the cookies-banner on clicking the X 
			$("#cookie_close").click(function(){
				$("#footer").remove();
			});
		
		// Closes the cookies-banner on click and sends off a request to set the cookie that remembers the user-consent
			$("#cookie_button").click(function(){
				$("#footer").remove();
				$.post("helpers/cookie_consent.php", {cookie_consent: "User consent given"});
				});

		
		//Define what happens when the user uses the Search Bar:
			$("#searchform").submit(function(event){
				event.preventDefault(); // Prevent default form behavior
				var user_input = $("#index_search_field").val();
				
				
				//Send the Search Term to a processing Script via AJAX
						$.ajax({
							url: "search_script.php",
							cache: false,
							data: {user_input: user_input},
							dataType: "html",
							method: "POST",
							success: function(data){
										
										// On Sucess, first check if the query returned an input error 
										// by comparing the returned data against the error string
										if(data === "Please enter at least 2 characters."){ // If the data matches the error message, display it under the search field
											$('#searchbar').append("<div class='error_msg' id='search_error'>"+ data +"</div>");
											
										}else{ // If there is no occurrence of the error, display the results overlay
										$('#search_error').remove(); // If there was a previous error, remove the div container for it
										$('#search_results_div').empty(); // empty the result container before any new content is added to it
										
										$('#search_overlay').show(); // Show the Overlay
										$('#search_results_div').append(data); // Append the data from the search query to the result container
										}
										
										$(".close_overlay").click(function(){ // Close the overlay by clicking on anywhere outside the overlay
											$("#search_overlay").hide();
											});
										}
									
									  });
			});
						
				// When the search input field loses focus, check if it is empty and, if so, remove the error message
				$("#index_search_field").focusout(function(){
					if($('#index_search_field').val() == ""){
					$('#search_error').remove();
					}
				});		
						
				
				
				
				
				
			//Send the Login Data to a processing Script via AJAX
				$("#login_form").submit(function(event){
					event.preventDefault(); // Prevent default form behavior
					
					// Store login values in variables
					var username = $("#username").val();
					var pw = $("#pw").val();
						
						$.ajax({
							url: "admin/admin_login.php",
							cache: false,
							data: {username: username,
								   pw: pw
							},
							dataType: "html",
							method: "POST",
							success: function(data){ 
										if(data == "Login Sucessful."){ //If the admin_login.php script returns no error
											<?php
											 // Store the login success as a SESSION variable so the login stays saved on page refresh
											$_SESSION['login_success'] = 'success';
											?>
											// Redirect the user to the administrator's interface
											window.location.href = "admin/admin_interface.php?login_success=success";
										}else{
											// If there was a login error, display an error message
											$('#account').append("<div class='error_msg'>Incorrect Login Data. Please try again.</div>");
										}
									  }
						});
						
				});
	});
		
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
							<li><a href="#" class="current">Home</a>
								<ul>
								</ul>
							</li>
							<li><a href="practice.php">Practice Section</a>
								<ul>
									<li><a href="practice.php">Identify the Correct Pronunciation</a>
											<ul>
												<li><a href="practice.php">Easy</a></li>
												<li><a href="practice.php">Medium</a></li>
												<li><a href="practice.php">Hard</a></li>
												<li><a href="practice.php">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Complete the Word</a>
											<ul>
												<li><a href="practice.php">Easy</a></li>
												<li><a href="practice.php">Medium</a></li>
												<li><a href="practice.php">Hard</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Select the Correct Stress</a>
											<ul>
												<li><a href="practice.php">Easy</a></li>
												<li><a href="practice.php">Medium</a></li>
												<li><a href="practice.php">Hard</a></li>
											</ul>
									</li>
									<li><a href="practice.php">German Specials</a>
											<ul>
												<li><a href="practice.php">The Unstressed "e"</a></li>
												<li><a href="practice.php">The Final "r"</a></li>
												<li><a href="practice.php">Final Devoicing</a></li>
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
		
		<div>
				<div id="about">
					This page aims to let beginner level learners of German practice their pronunciation of German speech sounds by 3 types of tasks.
					In order to practice your pronunciation skills of the German vowels and vowel combinations (so-called diphthongs), you can listen to / watch sound or video files and identify the correct pronunciation of a German word. 
					To practice your German consonant pronunciation, you can listen to the pronunciation of a German word and complete the written word below the sound or video file. 
					You can practice your German word stress skills by clicking on the stressed syllable of a word. 
					If you want to practice some German specialities, like final devoicing, the final "r" or the unstressed "e", there are also categories for that.<br>
					You can stop practicing at any time you like while you solve tasks in a Category; your score is saved nevertheless. 
					Mainly due to the unreliability of such tools, this page does not offer a speech recognition tool.
					Repeating the words as you play the sound or video file will also help you with your pronunciation skills.<br>
					All sound or video material display the pronunciation of Standard German, or "Deutsche Hochlautung".<br>
					The use of earphones or a headset is advised.<br>
					Should you experience difficulties in the display of the videos (for instance, you hear the sound but the image is distorted), 
					please disable the hardware acceleration in your browser. <a href="http://www.tech-recipes.com/rx/53337/disable-hardware-acceleration-in-mozilla-firefox-chrome-and-internet-explorer/">Here</a> is a tutorial on how to do that.
				</div>
				<div id="info">
				<h2><a href="german_sounds_upsid_own.php" class="restyle_link">Info Section: The Sounds of German</a></h2>
				<ul>
					<li><a href="german_sounds.php#own_vowels" class="restyle_link">German Vowels</a></li>
					<li><a href="german_sounds.php#own_diphthongs" class="restyle_link">German Diphthongs</a></li>
					<li><a href="german_sounds.php#own_consonants" class="restyle_link">German Consonants</a></li>
				</ul>
					<div id="account">
					<h2>Administrator Login</h2>
					<p>As an administrator, you can here log in and see how well students with different mother tongues have performed in the tasks.</p>
						<form id="login_form">
							<label for="username">User Name</label>
							<br>
							<input type="text" name="username" class="text_align_left" id="username" required >
							<br>
							<label for="pw">Password</label>
							<br>
							<input type="password" name="pw" class="text_align_left" id="pw" required >
							<br>
							<input type="submit" name="login" value="Log In!">
						</form>
					</div>
				</div>
				<div id="practice">
					<div id="practice_text">
					<h1><a href="practice.php" class="restyle_link">Practice Section</a></h1>
						<p>Here, you can practice your German pronunciation in the following ways:</p>
							<ul class="index_practice">
								<li class="index_practice"><a href="practice.php" class="restyle_link">Identify the correct pronunciation of a word</a><br>
								Listen to audio files or watch videos of different pronunciations of the same word and identify the correct one.<br>
								This task comes in 4 difficulties:
										<ul class="index_practice">
										  <li>Easy</li>
										  <li>Medium</li>
										  <li>Hard</li>
										  <li>Expert Mode: Long versus Short Vowels</li>
										</ul>
								</li>
								<li class="index_practice"><a href="practice.php" class="restyle_link">Fill the Gap</a><br>
								Listen to a sound file or watch a video of a native speaker pronouncing a word and then fill in the gap to complete the word.<br>
								This task comes in 3 difficulties:
										<ul class="index_practice">
										  <li>Easy</li>
										  <li>Medium</li>
										  <li>Hard</li>
										</ul>
								</li>
								<li class="index_practice"><a href="practice.php" class="restyle_link">Select the stressed syllable(s) of German words</a><br>
								Listen to a sound file or watch a video of a native speaker pronouncing a word and then select the stressed syllable.<br>
								This task comes in 3 difficulties:
										<ul class="index_practice">
										  <li>Easy</li>
										  <li>Medium</li>
										  <li>Hard</li>
										</ul>
								</li>
								<li class="index_practice"><a href="practice.php" class="restyle_link">German Specials</a><br>
								Familiarize yourself with three specialities of the German language:
										<ul>
											<li>The unstressed "e"</li>
											<li>The final "r"</li>
											<li>Final Consonant Devoicing</li>
										</ul>
								</li>
							</ul>
					</div>
				<a href="practice.php" class="restyle_link" id="start_practice">Start Practice!</a>
			</div>
			<div id="side_right">
			<div id="searchbar">
				<h3>Having Trouble with a Specific Word?</h3>
				<h4>Enter it Here and Get Help:</h4>
				<form id="searchform">
					<input type="text" name="searchterm" placeholder="Chemie" class="text_align_left" id="index_search_field" required><br>
					<input type="submit" value="Search!" id="search_submit">
				</form>
			</div>
			<div id="sound_of_day">
			</div>
			</div>
			    <!-- Overlay HTML -->
				<div id="search_overlay"><span class="close_overlay">X</span>
					<div id="search_results_div">
						
					</div>
				</div>
		</div>
			<div id="footer">
				<span id="cookie_close">X</span>
				<div id="cookie_text">This Website uses Cookies. To find out which information is stored, 
						please see our <a href="about.php" target="_blank">Privacy Policy</a>
						<button id="cookie_button">OK!</button>
				</div>
			</div>
</body>

</html>