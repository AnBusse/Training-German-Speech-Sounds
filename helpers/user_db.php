<?php
  
// User rights for logging into the Administrator Access and seeing User Results
  $db_server2 = 'localhost';
  $db_user2 = 'secure_user';
  $db_pwd2 = 'unUhU5ydTJAtSUDL';
  $db_name2 = 'learning_german';

  $my_db_user_object = new mysqli($db_server2, $db_user2, $db_pwd2, $db_name2);
  
  if ($my_db_user_object->connect_error) {
     die('Connection failed (' . $my_db_user_object->connect_errno . ') ' . $my_db_user_object->connect_error);
  }
  else{ /* echo "Connected successfully."; */}
  
?>