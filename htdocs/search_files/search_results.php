<?php
// search_results.php
/* This file displays the detailed information about a MOOC in the overlay
   when a user clicked on the "Show Me More!"-Button in the search results
   
   This file also includes the Raterater plugin for displaying a star-based rating system.
   Source: http://www.jqueryscript.net/other/Simple-Star-Rating-Plugin-with-jQuery-Font-Awesome-Raterater.html
   Last Accessed: 13.01.2016
*/
include_once "../helpers/connect_db.php";
include_once "../helpers/library.php";

?>

<!DOCTYPE HTML>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    
<!-- Star Icons for the rating system were provided by Font-Awesome: -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

<!-- The Raterater Rating Plugin stylesheet -->
<link href="../css/raterater.css" rel="stylesheet"/>

<!-- The main stylesheet -->
<link href="../css/main.css" rel="stylesheet"/>

<!-- Including the JQuery library -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    
 <!-- The Raterater Rating Plugin Javascript file -->   
    <script src="../js/raterater.jquery.js"></script>

  </head>
  <body id="overlay_body">
    <?php
        
        // If the user clicked on the "Show Me More!"-Button
        if(isset($_POST['show_mooc_details'])){

        // Store data in variables for easier use
        $my_course_title = $_POST['show_mooc_details']; // is now the course id because anything else causes trouble with special characters
        $my_provider_id = $_POST['show_mooc_prov_id'];
        $my_country_id = $_POST['show_country_id'];
        $my_city_id = $_POST['show_city_id'];
        $my_subject_id = $_POST['show_subject_id'];
 
 
/*
============================================================================================================
//Creating Queries for all necessary infos:
============================================================================================================
*/        
        $retrieve_provider_info_query = "SELECT provider_name, link_to_provider, description, 
                                                compatibility, chat_function, facebook, twitter, 
                                                google, linkedin, article1, article2, article3, article4, article5 
                                        FROM provider_table
                                        WHERE provider_id = '$my_provider_id'";
                                                
        $retrieve_course_info_query = "SELECT course_title, link, course_overview, number_of_modules, hours_of_work, assessment_type, 
                                              academic_level, credits, automation, overall_rating, rating1, rating2, rating3, rating4, rating5, id_of_payment  
                                        FROM course_table 
                                        WHERE course_id = '$my_course_title'";
        
        $retrieve_country_query= "SELECT country_name FROM country_table WHERE country_id = '$my_country_id'";
        $retrieve_city_query= "SELECT city_name FROM city_table WHERE city_id = '$my_city_id'";
        $retrieve_subject_query= "SELECT subject FROM subject_table WHERE subject_id = '$my_subject_id'";
      

      
/*
============================================================================================================
// Running the Queries: 
============================================================================================================
*/
             
        $retrieve_provider_info_result = $the_connector->query($retrieve_provider_info_query);
        $my_array_num = $retrieve_provider_info_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $provider_infos = $retrieve_provider_info_result->fetch_assoc(); 
        }
        
        $retrieve_course_info_result = $the_connector->query($retrieve_course_info_query);
        $my_array_num = $retrieve_course_info_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $course_infos = $retrieve_course_info_result->fetch_assoc(); 
        }
        
        $retrieve_country_result = $the_connector->query($retrieve_country_query);
        $my_array_num = $retrieve_country_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $country_name = $retrieve_country_result->fetch_assoc(); 
        }
        $retrieve_city_result = $the_connector->query($retrieve_city_query);
        $my_array_num = $retrieve_city_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $city_name = $retrieve_city_result->fetch_assoc(); 
        }
        $retrieve_subject_result = $the_connector->query($retrieve_subject_query);
        $my_array_num = $retrieve_subject_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $subject = $retrieve_subject_result->fetch_assoc(); 
        }


/*
============================================================================================================================
Displaying all Infos about the MOOC:
===========================================================================================================================
*/
       
    ?>
    <h3><a href='<?php echo $course_infos['link'];?>' id="my_title" target="_blank"> <?php echo $course_infos['course_title']; ?></a></h3>
    A course by: <a href="<?php echo $provider_infos['link_to_provider'];?>"><?php echo $provider_infos['provider_name']; ?></a>, 
    located in <?php echo $city_name['city_name']; ?>, <?php echo $country_name['country_name'] ?><br>
    Category: <?php echo $subject['subject']; ?> <br>
    <h5>Course Ratings:</h5>
    Rate this Course:
    <br>
    <!-- 
    HTML container for the rating widget Raterater:
    * data-id defines the unique ID of this rating box
    * data-rating defines the currently displayed rating
    -->
    <div id="my_ratebox" class="ratebox" data-id="<?php echo $my_course_title; ?>" data-rating="<?php echo $course_infos['overall_rating'];?>">
    </div>
<div id="rating_info">
    Current Average Rating: <span id="avg_rating"><?php echo $course_infos['overall_rating']; ?></span>
    <span id="avg_rating_new"></span>/5
    <br>
    Total Ratings:
    <span id="rating_total">
    <?php
    $my_rate_count = $course_infos['rating1'] + $course_infos['rating2'] + $course_infos['rating3'] + $course_infos['rating4'] + $course_infos['rating5'];
    echo $my_rate_count; 
    ?>
    </span>
    <!-- 
    Container Span tags for displaying the new total rating after a new rating was submitted and
    for displaying the "You have successfully submitted a rating." message    
    -->
    <span id="rating_total_new"></span>
    <br>
    <span id="rate_success"></span>
</div>    

<script>
// creating JS variables for the ajax request
 var my_id = "<?php echo $my_course_title; ?>";
 var my_mooc_title ="<?php echo $course_infos['course_title']; ?>";


/* This is the callback function for when a rating is submitted */
function rateAlert(id, rating)
{

   // Using $.ajax() to send the rating value to the database and store it in the entry about the course
    $.ajax({
        // The URL for the request
        url: "../rating_sys/my_ajax_rating_request.php",
        // Sending the key-value pair of the JS variable "rating" along to the script
        data: {rating: rating,
               my_course_id: my_id
        }, 
        // Whether this is a POST or GET request
        type: "POST",
        
        //What happens if the AJAX request succeeded:
        success: function(data) {
           
           // On success: update the overall_rating field:
                $.ajax({
                   url: "../rating_sys/rating_update.php",
                   data: {my_course_id: my_id},
                   type: "POST",
                   success: function(data) {
                    
                    // Parse the returned JSON data so it can be used by jQuery
                    // It is necessary here to use JSON encoding to be able to re-display the returned data in part, in different places
                    var json = $.parseJSON(data);   
                    
                    // Hide the previous rating values
                    $('#avg_rating').remove();
                    $('#rating_total').remove();

                    // Display the updated spans with json encoded data-pieces, the overall average rating and the total rating count:
                    $('#avg_rating_new').replaceWith(json.overall_rating);
                    $('#rating_total_new').replaceWith(json.my_total);
                    
                    // Update the rating value that is displayed in the stars
                    $('#my_ratebox').attr('data-rating',json.overall_rating);
                    // Disable rating by making it non-clickable
                    $("#my_ratebox").addClass("no_click");
                    //Append message that a rating was submitted
                    $('#rate_success').append("You have successfully submitted a rating.");
                   },
                }
                );
        } ,
    });
    
    
    
}

/* Here we initialize RateRater Plugin on our rating boxes and define the dimensions of the star box
 */
$(function() {
    $( '.ratebox' ).raterater( { 
        submitFunction: 'rateAlert', 
        allowChange: true,
        starWidth: 20,
        spaceWidth: 3,
        numStars: 5
    } );
});
</script>
    
    <!-- Display the Course Details  -->
    <p>
    <h5>Course Description: </h5>
    <?php echo $course_infos['course_overview']; ?>
    </p>
    <p></p>
    <span class="info_label">Number of Modules:</span> <?php echo $course_infos['number_of_modules']; ?> <br>
    <span class="info_label">Workload:</span> <?php echo $course_infos['hours_of_work']; ?> <br>
    <span class="info_label">Assessment:</span> <?php echo $course_infos['assessment_type']; ?> <br>
    <span class="info_label">Does this course award CP on completion?</span> <?php echo $course_infos['credits']; ?> <br>
    <span class="info_label">Academic Level:</span> <?php echo $course_infos['academic_level']; ?> <br>
    <span class="info_label">Type of Course:</span> <?php echo $course_infos['automation']; ?> <br>
     <?php
     // if there is any information provided for the payment of the MOOC, display it:
     if(isset($course_infos['id_of_payment'])){
         ?>
    <span class="info_label">Costs:</span>   
    <?php   
    // Switch statement to display the payment information based on the id_of_payment value
            switch ($course_infos['id_of_payment']) {
                case "1":
                    echo "This course is completely free of charge.";
                    break;
                case "2":
                    echo "This course is payed when the course starts.";
                    break;
                case "3":
                    echo "This course is payed upon completion.";
                    break;
                case "4":
                    echo "With this course, you pay for the certification only.";
                    break;
                default:
                    echo "Sorry, we could not find any payment information for this MOOC.";
            }
     }    
            ?>
    </p>
    
    <!-- Provider Information  -->
    <h5>About the Provider:</h5>
    <span class="info_label">Provider Name:</span> <a href="<?php echo $provider_infos['link_to_provider'];?>"> <?php echo $provider_infos['provider_name']; ?></a> <br>
    <p>
    <span class="info_label">Provider Description:</span> <?php echo $provider_infos['description']; ?>
    </p>
    <span class="info_label">Compatibility with mobile devices:</span> <?php echo $provider_infos['compatibility']; ?> <br>
    <span class="info_label">Provider offers a chat function:</span> <?php echo $provider_infos['chat_function']; ?>
    <p>
    <!-- Social Media Representations of the Provider -->
    <span class="info_label">Social Media Representations:</span> <br>
    <?php
    if(empty($provider_infos['facebook']) && empty($provider_infos['twitter']) && empty($provider_infos['google']) && empty($provider_infos['linkedin'])){
        echo "This provider has no representations on social media sites.";
    }
                if(!empty($provider_infos['facebook'])) {
                echo "Facebook: ";
                ?>
                <a href='<?php echo $provider_infos['facebook']; ?>' target="_blank"><?php echo $provider_infos['facebook']; ?></a>
                <?php
                }
                ?>
    <br>
                <?php 
                if(!empty($provider_infos['twitter'])) {
                echo "Twitter: ";
                ?>
                <a href='<?php echo $provider_infos['twitter']; ?>' target="_blank"><?php echo $provider_infos['twitter']; ?></a>
                <?php
                }
                ?>
    <br>
                <?php 
                if(!empty($provider_infos['google'])) {
                echo "GooglePlus: ";
                ?>
                <a href='<?php echo $provider_infos['google']; ?>' target="_blank"><?php echo $provider_infos['google']; ?></a>
                <?php
                }
                ?>
    <br>
                <?php 
                if(!empty($provider_infos['linkedin'])) {
                echo "LinkedIn: ";
                ?>
                <a href='<?php echo $provider_infos['linkedin']; ?>' target="_blank"><?php echo $provider_infos['linkedin']; ?></a>
                <?php
                }
            ?>
    </p>
    <p>
    <span class="info_label">The Press says:</span><br><br>
    <?php if($provider_infos['article1']=='' && $provider_infos['article2']=='' && $provider_infos['article3']=='' && $provider_infos['article4']=='' && $provider_infos['article5']=='')
          { echo "Nothing."; }
          else {
            if($provider_infos['article1']!='')
            { echo $provider_infos['article1'];
            } ?> <div class="spacer"></div> <?php
            if($provider_infos['article2']!='')
            { echo $provider_infos['article2'];
            } ?> <div class="spacer"></div> <?php
            if($provider_infos['article3']!='')
            { echo $provider_infos['article3'];
            } ?> <div class="spacer"></div> <?php
            if($provider_infos['article4']!='')
            { echo $provider_infos['article4'];
            } ?> <div class="spacer"></div> <?php
            if($provider_infos['article5']!='')
            { echo $provider_infos['article5'];
            } ?> <div class="spacer"></div> <?php
          }
  }
   ?>
   </p>
  </body>
</html>