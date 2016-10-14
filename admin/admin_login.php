<?php
// this script validates the entered user-data from admin_access.php

// establish DB access
require_once "../helpers/user_db.php";

// when the user clicked the login button on index.php
if (isset($_POST['username']) && isset($_POST['pw'])) {
    
	// Store the entered and escaped data in PHP variables
    $username = mysqli_real_escape_string($my_db_user_object,$_POST["username"]); 
    $password = mysqli_real_escape_string($my_db_user_object,$_POST['pw']); 
    
    // Check if a DB entry with the username and password exists:
     $check_access_query = "SELECT username, password FROM login_table WHERE
     password = '" . $password . "' AND username = '" . $username . "'";
	 						 
     $check_access_result = $my_db_user_object->query($check_access_query);
     
     // if there is an entry in the password-table that matches the user input, include the backend page
     if ($check_access_result->num_rows == 1) {
	   echo "Login Sucessful.";
     	exit;
     }
     else{
		echo "Incorrect Login Data. Please try again.";
		die;
     }
}
else{
    echo "Invalid Access. Please use the main page.";
}
?>
