<?php
?>

<!-- 
german_sounds.php
This page contains the sound inventory of the German language
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
<body id="sounds_body">
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
							<li><a href="german_sounds.php" class="current">German Sounds</a>
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
<h2 id="german_sound_h2">The German Sound System</h2>
<p>
German has 16 monophthongs, 8 diphthongs and 24 consonants. <br>
This page lists those sounds, together with their IPA description and notation, 
common orthographic realizations and the category they were sorted into according to the <a href="german_sounds_upsid_own.php#upsid" class="sound_links">UPSID Database</a>.
</p>

<div class="german_sound_divs" id="vowel_div">
<h3 class="german_sounds">German Vowels</h3>
	<p>German has 16 monophthongs:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_monophthongs.png" class="german_sound_img" alt="German Vowels" height="349" width="468">
		<div class="copyright">&copy; Image created by Andrea Busse,<br>
							The sounds correspond to those in <br> <a href="sources.php#phonology">Phonology - The Sound System of German.</a>
		
		</div>
		</div>
		<table id="own_vowels" class="german_sounds">
			<tr>
				<th>IPA notation</th>
				<th>IPA realization</th>
				<th>Common Realizations</th>
				<th>Examples</th>
				<th>Thesis Category</th>
			</tr>
			<tr>
				<td>long high front unrounded vowel</td>
				<td>/i&#x02D0;/</td>
				<td>&lt;i&gt;, &lt;ih&gt;, &lt;ie&gt;, &lt;ieh&gt;</td>
				<td>Bibel, ihr, wieder, Vieh</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>long high front rounded vowel</td>
				<td>/y&#x02D0;/</td>
				<td>&lt;&uuml;&gt;, &lt;&uuml;h&gt;, &lt;y&gt;</td>
				<td>Büro, Rührei, Zypern</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>long high-mid front unrounded vowel</td>
				<td>/e&#x02D0;/</td>
				<td>&lt;ee&gt;, &lt;eh&gt;, &lt;e&gt;, &lt;&eacute;&gt; &lt;&auml;&gt;</td>
				<td>Meere, Lehre, Segen, Coup&eacute;, R&auml;tsel*</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>long high-mid front rounded vowel</td>
				<td>/&#x00F8;&#x02D0;/</td>
				<td>&lt;&ouml;&gt;, &lt;&ouml;h&gt;</td>
				<td>Öl, Höhle</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>long low central unrounded vowel</td>
				<td>/a&#x02D0;/</td>
				<td>&lt;a&gt;, &lt;ah&gt;, &lt;aa&gt;</td>
				<td>Adel, fahren, Saat</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>long high back rounded vowel</td>
				<td>/u&#x02D0;/</td>
				<td>&lt;u&gt;, &lt;uh&gt;</td>
				<td>Mus, Schuh</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>long high-mid back rounded vowel</td>
				<td>/o&#x02D0;/</td>
				<td>&lt;o&gt;, &lt;uh&gt;</td>
				<td>Ofen, Boot, Sohn</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>near-close near-front unrounded vowel</td>
				<td>/&#x026A;/</td>
				<td>&lt;i&gt;</td>
				<td>Insel</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>near-close near-front rounded vowel</td>
				<td>/&#x028F;/</td>
				<td>&lt;&uuml;&gt;</td>
				<td>Füller</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>open-mid front unrounded vowel</td>
				<td>/&#x025B;/</td>
				<td>&lt;e&gt;, &lt;&auml;&gt;</td>
				<td>Messe, R&auml;tsel*</td>
				<td>Identify the Correct Pronunciation - Easy</td>
			</tr>
			<tr>
				<td>mid central unrounded vowel</td>
				<td>/&#x0259;/</td>
				<td>&lt;e&gt;</td>
				<td>Rasen</td>
				<td>German Specials - Unstressed e</td>
			</tr>
			<tr>
				<td>open-mid schwa</td>
				<td>/&#x0250;/</td>
				<td>&lt;er&gt;</td>
				<td>Mutter</td>
				<td>Fill in the Gap - German Specials - Final r</td>
			</tr>
			<tr>
				<td>near-close near-back rounded vowel</td>
				<td>/&#x028A;/</td>
				<td>&lt;u&gt;</td>
				<td>Busch</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>open-mid back rounded vowel</td>
				<td>/&#x0254;/</td>
				<td>&lt;o&gt;</td>
				<td>Ochse</td>
				<td>Identify the Correct Pronunciation - Medium</td>
			</tr>
			<tr>
				<td>open-mid front rounded vowel</td>
				<td>/&#x0153;/</td>
				<td>&lt;&ouml;&gt;</td>
				<td>k&ouml;nnen</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
		</table>
		
		<div style="clear: both; float: right;">*Due to a current merging of /e&#x02D0;/ and /&#x025B;/, this term can be pronounced correctly using both sounds.</div>
</div>

<div class="german_sound_divs" id="diphthongs_div">		
<h3 class="german_sounds">German Diphthongs</h3>
		<p>German has 8 diphthongs, 4 of which are being created when the German final /r/ is vocalized. Therefore, only 4 dipthongs are counted here:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_diphthongs.png" class="german_sound_img" alt="German Diphthongs" width="450">
		<div class="copyright">&copy; Image created by Andrea Busse,<br>
							The sounds correspond to those in <br> <a href="sources.php#phonology">Phonology - The Sound System of German.</a>
		</div>
		</div>
		<table id="own_diphthongs" class="german_sounds">
			<tr>
				<th>IPA description</th>
				<th>IPA realization</th>
				<th>Common Realizations</th>
				<th>Examples</th>
				<th>Thesis Category</th>
			</tr>
			<tr>
				<td>low central unrounded to high front unrounded diphthong</td>
				<td>/a&#x026A;/</td>
				<td>&lt;ei&gt;, &lt;eih&gt;, &lt;ai&gt;, &lt;ey&gt;</td>
				<td>keiner, Verleih, Mai, Meyer</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>lower mid back rounded to high front unrounded diphthong</td>
				<td>/&#x0254;&#x028F;/</td>
				<td>&lt;eu&gt;, &lt;&auml;u&gt;, &lt;oi&gt;</td>
				<td>scheu, &auml;u&szlig;ern, Ahoi</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>low central unrounded to high back rounded diphthong</td>
				<td>/a&#x028A;/</td>
				<td>&lt;au&gt;</td>
				<td>sauber</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
			<tr>
				<td>high back rounded to high front unrounded diphthong</td>
				<td>/u&#x026A;/</td>
				<td>&lt;ui&gt;</td>
				<td>Pfui</td>
				<td>Identify the Correct Pronunciation - Hard</td>
			</tr>
		</table>
</div>

<div class="german_sound_divs" id="consonants_div">		
<h3 class="german_sounds">German Consonants</h3>
		<p>German has 24 consonants:</p>
		<div class="german_sound_img">
		<img src="media/img/sound_charts/german_consonants.png" class="german_sound_img" alt="German Consonants" width="500">
		<div class="copyright">&copy; Image created by Andrea Busse,<br>
							The sounds correspond to those in <br><a href="sources.php#phonology">Phonology - The Sound System of German.</a>
		</div>
		</div>
		<table id="own_consonants" class="german_sounds">
				<tr>
					<th>IPA description</th>
					<th class="cons_ipa">IPA realization</th>
					<th>Common Realizations</th>
					<th>Examples</th>
					<th>Thesis Category</th>
				</tr>
			<tr>
				<td>voiceless bilabial plosive</td>
				<td class="cons_ipa">/p/</td>
				<td>&lt;p&gt;, &lt;pp&gt;</td>
				<td>Kap, Kappe</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiced bilabial plosive</td>
				<td class="cons_ipa">/b/</td>
				<td>&lt;b&gt;, &lt;bb&gt;</td>
				<td>Ball, Hobby</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiceless velar plosive</td>
				<td class="cons_ipa">/k/</td>
				<td>&lt;k&gt;, &lt;ck&gt;</td>
				<td>Picknickpaket</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiced velar plosive</td>
				<td class="cons_ipa">/g/</td>
				<td>&lt;g&gt;, &lt;gg&gt;</td>
				<td>Gans, Egge</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiceless labiodental affricate</td>
				<td class="cons_ipa">/pf/</td>
				<td>&lt;pf&gt;</td>
				<td>Zapfen</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiceless labiodental fricative</td>
				<td class="cons_ipa">/f/</td>
				<td>&lt;f&gt;, &lt;ff&gt;, &lt;v&gt;, &lt;ph&gt;</td>
				<td>Tiefe, Affe, brav, Graphik</td>
				<td>Fill in the Gap - Medium,<br> German Specials - Final consonant devoicing</td>
			</tr>
			<tr>
				<td>voiced labiodental fricative</td>
				<td class="cons_ipa">/v/</td>
				<td>&lt;w&gt;</td>
				<td>Watt</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiceless alveolar fricative</td>
				<td class="cons_ipa">/s/</td>
				<td>&lt;s&gt;, &lt;ss&gt;, &lt;&szlig;&gt;</td>
				<td>Gas, k&uuml;ssen, Mu&szlig;e</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiced alveolar fricative</td>
				<td class="cons_ipa">/z/</td>
				<td>&lt;s&gt;</td>
				<td>Saal</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiceless palato-alveolar fricative</td>
				<td class="cons_ipa">/&#x0283;/</td>
				<td>&lt;sch&gt;</td>
				<td>Fisch</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiced palato-alveolar fricative</td>
				<td class="cons_ipa">/&#x0292;/</td>
				<td>&lt;j&gt;, &lt;g&gt;</td>
				<td>Jaques, Gage</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiceless velar fricative</td>
				<td class="cons_ipa">/x/</td>
				<td>&lt;ch&gt;</td>
				<td>Buch</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiced bilabial nasal</td>
				<td class="cons_ipa">/m/</td>
				<td>&lt;m&gt;, &lt;mm&gt;</td>
				<td>Name, Damm</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiced velar nasal</td>
				<td class="cons_ipa">/&#x014B;/</td>
				<td>&lt;ng&gt;, &lt;n&gt;</td>
				<td>fing, Tank</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>alveolar lateral approximant</td>
				<td class="cons_ipa">/l/</td>
				<td>&lt;l&gt;, &lt;ll&gt;</td>
				<td></td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiced alveolar trill</td>
				<td class="cons_ipa">/r/</td>
				<td>&lt;r&gt;, &lt;rr&gt;</td>
				<td>Ross, Karre</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiceless glottal fricative</td>
				<td class="cons_ipa">/h/</td>
				<td>&lt;h&gt;</td>
				<td>Hass</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiced palatal approximant</td>
				<td class="cons_ipa">/j/</td>
				<td>&lt;j&gt;</td>
				<td>Boje</td>
				<td>Fill in the Gap - Easy</td>
			</tr>
			<tr>
				<td>voiced alveolar plosive</td>
				<td class="cons_ipa">/d/</td>
				<td>&lt;d&gt;, &lt;dd&gt;</td>
				<td>dann, Teddy</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiceless alveolar sibilant affricate</td>
				<td class="cons_ipa">/ts/</td>
				<td>&lt;z&gt;, &lt;tz&gt;, &lt;ts&gt;</td>
				<td>Zoo, Katze, Lotse</td>
				<td>Fill in the Gap - Hard</td>
			</tr>
			<tr>
				<td>voiced alveolar nasal</td>
				<td class="cons_ipa">/n/</td>
				<td>&lt;n&gt;, &lt;nn&gt;</td>
				<td>nah, Henne</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiceless alveolar plosive</td>
				<td class="cons_ipa">/t/</td>
				<td>&lt;t&gt;, &lt;tt&gt;, &lt;dt&gt;, &lt;th&gt;</td>
				<td>Hut, Mitte, Stadt, Methode</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiceless palato-alveolar affricate</td>
				<td class="cons_ipa">/t&#x0283;/</td>
				<td>&lt;tsch&gt;</td>
				<td>Deutsche</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
			<tr>
				<td>voiced palato-alveolar affricate</td>
				<td class="cons_ipa">/&#x02A4;/</td>
				<td>&lt;dsch, &lt;g&gt;, &lt;j&gt;</td>
				<td>Dschungel, Gin, Job</td>
				<td>Fill in the Gap - Medium</td>
			</tr>
		</table>
</div>
</div>
</body>
</html>	