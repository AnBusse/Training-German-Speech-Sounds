<?php
session_start();

require_once "helpers/db.php";
/*
statistic_cookie_unset.php
This script unsets the cookies for the category the user chose to reset his score for, from the statistics section of the practice.php page
*/

$selected_cat_id = $_POST['my_cat_id'];

// echo $selected_cat_id;

if($selected_cat_id != "my_reset_all"){ // If the user did not press the Reset All Button
	
	
	
	
	// Change the cookie value of relevant cookies so it expires:
	foreach ($_COOKIE as $key => $value) {
		
		// If the value is not the session ID cookie, the sound of the day cookie or the cookie consent cookie and the key begins with the selected category ID:
		if ($value != "PHPSESSID" && $value !="my_item" && $value !="user_cookie_consent" && strpos($key, $selected_cat_id . ":") !== FALSE){
			
			// Since PHP cookies can not be deleted, they have to be changed to have an expiry date in the past: 
			// http://www.pontikis.net/blog/create-cookies-php-javascript Last Accessed: 26.04.2016
			$cookie_name = $key;
			$cookie_value = $value;
			setcookie($cookie_name, $cookie_value, time() - 3600, "/");
		}
}
	
}
elseif($selected_cat_id == "my_reset_all"){ // If the user clicked the Reset All Button
	foreach ($_COOKIE as $key => $value) {
	// If the value is not the session ID cookie, the sound of the day cookie or the cookie consent cookie:
		if ($value != "PHPSESSID" && $value !="my_item" && $value !="user_cookie_consent" && $value == "correct"){
			
			// Since PHP cookies can not be deleted, they have to be changed to have an expiry date in the past: 
			$cookie_name = $key;
			$cookie_value = $value;
			setcookie($cookie_name, $cookie_value, time() - 3600, "/");
		}
	}
}
?>