<?php
// this script validates the entered user-data from admin_access.php

// establish DB access
require_once "connect_db.php";

// when the user clicked the submit button on admin_access.php
if (isset($_POST['my_pw_submit'])) {
    
    $username = $_POST["my_user"]; 
    $password = $_POST['my_pw']; 
    
    // first, check if both password and username field were filled in:
    if(empty($_POST['my_user'])  || empty($_POST['my_pw'])){
        ?>
        <script>
            alert('Please specify a password AND a username!');
        </script>
        <?php
   include_once "../admin_access_files/admin_access.php";
    die;
    }
   
    // Check if a DB entry with the username and password exists:
     $check_access_query = "SELECT my_username, my_password FROM pw_table WHERE
     my_password = '" . $_POST['my_pw'] . "' AND my_username = '" . $_POST['my_user'] . "'";
	 						 
     $check_access_result = $the_connector->query($check_access_query);
     
     // if there is an entry in the password-table that matches the user input, include the backend page
     if ($check_access_result->num_rows > 0) {
         
        // setting cookies to save the login for one day
        $cookie_name_user = "my_username";
        $cookie_value_user = $_POST['my_user'];
        setcookie($cookie_name_user, $cookie_value_user, (time() + 86400), "/"); // 86400 = 1 day
        
        $cookie_name_pw = "my_pw";
        $cookie_value_pw = $_POST['my_pw'];
        setcookie($cookie_name_pw, $cookie_value_pw, (time() + 86400), "/"); // 86400 = 1 day         
         
        include_once '../admin_access_files/admin_interface.php';
     	exit;
     }
     else{
    ?>
        <script>
            alert('Incorrect Username and/or Password!');
        </script>
        <?php
   include_once "../admin_access_files/admin_access.php";
    die;
     }
    
}
else{
    echo "Invalid Access. Please use the main page.";
}
?>
