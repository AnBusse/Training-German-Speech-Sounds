<?php
// This is the main page

// Including the Database connection, the helper functions and the map interface
include_once "helpers/connect_db.php";
include_once "helpers/library.php";
require "map/h_map.php";

   //Creating a PHP array against which the datalist entries can be compared so the user does not enter any invalid data
         $dl_title_query = 'SELECT course_title, course_id, id_of_provider FROM course_table';
                      $dl_title_result = $the_connector->query($dl_title_query);
                	  $my_num = $dl_title_result->num_rows;
                           for ($i = 0; $i < $my_num; $i++) { 
                             $dl_course_arr[] = $dl_title_result->fetch_assoc(); 
                             $my_prov[] =  $dl_course_arr[$i]['id_of_provider'];

                           }
?>



<!DOCTYPE HTML>
<html>
        <head>
        	<meta charset="UTF-8">
            <link rel="stylesheet" href="css/main.css"/>
            <link rel="stylesheet" href="css/overlay.css"/>
            <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
            <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
                <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
                <script>
                
                    //changes the value in the datalist (search form) between the course name, course id and provider id
                    function changeValue(target) {
                    var input_id = $('#title').val();
                     var data_list_id = $('#titles');
                     var val = $(data_list_id).find('option[value="' + input_id + '"]');
                     var new_val = val.attr(target);
                         return (new_val);
                      }	
                     
                     
            		// JQuery code
            		$(document).ready(function() {
            			
            		// When the user leaves the title field, 
            		// perform an AJAX request to check if the title is really in the database or not
            		 
            			$("#title").focusout(function() {
            				
            				// If the title field has content in it:
            				if($("#title").val() !== ''){
            				
            				// Send off an AJAX request to an external script that checks whether the user input is a course title from the database
			    			$.ajax({
							method: "POST",
							
							data: {mooc_name: $("#title").val()}, // send the title input field content along to the script, as a value
							url:'search_files/my_validation_script.php', // the script where the data is get sent to
							cache: false, // do not use the browser cache, since this causes unwanted behavior
							success:function(data){ // when the AJAX call has run successfully:
								// If the title field has content and the ajax call returns the error message:
								data=data.trim(); 
								if(data != ''){
								
									
									// Remove any previous errors
									$('.search_error_box').remove();
									// Add the new error message
									$('#title_search').append(data);
									// Add classes that prevent the user from submitting a search
									$('#my_search_submit').addClass('no_click');
									$('#my_search_submit').addClass('grey_out');
								}
								// if there was no error message sent back from the AJAX request
								if($.isEmptyObject(data)){
									
									// Remove the error message
									$('.search_error_box').remove();
									// Remove the class that disables the user from clicking "Search!"
									$('#my_search_submit').removeClass('no_click');
									// Remove the Grey-Out CSS
									$('#my_search_submit').removeClass('grey_out');
								}
					
							}
							});
							
            				}
            				// If the title search field is empty:
							else{
									// Remove the error message
									$('.search_error_box').remove();
									// Remove the class that disables the user from clicking "Search!"
									$('#my_search_submit').removeClass('no_click');
									// Remove the Grey-Out effect
									$('#my_search_submit').removeClass('grey_out');
							}
					
            		});
            		
            		    //When the form was submitted:
						$('form').submit(function(event) {
				
					// Setting all content-variables to null before any search operation, 
					// so there will be no predefined values
						var my_title = null;
						var my_prov = null;
					    var my_subj = null;
					    var aca = null;
					    var my_cred = null;
					    var my_comp = null;
					    var hm = null;
						
		
						//Hides the "No search has been conducted yet." note from the user
						$('#note').hide();
						// Remove any previously shown notifications
						$('.my_hide_note').hide();
					    
					    /*
					    Store all search bar form field values in variables
					    */
					    var my_title = $('#title').val();
					    var my_prov = $('select[name=my_providers]').val();
					    var my_subj = $('select[name=my_subject]').val();
					    var aca = $('select[name=academic_level]').val();
					    var my_cred = $('input[name=credits]:checked').val();
					    var my_comp = $('input[name=compatibility]:checked').val();
					    var hm = $('input[name=human]:checked').val();
					  
	// Keep the form from submitting if the user tried to search for a title plus a filter
	if(my_title != '' && ((my_prov != "dummy_provider")|| (my_subj != "dummy_subject") || (aca != "dummy_academic") || my_cred || my_comp || hm )){
					    	alert("Please use either Search by Title OR the filters below!");
					    	return;
					    }
					    else{
					// Retrieve the form data and store it in an array:
							var formData = {
								'title': changeValue('id'), // change the title value to the corresponding title ID, because of any special characters in the title
								'my_providers': $('select[name=my_providers]').val(),
								'my_subject': $('select[name=my_subject]').val(),
								'academic_level': $('select[name=academic_level]').val(),
								'credits': $('input[name=credits]:checked').val(),
								'compatibility': $('input[name=compatibility]:checked').val(),
								'human': $('input[name=human]:checked').val(),
							};
							
							
					
					// AJAX code to process the form without refreshing the page:
					/*
					The form data is being sent to the processing script, 
					which returns the results if the AJAX call was successful
					*/
					
							$.ajax({
							method: "POST",
							data: formData,
							url:'search_files/my_form_script.php',
							cache: false,
							success:function(data){
							// empties the search results container with results from a previous search 
							// and then display the new data in the same place
		                	$('#my_search_results_container').html(data);
							}
							});
					
					
				}
					    
					
					// Stop the form from submitting the normal way and refreshing the page
					event.preventDefault();
					
						});
			
	
            		    //Initializes the map
            			map_initialize();
            			
            			    	
            /* 
            Since the button to open the overlay does not exist when this click-handler is defined,
            a traditional .click() or on-click mechanism would not work. Therefore, .delegate() has to be used to define an even for a future element.
            */
			$("body").delegate("button.overlay-link", "click", function(){
            		    var my_overlay_id = $($(this).attr('rel')); //select the current Overlay
            		    $('#overlay1').prepend('<div class="overlay-close"></div>').show(); // Show the Overlay and the close button
            		    $(document).on('click', '.overlay-close', function() {
            		      my_overlay_id.hide(); // close the overlay on click
            		    });
            		});
			
			//these two variables are used to set the map back to its default state
			var clear_thing = document.getElementById("my_clear_results");
			var normal = 'map/img/pin1.png';
				var infowindow = new google.maps.InfoWindow({
			//content is inserted later
			});
			
			//JQuery code to empty the search results div and re-display the "no search has been conducted" note
			 $("#my_clear_results").click(function(){
					// Reload the page. This both clears the form, the results-div and
					// Re-initializes the map so it can update to display all pins again	 
			 		 document.getElementById("search_form").reset();
			 		 $('#my_search_results_container').empty();
			 		 $('#note').show();
			 });
			 
			 //Clears map pins when search is reset
			 	 google.maps.event.addDomListener(clear_thing, 'click', function() {
				
<?php  
                
                 //Loop through provider IDs
                	foreach ($dl_course_arr as $i => $c) {
?>
           
           
                    /* If the id of the provider of the selected title is the same as a provider id from the database, 
                    the pin representing that provider is set to visible, changed to the default red color and the info window is closed. */
                        
							pin_<?php echo $my_prov[$i]; ?>marker.setVisible(true);
		                    pin_<?php echo $my_prov[$i]; ?>marker.setIcon(normal);
		                    infowindow.close();
						
<?php
        };
?>				
			 		 });
    });
</script>
    		<title>MOOCBase</title>
    </head>
    <body>
    	
<!-- Contains the Main Content -->
<div class="main_wrapper">


<!--  Header with the LOGO, title, slogan and Navigation Button  -->	
    <div class="my_header">
        		<div> 
        			<img src="images/logo.png" alt="Moocbase_Logo" class="logo">
        		</div>    	
    	
                <div class="my_headlines">
        			<h1>Welcome to MOOCBase</h1>
        			<h2>Find the MOOC that's right for you</h2>
        		</div>
	
	<div class="nav_container">
		<!-- dropdown container -->
		<div class="dropdown_container">
		    <!-- trigger button -->
		    <button>Navigation</button>
		    <!-- dropdown menu -->
		    <ul class="my_drop_list">
		        <li><a href="admin_access_files/admin_access.php">Administrator Access</a></li>
		        <li><a href="about.php">About</a></li>
		    </ul>
		</div>
	</div>
</div>


	
<!-- Main Content of the Index Page -->
<div id="main_content_index">
	<br>
	<!-- Noscript tag to inform the user that this page needs JavaScript to function properly -->
	<noscript>
		Please activate JavaScript to enjoy the full range of functionalities MOOCBase has to offer.
	</noscript>
	
	<!-- Search Bar -->
    <div id="search">
		<?php require "search_files/my_search_form.php"?>
    </div>
	<!-- Search Results container -- overflow-y property makes the div scrollable vertically -->
     <div id="my_search_results" style="overflow-y: auto">
     	<!-- Default Message to be displayed in the search results container -->
     	<em id="note">No Search has been conducted yet. Please use the search bar on the left.</em>
     	<!-- This is the div inside of which the search results will be displayed. -->
     	<div id="my_search_results_container">
     	</div>
     </div>

	<!--This is where the map is displayed -->
    <div id="my_map">
    </div>
    
    <!-- Overlay and iFrame  HTML -->
	<div id="overlay1" class="overlay">
        <iframe src="search_files/search_results.php" name="my_frame" id="my_frame" width="100%" height="530px" style="border-width: 0px;"></iframe>
    </div>
</div>

</div>
</body>
</html>