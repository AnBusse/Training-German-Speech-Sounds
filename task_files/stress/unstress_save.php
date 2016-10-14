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


$correct_unstress = mysqli_real_escape_string($my_db_object, $_POST['correct_unstress']);
$correct_unstress = htmlentities($correct_unstress);
$non_selected_unstress = mysqli_real_escape_string($my_db_object, $_POST['non_selected_unstress']);
$non_selected_unstress = htmlentities($non_selected_unstress);
$wrong_unstress = mysqli_real_escape_string($my_db_object, $_POST['wrong_unstress']);
$wrong_unstress = htmlentities($wrong_unstress);

$correct_unstress_2 = mysqli_real_escape_string($my_db_object,$_POST['correct_unstress_2']);
$correct_unstress_2 = htmlentities($correct_unstress_2);
$non_selected_unstress_2 = mysqli_real_escape_string($my_db_object, $_POST['non_selected_unstress_2']);
$non_selected_unstress_2 = htmlentities($non_selected_unstress_2);
$wrong_unstress2 = mysqli_real_escape_string($my_db_object,$_POST['wrong_unstress2']);
$wrong_unstress2 = htmlentities($wrong_unstress2);


$whole_string = $_POST['whole_string'];
$correct_flag_1 = $_POST['correct_flag_1'];
$correct_flag_2 = $_POST['correct_flag_2'];


// Store language data from Session into variables:
if(isset($_SESSION['language_ses1'])){
	$lang1 = mysqli_real_escape_string($my_db_object, $_SESSION['language_ses1']);
}

if(isset($_SESSION['language_ses2'])){
	$lang2 = mysqli_real_escape_string($my_db_object, $_SESSION['language_ses2']);
}


	// Check if the result set already exists at least once with the same data:
	
	$check_unstr_exist_query = "SELECT * FROM unstress_result_table WHERE 
								unstr_id_of_word = '". $word_id ."' AND 
								unstr_lang1 = '" . $my_lang1 . "' AND 
								unstr_lang2 = '" . $my_lang2 . "' AND 
								whole_string = '" . $whole_string . "' AND
								correct_flag_1 = '" . $correct_flag_1 . "' AND 
								correct_flag_2 = '" . $correct_flag_2 . "'";
								
	/*
	// Check if the result set already exists at least once with the same data:
	$check_unstr_exist_query = "SELECT * FROM unstress_result_table WHERE 
								unstr_id_of_word = '". $word_id ."' AND 
								unstr_lang1 = '" . $my_lang1 . "' AND 
								unstr_lang2 = '" . $my_lang2 . "' AND 
								correct_unstress = '" . $correct_unstress . "' AND 
								non_selected_unstress = '" . $non_selected_unstress . "' AND 
								wrong_unstress = '" . $wrong_unstress . "' AND 
								correct_unstress_2 = '" . $correct_unstress_2 . "' AND 
								non_selected_unstress_2 = '" . $non_selected_unstress_2 . "' AND 
								wrong_unstress2 = '" . $wrong_unstress2 . "' AND 
								whole_string = '" . $whole_string . "' AND
								correct_flag_1 = '" . $correct_flag_1 . "' AND 
								correct_flag_2 = '" . $correct_flag_2 . "'";
	*/
	
	
	// Run the Query
	$check_unstr_exist_result = $my_db_object->query($check_unstr_exist_query);

	//Count rows of the result set:
	$exist_unstr_row_count = $check_unstr_exist_result->num_rows;
	
	// if there is no exact same entry of this result:
	if($exist_unstr_row_count < 1){
		
		
					//check if there are fuzzy matches
					//if there are fuzzy matches, get the total value of them
					//store total_val in variable, use in insert below
					
					//Get the current total count for all rows with the selected answer ID and word ID:
					$get_unstress_total = "SELECT unstr_result_id, total_unstr_counter FROM unstress_result_table 
											WHERE unstr_id_of_word = '" . $word_id . "'";
											
				// SQL Query to get total result
				$get_unstress_total_result = $my_db_object->query($get_unstress_total);

				//Count rows of the result set:
				$unstress_total_row_count = $get_unstress_total_result->num_rows;
				
					//If there is at least one row with for the same task:
					if($unstress_total_row_count > 0){
						
						
						//Store total count in variable by fetching the result to an array:
						while ($row = mysqli_fetch_assoc($get_unstress_total_result)) {
							$my_unstress_total = $row['total_unstr_counter'];
						}
					}
				
				
		
				// Query and store the task items in an array and then in variables:

			// Insert Stress Result Query:
			
			$unstress_insert_query = "INSERT INTO unstress_result_table SET unstr_id_of_word = '" . $word_id . "', 
																	whole_string = '" . $whole_string . "', 
																	correct_flag_1 = '" . $correct_flag_1 . "',
																	correct_flag_2 = '" . $correct_flag_2 . "',
																	unstr_counter = '" . '1' . "'";
			
			/*
			// Insert Stress Result Query:
			$unstress_insert_query = "INSERT INTO unstress_result_table SET unstr_id_of_word = '" . $word_id . "',
																	correct_unstress = '" . $correct_unstress . "',
																	non_selected_unstress = '" . $non_selected_unstress . "',
																	wrong_unstress = '" . $wrong_unstress . "',
																	correct_unstress_2 = '" . $correct_unstress_2 . "',
																	non_selected_unstress_2 = '" . $non_selected_unstress_2 . "',
																	wrong_unstress2 = '" . $wrong_unstress2 ."', 
																	whole_string = '" . $whole_string . "',
																	correct_flag_1 = '" . $correct_flag_1 . "',
																	correct_flag_2 = '" . $correct_flag_2 . "',
																	unstr_counter = '" . '1' . "'";
			*/
			
																	
			// If the user did not specify one or both languages, then insert nothing into those fields
			 if($lang1 && $lang1 != "dummy1"){
				 $unstress_insert_query .= ", unstr_lang1 = '" . $lang1 . "'";
			 }
			 if($lang2 && $lang2 != "dummy2"){
				 $unstress_insert_query .= ", unstr_lang2 = '" . $lang2 . "'";
			 }
			 
			if ($unstress_total_row_count > 0) {
				$unstress_insert_query .= ", total_unstr_counter = '". $my_unstress_total ."'";
				}
			else {
				$unstress_insert_query .= ", total_unstr_counter = '0'";
			}
			 
			
			// Run the Insert Query
			 $unstress_insert_result = $my_db_object->query($unstress_insert_query);
			
			// Error Handling if the Query failed:
				if(!$unstress_insert_result){
					echo("Error description: " . mysqli_error($my_db_object));
				}
		
		

		
		
	}
	else{
		
		$update_unstress_row = "UPDATE unstress_result_table
								SET unstr_counter = unstr_counter + 1 WHERE 
								unstr_id_of_word = '". $word_id ."' AND 
								unstr_lang1 = '" . $my_lang1 . "' AND 
								unstr_lang2 = '" . $my_lang2 . "'";
		
		/*
		$update_unstress_row = "UPDATE unstress_result_table
								SET unstr_counter = unstr_counter + 1 WHERE 
								unstr_id_of_word = '". $word_id ."' AND 
								unstr_lang1 = '" . $my_lang1 . "' AND 
								unstr_lang2 = '" . $my_lang2 . "' AND 
								correct_unstress = '" . $correct_unstress . "' AND 
								non_selected_unstress = '" . $non_selected_unstress . "' AND 
								wrong_unstress = '" . $wrong_unstress . "' AND 
								correct_unstress_2 = '" . $correct_unstress_2 . "' AND 
								non_selected_unstress_2 = '" . $non_selected_unstress_2 . "' AND 
								wrong_unstress2 = '" . $wrong_unstress2 . "'";
		*/
								
		// Run SQL Query to update existing result in Database
		$update_unstress_result = $my_db_object->query($update_unstress_row);
		
		// Error Handling if the Query failed:
				if(!$update_unstress_result){
					echo("Error description: " . mysqli_error($my_db_object));
				}

	}


//Update the total counter for this question for all rows with that word ID:
					$update_unstress_query = "UPDATE unstress_result_table
												SET total_unstr_counter = total_unstr_counter + 1 
												WHERE unstr_id_of_word = '" . $word_id . "'";
												
						$update_unstr_total_result = $my_db_object->query($update_unstress_query);
						
							if(!$update_unstr_total_result){
							echo("Error description: " . mysqli_error($my_db_object));
							}	
	
	 
// If the user gave a correct answer, store that info in a cookie that is available throughout the whole domain

 if(/*$correct_flag_1 == 1 && $correct_flag_2 != 0 && */ $wrong_unstress == "not_set" && $wrong_unstress2 == "not_set" && $non_selected_unstress == "not_set" && $non_selected_unstress_2 == "not_set"){
	echo "Cookie is set!";
	$cookie_name = $category . ":" . $word_id;
	$cookie_value = "correct";
	setcookie($cookie_name, $cookie_value, time()+3600*24*365, "/"); // cookie expires in 1 year
 }

?>