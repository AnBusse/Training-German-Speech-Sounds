<?php
// This file inserts the provider_form.php information into the database

  // Initialization of error flag and array for error messages:
  $errors = false;
  $error_msgs = array();
  
  // Initialization of notice flag and array for notifications:
  $notice = false;
  $notice_msgs = array();  


  // Include support functions:
  include_once '../helpers/library.php';
  include_once '../helpers/connect_db.php'; 
    
	 
	 
	 
	// If there were errors, display form with error messages in the appropriate slots
    if (empty($_POST['my_new_country']) && empty($_POST['my_new_city'])) {
        $errors = true;
        $error_msgs['database'] = 'Please provide a country or a city.';
    }
    
    if ($errors) {
        include 'provider_form.php';
        exit;
    }
    
  
  // escape variables for security
 $my_country_name = mysqli_real_escape_string($the_connector, $_POST['my_new_country']);
 $my_city_name = mysqli_real_escape_string($the_connector, $_POST['my_new_city']);
 
  // check if the country already exists in the db
 $my_country_check_query = "SELECT country_name FROM country_table WHERE country_name = '" . $my_country_name . "'"; //don't forget to concatenate
 $my_country_check_result = $the_connector->query($my_country_check_query);


  // determine the amount rows in the result set:
  $country_num_rows = $my_country_check_result->num_rows;
  
        // If the Country already exists in the DB:
        if ($country_num_rows > 0) {
            $notice = true;
            $notice_msgs['my_new_country'] = "Country already exists. No action required."; ?> <br> <?php
            
         }
         // If it does not:
        if ($my_country_name !== "" && $country_num_rows === 0) {
         $my_country_insert_query = "INSERT INTO country_table SET country_name = '" . $my_country_name . "'";
         $my_country_insert_result = $the_connector->query($my_country_insert_query);
        
           if (!$my_country_insert_result) {
           $errors = true;
           $error_msgs['my_new_country'] = 'Invalid Country query: ' . $the_connector->error; ?> <br> <?php
           require "provider_form.php";
           exit;
           ?> <br> <?php 
           }
           else {
           $notice = true;
           $notice_msgs['my_new_country'] = "Country Entry successfully added!"; ?> <br> <?php
           }
         }
  
    // check if the city already exists in the db
    $my_city_check_query = "SELECT * FROM city_table WHERE city_name = '" . $my_city_name . "'";
    $my_city_check_result = $the_connector->query($my_city_check_query);
       
        // determine the amount rows in the result set:
        $city_num_rows = $my_city_check_result->num_rows;
  
        // If the Country already exists in the DB:
        if ($city_num_rows > 0) {
            $notice = true;
            $notice_msgs['my_new_city'] = 'City already exists. No action required.';
            unset($_POST); // Necessary to empty the form after successful insertion ?> <br> <?php
         }
         // If it does not:
         if ($my_city_name !== "" && $city_num_rows === 0) {
         $my_city_insert_query = "INSERT INTO city_table SET city_name = '" . $my_city_name . "'";
         $my_city_insert_result = $the_connector->query($my_city_insert_query);
         
         
           if (!$my_city_insert_result) {
           $errors = true;
           echo "Invalid city query"; ?> <br> <?php
           $error_msgs['my_new_city'] = 'Invalid City query: ' . $the_connector->error; ?> 
           <br> 
           <?php
           require "provider_form.php";
           exit;
           }
           else {
            $notice = true;
            $notice_msgs['my_new_city'] = "City Entry successfully added!"; ?> <br> <?php
            require "provider_form.php";
           }
        }

    else { include "provider_form.php"; }
?>