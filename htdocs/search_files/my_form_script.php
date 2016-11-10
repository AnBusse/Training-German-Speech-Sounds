<!-- This script processes the search request from the search form -->

<!DOCTYPE HTML>
<html>
        <head>
        	<meta charset="UTF-8">

            <link rel="stylesheet" href="../css/main.css"/>
            <link rel="stylesheet" href="../css/overlay.css"/>
        
        </head>
   
<body>
 	

<?php


include_once "../helpers/connect_db.php";
include_once "../helpers/library.php";


// validate the variables ======================================================
    // if any of the following conditions return true, add an error to our $errors array
	if(empty($_POST)){
		echo "No search has been conducted yet.";
	}
	else {
	
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
     
	if (isset($_POST['title'])) {
		
	//Check if the datalist input that the user entered is actually in the database:
	$my_title_check_query = "SELECT course_id FROM course_table WHERE course_id ='". $_POST['title'] . "'";
	$my_title_check_result = $the_connector->query($my_title_check_query);
	$my_rows = $my_title_check_result->num_rows;
	
	// print_r($my_rows);
	}
	

	if ((isset($_POST['title']) && $my_rows == 1) && ($_POST['my_providers'] != 'dummy_provider' || $_POST['my_subject'] != 'dummy_subject' || $_POST['academic_level'] != 'dummy_academic' || isset($_POST['credits']) || isset($_POST['compatibility']) || isset($_POST['human']) )) 
	{
	// echo "some dummies";
	?><span class="my_hide_note"><?php
	echo "Please either use 'Search by Name' OR the filters.";
	?></span><?php
	unset($_POST);
	exit;
	}
	
	if((!isset($_POST['title']) || $_POST['title'] == "") && ($_POST['my_providers'] == 'dummy_provider') && ($_POST['my_subject'] == 'dummy_subject') && ($_POST['academic_level'] == 'dummy_academic') && !isset($_POST['credits']) && !isset($_POST['compatibility']) && !isset($_POST['human'])){
	//	echo "no filters used";
		?><span class="my_hide_note"><?php
		echo "Please select at least one search parameter.";
		?></span><?php
		unset($_POST);
		exit;
	}
	
// if there are no errors process our form, then return a message

// FORM PROCESSING======================================================================================

// SEARCH SCENARIO 1:
// if the title field was filled in and it is the only search parameter that was submitted, then:
	
	if (isset($_POST['title']) && (($_POST['my_providers'] == 'dummy_provider') && ($_POST['my_subject'] == 'dummy_subject') && ($_POST['academic_level'] == 'dummy_academic') && !isset($_POST['credits']) && !isset($_POST['compatibility']) && !isset($_POST['human']))) 
	{
	
	//Check if the datalist input that the user entered is actually in the database:
	$my_title_check_query = "SELECT course_id FROM course_table WHERE course_id ='". $_POST['title'] . "'";
	$my_title_check_result = $the_connector->query($my_title_check_query);

	
	// If there is one result (not more!), run the query for Search by Title:
	if ($my_title_check_result->num_rows == 1) {
	$my_title_search_query = "SELECT course_id, course_title, link, course_overview, id_of_provider, id_of_subject, overall_rating FROM course_table WHERE course_id ='". $_POST['title'] . "'" ;
	$my_title_search_result = $the_connector->query($my_title_search_query);
	
	// Store the results in an associative array 
	// and display the results in an ordered list:
	
	//Determine the amount rows in the result set:
		$title_rows = $my_title_search_result->num_rows;
		
// store each entry in the array $title[]:
						for ($i = 0; $i < $title_rows; $i++) {
							$title = $my_title_search_result->fetch_assoc();
				
								}
								
			?><span class="result_title">
			<?php
			echo $title['course_title'];
			?></span>
			<?php
?>

					
			
			<ul>
			    <li><a href="<?php echo $title['link']; ?>"><?php echo $title['link']; ?></a></li>
			    <li>
			    <?php
			    	// If there is textual information about the course overview, display a preview of it
			    	if(isset($title['course_overview']) && $title['course_overview'] != "n.a."){
			    			echo substr($title['course_overview'], 0, 150); ?> 
			    	...
			    	<?php
			    	}
			    	?>
			    </li>
			</ul>
			
		<?php
		/* Query for more details about the MOOC, which can be opened by 
		clicking on the "Show Me More!" Button under each entry */
		$my_provider_detail_query = "SELECT id_of_country, id_of_city FROM provider_table WHERE provider_id ='". $title['id_of_provider'] . "'";
		$my_provider_detail_result = $the_connector->query($my_provider_detail_query);
		$my_provider_details = $my_provider_detail_result->fetch_assoc();
		?>
		
		
		<!-- Form to both open the MOOC details overlay 
			and to transfer the necessary infos per MOOC to the iFrame / Overlay -->
			<form action= '../search_files/search_results.php' method='post' target='my_frame'>
			    <input type="hidden" name="show_mooc_details" value="<?php echo $title['course_id']; ?>"/>
			    <input type="hidden" name="show_country_id" value="<?php echo $my_provider_details['id_of_country']; ?>"/>
			    <input type="hidden" name="show_city_id" value="<?php echo $my_provider_details['id_of_city']; ?>"/>
			    <input type="hidden" name="show_subject_id" value="<?php echo $title['id_of_subject']; ?>"/>
			    <input type="hidden" name="show_mooc_prov_id" value="<?php echo $title['id_of_provider']; ?>"/>
				<input type="hidden" name="rating" value="<?php echo $title['overall_rating']; ?>"/>			
			<!-- This button both submits the value of the hidden input field to the search_results.php , and
				opens the overlay that displays information on the relevant MOOC -->
				<button type="submit" rel="#overlay1" class="overlay-link" name="my_link" id="my_link">Show Me More!</button>
			</form>

<?php
	exit;
	}
		// If there are no results for the user input, inform the user about it.
	else {
	echo "Sorry, there were no matches for your search by title query. Please alter your input and try again.";
	exit;
		  }
	
	}
    

// SEARCH SCENARIO 2:
// If the title field was not filled in and at least one of the filters was applied: 
			if ((!isset($_POST['title'])) && (($_POST['my_providers'] !== 'dummy_provider') || ($_POST['my_subject'] !== 'dummy_subject') || ($_POST['academic_level'] !== 'dummy_academic') || isset($_POST['credits']) || isset($_POST['compatibility']) || isset($_POST['human']))) 
		{
			unset($_POST['title']);
					// Build the Filter Query:
					// If the fields are neither empty nor filled with dummy values, add them to an array:
					$my_fields = array();
					
					   if (($_POST['my_providers'] != "dummy_provider")){
							$my_fields[] = sprintf("`%s` = '%s'", "id_of_provider", $_POST["my_providers"]);
						}
						
					  if ($_POST['my_subject'] != "dummy_subject"){
							$my_fields[] = sprintf("`%s` = '%s'", "id_of_subject", $_POST["my_subject"]);
						}
						
					  if ($_POST['academic_level'] != "dummy_academic"){
							$my_fields[] = sprintf("`%s` = '%s'", "academic_level", $_POST["academic_level"]);
						}
						
					  if(isset($_POST['credits'])){
						$my_fields[] = sprintf("`%s` = '%s'", "credits", "Yes");
					  }
					  if(isset($_POST['human'])){
						$my_fields[] = sprintf("`%s` = '%s'", "automation", "Guided by a Human Instructor");
					  }
					  
					if(isset($_POST['compatibility'])){
						$my_fields[] = sprintf("`%s` = '%s'", "comp_id", "1");
					  }
					
				// Create the WHERE clause by imploding the array, adding an " AND " separator.
				 $my_whereClause = "WHERE " . implode(" AND ", $my_fields);
				
				
				//course_title, link, course_overview,
				
				// And then create the SQL query itself
				$my_filter_search_query = "SELECT course_id, course_title, link, course_overview, id_of_provider FROM course_table " . $my_whereClause;
		
				// Add the compatibility clause if the checkbox for it was selected 
				// (due to the complexity of this part of the query, it was kept separate)
	/*			if (isset($_POST['compatibility'])){
					// adapted from: http://stackoverflow.com/questions/9105427/select-rows-from-a-table-where-row-in-another-table-with-same-id-has-a-particula
					$my_filter_search_query .= " AND id_of_provider IN (SELECT provider_id FROM provider_table WHERE compatibility = 'Yes')";
				}
			*/

		// Run the Filter Search Query:
		$my_filter_search_result = $the_connector->query($my_filter_search_query);
		//print_r($my_filter_search_result);
		
		//Determine the amount rows in the result set:
		$filter_rows = $my_filter_search_result->num_rows;
		
		// If there is at least 1 entry, store each entry in the array $filter_result[]:
					 if ($filter_rows > 0) {
	?>
	<ol class="result_title">
	<?php
						for ($i = 0; $i < $filter_rows; $i++) {
							$filter_result = $my_filter_search_result->fetch_assoc();
				?>
	<li>
	<?php		
	// Queries for the required information for results-list and MOOC details
		$my_title_search_query = "SELECT course_title, link, course_overview, id_of_provider, id_of_subject FROM course_table WHERE course_id ='". $filter_result['course_id'] . "'";
		$my_title_search_result = $the_connector->query($my_title_search_query);
		$title = $my_title_search_result->fetch_assoc();
			
		$my_provider_detail_query = "SELECT id_of_country, id_of_city FROM provider_table WHERE provider_id = '". $title['id_of_provider'] . "'";
		$my_provider_detail_result = $the_connector->query($my_provider_detail_query);
		$my_provider_details = $my_provider_detail_result->fetch_assoc();
		?>
		
		<!-- Display Course Title, Link, Course Overview, and the Show Me More Button -->
		<span>
		
		<a href="<?php echo $filter_result['link']; ?>" target="_blank"><?php echo $filter_result['course_title'];?></a>
		
		</span>
		<span style="visibility:hidden" id="provider_id_filter">
			<?php echo $filter_result['id_of_provider']; ?>
		</span>
		<br>
		<span class="no_title">
		<?php 
		if(isset($filter_result['course_overview']) && $filter_result['course_overview'] != "n.a."){
		echo substr($filter_result['course_overview'], 0, 150); ?> 
		...
		<br>
		<?php 
		} 
		?>
		</span>
		<br>
		<!-- Hidden form to both open the MOOC details overlay 
			and to transfer the necessary infos about the MOOC to the iFrame / Overlay -->
		<form action= '../search_files/search_results.php' method='post' target='my_frame'>
				<input type="hidden" name="show_mooc_details" value="<?php echo $filter_result['course_id'] ?>"/>
				<input type="hidden" name="show_mooc_prov_id" value="<?php echo $filter_result['id_of_provider']; ?>"/>
			    <input type="hidden" name="show_country_id" value="<?php echo $my_provider_details['id_of_country']; ?>"/>
			    <input type="hidden" name="show_city_id" value="<?php echo $my_provider_details['id_of_city']; ?>"/>
			    <input type="hidden" name="show_subject_id" value="<?php echo $title['id_of_subject']; ?>"/>
			    <input type="hidden" name="rating" value="<?php echo $title['rating']; ?>"/>
			<!-- This button both submits the value of the hidden input field to the mooc_details_.php, and
				opens the overlay that displays information on the relevant MOOC -->
			<button type="submit" rel="#overlay1" class="overlay-link" name="my_link" id="my_link">Show Me More!</button>
		</form>
		<br>
	</li>
							
		<?php } ?>
</ol>		
<br>

	<?php  }
	// If there are no results for the user input, inform the user about it.
	else {
	echo "Sorry, there were no matches for your filter search query. Please alter your input and try again.";
		  }
	?> 

<?php
	}
	// If there are no results for the user input, inform the user about it.
//	else {
//	echo "Sorry, there were no matches for your filter search query. Please alter your input and try again.";
//		  }
		
}
    
//}
?>
</body>
</html>