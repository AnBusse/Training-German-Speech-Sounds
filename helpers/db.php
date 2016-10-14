<?php
//Administrator Rights for saving data to the Database 
  $db_server = 'localhost';
  $db_user = 'german_student';
  $db_pwd = 'iamlearning';
  $db_name = 'learning_german';

  $my_db_object = new mysqli($db_server, $db_user, $db_pwd, $db_name);
  
  if ($my_db_object->connect_error) {
     die('Connection failed (' . $my_db_object->connect_errno . ') ' . $my_db_object->connect_error);
  }
  else{ /* echo "Connected successfully.";*/ }
  
?>