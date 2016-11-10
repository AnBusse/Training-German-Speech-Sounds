<?php
// This file inserts the course_form.php information into the database

// Initialization of error flag and array for error messages:
  $errors = false;
  $error_msgs = array();
  
  // Initialization of notice flag and array for notifications:
  $notice = false;
  $notice_msgs = array();
     
  // Connect to the database + include support functions:
  require_once '../helpers/connect_db.php';
  require_once '../helpers/library.php';

  // Array of required fields:
  $required = array('my_providers' => "the name of the MOOC provider for the course.",
                    'my_course_title' => "the title of the course.",
                    'my_subject' => "the subject of the course.",
                    'my_course_link' => "the link to the course.",
                    'my_course_overview' => "the overview of the course content.",
					'my_assessment' => "the assessment.",
					'my_academic' => "the academic level of the MOOC course.",
					'my_credits' => "whether the course is granting credit points on completion.",
					'my_mooc_type' => "the type of the MOOC.",
					'payment' => "a payment option for the MOOC."
					);
					
  // If the form at "provider_form.php" has been submitted:
  if (isset($_POST['course_submit'])) {
      

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
      
      
		// check if the modules field contains a numeric value
		    if (isset($_POST['my_modules']) && (is_numeric($_POST['my_modules']) == false)) {
		    $errors = true;
            $error_msgs['my_modules'] = 'Please provide a numeric value for the module-field.';
		    }
		    
     /* Completeness check for required fields.
        On the first missing value, display the form and exit: */
    foreach ($required as $key => $value) {
        if (($_POST[$key]) == "") {
           $errors = true;
           $error_msgs[$key] = 'Please provide a value for ' . $required[$key];
        }
     }
     
	 // If there were errors, display form with error messages in the appropriate slots
     if ($errors) {
        include 'course_form.php';
        exit;
     }
     
     
     
       // Check if a course with the same name from the same provider already exists:
     $check_course_query = "SELECT course_title, id_of_provider FROM course_table WHERE
	 course_title = '" . $_POST['my_course_title'] . "'";
	 						 
     $check_course_result = $the_connector->query($check_course_query);
     if ($check_course_result->num_rows > 0) {
        $check_course_result->free();
        $errors = true;
        $error_msgs['database'] = 'Entry exists!';
        include 'course_form.php';
     	exit;
     }
  
 
     /* Create the query for inserting the new record, filling in 
        the information from the form: */
    
    // Storing the form infos in variables, for better readability of code    
        $my_selected_provider = $_POST['my_providers'];
        $my_course_title = $_POST['my_course_title'];
        $my_subject = $_POST['my_subject'];
        $my_link = $_POST['my_course_link'];
        $my_overview = $_POST['my_course_overview'];
        $my_modules = $_POST['my_modules'];
        $my_academic = $_POST['my_academic'];
        $my_assess_type = $_POST['my_assessment'];
        $my_credits = $_POST['my_credits'];
        $my_mooc_type = $_POST['my_mooc_type'];
        $my_workload = $_POST['my_workload'];
        $my_pay = $_POST['payment'];
        
    	
    // Insertion Query
     $insert_course_query = "INSERT INTO course_table SET id_of_provider = '" . $my_selected_provider . "', 
                                                        course_title = '" . $my_course_title . "', 
				 		                                id_of_subject = '" . $my_subject . "', 
						                                link = '" . $my_link . "',
						                                course_overview = '" . $my_overview . "',
						                                number_of_modules = '" . $my_modules . "',
						                                academic_level = '" . $my_academic . "',
						                                assessment_type = '" . $my_assess_type . "',
						                                credits = '" . $my_credits . "',
						                                automation = '" . $my_mooc_type . "'"
						                                ;
	
    // if the user specified a workload, insert that information: 
    	if (isset($_POST['my_workload']) && is_numeric($_POST['my_workload'])) {
    	    $insert_course_query .= ", hours_of_work = '" . $my_workload . "'";
    	    }
    	// if not, enter "NA" in the DB
    	else {
    	    $insert_course_query .= ", hours_of_work = 'NA'";
    	}
    
    //Get the mobile device compatibility from the selected provider so the information can be added to the respective course_table field
        $course_comp_query = "SELECT compatibility FROM provider_table WHERE provider_id =". $my_selected_provider;
        $comp_result = $the_connector->query($course_comp_query);
        $my_comp_num = $comp_result->num_rows;

        for ($i = 0; $i < $my_comp_num; $i++) { 
                             $comp_val = $comp_result->fetch_assoc(); 
        }
    
        // if the user selected a provider with mobile compatibility, insert that information by setting the comp_id to 1: 
    	if ($comp_val['compatibility'] == "Yes") {
    	    $insert_course_query .= ", comp_id = '1'";
    	    }
    	
    	switch ($my_pay) {
    	    
    	    case "The MOOC is free of Charge":
    	        $insert_course_query .= ", id_of_payment = '1'";
    	        break;
    	    
    	    case "You have to pay upfront.":
    	        $insert_course_query .= ", id_of_payment = '2'";
    	        break;
    	        
    	    
    	    case "You have to pay upon completion.":
    	        $insert_course_query .= ", id_of_payment = '3'";
    	        break;
    	    
    	    case "You have to pay for certification.":
    	        $insert_course_query .= ", id_of_payment = '4'";
    	        break;
    	   
    	   default: 
    	        $insert_course_query .= ", id_of_payment = '5'";
    	        break;
    	}
		
		
     /* Execute INSERT query. Display a notification on success
        and an error message on failure: */
     if ($the_connector->query($insert_course_query) and $the_connector->affected_rows === 1) {
        $notice = true;
        $notice_msgs['database'] = 'Entry successfully added!';
        ?> <br> <?php
        unset($_POST); // Necessary to empty the form after successful insertion
     }
     else {
        $errors = true;
        $error_msgs['database'] = 'Invalid Course Adding Query: ' . $the_connector->error;
        ?> <br> <?php
     }
     include 'course_form.php';

  }
  // If the script is called up without pressing the submit button, display the form
  else {
     include 'course_form.php';
  }

?>