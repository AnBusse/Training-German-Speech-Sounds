<?php
/* 
    this is the AJAX script for retrieving the updated overall_rating from the database, 
    triggered if a user sucessfully submitted a rating to the database
*/

// connect to database
require "../helpers/connect_db.php";

// Storing the passed on AJAX data in a variable for usage in this script:
$my_course_id = $_POST['my_course_id'];

// Querying for the updated rating results:
$my_updated_rating_query = "SELECT overall_rating, rating1, rating2, rating3, rating4, rating5 FROM course_table WHERE course_id = ". $my_course_id;
$my_updated_rating_result = $the_connector->query($my_updated_rating_query);

// Store the result in an array:
$my_array_num = $my_updated_rating_result->num_rows;
                           for ($i = 0; $i < $my_array_num; $i++) { 
                             $updated_ratings_val = $my_updated_rating_result->fetch_assoc(); 
        }
// Storing the updated rating values in a variable
$my_new_val = $updated_ratings_val['overall_rating'];
$my_total = $updated_ratings_val['rating1'] + $updated_ratings_val['rating2'] + $updated_ratings_val['rating3'] + $updated_ratings_val['rating4'] + $updated_ratings_val['rating5'];


// Add the new total to the array
$updated_ratings_val['my_total'] = $my_total;


// JSON-encode data here so it can be imported by ajax properly
echo json_encode($updated_ratings_val);
?>
