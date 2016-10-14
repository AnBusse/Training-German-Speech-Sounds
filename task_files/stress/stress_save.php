<?php
// stress_save.php - This script processes the AJAX request sent by stress.php

session_start();

//Include the Database connection:
require_once "../../helpers/db.php";


// Store the AJAX data in variables:
$word_id = mysqli_real_escape_string($my_db_object, $_POST['task_id']);
$category = mysqli_real_escape_string($my_db_object, $_POST['category']);
$my_lang1 = mysqli_real_escape_string($my_db_object, $_POST['my_lang1']);
$my_lang2 = mysqli_real_escape_string($my_db_object, $_POST['my_lang2']);

$first_stress = mysqli_real_escape_string($my_db_object, $_POST['first_stress']);
$first_stress = htmlentities($first_stress);
$non_selected_1st_stress = mysqli_real_escape_string($my_db_object, $_POST['non_selected_1st_stress']);
$non_selected_1st_stress = htmlentities($non_selected_1st_stress);
$wrong_1st_stress = mysqli_real_escape_string($my_db_object, $_POST['wrong_1st_stress']);
$wrong_1st_stress = htmlentities($wrong_1st_stress);

$second_stress = mysqli_real_escape_string($my_db_object,$_POST['second_stress']);
$second_stress = htmlentities($second_stress);
$non_selected_2nd_stress = mysqli_real_escape_string($my_db_object, $_POST['non_selected_2nd_stress']);
$non_selected_2nd_stress = htmlentities($non_selected_2nd_stress);
$wrong_2nd_stress = mysqli_real_escape_string($my_db_object,$_POST['wrong_2nd_stress']);
$wrong_2nd_stress = htmlentities($wrong_2nd_stress);

$correct_flag_1 = mysqli_real_escape_string($my_db_object,$_POST['correct_flag_1']);
$correct_flag_2 = mysqli_real_escape_string($my_db_object,$_POST['correct_flag_2']);
$whole_string = $_POST['whole_string'];

// Store language data from Session into variables:
if(isset($_SESSION['language_ses1'])){
	$lang1 = mysqli_real_escape_string($my_db_object, $_SESSION['language_ses1']);
}

if(isset($_SESSION['language_ses2'])){
	$lang2 = mysqli_real_escape_string($my_db_object, $_SESSION['language_ses2']);
}


	// Check if the result set already exists at least once with the same data:
	$check_str_exist_query = "SELECT * FROM stress_result_table WHERE 
								str_id_of_word = '". $word_id ."' AND 
								str_lang1 = '" . $my_lang1 . "' AND 
								str_lang2 = '" . $my_lang2 . "' AND 
								first_stress = '" . $first_stress . "' AND 
								non_selected_1st_stress = '" . $non_selected_1st_stress . "' AND 
								wrong_1st_stress = '" . $wrong_1st_stress . "' AND 
								second_stress = '" . $second_stress . "' AND 
								non_selected_2nd_stress = '" . $non_selected_2nd_stress . "' AND 
								wrong_2nd_stress = '" . $wrong_2nd_stress . "' AND 
								whole_string1 = '". $whole_string ."' AND 
								correct_flag_1_1 = '". $correct_flag_1 ."' AND 
								correct_flag_2_2 = '". $correct_flag_2 ."'";
		

	// Run the Query
	$check_str_exist_result = $my_db_object->query($check_str_exist_query);

	//Count rows of the result set:
	$exist_str_row_count = $check_str_exist_result->num_rows;
	
	
	if($exist_str_row_count < 1){
		
		
					//check if there are fuzzy matches
					//if there are fuzzy matches, get the total value of them
					//store total_val in variable, use in insert below
					
					//Get the current total count for all rows with the selected answer ID and word ID:
					$get_stress_total = "SELECT str_result_id, total_str_counter FROM stress_result_table 
											WHERE str_id_of_word = '" . $word_id . "'";
											
				// SQL Query to get total result
				$get_stress_total_result = $my_db_object->query($get_stress_total);

				//Count rows of the result set:
				$stress_total_row_count = $get_stress_total_result->num_rows;
				
					//If there is at least one row with for the same task:
					if($stress_total_row_count > 0){
						
						
						//Store total count in variable by fetching the result to an array:
						while ($row = mysqli_fetch_assoc($get_stress_total_result)) {
							$my_stress_total = $row['total_str_counter'];
						}
					}
				
				
		
				// Query and store the task items in an array and then in variables:

			// Insert Stress Result Query:
			$stress_insert_query = "INSERT INTO stress_result_table SET str_id_of_word = '" . $word_id . "',
																	first_stress = '" . $first_stress . "',
																	non_selected_1st_stress = '" . $non_selected_1st_stress . "',
																	wrong_1st_stress = '" . $wrong_1st_stress . "',
																	second_stress = '" . $second_stress . "',
																	non_selected_2nd_stress = '" . $non_selected_2nd_stress . "',
																	wrong_2nd_stress = '" . $wrong_2nd_stress ."',
																	str_counter = '" . '1' . "', 
																	whole_string1 = '". $whole_string ."', 
																	correct_flag_1_1 = '". $correct_flag_1 ."', 
																	correct_flag_2_2 = '". $correct_flag_2 ."'";
																	
			// If the user did not specify one or both languages, then insert nothing into those fields
			 if($lang1 && $lang1 != "dummy1"){
				 $stress_insert_query .= ", str_lang1 = '" . $lang1 . "'";
			 }
			 if($lang2 && $lang2 != "dummy2"){
				 $stress_insert_query .= ", str_lang2 = '" . $lang2 . "'";
			 }
			 
			if ($stress_total_row_count > 0) {
				$stress_insert_query .= ", total_str_counter = '". $my_stress_total ."'";
				}
			else {
				$stress_insert_query .= ", total_str_counter = '0'";
			}
			 
			
			// Run the Insert Query
			 $stress_insert_result = $my_db_object->query($stress_insert_query);
			
			// Error Handling if the Query failed:
				if(!$stress_insert_result){
					echo("Error description: " . mysqli_error($my_db_object));
				}
		
	}
	else{
		$update_stress_row = "UPDATE stress_result_table
								SET str_counter = str_counter + 1 WHERE 
								str_id_of_word = '". $word_id ."' AND 
								str_lang1 = '" . $my_lang1 . "' AND 
								str_lang2 = '" . $my_lang2 . "' AND 
								first_stress = '" . $first_stress . "' AND 
								non_selected_1st_stress = '" . $non_selected_1st_stress . "' AND 
								wrong_1st_stress = '" . $wrong_1st_stress . "' AND 
								second_stress = '" . $second_stress . "' AND 
								non_selected_2nd_stress = '" . $non_selected_2nd_stress . "' AND 
								wrong_2nd_stress = '" . $wrong_2nd_stress . "' AND 
								whole_string1 = '". $whole_string ."' AND 
								correct_flag_1_1 = '". $correct_flag_1 ."' AND 
								correct_flag_2_2 = '". $correct_flag_2 ."'";
								
		// Run SQL Query to update existing result in Database
		$update_stress_result = $my_db_object->query($update_stress_row);
		
		// Error Handling if the Query failed:
				if(!$update_stress_result){
					echo("Error description: " . mysqli_error($my_db_object));
				}

	}


//Update the total counter for this question for all rows with that word ID:
					$update_stress_query = "UPDATE stress_result_table
												SET total_str_counter = total_str_counter + 1 
												WHERE str_id_of_word = '" . $word_id . "'";
												
						$update_str_total_result = $my_db_object->query($update_stress_query);
						
							if(!$update_str_total_result){
							echo("Error description: " . mysqli_error($my_db_object));
							}	
	
	 
// If the user gave a correct answer, store that info in a cookie that is available throughout the whole domain

// whole_string.indexOf("non_selected_unstress") == -1 && whole_string.indexOf("wrong_unstress") == -1

 if(/*$correct_flag_1 == 1 && $correct_flag_2 != 0 && */ $wrong_1st_stress == "not_set" && $wrong_2nd_stress == "not_set" && ($non_selected_1st_stress == "not_set" && $non_selected_2nd_stress == "not_set")){
	echo "Cookie is set!";
	$cookie_name = $category . ":" . $word_id;
	$cookie_value = "correct";
	setcookie($cookie_name, $cookie_value, time()+3600*24*365, "/"); // cookie expires in 1 year
 }

?>