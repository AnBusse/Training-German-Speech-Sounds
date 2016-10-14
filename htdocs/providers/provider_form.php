<?php
// This is the form for inserting data into the database. It sends its data to provider_db_script.php
// include helper-functions
include_once "../helpers/connect_db.php";
include_once "../helpers/library.php";
// require "../map/h_map.php";

// check if the user logged in by checking if the login-cookies were set. if not, redirect to the login script.
if (!isset($_COOKIE["my_username"]) || (!isset($_COOKIE["my_pw"])))
{
    header('location: ../admin_access_files/admin_access.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="../css/form_check_styles.css">
      <link rel="stylesheet" href="../css/main.css">
      <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
      <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
        <title>Adding a Provider Form</title>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
        $(document).ready(function() {
           //initializes the map
            			map_initialize();
        })
        </script>
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
                    	        <li><a href="../courses/course_form.php">Add a MOOC</a></li>
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
    <h2>Adding A Provider - Part 1</h2>
    <h3>City and Country Data into the DB</h3>
        <?php my_print_error_message('database'); ?>
        <?php my_print_notification('database'); ?>
    <form action="city_country_db_script.php" method="post">
    
    <div class="my-row<?php my_highlight('my_new_country'); ?>">
      <?php my_print_notification('my_new_country'); ?>
        <label for="my_new_country" class="label-left">Country of Origin:</label> <br>
          <input type="text" name="my_new_country" id="my_new_country"
          <?php if (isset($_POST['my_new_country'])) { my_print_value_attribute($_POST['my_new_country']); } ?>
          >
         <?php my_print_error_message('my_new_country'); ?>
    </div>
        
      <div class="my-row<?php my_highlight('my_new_city'); ?>">
        <?php my_print_notification('my_new_city'); ?>
          <label for="my_new_city" class="label-left">City:</label> <br>
          <input type="text" name="my_new_city" id="my_new_city"
          <?php if (isset($_POST['my_new_city'])) { my_print_value_attribute($_POST['my_new_city']); } ?>
          >
          <?php my_print_error_message('my_new_city'); ?>
      </div>
      <input type="submit" value="Submit City and Country Names" name="city_country_submit" class="styled_button">
      </form>
   <br><br>
     
     
     
     
    <h2>Adding A Provider - Part 2</h2>
    <form action="provider_db_script.php" method="post" class="prov_form">
        
      <div class="my-row<?php my_highlight('provider_name'); ?>">
        <label for="provider_name" class="label-left">Provider Name:</label> <br>
          <input type="text" name="provider_name"
          <?php if (isset($_POST['provider_name'])) { my_print_value_attribute($_POST['provider_name']); } ?>
          >
          <?php my_print_error_message('provider_name'); ?>
      </div>
      
      <div class="my-row<?php my_highlight('link_to_provider'); ?>">
        <label for="link_to_provider" class="label-left">Link to Provider:</label> <br>
          <input type="text" name="link_to_provider"
          <?php if (isset($_POST['link_to_provider'])) { my_print_value_attribute($_POST['link_to_provider']); } ?>
          >
          <?php my_print_error_message('link_to_provider'); ?>
      </div>
      
      <div class="my-row<?php my_highlight('country'); ?>">
        <label for="country" class="label-left">Country of Origin:</label> <br>
      <!--     
      <input list="countries" name="country" id="country">
         <datalist id="countries"> 
      -->
      <select name="country" id="country">
        <option name="dummy_country">Please select a country</option>
        <?php
       //selects the country name and id
       $retrieve_location_query = 'SELECT country_name, country_id FROM country_table';
      $retrieve_location_result = $the_connector->query($retrieve_location_query);
         if ($retrieve_location_result->num_rows > 0) { 
           for ($i = 0; $i < $retrieve_location_result->num_rows; $i++) { 
             $location = $retrieve_location_result->fetch_assoc(); 
			
			        $country = $location['country_name'];
			        $country_id = $location['country_id'];
	
        ?>
              <!--    <option value="<?php //echo $country;?>"> -->
            <!-- options are the slots that fill the data list. The following uses php to echo all of the countries in the associative array (generated by the above query), as options, into the datalist ->
             <!-- note* in order to fill the datalist option slots with ALL items in the array, it must be within the for loop that generates the array -->
              <option value="<?php echo $country_id;?>"
              <?php
              // on errorous submission attempt, display the previously selected item as selected again
                if(isset($_POST['country']) && $_POST['country'] == $country_id) 
         		    echo 'selected= "selected"';
        			?>
              > 
              <?php echo $country;?>
              </option>
        <?php
         }
      	}
        ?>
        </select>
     <!--     </datalist>  -->
          <?php my_print_error_message('country'); ?>
        </div>
        
      <div class="my-row<?php my_highlight('city'); ?>">
        <label for="city" class="label-left">City:</label> <br>
       <!--       <input list="cities" name="city" id="city">
     <datalist id="cities"> -->
     <select name="city" id="city">
      <option name="dummy_city">Please select a city</option>
<?php
       //selects the city name and id
       $retrieve_location_query = 'SELECT city_name, city_id FROM city_table';
      $retrieve_location_result = $the_connector->query($retrieve_location_query);
         if ($retrieve_location_result->num_rows > 0) { 
           for ($i = 0; $i < $retrieve_location_result->num_rows; $i++) { 
             $location = $retrieve_location_result->fetch_assoc(); 
			
			        $city = $location['city_name'];
			        $city_id = $location['city_id'];

?>
            <!--      <option value="<?php //echo $city;?>"> -->
            <option value="<?php echo $city_id;?>"
            <?php
      			// on errorous submission attempt, display the previously selected item as selected again
              // on errorous submission attempt, display the previously selected provider as selected again
                if(isset($_POST['city']) && $_POST['city'] == $city_id) 
         		    echo 'selected= "selected"';
        			?>
            >
              <?php echo $city;?>
            </option>
<?php
         }
      	}
?>
    </select>
      <!--    </datalist>  -->
    <?php my_print_error_message('city'); ?>
    </div>
        
        <div class="my-row<?php my_highlight('coordinates'); ?>">
        <label for="coordinates" class="label-left">Coordinates:</label> <br>
          <input type="text" name="coordinates"
          <?php if (isset($_POST['coordinates'])) { my_print_value_attribute($_POST['coordinates']); } ?>
          > <br>
          Example: 50.8100&deg; N, 8.7708&deg; E <br> 
          <?php my_print_error_message('coordinates'); ?>
        </div>
        
        <div class="my-row<?php my_highlight('description'); ?>">
        <label for="description"  class="label-left">Platform Description:</label> <br>
          <textarea name="description" rows="8" cols="50"><?php if (isset($_POST['description'])) { echo $_POST['description']; } ?></textarea>
          <?php my_print_error_message('description'); ?>
        </div>
        
         <div class="my-row">
          <label for="article1"  class="label-left">Articles (One per field, please)</label> <br>
          <textarea name="article1" rows="3" cols="50"><?php if (isset($_POST['article1'])) { echo $_POST['article1']; } ?></textarea>
          <br>
          <textarea name="article2" rows="3" cols="50"><?php if (isset($_POST['article2'])) { echo $_POST['article2']; } ?></textarea>
          <br>
          <textarea name="article3" rows="3" cols="50"><?php if (isset($_POST['article3'])) { echo $_POST['article3']; } ?></textarea>
          <br>
          <textarea name="article4" rows="3" cols="50"><?php if (isset($_POST['article4'])) { echo $_POST['article4']; } ?></textarea>
          <br>
          <textarea name="article5" rows="3" cols="50"><?php if (isset($_POST['article5'])) { echo $_POST['article5']; } ?></textarea>
        </div>
        <div class="my-row<?php my_highlight('chat'); ?>">
          <label for="chat">Inbuilt chat function?</label> <br>
          <input type="radio" name="chat" value="Yes"
          <?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['chat']) && $_POST['chat'] == "Yes") { echo " checked"; } 
					?>
          >Yes<br>
          <input type="radio" name="chat" value="No"
          <?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['chat']) && $_POST['chat'] == "No") { echo " checked"; } 
					?>
          >No <br>
          <input type="radio" name="chat" value="NA"
          <?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['chat']) && $_POST['chat'] == "NA") { echo " checked"; } 
					?>
          >No information available <br>
        <?php my_print_error_message('chat'); ?>
        </div>
        
        <div class="my-row<?php my_highlight('mobile'); ?>">
          <label for="mobile">Compatibility with mobile devices?</label> <br>
          <input type="radio" name="mobile" value="Yes"
          <?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['mobile']) && $_POST['mobile'] == "Yes") { echo " checked"; } 
					?>
          >Yes<br>
          <input type="radio" name="mobile" value="No"
          <?php
					// on errorous submission attempt, display the previously selected radio button as checked again
					if (isset($_POST['mobile']) && $_POST['mobile'] == "No") { echo " checked"; } 
					?>
          >No <br>
        <?php my_print_error_message('chat'); ?>
        </div>
        
        
        <div class="my-row<?php my_highlight('media'); ?>">
          <p>
          <label for="flink"class="label-left">Links to Social Media Accounts / Profiles <br>
          (if there is none, just leave the field empty)</label>
          </label>
          </p>
          <table>
            <tr>
              <td>Facebook:</td>
              <td><input type="text" name="flink"
                  <?php if (isset($_POST['flink'])) { my_print_value_attribute($_POST['flink']); } ?>
                  ></td>
            </tr>
            <tr>
              <td>Twitter:</td>
              <td><input type="text" name="twitter_link"
              <?php if (isset($_POST['twitter_link'])) { my_print_value_attribute($_POST['twitter_link']); } ?>
              ></td>
            </tr>
            <tr>
              <td>GooglePlus:</td>
              <td><input type="text" name="google_link"
              <?php if (isset($_POST['google_link'])) { my_print_value_attribute($_POST['google_link']); } ?>
              ></td>
            </tr>
            <tr>
              <td>LinkedIn: </td>
              <td><input type="text" name="linkedin_link"
              <?php if (isset($_POST['linkedin_link'])) { my_print_value_attribute($_POST['linkedin_link']); } ?>
              ></td>
            </tr>
           </table>
        </div>
        <br>
      <input type="submit" value="Submit" name="provider_submit"  class="styled_button">
    </form>
    </div>
    <div id="prov_map" style="width: 400px">
      
    </div>
</div>

</div>
    </body>
</html>