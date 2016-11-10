<?php
// This is the script for adding a Course Category to the Database, it is being run when the subject-form
// on course_form.php was submitted.

  // Initialization of error flag and array for error messages:
  $errors = false;
  $error_msgs = array();
  
  // Initialization of notice flag and array for notifications:
  $notice = false;
  $notice_msgs = array();

include_once "../helpers/connect_db.php";
include_once "../helpers/library.php";


if(isset($_POST['my_category_submit'])){
    // check if the field was filled in:
      		if (empty($_POST['my_category'])){
			$errors = true;
			$error_msgs['my_category'] = 'Please provide a Subject';
			include 'course_form.php';
			die;
		}
    
    /* If Magic Quotes are enabled, strip any backward slashes 
        from the form value to prevent double escaping: */

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
 
    // check if the category is already in the database
    $my_check_subject_query = "SELECT subject FROM subject_table WHERE subject = '" . $_POST['my_category'] . "'";
    $my_check_subject_result = $the_connector->query($my_check_subject_query);

     if ($my_check_subject_result->num_rows > 0) { //stuff in the db
     
     for ($i = 0; $i < $my_check_subject_result->num_rows; $i++) { //$i controls number of iterations. 
         $subj_repeat = $my_check_subject_result->fetch_assoc(); //fetch associative array (one row at a time). 
         }
         
		if ($subj_repeat['subject'] == $_POST['my_category']){
			$errors = true;
?>
			<script>
			alert("<?php echo $_POST['my_category']; ?> is already in the database.");
			</script>
<?php
			include 'course_form.php';
			die;
		}

	 }
	 
	      /* If Magic Quotes are enabled, strip any backward slashes 
        from the form value to prevent double escaping: */

    if (get_magic_quotes_gpc()) { // Magic Quotes are enabled.  
        foreach ($_POST as $key => $value) {
           $_POST[$key] = stripslashes($value);
        }
     }
    
     /* Remove whitespace and HTML tags and make form values safe 
        for insertion into the database: */
   foreach ($_POST as $key => $value) {
        $_POST[$key] = strip_tags(trim($value));
        $_POST[$key] = $the_connector->real_escape_string($_POST[$key]);
     }

	        $insert_subject_query = "INSERT INTO subject_table SET subject = '" . $_POST['my_category'] . "'";
            $my_insert_subject_result = $the_connector->query($insert_subject_query);
            
            if (!$my_insert_subject_result) {
                  $errors = true;
                  $error_msgs['database'] = 'Invalid query: ' . $my_db_object->error;
                  }
             
            if ($the_connector->affected_rows === 1) {
                 $notice = true;
                 $notice_msgs['database'] = "Subject successfully added!"; ?> <br> <?php
                 ?> <br> <?php
                include_once "course_form.php";
            }

 
  }

else{
    echo "Invalid Access.";
    ?> <br> <?php
    }

?>