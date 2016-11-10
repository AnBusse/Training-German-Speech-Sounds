<?php
// This file inserts the provider_form.php information into the database

  // Initialization of error flag and array for error messages:
  $errors = false;
  $error_msgs = array();
  
  // Initialization of notice flag and array for notifications:
  $notice = false;
  $notice_msgs = array();
  
  // Include support functions:
  include '../helpers/library.php';
  require '../helpers/connect_db.php';

  // Array of required fields:

 $required = array( 'provider_name' => "the name of the MOOC provider",
                    'link_to_provider' => "the link to the MOOC provider's website",
                    'country' => "the country of the MOOC provider",
                    'city' => "the city of the MOOC provider",
                    'coordinates' => "the coordinates for the provider",
                    'description' => "the platform description",
					'mobile' => "the compatibility of the page",
					'chat' => "the availability of a chat"
					);


if (isset($_POST['provider_submit'])) {
	
	/* Completeness check for required fields.
        On the first missing value, display the form and exit: */

    foreach ($required as $key => $value) {
        if (empty($_POST[$key])) {
           $errors = true;
           $error_msgs[$key] = 'Please provide a value for ' . $required[$key];
        }
     }
   
     // check if dummy values for the select boxes were selected:
     if($_POST['country'] == "Please select a country"){
     	$errors = true;
     	$error_msgs['country'] = "Please select a country!";
     }
    if($_POST['city'] == "Please select a city"){
     	$errors = true;
     	$error_msgs['city'] = "Please select a city!";
     }
	 
	// If there were errors, display form with error messages in the appropriate slots
    if ($errors) {
        include 'provider_form.php';
        exit;
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


    $my_provider_name = $_POST['provider_name'];      

	// Check if a provider with the same name already exists:
    $my_check_query = "SELECT provider_name FROM provider_table WHERE provider_name = '" . $my_provider_name . "'";
        // Perform a query, check for error
   $my_check_result = $the_connector->query($my_check_query);
   
     if ($my_check_result->num_rows > 0) { //stuff in the db
     for ($i = 0; $i < $my_check_result->num_rows; $i++) { //$i controls number of iterations. 
         $repeat = $my_check_result->fetch_assoc(); //fetch associative array (one row at a time). 
     
		if ($repeat['provider_name'] == $_POST['provider_name']){
			$errors = true;
?>
			<script>
			alert("<?php echo $_POST['provider_name']; ?> is already in the database.");
			</script>
<?php 	
			include 'provider_form.php';
			die;
		}
	 }
     }
  
   /* - google maps needs geo data in decimal degree format -
  splits $_POST['coordinates'] into an array at , then filters the 2 values
 in that array to remove all characters other than numbers, +- and . (due to allow fraction).
 The post must be split because filter var can only take 3 arguments. so FILTER_FLAG_ALLOW_THOUSAND
 cannot be added. The , is added back into the final varable $coords in order to give an easy point at 
 which to re-explode the data when it is selected from the DB*/ 
 if (isset($_POST['coordinates'])) {
	
	   $split_coords = explode(",", $_POST['coordinates']);
		 /*stripos for case insensitive - converts west and south from coordinates like*
		 35.1107° N, 106.6100° W to a - before the number*/
		 if (stripos($split_coords[0], 's')) {
			$lat = '-' . $split_coords[0];
		 }
		 else {
			$lat = $split_coords[0];
		 }
		 if (stripos($split_coords[1], 'w')) {
			$lng = '-' . $split_coords[1];
		 }
		 else {
			$lng = $split_coords[1];
		 }
	   $my_coords = filter_var($lat, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) . ',' .
	   filter_var($lng, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  }
     
     

     
     
     // Storing the post variables in normal variables because screw you SQL
	 $my_prov = $_POST['provider_name'];
	 $my_link = $_POST['link_to_provider'];
	 $my_comp = $_POST['mobile'];
	 $my_chat = $_POST['chat'];
	 $my_country =$_POST['country'];
	 $my_city =$_POST['city'];
	 
	 //Gets rid of weird symbols
	 if(isset($_POST['platform_description'])){
	     convert_word_stuff($_POST['platform_description']);
	 }
	 
	// Insert Provider Data
	$insert_provider_query = "INSERT INTO provider_table SET provider_name = '" . $my_prov . "',
	                                                        link_to_provider = '" . $my_link . "',
	                                                        coordinates = '" . $my_coords . "',
                                                        	compatibility = '" . $my_comp . "',
                                                        	id_of_country = '" . $my_country . "',
                                                        	id_of_city = '" . $my_city . "',
                                                        	description = '" . $_POST['platform_description'] . "', 
                                                        	chat_function = '" . $my_chat ."'";
	
	
	
	
	 if(isset($_POST['article1'])){
	    //this function gets rid of stupid MS Word punctuation/symbols
	     convert_word_stuff($_POST['article1']);
	     $insert_provider_query .= ", article1 = '" . $_POST['article1'] . "'";
	 }
	 if(isset($_POST['article2'])){
	     convert_word_stuff($_POST['article2']);
	     $insert_provider_query .= ", article2 = '" . $_POST['article2'] . "'";
	 }
	 if(isset($_POST['article3'])){
	     convert_word_stuff($_POST['article3']);
	     $insert_provider_query .= ", article3 = '" . $_POST['article3'] . "'";
	 }
	 if(isset($_POST['article4'])){
	     convert_word_stuff($_POST['article4']);
	     $insert_provider_query .= ", article4 = '" . $_POST['article4'] . "'";
	 }
	 if(isset($_POST['article5'])){
	     convert_word_stuff($_POST['article5']);
	     $insert_provider_query .= ", article5 = '" . $_POST['article5'] . "'";
	 }
	 
	 if(isset($_POST['flink'])){
	     $insert_provider_query .= ", facebook = '" . $_POST['flink'] . "'";
	 }
	 if(isset($_POST['twitter_link'])){
	     $insert_provider_query .= ", twitter = '" . $_POST['twitter_link'] . "'";
	 }
	 if(isset($_POST['google_link'])){
	     $insert_provider_query .= ", google = '" . $_POST['google_link'] . "'";
	 }
	 if(isset($_POST['linkedin_link'])){
	     $insert_provider_query .= ", linkedin = '" . $_POST['linkedin_link'] . "'";
	 }
    
    
    
    $my_insert_provider_result = $the_connector->query($insert_provider_query);
    
    if (!$my_insert_provider_result) {
          $errors = true;
          $error_msgs['database'] = 'Invalid query: ' . $my_db_object->error;
          }
     
    if ($the_connector->affected_rows === 1) {
         $notice = true;
         $notice_msgs['database'] = "Provider successfully added";
    	include "provider_form.php";
    }
   
    else {
	     include 'provider_form.php';
    }
}    
else {
	     include 'provider_form.php';
    }
?>

