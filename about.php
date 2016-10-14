<?php
// privacy.php
// This page informs the user about which cookies are set when using the page

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" href="css/main.css">
			<link rel="shortcut icon" href="media/img/logo.png"/>
			<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
			
			<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
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
							<li><a href="practice.php">Practice Section</a>
								<ul>
									<li><a href="#">Identify the Correct Pronunciation</a>
											<ul>
												<li><a href="#">Easy</a></li>
												<li><a href="#">Medium</a></li>
												<li><a href="#">Hard</a></li>
												<li><a href="#">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Complete the Word</a>
											<ul>
												<li><a href="#">Easy</a></li>
												<li><a href="#">Medium</a></li>
												<li><a href="#">Hard</a></li>
											</ul>
									</li>
									<li><a href="practice.php">Select the Correct Stress</a>
											<ul>
												<li><a href="#">Easy</a></li>
												<li><a href="#">Medium</a></li>
												<li><a href="#">Hard</a></li>
											</ul>
									</li>
									<li><a href="practice.php">German Specials</a>
											<ul>
												<li><a href="#">The Unstressed "e"</a></li>
												<li><a href="#">The Final "r"</a></li>
												<li><a href="#">Final Devoicing</a></li>
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
							<li><a href="about.php" class="current">About This Website</a>
								<ul>
								</ul>
							</li>
							<li><a href="sources.php">Sources</a>
							</li>
						</ul>
						</nav>
		</div>	
		<div>
			<div id="language_info">
				<h3 class="underline">Why am I being requested to enter my Native Language?</h3>
				<p>This page requests your language data for scientific purposes.<br>
					The primary goal of this website is to let you practice your German pronunciation.
					On a secondary level, however, this page saves every result per task in an underlying database.
					This is done to be able to draw correlations between native languages and their respective potential problems in learning German pronunciation.<br>
					The respective data is saved in the following fashion:
				</p>
				<div id="example">Example:</div>
					<table id="about_info_table">
						<tr>
							<th class="paddings">Native Language</th>
							<th class="paddings">Second Language</th>
							<th>User Answer</th>
						</tr>
						<tr>
							<td>English</td>
							<td>French</td>
							<td>Fill the Gap: "Schuu"</td>
						</tr>
						<tr>
							<td>English</td>
							<td>French</td>
							<td>Identify the Correct Pronunciation: Option 2</td>
						</tr>
						<tr>
							<td>English</td>
							<td>French</td>
							<td>Where is the Stressed Syllable: "<span class="underline">Papp</span>plakat"</td>
						</tr>
					</table>
					<p><span class="bold">No other information about you is stored.</span><br>
						If you do not wish that your results are saved, simply close the overlay without specifying any data by clicking on the "X".
					</p>
			</div>
				
			<div id="cookie_info">
				<h3 class="underline">The Use of Cookies</h3>
				This page uses cookies for the following purposes:
				<ul>
					<li>Storing the Choice for the Sound of the Day on the main page: For one day</li>
					<li>Storing your Agreement to the use of cookies on this page: For 2 weeks</li>
					<li>Storing your results of the exercises you completed: For 1 week</li>
				</ul>

			</div>
		</div>
</body>
</html>
