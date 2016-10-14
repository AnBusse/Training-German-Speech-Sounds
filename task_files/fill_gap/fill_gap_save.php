<?php
// fill_gap_save.php
// Processes the AJAX request to save the user result in database, session and cookies
session_start();

// Include DB connection:
require_once "../../helpers/db.php";

// Save all POST and SESSION data in php variables:
if(isset($_POST['word_id'])){
	$word_id = $_POST['word_id'];
	
	// Query for the extra information to be displayed with the correctness message:
	$english_version_query = "SELECT english_version FROM word_table WHERE word_id = '" . $word_id. "' LIMIT 1";
	$english_version_result = $my_db_object->query($english_version_query);
	
	//Store the english version of the task word in a variable by fetching the result to an array:
		while ($en_row = mysqli_fetch_assoc($english_version_result)) {
			$en_version = $en_row['english_version'];
		}
}

if(isset($_POST['user_input'])){
	$user_input = $_POST['user_input'];
	$user_input = mysqli_real_escape_string($my_db_object,$user_input);
	$user_input = htmlentities($user_input);
}

if(isset($_POST['is_correct'])){
	$is_correct = $_POST['is_correct'];
}

if(isset($_SESSION['language_ses1'])){
	$lang1 = $_SESSION['language_ses1'];
}else{
	$lang1 = "0";
}

if(isset($_SESSION['language_ses2'])){
	$lang2 = $_SESSION['language_ses2'];
}else{
	$lang2 = "0";
}

if(isset($_SESSION['cat_id'])){
	$category = $_SESSION['cat_id'];
}else{
	$category = $_POST['category_id'];
}


// Check if the result set already exists at least once with the same data:
	$check_fillgap_exist_query = "SELECT * FROM fill_gap_result_table WHERE 
									lang1 = '" . $lang1 . "' AND 
									lang2 = '" . $lang2 . "' AND 
									id_of_word2 = '" . $word_id . "' AND 
									user_input = '" . $user_input . "' AND 
									is_correct = '" . $is_correct . "'";
	
	$check_fillgap_exist_result = $my_db_object->query($check_fillgap_exist_query);

	//Count rows of the result set:
	$exist_fillgap_row_count = $check_fillgap_exist_result->num_rows;

// If there already is a row with that exact data set:
if($exist_fillgap_row_count < 1){
	
		//check if there are fuzzy matches
		//if there are fuzzy matches, get the total value of them
		//store total_val in variable, use in insert below
		
		//Get the current total count for all rows with the selected answer ID and word ID:
		$get_gap_total = "SELECT fill_gap_result_id, gap_total FROM fill_gap_result_table 
								WHERE id_of_word2 = '" . $word_id . "'";
								
	// SQL Query to get total result
	$get_gap_total_result = $my_db_object->query($get_gap_total);

	//Count rows of the result set:
	$gap_total_row_count = $get_gap_total_result->num_rows;
	
	//If there is at least one row with for the same task:
	if($gap_total_row_count > 0){
		
		
		//Store total count in variable by fetching the result to an array:
		while ($row = mysqli_fetch_assoc($get_gap_total_result)) {
			$my_gap_total = $row['gap_total'];
		}
	}
	
	
	    // Insertion Query
     $fillgap_result_query = "INSERT INTO fill_gap_result_table SET lang1 = '" . $lang1 . "', 
                                                        lang2 = '" . $lang2 . "', 
				 		                                id_of_word2 = '" . $word_id . "', 
														user_input = '" . $user_input . "', 
														is_correct = '" . $is_correct . "',
														fill_gap_counter = 1";
	
		
		if ($gap_total_row_count > 0) {
    	    $fillgap_result_query .= ", gap_total = '". $my_gap_total ."'";
    	    }
    	else {
    	    $fillgap_result_query .= ", gap_total = '0'";
    	}
	

	$store_result = $my_db_object->query($fillgap_result_query);
	
	// Error Handling if the Query failed:
	if(!$store_result){
		echo("Error description: " . mysqli_error($my_db_object));
	}
	

}
else{

		$fillgap_update_query = "UPDATE fill_gap_result_table
							SET fill_gap_counter = fill_gap_counter + 1 WHERE 
									lang1 = '" . $lang1 . "' AND 
									lang2 = '" . $lang2 . "' AND 
									id_of_word2 = '" . $word_id . "' AND 
									user_input = '" . $user_input . "' AND 
									is_correct = '" . $is_correct . "'";
									
	$update_result = $my_db_object->query($fillgap_update_query);
	
	// Error Handling if the Query failed:
	if(!$update_result){
		echo("Error description: " . mysqli_error($my_db_object));
	}
}

	//Update the total counter for this question for all rows with that word ID:
	$update_fillgap_query = "UPDATE fill_gap_result_table
								SET gap_total = gap_total + 1 
								WHERE id_of_word2 = '" . $word_id . "'";
								
		$update_total_result = $my_db_object->query($update_fillgap_query);
		
			if(!$update_total_result){
			echo("Error description: " . mysqli_error($my_db_object));
			}


// If the user gave a correct answer, store that in a cookie:
if(isset($is_correct) && $is_correct == "1"){
	echo "Correct!" . "<br>This is German for \"$en_version\"";
	$_SESSION[$category . ":" . $word_id] = $category . ":" . $word_id;
	// If the user gave a correct answer, store that info in a cookie that is available throughout the whole domain and is valid for one week
	$cookie_name = $category . ":" . $word_id;
	$cookie_value = "correct";
	setcookie($cookie_name, $cookie_value, time()+3600*24*365, "/"); // cookie expires in 1 year
}
else{
	echo "Wrong! Please try again. ";
}


?>

