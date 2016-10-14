<?php
// Result save Script For: Identify Correct Transcription
session_start();

// Include DB connection:
require_once "../../helpers/db.php";


// Save all POST and SESSION data in php variables:

if(isset($_POST['answer_id'])){
	$answer_id = $_POST['answer_id'];
}

if(isset($_SESSION['language_ses1'])){
	$lang1 = $_SESSION['language_ses1'];
}

if(isset($_SESSION['language_ses2'])){
	$lang2 = $_SESSION['language_ses2'];
}

if(isset($_SESSION['cat_id'])){
	$category = $_SESSION['cat_id'];
}
elseif(isset($_POST['category_id'])){ // Fallback for the case in which cookies are not enabled: storing the category from the POST variable
	$category = $_POST['category_id'];
}

if(isset($_POST['my_word_id'])){
	$my_word_id = $_POST['my_word_id'];
}


//Check if the Answer is correct by querying for the answer ID and whether the "correct"-field in the Database row equals 0 (incorrect) or 1 (correct):
$check_result_query = "SELECT * FROM identify_answer_table WHERE answer_id1 = '$answer_id' and correct_i = '1'";
$check_result = $my_db_object->query($check_result_query);

//Count rows of the result set:
$row_count = $check_result->num_rows;

if($row_count == "1"){
	echo "This is Correct!";
	
	// If the user gave a correct answer, store that info in a cookie that is available throughout the whole domain and is valid for one week
	$cookie_name = $category . ":" . $answer_id;
	$cookie_value = "correct";
	setcookie($cookie_name, $cookie_value, time()+3600*24*365,"/"); // cookie expires in 1 year
	
}
else{
	echo "Incorrect! Please try again. ";
}

	// Check if the result set already exists at least once with the same data:
	$check_exist_query = "SELECT * FROM identify_result_table WHERE id_of_language1_1 = '" . $lang1 . "' AND id_of_language1_2 = '" . $lang2 . "' AND id_of_answer1 = '" . $answer_id . "' AND my_word_id = '" . $my_word_id . "'";
	
	$check_exist_result = $my_db_object->query($check_exist_query);

	//Count rows of the result set:
	$exist_row_count = $check_exist_result->num_rows;
	
	
	// If the entry does not exist yet, create it:
	if($exist_row_count < 1){
		
		//check if there are fuzzy matches
		//if there are fuzzy matches, get the total value of them
		//store total_val in variable, use in insert below
		
		//Get the current total count for all rows with the selected answer ID and word ID:
		$get_mpc_total = "SELECT result_id1, total FROM identify_result_table 
								WHERE 
								id_of_answer1 = '" . $answer_id . "' AND 
								my_word_id = '" . $my_word_id . "'";
								
	// SQL Query to get total result
	$get_mpc_total_result = $my_db_object->query($get_mpc_total);

	//Count rows of the result set:
	$exist_total_row_count = $get_mpc_total_result->num_rows;	
	
	//If there is at least one row with for the same task:
	if($exist_total_row_count > 0){
		//Store total count in variable by fetching the result to an array:
		while ($row = mysqli_fetch_assoc($get_mpc_total_result)) {
			$my_total = $row['total'];
		}
	}	
		
		
    // Insertion Query
     $identify_result_query = "INSERT INTO identify_result_table SET id_of_language1_1 = '" . $lang1 . "', 
                                                        id_of_language1_2 = '" . $lang2 . "', 
				 		                                id_of_answer1 = '" . $answer_id . "', 
														my_word_id = '" . $my_word_id . "', 
														mult_choice_counter = 1";
	
    // specify whether the answer is correct and insert that information: 
    	if ($row_count == "1") {
    	    $identify_result_query .= ", correct = '1'";
    	    }
    	else {
    	    $identify_result_query .= ", correct = '0'";
    	}
		
		if ($exist_total_row_count > 0) {
    	    $identify_result_query .= ", total = '". $my_total ."'";
    	    }
    	else {
    	    $identify_result_query .= ", total = '0'";
    	}
		

		// SQL Query to store Result to Database
		$store_result = $my_db_object->query($identify_result_query);

		// Error Handling if the Query failed:
		if(!$store_result){
			echo ("Error description: " . mysqli_error($my_db_object));
		}
		
}
else{
	
	//Update the mult_choice_counter field for that task with the same language combination:
	$update_total_mult_choice = "UPDATE identify_result_table
								SET mult_choice_counter = mult_choice_counter + 1 
								WHERE 
								id_of_answer1 = '" . $answer_id . "' AND 
								my_word_id = '" . $my_word_id . "' AND 
								id_of_language1_1 = '" . $lang1 . "' AND  
                                id_of_language1_2 = '" . $lang2 . "'";
								
								
	// SQL Query to update existing result in Database
	$update_total_result = $my_db_object->query($update_total_mult_choice);

}


			//Update the total counter for this question for all rows with that answer ID:
			$update_total_mult_choice_2 = "UPDATE identify_result_table
								SET total = total + 1 
								WHERE 
								id_of_answer1 = '" . $answer_id . "' AND 
								my_word_id = '" . $my_word_id . "'";
								
								
			// SQL Query to update existing result in Database
			$update_total_result_2 = $my_db_object->query($update_total_mult_choice_2);
			
			
		// Get the current total count for all answers given with the selected word ID:
		$get_mpc_word_total = "SELECT result_id1, word_total FROM identify_result_table 
								WHERE my_word_id = '" . $my_word_id . "'";
								
	// SQL Query to get total result
	$get_mpc_word_total_result = $my_db_object->query($get_mpc_word_total);

	//Count rows of the result set:
	$exist_total_row_count = $get_mpc_word_total_result->num_rows;	
	
	
	if($exist_total_row_count > 0){ // If there is at least one row in the result set / there is at least one answer in the Database
			//Store total count in variable by fetching the result to an array:
			while ($row = mysqli_fetch_assoc($get_mpc_word_total_result)){
				// $total_array[] = $row;
				$my_word_total = $row['word_total'];
			}
	}else{ // If there is no result for that word / task yet, set the total counter variable to 0 to use it later in updating the total counter
		$my_word_total = 0;
	}
	
	if($update_total_result_2){
	//Update the total counter for this question / this word:
			$update_word_total_mpc = "UPDATE identify_result_table SET word_total = word_total+1 WHERE my_word_id = '" . $my_word_id . "'";
							
					// SQL Query to update existing result in Database
					$update_word_total_result = $my_db_object->query($update_word_total_mpc);
					
					if(!$update_word_total_result){echo "Error description: " . mysqli_error($my_db_object);}
				}

			
	$highest_query = "SELECT MAX(word_total) FROM identify_result_table WHERE my_word_id = '" . $my_word_id . "'";
	$highest_result = $my_db_object->query($highest_query);
	while ($row = mysqli_fetch_assoc($highest_result)){
				$my_highest = $row['MAX(word_total)'];
			}

	
// SQL Query to update last result counter in Database, which equals to the last added entry
		$update_last_word_total_mpc = "UPDATE identify_result_table SET word_total = '". $my_highest ."' WHERE my_word_id = '" . $my_word_id . "' ORDER BY result_id1 DESC LIMIT 1";	
			$update_last_word_total_result = $my_db_object->query($update_last_word_total_mpc);	

?>