
<!-- 
german_sounds_upsid_own.php
-->
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" href="css/main.css">
			<link rel="shortcut icon" href="media/img/logo.png"/>
			<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
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
							<li><a href="german_sounds.php"  class="current">German Sounds</a>
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
<div class="sounds_pages_main">
<h2 id="german_sound_h2"><a name="upsid" style="text-decoration: none;">The Sounds of German as displayed in the UPSID Database</a></h2>
<p class="my_padding"> On this page, all German sounds according the UCLA Phonological Segment Inventory Database and <a href="sources.php#phonology" class="sound_links">Phonology - The Sound System of German</a>.
 <br>
 The UPSID notation occasionally differs from the standard IPA notation. In those cases, the IPA notation was added by the author in the column "IPA notation".<br>
 Where the IPA notation column is empty, the UPSID notation equals the IPA realization. <br>
 The "UPSID Difficulty" column contains the percentage of in how many other languages the respective sound appears in according to said database. 
 The author categorized the sounds by the hypothesis of "the smaller the percentage, the higher the difficulty for the learner".<br>
 Based on that the sounds were sorted into the categories listed in the "Thesis Category" column.
</p>
<div class="german_sound_divs">
<h3 class="german_sounds">German Vowels</h3>
	<p>German has 16 monophthongs:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_monophthongs.png" alt="German Vowels" height="260" width="380">
		<div class="copyright">&copy; Andrea Busse (own creation by the author)</div>
		</div>
		<table id="own_vowels" class="german_sounds">
			<tr>
				<th>UPSID notation</th>
				<th>UPSID description</th>
				<th>IPA notation</th>
				<th>IPA realization</th>
				<th>UPSID Difficulty</th>
				<th>Thesis Category</th>
			</tr>
			<tr>
				<td>i: / i</td>
				<td>long high front unrounded vowel</td>
				<td>(long) high front unrounded vowel</td>
				<td>/i:/</td>
				<td>8.87% / 87.1%</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>y: / y</td>
				<td>long high front rounded vowel</td>
				<td>(long) high front rounded vowel</td>
				<td>/y:/</td>
				<td>0.89% / 5.3%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>e: / e</td>
				<td>long higher mid front unrounded vowel</td>
				<td>(long) high-mid front unrounded vowel</td>
				<td>/e:/</td>
				<td>4.66% / 27.5%</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>o/  / :o/</td>
				<td>long higher mid front rounded vowel</td>
				<td>(long) high-mid front rounded vowel</td>
				<td>/&#x00F8;/</td>
				<td>2.7% / 0.44%</td>
				<td>Identify the Correct Pronunciation - Medium</td>
				
			</tr>
			<tr>
				<td>a: / a</td>
				<td>long low central unrounded vowel</td>
				<td></td>
				<td>/a:/</td>
				<td>7.54% / 87.1%</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>u: / u</td>
				<td>long high back rounded vowel</td>
				<td></td>
				<td>/u:/</td>
				<td>7.98% / 81.8%</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>o: / o</td>
				<td>long higher mid back rounded vowel</td>
				<td>(long) high-mid back rounded vowel</td>
				<td>/o:/</td>
				<td>5.32% / 29.05%</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>I</td>
				<td>lowered high front unrounded vowel</td>
				<td>near-close near-front unrounded vowel</td>
				<td>/&#x026A;/</td>
				<td>16.41%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>Y</td>
				<td>lowered high front rounded vowel</td>
				<td>near-close near-front rounded vowel</td>
				<td>/&#x028F;/</td>
				<td>0.89%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>E</td>
				<td>lower mid front unrounded vowel</td>
				<td>open-mid front unrounded vowel</td>
				<td>/&#x025B;/</td>
				<td>41.24%</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>"@</td>
				<td>mid central unrounded vowel</td>
				<td></td>
				<td>/&#x0259;/</td>
				<td>16.85%</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>4</td>
				<td>raised low central unrounded vowel</td>
				<td>open-mid schwa</td>
				<td>/&#x0250;/</td>
				<td>3.10%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>U</td>
				<td>lowered high back rounded vowel</td>
				<td>near-close near-back rounded vowel</td>
				<td>/&#x028A;/</td>
				<td>14.63%</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>O</td>
				<td>lower mid back rounded vowel</td>
				<td>open-mid back rounded vowel</td>
				<td>/&#x0254;/</td>
				<td>35.92%</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>E)</td>
				<td>lower mid front rounded vowel</td>
				<td>open-mid front rounded vowel</td>
				<td>/&#x0153;/</td>
				<td>1.77%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
		</table>
</div>

<div class="german_sound_divs">		
<h3 class="german_sounds">German Diphthongs</h3>
		<p>German has 8 diphthongs, 4 of which are being created when the German final /r/ is vocalized. Therefore, only 4 dipthongs are counted here:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_diphthongs.png" alt="German Diphthongs">
		<div class="copyright">&copy; Andrea Busse (own creation by the author)</div>
		</div>
		<table id="own_diphthongs" class="german_sounds">
			<tr>
				<th>UPSID notation</th>
				<th>UPSID description</th>
				<th>IPA notation</th>
				<th>IPA realization</th>
				<th>UPSID Difficulty</th>
				<th>Thesis Category</th>
			</tr>
			<tr>
				<td>ai</td>
				<td>low central unrounded to high front unrounded diphthong</td>
				<td></td>
				<td>/a&#x026A;/</td>
				<td>4.21%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>Oi</td>
				<td>lower mid back rounded to high front unrounded diphthong</td>
				<td></td>
				<td>/&#x0254;&#x028F;/</td>
				<td>1.33%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>au</td>
				<td>low central unrounded to high back rounded diphthong</td>
				<td></td>
				<td>/a&#x028A;/</td>
				<td>3.99%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>ui</td>
				<td>high back rounded to high front unrounded diphthong</td>
				<td></td>
				<td>/u&#x026A;/</td>
				<td>1.8%</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
		</table>
</div>

<div class="german_sound_divs">		
<h3 class="german_sounds">German Consonants</h3>
		<p>German has 24 consonants:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_consonants.png" alt="German Consonants" width="500">
		<div class="copyright">&copy; Andrea Busse (own creation by the author)</div>
		</div>
		<table id="own_consonants" class="german_sounds">
				<tr>
					<th>UPSID notation</th>
					<th>UPSID description</th>
					<th>IPA notation</th>
					<th>IPA realization</th>
					<th>UPSID Difficulty</th>
					<th>Thesis Category</th>
				</tr>
			<tr>
				<td>p</td>
				<td>voiceless bilabial plosive</td>
				<td></td>
				<td>/p/</td>
				<td>83.15%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>b</td>
				<td>voiced bilabial plosive</td>
				<td></td>
				<td>/b/</td>
				<td>63.64%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>k</td>
				<td>voiceless velar plosive</td>
				<td></td>
				<td>/k/</td>
				<td>89.36%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>g</td>
				<td>voiced velar plosive</td>
				<td></td>
				<td>/g/</td>
				<td>56.10%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>pf</td>
				<td>voiceless labiodental affricate</td>
				<td></td>
				<td>/pf/</td>
				<td>0.67%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>f</td>
				<td>voiceless labiodental fricative</td>
				<td></td>
				<td>/f/</td>
				<td>39.91%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>v</td>
				<td>voiced labiodental fricative</td>
				<td></td>
				<td>/v/</td>
				<td>21.06%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>s</td>
				<td>voiceless alveolar sibilant fricative</td>
				<td>Voiceless alveolar sibilant</td>
				<td>/s/</td>
				<td>43.46%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>z</td>
				<td>voiced alveolar sibilant fricative</td>
				<td>voiced alveolar fricative</td>
				<td>/z/</td>
				<td>13.75%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>S</td>
				<td>voiceless palato-alveolar sibilant fricative</td>
				<td>voiceless palato-alveolar fricative</td>
				<td>/&#x0283;/</td>
				<td>41.46%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>Z</td>
				<td>voiced palato-alveolar sibilant fricative</td>
				<td>voiced palato-alveolar fricative</td>
				<td>/&#x0292;/</td>
				<td>13.53%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>x</td>
				<td>voiceless velar fricative</td>
				<td></td>
				<td>/x/</td>
				<td>20.84%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>m</td>
				<td>voiced bilabial nasal</td>
				<td></td>
				<td>/m/</td>
				<td>94.24%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>N</td>
				<td>voiced velar nasal</td>
				<td></td>
				<td>/&#x014B;/</td>
				<td>52.55%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>l</td>
				<td>voiced alveolar lateral approximant</td>
				<td>alveolar lateral approximant</td>
				<td>/l/</td>
				<td>38.58%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>r</td>
				<td>voiced alveolar trill</td>
				<td></td>
				<td>/r/</td>
				<td>21.06%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>h</td>
				<td>voiceless glottal fricative</td>
				<td></td>
				<td>/h/</td>
				<td>61.86%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>j</td>
				<td>voiced palatal approximant</td>
				<td></td>
				<td>/j/</td>
				<td>83.81%</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>d</td>
				<td>voiced alveolar plosive</td>
				<td></td>
				<td>/d/</td>
				<td>26.61%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>ts</td>
				<td>voiceless alveolar sibilant affricate</td>
				<td></td>
				<td>/ts/</td>
				<td>13.75%</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>n</td>
				<td>voiced alveolar nasal</td>
				<td></td>
				<td>/n/</td>
				<td>44.79%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>t</td>
				<td>voiceless alveolar plosive</td>
				<td></td>
				<td>/t/</td>
				<td>40.13%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>tS</td>
				<td>voiceless palato-alveolar sibilant affricate</td>
				<td>voiceless palato-alveolar affricate</td>
				<td>/t&#x0283;/</td>
				<td>41.7%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>dZ</td>
				<td>voiced palato-alveolar sibilant affricate</td>
				<td>voiced palato-alveolar affricate</td>
				<td>/&#x02A4;/</td>
				<td>25.1%</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
		</table>
</div>
</div>
</body>
</html>
<?php
?>	