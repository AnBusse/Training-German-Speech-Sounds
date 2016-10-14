<?php
// This file contains the search bar

// Include the map to be able to mirror the search on the Google Maps API
include_once "map/h_map.php";
?>

<!-- BEGIN OF SEARCH BAR -->
<!DOCTYPE HTML>
<html>
        <head>
        	<meta charset="UTF-8"> <!-- define char set -->
        	<link rel="stylesheet" href="../css/form_check_styles.css"> <!-- include form check CSS -->
        	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script> <!-- load our JQuery file -->
        	
        </head>
<body>
            <form id="search_form">
    
    <!-- SEARCH BY MOOC TITLE - START -->            	
                	<div id="title_search">
                	    <label>Search by Name of MOOC:</label>
                	    <br>
                		<input  list="titles" name="title" id="title" class="my_datalist"></input>
                     	<datalist id="titles">
                     
                     <?php
                       //selects the MOOC title and its ID
                      $retrieve_title_query = 'SELECT course_title, course_id, id_of_provider, credits, id_of_subject, academic_level, credits, automation, comp_id FROM course_table';
                      $retrieve_title_result = $the_connector->query($retrieve_title_query);
                	  $my_array_num = $retrieve_title_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $course_arr[] = $retrieve_title_result->fetch_assoc(); 
                			
                           }
                	for ($i = 0; $i < count($course_arr); $i++) { 
                	   $prov[] = $course_arr[$i]['id_of_provider'];
                	   $sbj[] = $course_arr[$i]['id_of_subject'];
                	   $level[] = '"' . $course_arr[$i]['academic_level'] . '"';
                	   $course[] = $course_arr[$i]['course_id'];
                	   $cred[] = '"' . $course_arr[$i]['credits'] . '"';
                	   $auto[] = '"' . $course_arr[$i]['automation'] . '"';
                	   $comp[] = $course_arr[$i]['comp_id'];
                	   $unique_prov = array_unique($prov); 
                	   $unique_level = array_unique($level);
                	   
                	   
                	   
                ?>		
                	 	<option id="<?php echo $course_arr[$i]['course_id'];?>" value="<?php echo $course_arr[$i]['course_title'];?>" name="<?php echo $course_arr[$i]['id_of_provider'];?>">
                <?php
                	}
                //leave this here, used to see data from the db	
               	foreach ($sbj as $i => $s) {
                	    if ( 1 ==  $sbj[$i]) 
                	    {
                	        echo $prov[$i] . "\r\n";
                	    }
                	   
            }; 
                ?>
     	</datalist>
     <br>
    </div>
    <!-- SEARCH BY MOOC TITLE - END -->
    
                	<p id="use_filters">OR<br>
                	Use the Filters:
                	</p>

	<!-- SEARCH BY FILTERS - START -->
	        <div id="my_filter_container">
                	<div id="providers" class="my_select_divs">
                	  <label for="my_providers" class="label-left">Provider:</label> <br>
                      <?php
                      
                				/* Retrieve all provider IDs and provider names from the provider table 
                				  for the select box: */
                				  $my_provider_query = "SELECT provider_name, provider_id, compatibility FROM provider_table"; 
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
                				  
                					 // If there is at least 1 entry, store each entry in the array $provider_arr:
                					 if ($provider_num_rows > 0) {
                						for ($i = 0; $i < $provider_num_rows; $i++) {
                							$provider_arr[] = $my_provider_result->fetch_array();
                							
                							    $comp[] = '"' . $provider_arr[$i]['compatibility'] . '"';
                							    $provide[] = $provider_arr[$i]['provider_id'];
                						  }
                					 }
                					}
                					?>
                					
                			<select name="my_providers" id="my_providers" class="my_select">
                					<?php
                			// Display the select box if there is provider in the DB:
                          if ($provider_num_rows > 0) {
                              	?>
                              	<!-- Display a selection box with the names of the providers in the database -->
                          
                          		<option value="dummy_provider">Please select a Provider.</option>
                              	<?php
                              
                              
                              	for ($i = 0; $i < $provider_num_rows; $i++) {
                              	?>
                            	<option value="<?php echo $provider_arr[$i]['provider_id']; ?>">
                              	<?php echo $provider_arr[$i]['provider_name']; ?>
                            	</option>
                              	<?php
                              		 }
                              	?>
                          
                          			<?php
                          }
                	
                	// if there is no provider in the DB, display a message informing the user about it
                          else {
                						?> 
                						<option value="no_provider" >No Provider found.</option>
                						
                						<?php
                						}
                          				?>
                          	</select>
                	</div>
                	<div name="categories" id="categories" class="my_select_divs">
                				  <label for="my_subject" class="label-left">Category:</label> <br>
                			<?php 
                			/* Retrieve all Subject IDs and subject names from the subject table: */
                			  $subject_query = "SELECT subject, subject_id FROM subject_table"; 
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
                          <select name="my_subject" id="my_subject" class="my_select">
                          			<option value="dummy_subject">Please select a Category.
                          			</option>
                              	<?php
                              		 for ($i = 0; $i < $subject_num_rows; $i++) {
                              	?>
                            <option value="<?php echo $subject_arr[$i]['subject_id']; ?>">
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
                					?>
                					<select name="my_subject" id="my_subject" class="my_select">
                					<option value="no_subject">No category found.</option>
                					</select>
                					<?php
                				}
                          ?>
                	</div>
                	<div name="academic_levels" id="academic_levels" class="my_select_divs">
                		<label for="academic_level">Academic Level:</label><br>
                	
                			<select name="academic_level" id="academic_level" class="my_select">
                				<option value="dummy_academic">Please select an academic level.</option>
                				<option value="Undergraduate">Undergraduate</option>
                				<option value="Postgraduate">Postgraduate</option>
                			</select>
                		
                	</div>
                	
                	<div name="my_checkboxes" id="my_checkboxes">
                	<table>
                		<tr>
                			<td><input type="checkbox" name="credits" id="credits" value="Credits Offered" class="style_checkboxes"></td>
                			<td><label for="credits">Credits Offered</label></td>
                		</tr>
                		<tr>
                			<td><input type="checkbox" name="compatibility" id="compatibility" value="Compatibility" class="style_checkboxes"></td>
                			<td><label for="compatibility">Compatibility with <br>Mobile Devices</label></td>
                		</tr>
                		<tr>
                			<td><input type="checkbox" name="human" id="human" value="human" class="style_checkboxes"></td>
                			<td><label for="human">MOOC Guided by <br>a Human Instructor</label></td>
                		</tr>
                	</table>
                	</div>
            </div>
       <!-- SEARCH BY FILTERS - END -->
        	
        	<br>
      <!-- Search Button -->
        	<input type="submit" name="my_search_submit" id="my_search_submit" class="styled_button" value="Search!">
        	<br>
        	<input type="reset" name="my_clear_results" id="my_clear_results" class="styled_clear_button" value="Clear Search Results">
        </form>

<!-- the following alters the map on search -->
<script>
 
  //converts title to either course or provider id
  function changeValue2(target) {
                    var input_id = $('#title').val();
                     var data_list_id = $('#titles');
                     var val = $(data_list_id).find('option[value="' + input_id + '"]');
                     var new_val = val.attr(target);
                         return(new_val);
                      };
  
  
    //used with google maps listener         
var submit_change = document.getElementById("my_search_submit");

    //variables used for setting relavent map pins during search
    var title_val = $('#title').val();
    var title_has_val = 0;
    var my_prov = $('#my_providers').val();
    var my_sbj = $('#my_subject').val();
    var my_aca = $('#academic_level').val();
    
    var my_title;
    var cred_check;
    var has_cred = 'NOPE';
    var has_comp = 'NOPE';
    var has_guide = 'NOPE';
    var comp_arr = [];
    var aca_set = 0;
    var sbj_set = 0;
    var comp_set = 0;
    var guide_set = 0;
    var cred_set = 0;
    var set_sum = 0;
    var prov_set = 0;
    
 
//****************************************************************************************************************************  
//disables submit on enter key for the form. This is necessary because a lot of processing happens when the user mouses over submit
$('#search_form').on('keyup keypress', function(e) {
  var code = e.keyCode || e.which;
  if (code == 13) { 
    e.preventDefault();
    return false;
  }
});


//for adjusting map pin visibility based on information from the title datalist. This happens when text is input into the datalist
$('#title').on('input change', function(){
       title_val = $('#title').val();
        
        //if the datalist is not blank, title_has_val is set from 0 to 1
        if (title_val !== undefined || title_val !== null || title_val !== "") {
            title_has_val = 1;
        }
        if (title_val == undefined || title_val == null || title_val == "") {
            title_has_val = 0;
   
        }

});


//******************************************************************************************************************************
// re-assigns a value to these variables to current value of the select box that they represent when that select box is changed

$(document).on('change', 'select', function(){
     my_prov= $('#my_providers').val();
     my_sbj= $('#my_subject').val();
     my_aca= $('#academic_level').val();
    
   
});

//******************************************************************************************************************************

// for adjusting pins with check boxes and select boxes. The "set" variables are for choosing a case in a following switch statement. 
//other variables are for checking against database entries to highlight relavent pins
$('#my_search_submit').on( 'mouseover', function() {
   
   //sets the value of has cred to 'yes' if this box is checked, 'NOPE' if it is not
    if($('#credits').is(":checked")) {
        has_cred = 'Yes';
        cred_set = 1;
    }
    else {
        has_cred = 'NOPE';
        cred_set = 0;
    }
    
    //sets the value of has_guide to 'Guided by a Human Instructor' if this box is checked, 'NOPE' if it is not    
    if($('#human').is(":checked")) {
            has_guide = 'Guided by a Human Instructor';
            guide_set = 1;
    }
    else {
        has_guide = 'NOPE';
        guide_set = 0; 
    }
    
    //sets the value of has comp to '1' if this box is checked, 'NOPE' if it is not 
    if($('#compatibility').is(":checked")) {
         has_comp = 1;
         comp_set = 1;
    }
    else {
        has_comp = 'NOPE';
        comp_set = 0;
    }
    
    
    if (title_has_val == 0) {
       
 //-------------------------------------------------------------------------------------   
   
   
   //if a provider is selected 
     if(my_prov != 'dummy_provider') {    
          prov_set = 1;
       
     }
     else {
         prov_set = 0;
     }
     }

    
    // if a subject is selected 

    if(my_sbj != 'dummy_subject') { 
           sbj_set = 1;
        }
    else {
            sbj_set = 0;
        } 
        

      //if an academic level is selected     
    
    if(my_aca != 'dummy_academic') {
        aca_set = 1; 
           
      }
    else {
        aca_set = 0;
    }
     

    
})



//******************************************************************************************************************************

//processes data about filters and sets the pins on the map
//adjusts map pins when submit is clicked 
google.maps.event.addDomListener(submit_change, 'click', function() {
    
    //adds the values from the filters to determine which switch case to use 
    set_sum = aca_set + sbj_set + cred_set + guide_set + comp_set;
<?php            
            
             //loops through provider ids
             for ($i = 0; $i < count($provider_arr); $i++) { 
?>                  
                  
                     //sets all pins invisible on submit 
                    pin_<?php echo $provider_arr[$i]['provider_id']; ?>marker.setVisible(false);
<?php
            };   
           
?>
 
        //if a provider has been selected
        if (prov_set != 0) {
                      
<?php  
                         //loops through provider ids 
            for ($i = 0; $i < count($provider_arr); $i++) { 
           
?>
            
                
                //if an id number from the database matches the selected provider's id number, the pin representing that provider is made visible
                 if(<?php echo $provider_arr[$i]['provider_id']; ?> == my_prov) {
                    
				    	pin_<?php echo $provider_arr[$i]['provider_id']; ?>marker.setVisible(true);
		                        
				
			    }
            
<?php
            };
?>
        }

 //------------------------------------------------------------------------------------------------------------------------   
    //search by filters other than provider 
    
    // if the datalist is blank and provider is dummy_provider
    if ((title_has_val == 0) && (prov_set == 0)) { 

              
                switch (set_sum) 
            {
               //if nothing is selected - all pins turned on 
               case 0: 
                   <?php            
            
             //loops through provider ids
             for ($i = 0; $i < count($provider_arr); $i++) { 
?>       
                     //sets all pins visible
                    pin_<?php echo $provider_arr[$i]['provider_id']; ?>marker.setVisible(true);
<?php
            };   
           
?>
               break;
             
              //if one filter is selected - if a selected value matches a value from the database, the provider ids from courses that
              //have that value are used to set the relevant pins to visible 
               case 1:
                   
<?php                   
                   foreach ($course as $i => $c) {
?>                  
                   if (has_guide == <?php echo $auto[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_cred == <?php echo $cred[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> ) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
<?php
                   };
?>
               break;
               
               //if two filters are selected - if a selected value matches a value from the database, the provider ids from courses that
              //have that value are used to set the relevant pins to visible 
               case 2: 
<?php                   
                   foreach ($course as $i => $c) {
?>                  
                    // if has_guide = "Guided by a Human Instructor" and has_cred = 'Yes' 
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?>) {
                       // this is the id_of_provider of courses that are guided by an instructor and have credit 
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                       
                   }
                   if (has_guide == <?php echo $auto[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_guide == <?php echo $auto[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_cred == <?php echo $cred[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_cred == <?php echo $cred[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_sbj == <?php echo $sbj[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && has_guide == <?php echo $auto[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && has_cred == <?php echo $cred[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   
                   
<?php
                   };
?>
                
                break;
                
            //if three filters are selected - if a selected value matches a value from the database, the provider ids from courses that
              //have that value are used to set the relevant pins to visible 
                case 3: 
<?php                   
                   foreach ($course as $i => $c) {
?>                  
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_sbj == <?php echo $sbj[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_sbj == <?php echo $sbj[$i] ;?> && has_guide == <?php echo $auto[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && has_cred == <?php echo $cred[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && has_guide == <?php echo $auto[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?> && has_guide == <?php echo $auto[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?> && has_cred == <?php echo $cred[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_comp == <?php echo $comp[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && has_guide == <?php echo $auto[$i] ;?>) {
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
<?php
                   };
?>
                  break;
                  
            //if four filters are selected - if a selected value matches a value from the database, the provider ids from courses that
              //have that value are used to set the relevant pins to visible 
                  case 4: 
<?php                   
                   foreach ($course as $i => $c) {
?>                  
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?> && my_aca == <?php echo $level[$i] ;?>) {
           
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?> && has_comp == <?php echo $comp[$i] ;?>) {
           
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && has_comp == <?php echo $comp[$i] ;?>) {
           
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                   if (my_sbj == <?php echo $sbj[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && has_comp == <?php echo $comp[$i] ;?>) {
           
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
                 
<?php
                   };
                   
?>
                  break;
            //if five filters are selected - if a selected value matches a value from the database, the provider ids from courses that
              //have that value are used to set the relevant pins to visible 
                  case 5:
<?php                   
                   foreach ($course as $i => $c) {
?>                        
                      if (has_guide == <?php echo $auto[$i] ;?> && has_cred == <?php echo $cred[$i] ;?> && my_sbj == <?php echo $sbj[$i] ;?> && my_aca == <?php echo $level[$i] ;?> && has_comp == <?php echo $comp[$i] ;?>) {
           
                       pin_<?php echo $prov[$i]?>marker.setVisible(true);
                   }
<?php
                   };
                   
?>                   
                  break;
            }
                /*if the box is checked var has_cred = 'yes'. If the course has credits 'yes' is returned from the database. 
                where both of these = 'yes' the provider id found with the same course is used to set the pin for the course provider to visible*/
          
          }
 
 //------------------------------------------------------------------------------------------------------------------------         
               //search by title - if title is set 
               if (title_has_val == 1) {
<?php  
                
                 //loops through provider ids
                for ($i = 0; $i < count($provider_arr); $i++) { 
            
?>
           
           
                    /*if the id of the provider of the selected title is the same as a provider id from the database, 
                    the pin representing that provider is set to visible*/
                        if(<?php echo $provider_arr[$i]['provider_id']; ?> == changeValue2('name')) {
           
                            
							pin_<?php echo $provider_arr[$i]['provider_id']; ?>marker.setVisible(true);
		                        
						
             }
<?php
        };
?>					
                }

    });

</script>

</body>
</html>