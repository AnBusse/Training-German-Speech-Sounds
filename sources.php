<?php
?>

<!-- 
sources.php
This page contains all sources used in the creation of the webpage
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
							<li><a href="sources.php" class="current">Sources</a>
							</li>
						</ul>
						</nav>
		</div>
		
<div id="sources_body">
<h2>Sources</h2>
	<p>The following sources were used in the creation of this website:</p>
	<ul class="first_tier">
		<li class="first_tier">The sounds listed on the page "The German Sound System" (german_sounds.php):
				<ul class="second_tier">
					<li class="second_tier">The German Sound System Content was adapted from:
						<ul class="third_tier">
							<li class="third_tier">Maddieson, Ian, and Kristin Precoda. "UPSID German." <a href="http://web.phonetik.uni-frankfurt.de/>">http://web.phonetik.uni-frankfurt.de/</a>. Ed. Henning Reetz. Goethe-Universit&auml;t Frankfurt Am Main, n.d. Web. 3 May 2016.</li>
							<li class="third_tier"><a name="phonology" style="text-decoration: none;">Phonology - The Sound System of German.</a> Prod. J&uuml;rgen Handke. https://www.youtube.com/. The Virtual Linguistics Campus, 17 Dec. 2012. Web. 14 May 2016. <a href="https://www.youtube.com/watch?v=uc-mtGPD3-U" target="_blank">https://www.youtube.com/watch?v=uc-mtGPD3-U</a>.</li>
						</ul>
					</li>
				</ul>
		</li>
		
		<li class="first_tier">The list of sounds and sound clusters in the cluster_table in the database underlying this website was adapted from:
				<ul>
					<li>Rausch, Rudolf, and Ilka Rausch. Deutsche Phonetik F&uuml;r Ausl&auml;nder. 5th ed. Leipzig: Langenscheidt Verlag Enzyklop&auml;die, 1998. 53-55. Print.</li>
				</ul>
		</li>
		<li class="first_tier">Server Environment:<br>
			Apache Friends. XAMPP. Computer software. The Virtual Linguistics Campus. Vers. 3.2.1. Philipps-Universit&auml;t Marburg, n.d. Web. 4 May 2015.
		</li>
		<li class="first_tier">Code Sources:
				<ul class="second_tier">
					<li class="second_tier">The Back to Top Button was inspired by:<br>
					Doicaru, Dan. "Create Floating Back to Top Button with JQuery." Http://html-tuts.com. N.p., 22 Feb. 2015. Web. 10 May 2016. <a href="http://html-tuts.com/back-to-top-button-jquery/" target="_blank">http://html-tuts.com/back-to-top-button-jquery/ </a>.
					</li>
					<li class="second_tier">The Language Selection Overlay was inspired by:<br>
						"Full Screen Overlay Using CSS Only." Http://www.corelangs.com. N.p., n.d. Web. 03 May 2016. <a href="http://www.corelangs.com/css/box/fulloverlay.html" target="_blank">http://www.corelangs.com/css/box/fulloverlay.html</a>
					</li>
					<li class="second_tier"> The CSS Dropdown Menu is based on the instructions from:<br>
						Nagy, Andor. "How to Create a Pure CSS Dropdown Menu." Http://webdesignerhut.com/. N.p., 6 Mar. 2015. Web. 03 May 2016. <a href="http://webdesignerhut.com/css-dropdown-menu/" target="_blank">http://webdesignerhut.com/css-dropdown-menu/</a>
					</li>
					<li class="second_tier">The SQL Insert Statement for the languages_table was adapted from:<br>
						Roberts, Ben. "2 Letter ISO 639-1 Language Codes as a Mysql Table." XoundBlog. N.p., 22 May 2009. Web. 10 May 2016. <a href="http://blog.xoundboy.com/?p=235" target="_blank">http://blog.xoundboy.com/?p=235</a>
					</li>
					<li class="second_tier">The reference page for the hexadecimal codes of IPA symbols:<br> 
						Wells, John. "The International Phonetic Alphabet in Unicode." IPA Transcription in Unicode. University College London, 4 June 2012. Web. 17 May 2016. <a href="http://www.phon.ucl.ac.uk/home/wells/ipa-unicode.htm" target="_blank">http://www.phon.ucl.ac.uk/home/wells/ipa-unicode.htm</a>
					</li>
				</ul>
		</li>
		<li class="first_tier">
				The probabilities of sounds onto which the category difficulties were based on the UCLA Phonological Segment Inventory Database (UPSID):<br>
				<ul>
					<li>
						German Sound Inventory according to UPSID:<br>
						Maddieson, Ian, and Kristin Precoda. "UPSID German." Http://web.phonetik.uni-frankfurt.de/. Ed. Henning Reetz. Goethe-Universit&auml;t Frankfurt Am Main, n.d. Web. 3 May 2016. <a href="http://web.phonetik.uni-frankfurt.de/L/L2004.html" target="_blank">http://web.phonetik.uni-frankfurt.de/L/L2004.html</a>
					</li>
					<li>
						List of All UPSID Sounds:<br>
						Maddieson, Ian, and Kristin Precoda. "UPSID Segment Frequency." Http://web.phonetik.uni-frankfurt.de/. Ed. Henning Reetz. Goethe-Universit&auml;t Frankfurt Am Main, n.d. Web. 3 May 2016. <a href="http://web.phonetik.uni-frankfurt.de/upsid_segment_freq.html" target="_blank">http://web.phonetik.uni-frankfurt.de/upsid_segment_freq.html</a>
					</li>
					<li>Overview Page:<br>
						Maddieson, Ian, and Kristin Precoda. "UPSID Info". Http://web.phonetik.uni-frankfurt.de/ . Ed. Henning Reetz. Goethe-Universit&auml;t Frankfurt Am Main, n.d. Web. 03 May 2016. <a href="http://web.phonetik.uni-frankfurt.de/upsid_info.html" target="_blank">http://web.phonetik.uni-frankfurt.de/upsid_info.html</a>
					</li>
				</ul>
		</li>
		<h3>Media</h3>
		<li class="first_tier">All video files were used and adapted with the explicit permission of Professor Dr. J&uuml;rgen Handke.<br>
								Permission was also granted by the members of his staff that are shown in the recordings or were recorded for this project:<br>
			<ul>
				<li><a href="media/pdf/Scan_audio_consent_anja_penssler_beyer.pdf" target="_blank">Permission Form Audio Material</a></li>
				<li><a href="media/pdf/Scan_video_consent_katharina_weber.pdf" target="_blank">Permission Form Video Material 1</a></li>
				<li><a href="media/pdf/Scan_video_consent_tabea_weiss.pdf" target="_blank">Permission Form Video Material 2</a></li>
			</ul>
			<ul class="second_tier"><a name="video_src"></a>
			The sources are listed by category and Task Word:<br>
				<li class="second_tier">
						Fill the Gap - Easy:<br>
						<ul>
							<li class="third_tier">
							Task Word: Ball <br>
							Files representing this word: ball.mp4, ball.ogv<br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___b.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://www.youtube.com/watch?v=hQn39GwCEko&feature=youtu.be
							</li>
							<li class="third_tier">
							Task Word: Boje <br>
							Files representing this word: boje.mp4, boje.ogv<br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___j.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/bvNe1Eu6H8E
							</li>
							<li class="third_tier">
							Task Word: Egel<br>
							Files representing this word: egel.mp4, egel.ogv<br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
							<li class="third_tier">
							Task Word: Egge<br>
							Files representing this word: egge.mp4, egge.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___gg.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/me0Fl-p4BHc
							</li>
							<li class="third_tier">
							Task Word: fing<br>
							Files representing this word: fing.mp4, fing.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___ng_nk.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/OHNStoKtsro
							</li>
							<li class="third_tier">
							Task Word: flagg<br>
							Files representing this word: flagg.mp4, flagg.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___gg.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/me0Fl-p4BHc
							</li>
							<li class="third_tier">
							Task Word: Gans<br>
							Files representing this word: gans.mp4, gans.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
							<li class="third_tier">
							Task Word: Hass<br>
							Files representing this word: hass.mp4, hass.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ss.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/k_pCE1YHbwg
							</li>
							<li class="third_tier">
							Task Word: Hemd<br>
							Files representing this word: hemd.mp4, hemd.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___m.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/ahRaykNsOzo
							</li>
							<li class="third_tier">
							Task Word: Hobby<br>
							Files representing this word: hobby.mp4, hobby.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___bb.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Yqw7lA0Fjtg
							</li>
							<li class="third_tier">
							Task Word: ihm<br>
							Files representing this word: ihm.mp4, ihm.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___m.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/ahRaykNsOzo 
							</li>
							<li class="third_tier">
							Task Word: ja<br>
							Files representing this word: ja.mp4, ja.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___j.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/bvNe1Eu6H8E
							</li>
							<li class="third_tier">
							Task Word: Kahn<br>
							Files representing this word: kahn.mp4, kahn.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___h.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/IqyT0pIWhqM
							</li>
							<li class="third_tier">
							Task Word: Kap<br>
							Files representing this word: kap.mp4, kap.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___p.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/5ryj_JbAloM
							</li>
							<li class="third_tier">
							Task Word: Kappe<br>
							Files representing this word: kappe.mp4, kappe.ogv <br>
							Handke, J&uuml;rgen. ger_letters_pronunciations___pp.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/0mibEC6x6pg
							</li>
							<li class="third_tier">
							Task Word: Kino<br>
							Files representing this word: kino.mp4, kino.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___k.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/PG0nAv9dROI
							</li>
							<li class="third_tier">
							Task Word: Laken<br>
							Files representing this word: laken.mp4, laken.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___k.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/PG0nAv9dROI
							</li>
							<li class="third_tier">
							Task Word: Liebe<br>
							Files representing this word: liebe.mp4, liebe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___b.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hQn39GwCEko
							</li>
							<li class="third_tier">
							Task Word: Lob<br>
							Files representing this word: lob.mp4, lob.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___b.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hQn39GwCEko
							</li>
							<li class="third_tier">
							Task Word: Mohn<br>
							Files representing this word: mohn.mp4, mohn.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___m.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/ahRaykNsOzo
							</li>
							<li class="third_tier">
							Task Word: Musik<br>
							Files representing this word: musik.mp4, musik.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___k.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/PG0nAv9dROI
							</li>
							<li class="third_tier">
							Task Word: Name<br>
							Files representing this word: name.mp4, name.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___m.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/ahRaykNsOzo
							</li>
							<li class="third_tier">
							Task Word: Nepp<br>
							Files representing this word: nepp.mp4, nepp.ogv <br>
							Handke, J&uuml;rgen. ger_letters_pronunciations___pp.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/0mibEC6x6pg
							</li>
							<li class="third_tier">
							Task Word: Opa<br>
							Files representing this word: opa.mp4, opa.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_o.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/v48LNlzzY2s
							</li>
							<li class="third_tier">
							Task Word: Pass<br>
							Files representing this word: pass.mp4, pass.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___p.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/5ryj_JbAloM
							</li>
							<li class="third_tier">
							Task Word: robb!<br>
							Files representing this word: robb.mp4, robb.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___bb.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Yqw7lA0Fjtg
							</li>
							<li class="third_tier">
							Task Word: Schuh<br>
							Files representing this word: schuh.mp4, schuh.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/RmRw5u4OjRU
							</li>
							<li class="third_tier">
							Task Word:  Tank<br>
							Files representing this word: tank.mp4, tank.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___ng_nk.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/OHNStoKtsro
							</li>
							<li class="third_tier">
							Task Word:  Weg<br>
							Files representing this word: weg.mp4, weg.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
						</ul>
				</li>
				<li class="second_tier">
						<ul>Fill the Gap - Medium:<br>
							<li class="second_tier">
							Task Word:  Adel<br>
							Files representing this word: adel.mp4, adel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___d.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/AhEJ1563LjA
							</li>
							<li class="second_tier">
							Task Word:  Affe<br>
							Files representing this word: affe.mp4, affe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ff.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/StSGUpw7jV8
							</li>
							<li class="second_tier">
							Task Word:  aktiv<br>
							Files representing this word: aktiv.mp4, aktiv.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="second_tier">
							Task Word:  dann<br>
							Files representing this word: dann.mp4, dann.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___d.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/AhEJ1563LjA
							</li>
							<li class="second_tier">
							Task Word:  Deutsche<br>
							Files representing this word: deutsche.mp4, deutsche.ogv <br>
							Handke, J&uuml;rgen. tsch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="second_tier">
							Task Word:  Fass<br>
							Files representing this word: fass.mp4, fass.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="second_tier">
							Task Word:  Fisch<br>
							Files representing this word: fisch.mp4, fisch.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="second_tier">
							Task Word:  Foto<br>
							Files representing this word: foto.mp4, foto.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___t.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/P_VBtpnQ_8Q
							</li>
							<li class="second_tier">
							Task Word:  Geld<br>
							Files representing this word: geld.mp4, geld.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___l.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/MsQyXmAbPlk
							</li>
							<li class="second_tier">
							Task Word:  Gold<br>
							Files representing this word: gold.mp4, gold.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___d.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/AhEJ1563LjA
							</li>
							<li class="second_tier">
							Task Word:  Hahn<br>
							Files representing this word: hahn.mp4, hahn.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___n.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/j9Iu9HxLuQQ
							</li>
							<li class="second_tier">
							Task Word:  Halle<br>
							Files representing this word: halle.mp4, halle.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ll.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/PaRLMWalnME
							</li>
							<li class="second_tier">
							Task Word:  Hals<br>
							Files representing this word: hals.mp4, hals.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="second_tier">
							Task Word:  Hand<br>
							Files representing this word: hand.mp4, hand.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_a.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Jxfl6EjtLt4 
							</li>
							<li class="third_tier">
							Task Word: Hass<br>
							Files representing this word: hass.mp4, hass.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ss.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/k_pCE1YHbwg
							</li>
							<li class="third_tier">
							Task Word: Heft<br>
							Files representing this word: heft.mp4, heft.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="third_tier">
							Task Word: hell<br>
							Files representing this word: hell.mp4, hell.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ll.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/PaRLMWalnME
							</li>
							<li class="third_tier">
							Task Word: Henne<br>
							Files representing this word: henne.mp4, henne.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___nn.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hyoPyceIfjQ
							</li>
							<li class="third_tier">
							Task Word: Hut<br>
							Files representing this word: hut.mp4, hut.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___h.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/IqyT0pIWhqM
							</li>
							<li class="third_tier">
							Task Word: Kapsel<br>
							Files representing this word: kapsel.mp4, kapsel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: k&uuml;ssen<br>
							Files representing this word: kuessen.mp4, kuessen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ss.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/k_pCE1YHbwg
							</li>
							<li class="third_tier">
							Task Word: Lied<br>
							Files representing this word: lied.mp4, lied.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___l.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/MsQyXmAbPlk
							</li>
							<li class="third_tier">
							Task Word: Maske<br>
							Files representing this word: maske.mp4, maske.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sk.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/xmyeYua-kC4
							</li>
							<li class="third_tier">
							Task Word: Ma&szlig;<br>
							Files representing this word: mass.mp4, mass.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ß.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/07MG-r87mHo
							</li>
							<li class="third_tier">
							Task Word: Matsch<br>
							Files representing this word: matsch.mp4, matsch.ogv <br>
							Handke, J&uuml;rgen. tsch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4
							</li>
							<li class="third_tier">
							Task Word: mischt<br>
							Files representing this word: mischt.mp4, mischt.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/RmRw5u4OjRU
							</li>
							<li class="third_tier">
							Task Word: Mitte<br>
							Files representing this word: mitte.mp4, mitte.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___tt.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/-h2wBsP56FU
							</li>
							<li class="third_tier">
							Task Word: Modd<br>
							Files representing this word: modd.mp4, modd.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___dd.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/5K4vao4Gzqc
							</li>
							<li class="third_tier">
							Task Word: Mu&szlig;e<br>
							Files representing this word: musse.mp4, musse.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ß.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/07MG-r87mHo
							</li>
							<li class="third_tier">
							Task Word: nah<br>
							Files representing this word: nah.mp4, nah.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___n.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/j9Iu9HxLuQQ
							</li>
							<li class="third_tier">
							Task Word: nennt<br>
							Files representing this word: nennt.mp4, nennt.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___nn.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hyoPyceIfjQ
							</li>
							<li class="third_tier">
							Task Word: Nerven<br>
							Files representing this word: nerven.mp4, nerven.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="third_tier">
							Task Word: Pott<br>
							Files representing this word: pott.mp4, pott.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___tt.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/-h2wBsP56FU
							</li>
							<li class="third_tier">
							Task Word: Qualle<br>
							Files representing this word: qualle.mp4, qualle.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___qu.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/JG1gbzv_afw
							</li>
							<li class="third_tier">
							Task Word: rutscht<br>
							Files representing this word: rutscht.mp4, rutscht.ogv <br>
							Handke, J&uuml;rgen. tsch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4
							</li>
							<li class="third_tier">
							Task Word: Schal<br>
							Files representing this word: schal.mp4, schal.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/RmRw5u4OjRU
							</li>
							<li class="third_tier">
							Task Word: Schiff<br>
							Files representing this word: schiff.mp4, schiff.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ff.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/StSGUpw7jV8
							</li>
							<li class="third_tier">
							Task Word: Skat<br>
							Files representing this word: skat.mp4, skat.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sk.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/xmyeYua-kC4
							</li>
							<li class="third_tier">
							Task Word: Spiel<br>
							Files representing this word: spiel.mp4, spiel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sp.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/pPkUmfBxfXo
							</li>
							<li class="third_tier">
							Task Word: Tal<br>
							Files representing this word: tal.mp4, tal.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___t.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/P_VBtpnQ_8Q
							</li>
							<li class="third_tier">
							Task Word: Tanne<br>
							Files representing this word: tanne.mp4, tanne.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___t.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/P_VBtpnQ_8Q
							</li>
							<li class="third_tier">
							Task Word: Tasche<br>
							Files representing this word: tasche.mp4, tasche.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___sch.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/RmRw5u4OjRU
							</li>
							<li class="third_tier">
							Task Word: Teddy<br>
							Files representing this word: teddy.mp4, teddy.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___dd.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/5K4vao4Gzqc
							</li>
							<li class="third_tier">
							Task Word: Tiefe<br>
							Files representing this word: teddy.mp4, teddy.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="third_tier">
							Task Word: tsch&uuml;ss<br>
							Files representing this word: tschuess.mp4, tschuess.ogv <br>
							Handke, J&uuml;rgen. tsch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: Vogel<br>
							Files representing this word: vogel.mp4, vogel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
						</ul>
				</li>
				<li class="second_tier">
						Fill the Gap - Hard:<br>
						<ul>
							<li class="third_tier">
							Task Word: Amsel<br>
							Files representing this word: amsel.mp4, amsel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: Buch<br>
							Files representing this word: buch.mp4, buch.ogv <br>
							Handke, J&uuml;rgen. ch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: Chemie<br>
							Files representing this word: chemie.mp4, chemie.ogv <br>
							Handke, J&uuml;rgen. ch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: Ehre<br>
							Files representing this word: ehre.mp4, ehre.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_eh.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/gPv4_Zn6SqA
							</li>
							<li class="third_tier">
							Task Word: Garn<br>
							Files representing this word: garn.mp4, garn.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___r.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/vOAPuv2q1NE
							</li>
							<li class="third_tier">
							Task Word: ich<br>
							Files representing this word: ich.mp4, ich.ogv <br>
							Handke, J&uuml;rgen. ch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: Kapuze<br>
							Files representing this word: kapuze.mp4, kapuze.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___z.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/0lMfurarEME
							</li>
							<li class="third_tier">
							Task Word: Karre<br>
							Files representing this word: karre.mp4, karre.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___rr.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DHN5-XBxN5g
							</li>
							<li class="third_tier">
							Task Word: Katze<br>
							Files representing this word: katze.mp4, katze.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___tz.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/4dfNaSsGFgQ
							</li>
							<li class="third_tier">
							Task Word: Lotse<br>
							Files representing this word: lotse.mp4, lotse.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ts.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/jWSRFdGgrBg
							</li>
							<li class="third_tier">
							Task Word: M&ouml;we<br>
							Files representing this word: moewe.mp4, moewe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___w.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/s9LAl-DpmwY
							</li>
							<li class="third_tier">
							Task Word: Mutter<br>
							Files representing this word: mutter.mp4, mutter.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___r.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/vOAPuv2q1NE
							</li>
							<li class="third_tier">
							Task Word: Pfand<br>
							Files representing this word: pfand.mp4, pfand.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___pf.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/yPJtqpz1ePY
							</li>
							<li class="third_tier">
							Task Word: R&auml;tsel<br>
							Files representing this word: raetsel.mp4, raetsel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ts.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/jWSRFdGgrBg
							</li>
							<li class="third_tier">
							Task Word: Reiz<br>
							Files representing this word: reiz.mp4, reiz.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___z.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/0lMfurarEME
							</li>
							<li class="third_tier">
							Task Word: Ross<br>
							Files representing this word: ross.mp4, ross.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___r.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/vOAPuv2q1NE
							</li>
							<li class="third_tier">
							Task Word: Saal<br>
							Files representing this word: saal.mp4, saal.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: These<br>
							Files representing this word: these.mp4, these.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: Topf<br>
							Files representing this word: topf.mp4, topf.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___pf.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/yPJtqpz1ePY
							</li>
							<li class="third_tier">
							Task Word: Tuch<br>
							Files representing this word: tuch.mp4, tuch.ogv <br>
							Handke, J&uuml;rgen. ch.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: tut's<br>
							Files representing this word: tuts.mp4, tuts.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ts.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/jWSRFdGgrBg
							</li>
							<li class="third_tier">
							Task Word: Watt<br>
							Files representing this word: watt.mp4, watt.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___w.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/s9LAl-DpmwY
							</li>
							<li class="third_tier">
							Task Word: Witz<br>
							Files representing this word: witz.mp4, witz.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___tz.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/4dfNaSsGFgQ
							</li>
							<li class="third_tier">
							Task Word: Zapfen<br>
							Files representing this word: zapfen.mp4, zapfen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___pf.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/yPJtqpz1ePY
							</li>
							<li class="third_tier">
							Task Word: Zoo<br>
							Files representing this word: zoo.mp4, zoo.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___z.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/0lMfurarEME
							</li>
						</ul>
				</li>
				<li class="second_tier">
						Final consonant devoicing:<br>
						<ul>
							<li class="second_tier">
							Task Word:  aktiv<br>
							Files representing this word: aktiv.mp4, aktiv.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="second_tier">
							Task Word:  brav<br>
							Files representing this word: brav.mp4, brav.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="second_tier">
							Task Word:  Egge<br>
							Files representing this word: egge.mp4, egge.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___gg.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/me0Fl-p4BHc
							</li>
							<li class="third_tier">
							Task Word: fing<br>
							Files representing this word: fing.mp4, fing.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___ng_nk.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/OHNStoKtsro
							</li>
							<li class="third_tier">
							Task Word: Gas<br>
							Files representing this word: gas.mp4, gas.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
							<li class="second_tier">
							Task Word:  Gold<br>
							Files representing this word: gold.mp4, gold.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___d.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/AhEJ1563LjA
							</li>
							<li class="second_tier">
							Task Word:  Hals<br>
							Files representing this word: hals.mp4, hals.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: Hemd<br>
							Files representing this word: hemd.mp4, hemd.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___m.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/ahRaykNsOzo
							</li>
							<li class="third_tier">
							Task Word: Klub<br>
							Files representing this word: klub.mp4, klub.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___b.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://www.youtube.com/watch?v=hQn39GwCEko&feature=youtu.be
							</li>
							<li class="third_tier">
							Task Word: Lob<br>
							Files representing this word: lob.mp4, lob.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___b.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hQn39GwCEko
							</li>
							<li class="third_tier">
							Task Word: nennt<br>
							Files representing this word: nennt.mp4, nennt.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___nn.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hyoPyceIfjQ
							</li>
							<li class="third_tier">
							Task Word: Schleswig Holstein<br>
							Files representing this word: schleswig_holstein.mp4, schleswig_holstein.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word:  Weg<br>
							Files representing this word: weg.mp4, weg.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
						</ul>
				</li>
				<li class="second_tier">
						The final "r":<br>
						<ul>
							<li class="third_tier">
							Task Word: Ehre<br>
							Files representing this word: ehre.mp4, ehre.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_eh.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/gPv4_Zn6SqA
							</li>
							<li class="third_tier">
							Task Word: Garn<br>
							Files representing this word: garn.mp4, garn.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___r.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/vOAPuv2q1NE
							</li>
							<li class="third_tier">
							Task Word: Gas<br>
							Files representing this word: gas.mp4, gas.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
							<li class="third_tier">
							Task Word: hier<br>
							Files representing this word: hier.mp4, hier.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: ja<br>
							Files representing this word: ja.mp4, ja.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___j.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/bvNe1Eu6H8E
							</li>
							<li class="third_tier">
							Task Word: Kenner<br>
							Files representing this word: kenner.mp4, kenner.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: Mutter<br>
							Files representing this word: mutter.mp4, mutter.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___r.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/vOAPuv2q1NE
							</li>
							<li class="third_tier">
							Task Word: Nerven<br>
							Files representing this word: nerven.mp4, nerven.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="third_tier">
							Task Word: Opa<br>
							Files representing this word: opa.mp4, opa.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_o.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/v48LNlzzY2s
							</li>
							<li class="third_tier">
							Task Word: Saal<br>
							Files representing this word: saal.mp4, saal.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: Teer<br>
							Files representing this word: teer.mp4, teer.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: Teer<br>
							Files representing this word: teer.mp4, teer.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: Vater<br>
							Files representing this word: vater.mp4, vater.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="third_tier">
							Task Word: vertragen<br>
							Files representing this word: vertragen.mp4, vertragen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: Verwandte<br>
							Files representing this word: verwandte.mp4, verwandte.ogv <br>
							Handke, J&uuml;rgen. dt.mts. Marburg: J&uuml;rgen Handke, n.d. MTS.
							</li>
							<li class="third_tier">
							Task Word: Wasser<br>
							Files representing this word: wasser.mp4, wasser.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: Xaver<br>
							Files representing this word: xaver.mp4, xaver.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___x.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/R7i3Yn6Y6DY
							</li>
							<li class="third_tier">
							Task Word: zerbrechen<br>
							Files representing this word: zerbrechen.mp4, zerbrechen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
							<li class="third_tier">
							Task Word: zerbrechen<br>
							Files representing this word: zerbrechen.mp4, zerbrechen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_r_final.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/qffJOKIYQyI
							</li>
						</ul>
				</li>
				<li class="second_tier">
						The unstressed "e"<br>
						<ul>
							<li class="third_tier">
							Task Word: Ad&eacute;<br>
							Files representing this word: ade.mp4, ade.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_e.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/zWI6hJkkUq0
							</li>
							<li class="third_tier">
							Task Word: befinden<br>
							Files representing this word: befinden.mp4, befinden.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_e_unstr.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/y7So9NTvVg4
							</li>
							<li class="third_tier">
							Task Word: Egge<br>
							Files representing this word: egge.mp4, egge.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___gg.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/me0Fl-p4BHc
							</li>
							<li class="third_tier">
							Task Word: gesehen<br>
							Files representing this word: gesehen.mp4, gesehen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_e_unstr.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/y7So9NTvVg4
							</li>
							<li class="third_tier">
							Task Word: Hecke<br>
							Files representing this word: hecke.mp4, hecke.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ck.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/orhDgJTWtew
							</li>
							<li class="third_tier">
							Task Word: Hefe<br>
							Files representing this word: hefe.mp4, hefe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="third_tier">
							Task Word: Heft<br>
							Files representing this word: heft.mp4, heft.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___f.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/DTcmOvZ_kZY
							</li>
							<li class="third_tier">
							Task Word: Henne<br>
							Files representing this word: henne.mp4, henne.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___nn.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/hyoPyceIfjQ
							</li>
							<li class="third_tier">
							Task Word: Neffe<br>
							Files representing this word: neffe.mp4, neffe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ff.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/StSGUpw7jV8
							</li>
							<li class="third_tier">
							Task Word: Rasen<br>
							Files representing this word: rasen.mp4, rasen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__vowels_e_unstr.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/y7So9NTvVg4
							</li>
							<li class="third_tier">
							Task Word: Schleswig Holstein<br>
							Files representing this word: schleswig_holstein.mp4, schleswig_holstein.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word: These<br>
							Files representing this word: these.mp4, these.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___s.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/8RiGEYK_ZNg
							</li>
							<li class="third_tier">
							Task Word: Vogel<br>
							Files representing this word: vogel.mp4, vogel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___v.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/q5Ga-fuBeh8
							</li>
							<li class="third_tier">
							Task Word:  Weg<br>
							Files representing this word: weg.mp4, weg.ogv <br>
							Handke, J&uuml;rgen. Ger_letter_pronunciations___g.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/dxFOjjXbNXs
							</li>
						</ul>
				</li>
				<li class="second_tier">
						Select the stressed syllable(s)<br>
						<ul>
							<li class="third_tier">
							Task Word:  Bierbrauer<br>
							Files representing this word: bierbrauer.mp4, bierbrauer.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word:  Br&ouml;tchen<br>
							Files representing this word: broetchen.mp4, broetchen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word:  f&uuml;nfhundertf&uuml;nfundf&uuml;nfzig<br>
							Files representing this word: fuenfhundertfuenfundfuenfzig.mp4, fuenfhundertfuenfundfuenfzig.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__3.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/oBnRKvSLjiY
							</li>
							<li class="third_tier">
							Task Word:  Graphik<br>
							Files representing this word: graphik.mp4, graphik.ogv <br>
							Handke, J&uuml;rgen. ger_lettter_pronunciations___ph.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4.
							</li>
							<li class="third_tier">
							Task Word:  Metzger<br>
							Files representing this word: metzger.mp4, metzger.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__3.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/oBnRKvSLjiY
							</li>
							<li class="third_tier">
							Task Word:  Mischwasserfische<br>
							Files representing this word: mischwasserfische.mp4, mischwasserfische.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word:  Pappplakat<br>
							Files representing this word: pappplakat.mp4, pappplakat.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word:  Picknickpaket<br>
							Files representing this word: picknickpaket.mp4, picknickpaket.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word:  Quietscheente<br>
							Files representing this word: quietscheente.mp4, quietscheente.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word: R&auml;tsel<br>
							Files representing this word: raetsel.mp4, raetsel.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___ts.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/jWSRFdGgrBg
							</li>
							<li class="third_tier">
							Task Word: Rei&szlig;zwecke<br>
							Files representing this word: reisszwecke.mp4, reisszwecke.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word: R&uuml;hrei<br>
							Files representing this word: ruehrei.mp4, ruehrei.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word: Schleswig Holstein<br>
							Files representing this word: schleswig_holstein.mp4, schleswig_holstein.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word: Schlittschuhlaufen<br>
							Files representing this word: schlittschuhlaufen.mp4, schlittschuhlaufen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__3.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/oBnRKvSLjiY
							</li>
							<li class="third_tier">
							Task Word: Streichholzsch&auml;chtelchen<br>
							Files representing this word: streichholzschaechtelchen.mp4, streichholzschaechtelchen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word: Str&uuml;mpfe<br>
							Files representing this word: struempfe.mp4, struempfe.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__2.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/d1ijompaaP0
							</li>
							<li class="third_tier">
							Task Word: Teddy<br>
							Files representing this word: teddy.mp4, teddy.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___dd.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/5K4vao4Gzqc
							</li>
							<li class="third_tier">
							Task Word: Wachsmaske<br>
							Files representing this word: wachsmaske.mp4, wachsmaske.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__3.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/oBnRKvSLjiY
							</li>
							<li class="third_tier">
							Task Word: Zahnarztzimmer<br>
							Files representing this word: zahnarztzimmer.mp4, zahnarztzimmer.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__1.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/Y-vFYd95aI4
							</li>
							<li class="third_tier">
							Task Word: Zapfen<br>
							Files representing this word: zapfen.mp4, zapfen.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations___pf.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/yPJtqpz1ePY
							</li>
							<li class="third_tier">
							Task Word: Zwetschgenzweig<br>
							Files representing this word: zwetschgenzweig.mp4, zwetschgenzweig.ogv <br>
							Handke, J&uuml;rgen. ger_letter_pronunciations__tongue_twisters__3.mp4. Marburg: J&uuml;rgen Handke, n.d. MP4. This file was also published under: https://youtu.be/oBnRKvSLjiY
							</li>
						</ul>
				</li>
			</ul>
		</li>
		<li class="first_tier">Images used in the Creation of this Website:
			<ul class="second_tier">
				<li class="second_tier">
					The Speech Bubble Icon which was used in the creation of the Logo and Favicons:<br>
					Description: Speech Bubble Icon<br>
					License: Public Domain<br>
					Used in: logo.png, favicon-16x16.png, favicon-32x32.png, favicon-96x96 <br>
					ClkerFreeVectorImages. Speech bubble icon. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, 14 Apr. 2012. Web. 10 Mar. 2016. <https://pixabay.com/de/sprache-text-ballon-box-anmelden-34422/>.
				</li>
				<li class="second_tier">
					The Speaker Icon that serves as a background picture for audio files:<br>
						Description: Speaker Icon <br>
						Picture: 500px-Speaker_Icon.png <br>
						License: Public Domain<br>
						User:Mobius. Speaker Icon. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 7 May 2006. Web. 18 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Speaker_Icon.svg/500px-Speaker_Icon.svg.png" target="_blank">https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Speaker_Icon.svg/500px-Speaker_Icon.svg.png</a>.
				</li>
				</li>
				<li class="second_tier"><a name="img_src"></a>
					Image Sources for the Tasks of the Type "Identify the Correct Pronunciation":<br>
					The sources are listed by category and then by author<br>
					<ul class="third_tier">
						<li class="third_tier"> Easy Tasks:
							<ul class="fourth_tier">
							
								<li class="fourth_tier">
									Description: Damm <br>
									Picture: Mohne_Damm_-_geo.hlipp.de_-_1988.jpg <br>
									License: Permission (Reusing this file) Creative Commons Attribution Share-alike license 2.0 <br>
									Babb, Colin J. Damm. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 28 May 2009. Web. 18 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/9/94/Mohne_Damm_-_geo.hlipp.de_-_1988.jpg" target="_blank">https://upload.wikimedia.org/wikipedia/commons/9/94/Mohne_Damm_-_geo.hlipp.de_-_1988.jpg</a>.
								</li>
								<li class="fourth_tier">
									Description: Schal <br>
									Picture: Alpaca_wool_scarf.jpg <br>
									License: http://creativecommons.org/licenses/by-sa/3.0) <br>
									Chan, Deryck. Schal. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 23 Sept. 2012. Web. 18 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/5/51/Alpaca_wool_scarf.JPG" target="_blank">https://upload.wikimedia.org/wikipedia/commons/5/51/Alpaca_wool_scarf.JPG</a>.
								</li>
								<li class="fourth_tier">
									Description: Bibel <br>
									Picture: opened-bible.jpg <br>
									License: Public Domain <br>
									Greyling, Lynn. Bibel. Digital image. Http://www.publicdomainpictures.net/. Bobek Ltd., n.d. Web. 18 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=112346&picture=geoffnet-bibel" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=112346&picture=geoffnet-bibel </a>.
								</li>
								<li class="fourth_tier">
									Description: Saat <br>
									Picture: sunflower-seeds-1393667091wQv.jpg <br>
									License: Public Domain <br>
									Griffin, Peter. Saat. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 18 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=75649&picture=sonnenblumenkerne" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=75649&picture=sonnenblumenkerne </a>.
								</li>
								<li class="fourth_tier">
									Description: Adel <br>
									Picture: Polish_Nobility_Crowns.jpg <br>
									License: Public Domain   <br>
									Jemthepen. Adel. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 30 Jan. 2007. Web. 18 Mar. 2016. <a href="https://commons.wikimedia.org/wiki/File%3APolish_Nobility_Crowns.jpg" target="_blank">https://commons.wikimedia.org/wiki/File%3APolish_Nobility_Crowns.jpg</a>.
								</li>
								<li class="fourth_tier">
									Description: Gummi <br>
									Picture: 1-1232907563I7wo.jpg <br>
									License: Public Domain <br>
									Kratochvil, Petr. Gummi. Digital image. Http://www.publicdomainpictures.net/. Bobek Ltd., n.d. Web. 18 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=1866&picture=gummibander" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=1866&picture=gummibander </a>.
								</li>
								<li class="fourth_tier">
									Description: Papa   <br>
									Picture: baby-and-dad-sleeping.jpg <br>
									License: Public Domain   <br>
									Kratochvil, Vera. Papa. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 18 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=16861&picture=baby-und-papa-schlafen" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=16861&picture=baby-und-papa-schlafen</a>.
								</li>
								<li class="fourth_tier">
									Description: Messe <br>
									Picture: lights-at-the-fair-20851286792453JWLN.jpg <br>
									License: Public Domain <br>
									Ray, Yana. Messe. Digital image. Http://www.publicdomainpictures.net/. Bobek Ltd., n.d. Web. 18 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=9645&picture=leuchtet-auf-der-messe" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=9645&picture=leuchtet-auf-der-messe </a>.
								</li>
								<li class="fourth_tier">
									Description: Gans   <br>
									Picture: 640px-Gans_im_Frost.jpg <br>
									License: Permission (Reusing this file) Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)   <br>
									User: 4028mdk09. Gans. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 19 Dec. 2009. Web. 18 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/9/9b/Gans_im_Frost.JPG" target="_blank">https://upload.wikimedia.org/wikipedia/commons/9/9b/Gans_im_Frost.JPG</a>. 
								</li>
							</ul>
						</li>
						<li class="third_tier">Medium Difficulty Tasks:
							<ul class="fourth_tier">
								<li class="fourth_tier">
									Description: Coupé  <br>
									Picture: bentley-2-door-coupe-car.jpg  <br>
									License: Public Domain  <br>
									Borland, Alex. Coupé. Digital image. Http://www.publicdomainpictures.net/. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=83818&picture=bentley-2-tur-coupe-auto" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=83818&picture=bentley-2-tur-coupe-auto</a>.
								</li>
								<li class="fourth_tier">
									Description: Busch<br>
									Picture: desert-bush-103.jpg<br>
									License: Public Domain<br>
									Carlson, Ronald. Busch. Digital image. Www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=26964&picture=vintage-boat" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=23168&picture=wuste-bush-103 </a>.
								</li>
								<li class="fourth_tier">
									Description: Boot <br>
									Picture: vintage-boat.jpg<br>
									License: Public Domain <br>
									Libby, Junior. Boot. Digital image. Http://www.publicdomainpictures.net/. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=26964&picture=vintage-boat </a>.
								</li>
								<li class="fourth_tier">
									Description: B&uuml;ro<br>
									Picture: 30134_jissekiimage3.jpg<br>
									License: CC BY-SA 3.0<br>
									MUGENUP. B&uuml;ro. Digital image. Https://upload.wikimedia.org/. Wikimedia Foundation, 7 Aug. 2013. Web. 30 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/2/27/30134_jissekiimage3.JPG" target="_blank">https://upload.wikimedia.org/wikipedia/commons/2/27/30134_jissekiimage3.JPG </a>.
								</li>
								<li class="fourth_tier">
									Description: Ochse <br>
									Picture: bull-1128786_640.jpg  <br>
									License: Public Domain  <br>
									PatternPictures. Ochse. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, 5 July 2015. Web. 30 Mar. 2016. <a href="https://pixabay.com/de/highlander-stier-ochse-rinder-tier-1128786/" target="_blank">https://pixabay.com/de/highlander-stier-ochse-rinder-tier-1128786/ </a>.
								</li>
								<li class="fourth_tier">
									Description: Akku<br>
									Picture: rechargeable-battery.jpg<br>
									License: Public Domain<br>
									Siedlecki, Piotr. Akku. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=117617&picture=wiederaufladbare-batterie" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=117617&picture=wiederaufladbare-batterie </a>.
								</li>
								<li class="fourth_tier">
									Description: Insel  <br>
									Picture: 512px-Small_Island_in_Lower_Saranac_Lake.jpg <br>
									License: Permission (Reusing this file) Creative Commons Attribution Share-alike license 2.0 <br>
									User:Mwanner. Insel. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 18 Oct. 2007. Web. 30 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/e/ec/Small_Island_in_Lower_Saranac_Lake.jpg" target="_blank">https://upload.wikimedia.org/wikipedia/commons/e/ec/Small_Island_in_Lower_Saranac_Lake.jpg </a>.
								</li>
							</ul>
						</li>
						<li class="third_tier">
							Hard Tasks:
							<ul class="fourth_tier">
							
								<li class="fourth_tier">
								Description: &ouml;l<br>
								Picture: Oil_well.jpg<br>
								License: GFDL (http://www.gnu.org/copyleft/fdl.html) or CC-BY-SA-3.0 (http://creativecommons.org/licenses/by-sa/3.0/)] <br>
								Flcelloguy. &ouml;l. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 15 Mar. 2007. Web. 30 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/c/ce/Oil_well.jpg" target="_blank">https://upload.wikimedia.org/wikipedia/commons/c/ce/Oil_well.jpg </a>.
								</li>
								<li class="fourth_tier">
								Description: Sch&uuml;ler<br>
								Picture: student-studying.jpg<br>
								License: Public Domain<br>
								Griffin, Peter. Sch&uuml;ler. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=56032&picture=studieren" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=56032&picture=studieren </a>.
								</li>
								<li class="fourth_tier">
								Description: Buechse<br>
								Picture: tin.jpg<br>
								License: Public Domain<br>
								Hodan, George. Buechse. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=34214&picture=zinn" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=34214&picture=zinn </a>.
								</li>
								<li class="fourth_tier">
								Description: Men&uuml; <br>
								Picture: 33-1215715348JwrH.jpg<br>
								License: Public Domain<br>
								Langova, Anna. Men&uuml;. Digital image. Www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 30 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=868&picture=menu" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=868&picture=menu</a>.
								</li>
							</ul>
						</li>
						<li class="third_tier">Expert Difficulty Tasks:
							<ul class="fourth_tier">
							
								<li class="fourth_tier">
								Description: Aal<br>
								Picture: eel-976096_960_720.png<br>
								License: Public Domain<br>
								ArtsyBee. Aal. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, n.d. Web. 31 Mar. 2016. <a href="https://pixabay.com/de/aal-jahrgang-zeichnung-schlange-976096/" target="_blank">https://pixabay.com/de/aal-jahrgang-zeichnung-schlange-976096/ </a>.
								</li>
								
								<li class="fourth_tier">
								Description: H&uuml;te <br>
								Picture: hats-829509_960_720.jpg <br>
								License: Public Domain <br>
								Hans. H&uuml;te. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, n.d. Web. 31 Mar. 2016. <a href="https://pixabay.com/de/h&uuml;te-filzhut-hutmanufaktur-stapel-829509/" target="_blank">https://pixabay.com/de/h&uuml;te-filzhut-hutmanufaktur-stapel-829509/</a>.
								</li>
								
								<li class="fourth_tier">
								Description: Sucht <br>
								Picture: cigarette-1366643581pqJ.jpg <br>
								License: Public Domain <br>
								Hodan, George. Sucht. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 31 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=38023&picture=zigarette" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=38023&picture=zigarette</a>.
								</li>
								
								<li class="fourth_tier">
								Description: F&uuml;ller <br>
								Picture: pen-631321_960_720.jpg <br>
								License: Public Domain <br>
								Jackmac34. F&uuml;ller. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, 11 Feb. 2015. Web. 31 Mar. 2016. <a href="https://pixabay.com/de/stift-f&uuml;llfederhalter-tinte-gold-631321/" target="_blank">https://pixabay.com/de/stift-f&uuml;llfederhalter-tinte-gold-631321/ </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Beet <br>
								Picture: _MG_3596.jpg <br>
								License: Public Domain <br>
								Kratochvil, Petr. Beet. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 31 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=209&picture=pansy" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=209&picture=pansy </a>.
								</li>
								
								<li class="fourth_tier">
								Description: H&ouml;hle <br>
								Picture: cave-in-barbados.jpg <br>
								License: Public Domain <br>
								Kratochvil, Petr. H&ouml;hle. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 31 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=22937&picture=cave-in-barbados" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=22937&picture=cave-in-barbados</a>.
								</li>
								
								<li class="fourth_tier">
								Description: Schotte <br>
								Picture: bagpipe-349717_960_720.jpg <br>
								License: Public Domain <br>
								PublicDomainArchive. Schotte. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, 21 May 2014. Web. 31 Mar. 2016. <a href="https://pixabay.com/de/dudelsack-scot-uilleann-pipes-349717/" target="_blank">https://pixabay.com/de/dudelsack-scot-uilleann-pipes-349717/ </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Mett <br>
								Picture: Mettbroetchen.jpg <br>
								License: CC BY-SA 3.0 (http://creativecommons.org/licenses/by-sa/3.0)], via Wikimedia Commons <br>
								Nize. Mett. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, June 2009. Web. 31 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/b/b7/Mettbroetchen.jpg" target="_blank">https://upload.wikimedia.org/wikipedia/commons/b/b7/Mettbroetchen.jpg </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Ass<br>
								Picture: four-aces-1442704325EGs.jpg<br>
								License: Public Domain<br>
								Rondeau, Charles. Ass. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 31 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=129588&picture=four-aces" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=129588&picture=four-aces </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Wiesen <br>
								Picture: green-meadow.jpg <br>
								License: Public Domain <br>
								Shemesh, Marina. Wiesen. Digital image. Http://www.publicdomainpictures.net. Bobek Ltd., n.d. Web. 31 Mar. 2016. <a href="http://www.publicdomainpictures.net/view-image.php?image=14266&picture=grune-wiese" target="_blank">http://www.publicdomainpictures.net/view-image.php?image=14266&picture=grune-wiese </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Mus <br>
								Picture: apple-sauce-544676_960_720.jpg <br>
								License: Public Domain <br>
								Taken. Mus. Digital image. Https://pixabay.com/. Braxmeier & Steinberger GbR, 26 Nov. 2014. Web. 31 Mar. 2016. <a href="https://pixabay.com/de/apfelmus-klobig-sch&uuml;ssel-544676/" target="_blank">https://pixabay.com/de/apfelmus-klobig-sch&uuml;ssel-544676/ </a>.
								</li>
								
								<li class="fourth_tier">
								Description: Ofen<br>
								Picture: Cornish_Pasties_in_the_Oven.jpg <br>
								License: CC BY-SA 3.0 (http://creativecommons.org/licenses/by-sa/3.0), via Wikimedia Commons <br>
								Visitor7. Ofen. Digital image. Https://upload.wikimedia.org. Wikimedia Foundation, 5 Oct. 2012. Web. 31 Mar. 2016. <a href="https://upload.wikimedia.org/wikipedia/commons/3/3d/Cornish_Pasties_in_the_Oven.jpg" target="_blank">https://upload.wikimedia.org/wikipedia/commons/3/3d/Cornish_Pasties_in_the_Oven.jpg </a>.
								</li>
								
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
</body>
</html>