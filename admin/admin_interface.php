<?php
//Include the Database connection:
require_once "../helpers/db.php";
session_start();

/* check if the user came directly from the login script by checking the GET parameter passed on in the URL, or, alternatively, 
	check if the login success session variable was set by the login script:
*/
if(isset($_GET['login_success']) || $_SESSION['login_success']){ 
	
// Multiple Choice Tasks Results Query:
$mult_choice_result_query ="SELECT id_of_answer1, result_id1, mult_choice_counter, total, word_total, 
(SELECT correct_i FROM identify_answer_table WHERE answer_id1 = id_of_answer1) AS correct, 
(SELECT language FROM languages_table WHERE lang_id = id_of_language1_1) AS language1, 
(SELECT language FROM languages_table WHERE lang_id = id_of_language1_2) AS language2, 
(SELECT word_id FROM word_table WHERE word_id = my_word_id) AS word_id1, 
(SELECT word FROM word_table WHERE word_id = my_word_id) AS word_1, 
(SELECT id_of_category FROM word_table WHERE word_id = word_id1) AS cat_id, 
(SELECT id_of_cluster FROM word_table WHERE word_id = word_id1) AS cluster_id_1, 
(SELECT cluster_code FROM cluster_table WHERE cluster_id = cluster_id_1) AS my_cluster_code, 
(SELECT answer_ipa FROM identify_answer_table WHERE answer_id1 = id_of_answer1) AS ipa,
(SELECT category FROM category_table WHERE category_id = cat_id) AS my_category 
FROM identify_result_table 
ORDER BY cat_id, my_cluster_code, word_1, id_of_answer1, language1, language2, correct";

// Run Query and Determine Row Count
$mult_choice_result = $my_db_object->query($mult_choice_result_query);
$row_count_mpc = $mult_choice_result->num_rows;

if($row_count_mpc >0){ // If there is at least one result, store it in an array
	while ($row1 = mysqli_fetch_assoc($mult_choice_result)) {
						$mult_choice_array[] = $row1;
		}
}


// Fill Gap Tasks Results Query:
$fill_gap_result_query ="SELECT fill_gap_result_id, user_input, is_correct, fill_gap_counter, gap_total, 
(SELECT language FROM languages_table WHERE lang_id = lang1) AS lang1, 
(SELECT language FROM languages_table WHERE lang_id = lang2) AS lang2, 
(SELECT word_id FROM word_table WHERE word_id = id_of_word2) AS word_id, 
(SELECT word FROM word_table WHERE word_id = id_of_word2) AS word, 
(SELECT id_of_category FROM word_table WHERE word_id = id_of_word2) AS cat_id, 
(SELECT category FROM category_table WHERE category_id = cat_id) AS my_category,
(SELECT id_of_cluster FROM word_table WHERE word_id = id_of_word2) AS cluster_id_1, 
(SELECT cluster_code FROM cluster_table WHERE cluster_id = cluster_id_1) AS my_cluster_code 
FROM fill_gap_result_table 
ORDER BY cat_id, my_cluster_code, word, lang1, lang2, is_correct";

// Run Query and Determine Row Count
$fill_gap_result = $my_db_object->query($fill_gap_result_query);
$row_count_fillgap = $fill_gap_result->num_rows;

if($row_count_fillgap >0){ // If there is at least one result, store it in an array
while ($row2 = mysqli_fetch_assoc($fill_gap_result)) {
		$fill_gap_array[] = $row2;
	}
}

// Stress Tasks Results Query:
$stress_result_query ="SELECT str_result_id, str_lang1, str_lang2, first_stress, non_selected_1st_stress, wrong_1st_stress, second_stress, non_selected_2nd_stress, wrong_2nd_stress, whole_string1, correct_flag_1_1, correct_flag_2_2, str_counter, total_str_counter, 
(SELECT word_id FROM word_table WHERE word_id = str_id_of_word) AS word_id, 
(SELECT word FROM word_table WHERE word_id = str_id_of_word) AS word,
(SELECT language FROM languages_table WHERE lang_id = str_lang1) AS str_lang1, 
(SELECT language FROM languages_table WHERE lang_id = str_lang2) AS str_lang2,
(SELECT id_of_category FROM word_table WHERE word_id = str_id_of_word) AS cat_id, 
(SELECT category FROM category_table WHERE category_id = cat_id) AS my_category
FROM stress_result_table 
ORDER BY cat_id, str_id_of_word, word, str_lang1, str_lang2";

// Run Query and Determine Row Count
$stress_result = $my_db_object->query($stress_result_query);
$row_count_stress = $stress_result->num_rows;

if($row_count_stress >0){ // If there is at least one result, store it in an array
	while ($row3 = mysqli_fetch_assoc($stress_result)) {
			$stress_array[] = $row3;
		}
}

// Unstressed e Tasks Results Query:
$unstress_result_query ="SELECT unstr_result_id, unstr_lang1, unstr_lang2, whole_string, correct_flag_1, correct_flag_2, unstr_counter, total_unstr_counter, 
(SELECT word_id FROM word_table WHERE word_id = unstr_id_of_word) AS word_id, 
(SELECT word FROM word_table WHERE word_id = unstr_id_of_word) AS word,
(SELECT language FROM languages_table WHERE lang_id = unstr_lang1) AS unstr_lang1, 
(SELECT language FROM languages_table WHERE lang_id = unstr_lang2) AS unstr_lang2,
(SELECT id_of_category FROM word_table WHERE word_id = unstr_id_of_word) AS cat_id, 
(SELECT category FROM category_table WHERE category_id = cat_id) AS my_category
FROM unstress_result_table 
ORDER BY cat_id, unstr_id_of_word, word, unstr_lang1, unstr_lang2";

// Run Query and Determine Row Count
$unstress_result = $my_db_object->query($unstress_result_query);
$row_count_unstress = $unstress_result->num_rows;

if($row_count_unstress >0){ // If there is at least one result, store it in an array
	while ($row4 = mysqli_fetch_assoc($unstress_result)) {
			$unstress_array[] = $row4;
		}
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
			<link rel="stylesheet" href="../css/main.css">
			<link rel="shortcut icon" href="../media/img/logo.png"/>
			<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
			<script src="../js/jquery-1.12.1.min.js"></script>
			<script>
			// JQuery code
			$(document).ready(function() {
				
				$("h2.results_headline_2").siblings().hide; // Initially hide all non-headline elements for space reasons
				
				$("h2.results_headline_2").on("click", function(){ // Implement a toggle functionality so the user can click on headlines to expand by task type
					$(this).siblings().toggle();
				});
				
				// JQuery for the Scroll Back to Top Button that is appearing at the bottom of each category when one is clicked:
				/*
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
				<img src="../media/img/logo.png" alt="Logo" id="logo">
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
							<li><a href="#" class="current">Admin Interface</a>
							</li>
							<li><a href="../index.php">Home</a>
								<ul>
								</ul>
							</li>
							<li><a href="../practice.php">Practice Section</a>
								<ul>
									<li><a href="../practice.php">Identify the Correct Pronunciation</a>
											<ul>
												<li><a href="../practice.php">Easy</a></li>
												<li><a href="../practice.php">Medium</a></li>
												<li><a href="../practice.php">Hard</a></li>
												<li><a href="../practice.php">Expert Mode</a></li>
											</ul>
									</li>
									<li><a href="../practice.php">Complete the Word</a>
											<ul>
												<li><a href="../practice.php">Easy</a></li>
												<li><a href="../practice.php">Medium</a></li>
												<li><a href="../practice.php">Hard</a></li>
											</ul>
									</li>
									<li><a href="../practice.php">Select the Correct Stress</a>
											<ul>
												<li><a href="../practice.php">Easy</a></li>
												<li><a href="../practice.php">Medium</a></li>
												<li><a href="../practice.php">Hard</a></li>
											</ul>
									</li>
									<li><a href="../practice.php">German Specials</a>
											<ul>
												<li><a href="../practice.php">The Unstressed "e"</a></li>
												<li><a href="../practice.php">The Final "r"</a></li>
												<li><a href="../practice.php">Final Devoicing</a></li>
											</ul>
									</li>
								</ul>
							</li>
							<li><a href="../german_sounds.php">German Sounds</a>
								<ul>
									<li><a href="../german_sounds.php#vowel_div">Vowels</a></li>
									<li><a href="../german_sounds.php#diphthongs_div">Diphthongs</a></li>
									<li><a href="../german_sounds.php#consonants_div">Consonants</a></li>
									<li><a href="../german_sounds_upsid_own.php">UPSID to IPA Correspondences</a></li>
								</ul>
							</li>
							<li><a href="../about.php">About This Website</a>
								<ul>
								</ul>
							</li>
							<li><a href="../sources.php">Sources</a>
							</li>
						</ul>
						</nav>
		</div>
		<div id="admin_body">
			<h2 class="results_headline">Admin Interface</h2>
			<p class="results_headline">
				Here, you can see how users of this page have performed on the different tasks. the results are sorted by Sound (IPA) and then by Language(s).<br>
				Click on a Headline to view the results for the task types that interests you.<br>
				Click on it again to hide it.
			</p>
			<?php
			if($row_count_mpc >0){ // Display Results for this type of task only if there actually are results
			?>
			<div id="mult_choice_results" class="results_div">
				<h2 class="results_headline_2">Multiple Choice Results</h2>
				<table id="mult_choice_result_table" class="results_table">
				<tr>
					<th>Cluster Code</th>
					<th class="hover_me">Word / Task<span class="hover_text">Hover over each word to see the ID of the word in the database</span></th>
					<th>First Language</th>
					<th>Second Language</th>
					<th class="hover_me">IPA of Answer given<span class="hover_text">As a representation of the media file the user selected</span></th>
					<th>Was the answer correct?</th>
					<th>Total Amount of Times this Answer was given in this Language Combination</th>
					<th>Total Amount of Times this Answer was given</th>
					<th>Times this Answer was given in this Language Combination / Total Amount that this Answer was given</th>
					<th>Total Amount of Times this Answer was given / Task</th>
					<th>Category</th>
				</tr>
				<?php
				
				foreach ($mult_choice_array as $key1 => $val1) {
					
					// Calculating the Answers of this Language Combination per Total Amount that this Answer was given
						$my_count = $val1['mult_choice_counter'];
						$my_total = $val1['total'];
						$my_percent = ($my_count/$my_total) * 100;
					
					// Calculating the Amount of times this answer was given per Question
						$my_word_total = $val1['word_total'];
						$my_word_percent = ($my_total/$my_word_total) * 100;
					
				?>	
				<tr>
					<td><?php echo $val1['my_cluster_code']; ?></td>
					<td class="hover_me"><?php echo $val1['word_1']; ?>
							<span class="hover_text">Word ID: <?php echo $val1['word_id1']; ?></span>
					</td>
					<td><?php 
					// If there is a language value saved for the first language, display it.
					if(isset($val1['language1']) && $val1['language1'] != ""){ 
							echo $val1['language1']; 
						}
					else{ echo "&nbsp;/&nbsp;"; // Else, display a slash
					}
					?>
					</td>
					<td><?php 
					// If there is a language value saved for the second language, display it.
					if(isset($val1['language2']) && $val1['language2'] != ""){ 
							echo $val1['language2']; 
						}
					else{ echo "&nbsp;/&nbsp;"; // Else, display a slash
					}
					?>
					</td>
					<td>&nbsp;/&nbsp;<?php echo $val1['ipa']; ?>&nbsp;/&nbsp;</td>
					<td><?php if($val1['correct'] == "1")
											{echo "Yes";}
										else { echo "No";} 
							?></td>
					<td><?php echo $val1['mult_choice_counter']; ?></td>
					<td><?php echo $val1['total']; ?></td>
					<td><?php echo number_format($my_percent,2) . "%";?></td>
					<td><?php echo number_format($my_word_percent,2) . "%";?></td>
					<td id="category_name"><?php echo $val1['my_category']; ?></td>
				</tr>	
				<?php
				}
				?>
				</table>
			</div>
			
			<?php
			}
			if($row_count_fillgap >0){ // Display Results for this type of task only if there actually are results
			?>
			<div id="fill_gap_results" class="results_div">
				<h2 class="results_headline_2">Fill the Gap Results</h2>
				<table id="fill_gap_result_table" class="results_table">
					<tr>
						<th>Sound Cluster</th>
						<th class="hover_me">Word / Task <span class="hover_text">Hover over each word to see the ID of the word in the database</span></th>
						<th class="hover_me">User Input<span class="hover_text">This is what the user filled into the gap.</span></th>
						<th>First Language</th>
						<th>Second Language</th>
						<th>Was the answer correct?</th>
						<th>Total Amount of Times this Answer was given in this Language Combination</th>
						<th>Total Amount of Times this Answer was given</th>
						<th>Total Amount of Times this Answer was given / Task</th>
						<th class="category_name">Category</th>
					</tr>
				<?php
				foreach ($fill_gap_array as $key2 => $val2) {
					
					/* 
					Calculating the Percentage between Amount of Times this Answer was given in this Language Combination and 
					Amount of Times this Answer was given in Total:
					*/
						$my_gap_count = $val2['fill_gap_counter'];
						$my_gap_total = $val2['gap_total'];
						$my_gap_percent = ($my_gap_count/$my_gap_total) * 100;
					
				?>
					<tr>
						<td><?php echo $val2['my_cluster_code']; ?> </td>
						<td class="hover_me"><?php echo $val2['word']; ?> <span class="hover_text">Word ID: <?php echo $val2['word_id']; ?></span></td>
						<td><?php echo $val2['user_input']; ?></td>
						<td><?php 
								// If there is a language value saved for the first language, display it.
								if(isset($val2['lang1']) && $val2['lang1'] != ""){ 
										echo $val2['lang1']; 
									}
								else{ echo "&nbsp;/&nbsp;"; // Else, display a slash
								}
								?>
						</td>
						<td><?php 
								// If there is a language value saved for the second language, display it.
								if(isset($val2['lang2']) && $val2['lang2'] != ""){ 
										echo $val2['lang2']; 
									}
								else{ echo "&nbsp;/&nbsp;"; // Else, display a slash
								}
							?>
						</td>
						<td><?php if($val2['is_correct'] == "1")
											{echo "Yes";}
										else { echo "No";} 
							?>
						</td>
						<td><?php echo $val2['fill_gap_counter']; ?></td>
						<td><?php echo $val2['gap_total']; ?></td>
						<td><?php echo number_format($my_gap_percent,2) . "%";?></td>
						<td class="category_name"><?php echo $val2['my_category']; ?></td>
					</tr>
				<?php
				}
				?>
				</table>
			</div>
			<?php
			}
			
			if($row_count_stress >0){ // Display Results for this type of task only if there actually are results
			?>
			<div id="stress_results" class="results_div">
				<h2 class="results_headline_2">Select the Correct Stress Results</h2>
					<table id="str_result_table" class="results_table">
						<tr>
							<th class="hover_me">Word / Task<span class="hover_text">Hover over each word to see the ID of the word in the database</span></th>
							<th>First Language</th>
							<th>Second Language</th>
							<th class="hover_me">Correctly selected first stress<span class="hover_text">This is the item the user selected correctly as to be carrying primary stress.</span></th>
							<th class="hover_me">Not selected first stress<span class="hover_text">This item carries primary stress, but the user did not select it.</span></th>
							<th class="hover_me">Wrongly selected first stress<span class="hover_text">The user wrongly selected this item to be carrying primary stress.</span></th>
							<th class="hover_me">Correctly selected second stress<span class="hover_text">This is the item the user selected correctly as to be carrying secondary stress.</span></th>
							<th class="hover_me">Not selected second stress<span class="hover_text">This item carries secondary stress, but the user did not select it.</span></th>
							<th class="hover_me">Wrongly selected second stress<span class="hover_text">The user wrongly selected this item to be carrying secondary stress.</span></th>
							<th class="hover_me">Task Term with User Selection
										<span class="hover_text"><span class="bold">Green Marking:</span> Correct Selection<br>
																<span class="bold">Red Marking:</span> Wrong Selection<br>
																<span class="bold">Grey Marking:</span> Missed Item
										</span>
							</th>
							<th>Was the First User Selection correct?</th>
							<th>Was the Second User Selection correct?</th>
							<th>Total Amount of Times this Answer was given in this Language Combination</th>
							<th>Total Amount of Times this Answer was given</th>
							<th>Total Amount of Times this Answer was given / Task</th>
							<th>Category</th>
						</tr>
				<?php
				foreach ($stress_array as $key3 => $val3) {
					
					/* 
					Calculating the Percentage between Amount of Times this Answer was given in this Language Combination and 
					Amount of Times this Answer was given in Total:
					*/
						$my_str_count = $val3['str_counter'];
						$my_str_total = $val3['total_str_counter'];
						$my_str_percent = ($my_str_count/$my_str_total) * 100;
				?>
					
					<tr>
						<td class="hover_me"><?php echo $val3['word']; ?><span class="hover_text">Word ID: <?php echo $val3['word_id']; ?></span></td>
						<td><?php if(!isset($val3['str_lang1']) || $val3['str_lang1'] == "")
											{echo "Not Provided";}
										else{ echo $val3['str_lang1'];} 
							?>
						</td>
						<td><?php if(!isset($val3['str_lang2']) || $val3['str_lang2'] == "")
											{echo "Not Provided";}
										else{ echo $val3['str_lang2'];} 
							?>
						</td>
						<td><?php if(!isset($val3['first_stress']) || $val3['first_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['first_stress'];} 
							?>
						</td>
						<td><?php if(!isset($val3['non_selected_1st_stress']) || $val3['non_selected_1st_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['non_selected_1st_stress'];} 
							?>
						</td>
						<td><?php if(!isset($val3['wrong_1st_stress']) || $val3['wrong_1st_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['wrong_1st_stress'];} 
							?>
						</td>
						<td><?php if(!isset($val3['second_stress']) || $val3['second_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['second_stress'];} 
							?>
						</td>
						<td><?php if(!isset($val3['non_selected_2nd_stress']) || $val3['non_selected_2nd_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['non_selected_2nd_stress'];} 
							?>
						</td>
						<td><?php if(!isset($val3['wrong_2nd_stress']) || $val3['wrong_2nd_stress'] == "not_set")
											{echo "/";}
										else{ echo $val3['wrong_2nd_stress'];} 
							?>
						</td>
						<td><?php echo $val3['whole_string1']; ?>
						</td>
						<td><?php if($val3['correct_flag_1_1'] == "1")
											{echo "Yes";}
										else{ echo "No";} 
							?>
						</td>
						<td><?php if($val3['correct_flag_2_2'] == "1")
											{echo "Yes";}
										elseif($val3['correct_flag_2_2'] == "0"){ echo "No"; }
										elseif($val3['correct_flag_2_2'] == "not set"){ echo "/"; }
										
							?>
						</td>
						<td><?php echo $val3['str_counter']; ?></td>
						<td><?php echo $val3['total_str_counter']; ?></td>
						<td><?php echo number_format($my_str_percent,2) . "%";?></td>
						<td class="category_name"><?php echo $val3['my_category']; ?></td>
					</tr>
				<?php
				}
				?>
				</table>
			</div>
			<?php
			}
			
			if($row_count_unstress >0){ // Display Results for this type of task only if there actually are results
			?>
			<div id="unstress_results" class="results_div">
				<h2 class="results_headline_2">Find the Unstressed e Task Results</h2>
					<table id="unstr_result_table" class="results_table">
						<tr>
							<th>Word</th>
							<th>First Language</th>
							<th>Second Language</th>
							<th class="hover_me">Task Term with User Selection
										<span class="hover_text"><span class="bold">Green Marking:</span> Correct Selection<br>
																<span class="bold">Red Marking:</span> Wrong Selection<br>
																<span class="bold">Grey Marking:</span> Missed Item
										</span>
							</th>
							<th>Was the First User Selection correct?</th>
							<th>Was the Second User Selection correct?</th>
							<th>Total Amount of Times this Answer was given in this Language Combination
							</th>
							<th>Total Amount of Times this Answer was given
							</th>
							<th>Total Amount of Times this Answer was given / Task
							</th>
							<th>Category</th>
						</tr>
				<?php
				foreach ($unstress_array as $key4 => $val4) {
					
					/* 
					Calculating the Percentage between Amount of Times this Answer was given in this Language Combination and 
					Amount of Times this Answer was given in Total:
					*/
						$my_unstr_count = $val4['unstr_counter'];
						$my_unstr_total = $val4['total_unstr_counter'];
						$my_unstr_percent = ($my_unstr_count/$my_unstr_total) * 100;
				?>
					
					<tr>
						<td class="hover_me"><?php echo $val4['word']; ?><span class="hover_text">Word ID: <?php echo $val4['word_id']; ?></span></td>
						<td><?php if(!isset($val4['unstr_lang1']) || $val4['unstr_lang1'] == "")
											{echo "&nbsp;/&nbsp;";}
										else{ echo $val4['unstr_lang1'];} 
							?>
						</td>
						<td><?php if(!isset($val4['unstr_lang2']) || $val4['unstr_lang2'] == "")
											{echo "&nbsp;/&nbsp;";}
										else{ echo $val4['unstr_lang2'];} 
							?>
						</td>
						<td><?php echo $val4['whole_string']; ?></td>
						<td><?php if($val4['correct_flag_1'] == "1")
											{echo "Yes";}
										else { echo "No";} 
							?>
						</td>
						<td><?php if($val4['correct_flag_2'] == "1")
											{echo "Yes";}
										elseif($val4['correct_flag_2'] == "0") { echo "No";}
										elseif($val4['correct_flag_2'] == "not set"){ echo "/"; }
							?>
						</td>
						<td><?php echo $val4['unstr_counter']; ?></td>
						<td><?php echo $val4['total_unstr_counter']; ?></td>
						<td><?php echo number_format($my_unstr_percent,2) . "%";?></td>
						<td class="category_name"><?php echo $val4['my_category']; ?></td>
					</tr>
				<?php
				}
				?>
				</table>
			</div>
			<?php
			}
			?>
		</div>
					<div class="to_top">
						<img src="../media/img/arrow_up.png" alt="arrow upwards" width="48px" height="64px" id="arrow_img"></img>
						<div id="to_top_text">Back to Top</div>
					</div>
</body>
</html>
<?php

}
else{
	// If the user did not come from the login script but tried to call up this page without logging in, display an error:
	echo "Invalid Access. Please use the main page.";
	die;
}
?>