<?php
// course form.php
// displays a form with providers and subjects as well as other course-data
// sends form data to course_db_script.php for storing the selected and provided information
// into the database.

// include helper-functions and database connection script
include_once "../helpers/connect_db.php";
include_once "../helpers/library.php";

// check if the user logged in by checking if the login-cookies were set. if not, redirect to the login script.
if (!isset($_COOKIE["my_username"]) || (!isset($_COOKIE["my_pw"])))
{
    header('location: ../admin_access.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="../css/main.css"/>
      <link rel="stylesheet" href="../css/form_check_styles.css">
      <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
      <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
        <title>Adding a Course</title>
    </head>
    <body>
    	
    <div class="main_wrapper">
        <div class="my_header">
        		<div> 
        			<img src="../images/logo.png" alt="Moocbase_Logo" class="logo">
        		</div>    	
    	
                <div class="my_headlines">
        			<h1>MOOCBase</h1>
        			<h2>Find the MOOC that's right for you</h2>
        		</div>
        		
    	       <div class="my_nav">
                    <div>
                    	<!-- dropdown container -->
                    	<div class="dropdown_container">
                    	    <!-- trigger button -->
                    	    <button>Navigation</button>
                    	    <!-- dropdown menu -->
                    	    <ul class="my_drop_list">
                    	        <li><a href="../providers/provider_form.php">Add a MOOC Provider</a></li>
                    	        <li><a href="../admin_access_files/admin_interface.php">Administrator Interface</a></li>
                    	        <li><a href="../about.php">About</a></li>
                    	        <li><a href="../index.php">Home</a></li>
                    	    </ul>
                    	</div>
                    </div>
			    </div>
	</div>

<div id="main_content_index">
  <div class="center_form">   	
    	
    <?php my_print_error_message('database'); ?>
    <?php my_print_notification('database'); ?>
	
	
	    
	  <h2>Adding A Course - Step 1</h2>
      <h3>Categorize the new Course</h3>
      <p>Insert a new Subject or proceed to Step 2</p>
    
    <form action="subject_db_script.php" method="post">
        <div class="my-row<?php my_highlight('my_category'); ?>">
            <label for="my_category" class="label-left">Subject:</label> <br>
            <input type="text" name="my_category"id="my_category" 
            <?php if (isset($_POST['my_category'])) { my_print_value_attribute($_POST['my_category']); } ?>
            >
            <?php my_print_error_message('my_category'); ?>
        </div>
        <input type="submit" value="Submit Subject" name="my_category_submit" class="styled_button"/>
    </form>
    
    
    
		<h2>Adding A Course - Part 2</h2>
		<h3>Adding the Main Data </h3>
		
	<form action="course_db_script.php" method="post">
      
	  <!-- The Provider List -->
      <div class="my-row<?php my_highlight('my_providers'); ?>">
        <label for="my_providers" class="label-left">Provider Name:</label> <br>
                <?php
				/* Retrieve all provider IDs and provider names from the provider table 
				  for the select box: */
				  $my_provider_query = "SELECT provider_name, provider_id FROM provider_table"; 
				  $my_provider_result = $the_connector->query($my_provider_query);

				  // If the query was unsuccessful, display error message
				  if ($my_provider_result === false) {
					 $errors = true;
					 $error_msgs['database'] = 'Invalid query: ' . $the_connector->error;
					}
				  // if the query was successful: 
				  else {
					 // determine the amount rows in the result set
					 $provider_num_rows = $my_provider_result->num_rows;
				  
					 // If there is at least 1 entry, store each entry in the array $class_arr:
					 if ($provider_num_rows > 0) {
						for ($i = 0; $i < $provider_num_rows; $i++) {
							$provider_arr[] = $my_provider_result->fetch_array();
						}
					    }
					}
			// Display the select box if there is provider in the DB:
              	  if ($provider_num_rows > 0) {
              	?>
              	<!-- Display a selection box with the names of the providers in the database -->
          <select name="my_providers" size="5">
              	<?php
              		 for ($i = 0; $i < $provider_num_rows; $i++) {
              	?>
            <option value="<?php echo $provider_arr[$i]['provider_id']; ?>"
            <?php 
               if(isset($_POST['my_providers']) && $_POST['my_providers'] == $provider_arr[$i]['provider_id']) 
         		echo 'selected= "selected"';
          	?>
            >
              		<?php echo $provider_arr[$i]['provider_name']; ?>
            </option>
              	<?php
              		 }
              	?>
          </select>
          <?php
              	  }
				  // if there is no provider in the DB, display a message informing the user about it
              	  else {
						echo "No providers found."
						?> <br> <?php
						echo "Please add a provider before attempting to add a course.";
						}
          ?>
          <?php my_print_error_message('my_providers'); ?>
       </div>
	   
	   <!-- Text field for entering the course data:  -->
	   <div class="my-row <?php my_highlight('my_course_title'); ?>">
			<label for="my_course_title" class="label-left">Course Title:</label> <br>
			<input type="text" name="my_course_title" 
			<?php if (isset($_POST['my_course_title'])) { my_print_value_attribute($_POST['my_course_title']); } ?>
			>
			<?php my_print_error_message('my_course_title'); ?>
		</div>
		
		<!-- Select Box containing the possible subjects -->
		<div class="my-row<?php my_highlight('my_subject'); ?>">
        <label for="my_subject" class="label-left">Subject:</label> <br>
			<?php 
			/* Retrieve all Subject IDs and subject names from the subject table: */
			  $subject_query = "SELECT DISTINCT subject, subject_id FROM subject_table"; 
			  $subject_result = $the_connector->query($subject_query);

			  // If the query was unsuccessful, display error message
			  if ($subject_result === false) {
				 $errors = true;
				 $error_msgs['database'] = 'Invalid query: ' . $the_connector->error;
			  }
			  // if the query was successful 
			  else {
					// determine the amount rows in the result set
					$subject_num_rows = $subject_result->num_rows;
			  
					// If there is at least 1 entry, store each entry in the array $subject_arr:
					if ($subject_num_rows > 0) {
						for ($i = 0; $i < $subject_num_rows; $i++) {
							$subject_arr[] = $subject_result->fetch_array();
						}
					}
				}
				
        // if there is at least one class in the result set
            if ($subject_num_rows > 0) {
            ?>
          <select name="my_subject" size="5">
              	<?php
              		 for ($i = 0; $i < $subject_num_rows; $i++) {
              	?>
            <option value="<?php echo $subject_arr[$i]['subject_id']; ?>"
            <?php 
               if(isset($_POST['my_subject']) && $_POST['my_subject'] == $subject_arr[$i]['subject_id']) 
         		echo 'selected= "selected"';
          	?>
            >
              		<?php echo $subject_arr[$i]['subject']; ?>
            </option>
					<?php
					}
					?>
          </select>
          <?php
              	}
			// if there are no subjects in the DB, inform the user about that:
            else {
					echo "No subjects found.";
				}
          ?>
          <?php my_print_error_message('my_subject'); ?>
       </div>
	   
	   <!-- Text input field for the hyperlink to the course -->
	    <div class="my-row<?php my_highlight('my_course_link'); ?>">
			<label for="my_course_link">Link to Course:</label>
			<br>
			<input type="text" name="my_course_link"
			<?php if (isset($_POST['my_course_link'])) { my_print_value_attribute($_POST['my_course_link']); } ?>
			>
			<?php my_print_error_message('my_course_link'); ?>
		</div>
		
		<!-- Textarea field for the course description -->
		<div class="my-row<?php my_highlight('my_course_overview'); ?>">
			<label for="my_course_overview">Course Overview:</label> 
			<br>
			<textarea name="my_course_overview" cols="50" rows=6><?php if (isset($_POST['my_course_overview'])) { echo $_POST['my_course_overview']; } ?>
			</textarea>
			<?php my_print_error_message('my_course_overview'); ?>
		</div>
		
		<!-- Text field for specifying the amount of modules in the course -->
		<div class="my-row<?php my_highlight('my_modules'); ?>">
			<label for="my_modules" class="label-left">Number of Modules:</label>
			<br>
			<input type="text" name="my_modules"
			<?php if (isset($_POST['my_modules'])) { my_print_value_attribute($_POST['my_modules']); } ?>
			>
			<?php my_print_error_message('my_modules'); ?>
		</div>
		
		<!-- Text field for specifying the overall course workload -->
		<div class="my-row<?php my_highlight('my_workload'); ?>">
			<label for="my_workload" class="label-left">Hours of Workload:</label>
			<br>
			<input type="text" name="my_workload"
			<?php if (isset($_POST['my_workload'])) { my_print_value_attribute($_POST['my_workload']); } ?>
			>
			<?php my_print_error_message('my_workload'); ?>
		</div>
		
		<!-- Radio Buttons for specifying the assessment of the course -->
		<div class="my-row<?php my_highlight('my_assessment'); ?>">
			<label for="my_assessment" class="label-left">Assessment Type:</label> 
			<br>
			<input type="radio" name="my_assessment" value="None"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_assessment']) && $_POST['my_assessment'] == "None") { echo " checked"; } 
					?>
			>None<br>
			<input type="radio" name="my_assessment" value="Yes"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_assessment']) && $_POST['my_assessment'] == "Yes") { echo " checked"; } 
					?>
			>Yes
			<br>
			<?php my_print_error_message('my_assessment'); ?>
		</div>
		
		<!-- Radio Buttons for specifying the academic level of the course -->
		<div class="my-row<?php my_highlight('my_academic'); ?>">
			<label for="my_academic" class="label-left">Academic Level?</label> 
			<br>
			<input type="radio" name="my_academic" value="Undergraduate"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_academic']) && $_POST['my_academic'] == "Undergraduate") { echo " checked"; } 
					?>
			>Undergraduate<br>
			<input type="radio" name="my_academic" value="Postgraduate"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_academic']) && $_POST['my_academic'] == "Postgraduate") { echo " checked"; } 
					?>
			>Postgraduate<br>
			<input type="radio" name="my_academic" value="NA"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_academic']) && $_POST['my_academic'] == "NA") { echo " checked"; } 
					?>
			>No information available<br>
			<?php my_print_error_message('my_academic'); ?>
		</div>
		
		<!-- Radio Buttons for specifying whether the course awards credits on completion -->
		<div class="my-row<?php my_highlight('my_credits'); ?>">
			<label for="my_credits" class="label-left">Credit Points on Completion?</label>
			<br>
			<input type="radio" name="my_credits" value="No"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_credits']) && $_POST['my_credits'] == "No") { echo " checked"; } 
					?>
			>No <br>
			<input type="radio" name="my_credits" value="Yes"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_credits']) && $_POST['my_credits'] == "Yes") { echo " checked"; } 
					?>
			>Yes <br>
			<?php my_print_error_message('my_credits'); ?>
		</div>
		
		<!-- Radio Buttons for specifying the type of MOOC -->
		<div class="my-row<?php my_highlight('my_mooc_type'); ?>">
			<label for="my_mooc_type" class="label-left">Automatic or Instructor-Guided MOOC?</label>
			<br>
			<input type="radio" name="my_mooc_type" value="Automatic MOOC"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_mooc_type']) && $_POST['my_mooc_type'] == "Automatic MOOC") { echo " checked"; } 
					?>
			>Automatic MOOC <br>
			<input type="radio" name="my_mooc_type" value="Guided by a Human Instructor"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['my_mooc_type']) && $_POST['my_mooc_type'] == "Guided by a Human Instructor") { echo " checked"; } 
					?>
			>Guided by a Human Instructor <br>
			<input type="radio" name="my_mooc_type" value="NA">No information available <br>
			<?php my_print_error_message('my_mooc_type'); ?>
		</div>
		
		<!-- Radio Buttons for specifying the payment infos -->
		<div class="my-row<?php my_highlight('payment'); ?>">
			<label for="payment" class="label-left">Does the user have to pay for the MOOC?</label>
			<br>
			<input type="radio" name="payment" value="The MOOC is free of Charge"
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['payment']) && $_POST['payment'] == "The MOOC is free of Charge") { echo " checked"; } 
					?>
			>The MOOC is completely free of charge <br>
			<input type="radio" name="payment" value="You have to pay upfront."
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['payment']) && $_POST['payment'] == "You have to pay upfront.") { echo " checked"; } 
					?>
			>You have to pay upfront.<br>
						<input type="radio" name="payment" value="You have to pay upon completion."
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['payment']) && $_POST['payment'] == "You have to pay upon completion.") { echo " checked"; } 
					?>
			>You have to pay upon completion.<br>
			<input type="radio" name="payment" value="You have to pay for certification."
					<?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['payment']) && $_POST['payment'] == "You have to pay for certification.") { echo " checked"; } 
					?>
			>You have to pay for certification.<br>
			<?php my_print_error_message('payment'); ?>
		</div>
		
		
	
	<!-- Submit Button for the form -->
	<input type="submit" value="Submit Course" name="course_submit" class="styled_button">
    </form>
</div>
</div>
	</body>
</html>