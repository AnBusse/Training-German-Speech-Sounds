<?php
session_start();
// language_save.php - This script processes the language info that the user entered when he enters the practice.php page.


//Include the Database connection:
require_once "../helpers/db.php";

// Store the User Language(s) from $_POST to $_SESSION variables for use later in the scripts
if(isset($_POST['language1'])){
$user_lang1 = $_POST['language1'];
$_SESSION["language_ses1"] = $user_lang1;
}
else{
	$_SESSION["language_ses1"] = "dummy1";
}

if(isset($_POST['language2'])){
$user_lang2 = $_POST['language2'];
$_SESSION["language_ses2"] = $user_lang2;
}
else{
	$_SESSION["language_ses2"] = "dummy2";
}

?>