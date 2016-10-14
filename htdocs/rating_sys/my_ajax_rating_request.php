<?php
/* 
    this is the AJAX script for storing the ratings to the database, 
    triggered if a user submits a rating
*/

// connect to database
require "../helpers/connect_db.php";

// Which Course is the Rating for?
$my_course_id = $_POST['my_course_id'];

// Which Rating Value did the user submit?
$my_rating_value = $_POST['rating'];


// Start building the Update Query for updating the RatingX DB field:
$my_rating_update = "UPDATE course_table SET ";

// Switch statement to define which database rating field a value needs to be added to:
switch ($my_rating_value) {
    case "1":
        $my_rating_update .= "rating1 = rating1+1 WHERE ";
        break;
    case "2":
        $my_rating_update .= "rating2 = rating2+1 WHERE ";
        break;
    case "3":
        $my_rating_update .= "rating3 = rating3+1 WHERE ";
        break;
    case "4":
        $my_rating_update .= "rating4 = rating4+1 WHERE ";
        break;
    case "5":
        $my_rating_update .= "rating5 = rating5+1 WHERE ";
        break;
    default:
        echo "Rating could not be stored.";
}

// Run the rating-field Update Query:
$my_rating_update.= "course_id = ". $my_course_id;
$my_rating_result = $the_connector->query($my_rating_update);

// Query for all single star-rating values:
$my_get_single_ratings = "SELECT rating1, rating2, rating3, rating4, rating5 FROM course_table WHERE course_id = " . $my_course_id;
$my_single_ratings_result = $the_connector->query($my_get_single_ratings);

// Store the results in an array:
$my_array_num = $my_single_ratings_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $single_ratings_infos = $my_single_ratings_result->fetch_assoc(); 
        }

// Store the rating values in variables:
$my_1ratings = $single_ratings_infos['rating1'];
$my_2ratings = $single_ratings_infos['rating2'];
$my_3ratings = $single_ratings_infos['rating3'];
$my_4ratings = $single_ratings_infos['rating4'];
$my_5ratings = $single_ratings_infos['rating5'];

//Calculate new overall_rating value (the average rating):
$my_new_overall_rating = ($my_1ratings + $my_2ratings*2 + $my_3ratings*3 + $my_4ratings*4 + $my_5ratings*5) / ($my_1ratings + $my_2ratings + $my_3ratings + $my_4ratings + $my_5ratings);

// Update the overall_rating field of the course:
$my_overall_rating_update = "UPDATE course_table SET overall_rating = " . $my_new_overall_rating . " WHERE course_id = ". $my_course_id;
$my_overall_rating_result = $the_connector->query($my_overall_rating_update);


?>