<?php
  $db_server = 'localhost';
  $db_user = 'the_mooc_master';
  $db_pwd = 'superhappyfuntimemoocland!';
  $db_name = 'mooc_database';

  $the_connector = new mysqli($db_server, $db_user, $db_pwd, $db_name); //calling the connection 
  
  if ($the_connector->connect_error) {
     die('Connection failed (' . $the_connector->connect_errno . ') ' .  $the_connector->connect_error);
  }
  else {
      // echo "Connection to Database successfully established.";
  }
?>

