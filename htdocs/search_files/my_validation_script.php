<?php
/*
my_validation_script.php
Validates whether the user input in the title search field is in the database and warns the user if that is not the case
*/

// Connect to database
include_once "../helpers/connect_db.php";

	// If the user tried to access this script manually, complain.
	if(empty($_POST)){
		echo "Invalid Access.";
		exit;
	}
	else {
		
		
		
	// ==================================
	// Make POST data safe for handling:
	// ==================================
	
	if (get_magic_quotes_gpc()) { // Magic Quotes are enabled.  
        foreach ($_POST as $key => $value) {
           $_POST[$key] = stripslashes($value);
        }
     }
    
     /* Remove whitespace and HTML tags and make form values safe 
        for being handled by the script and the database: */
   foreach ($_POST as $key => $value) {
        $_POST[$key] = strip_tags(trim($value));
        $_POST[$key] = $the_connector->real_escape_string($_POST[$key]);
     }
	    // Storing the user input from the title search field in a variable
	    $title = $_POST['mooc_name'];
	    
	//Check if the datalist input that the user entered is actually in the database:
	$my_title_check_query = "SELECT course_id FROM course_table WHERE course_title ='". $title . "'";
	$my_title_check_result = $the_connector->query($my_title_check_query);
	$my_rows = $my_title_check_result->num_rows;
	
	// If the result set is empty, return an error message through AJAX
	if($my_rows < 1){
		?>
		<div class='search_error_box'>
		<?php
		echo "Please select an item from the list.";
		?>
		</div>
		<?php
	}
	
	
}

?>