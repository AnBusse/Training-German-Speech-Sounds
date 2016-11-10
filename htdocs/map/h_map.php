<?php
		//need that data!
	require 'helpers/connect_db.php';
	
	
		//selects provider info
	$retrieve_mooc_query = 'SELECT provider_name, provider_id, coordinates, id_of_country, id_of_city, link_to_provider, country_name, city_name 
								FROM provider_table, country_table, city_table
								WHERE id_of_country = country_id AND id_of_city = city_id';
								$retrieve_mooc_result = $the_connector->query($retrieve_mooc_query);
					
	
	// retrieves the course titles and links to the courses							
			//nothing happens if there is no data. 
		if ($retrieve_mooc_result->num_rows > 0) { 
		
?>

<script> 
	//The map pin icons
		var normal = 'map/img/pin1.png';
		var selected = 'map/img/pin3.png';
	
		//the following script is for google maps. Creates the map, loads markers. 
	function map_initialize() {

			//coordinates for the center of the map
		var center = { lat: 18.8387441, lng: 17.1136065 };
			
				//creates the map
			var map = new google.maps.Map(document.getElementById('my_map'), {
			zoom: 1,
			center: center
		});
	
		

		/*the following php is used to create variables in the maps api from the data in the database. */
<?php  
	
				// this loop is used to generates PHP variables containing data that are then used to creat JS variables for use in the map.
			for ($i = 0; $i < $retrieve_mooc_result->num_rows; $i++) { //$i controls number of iterations. 
				$moocs = $retrieve_mooc_result->fetch_assoc(); //fetch associative array (one row at a time). 
			
					$id = $moocs['provider_id'];
					$name = $moocs['provider_name'];
					$coord = $moocs['coordinates'];
					$city = $moocs['city_name'];
					$country = $moocs['country_name'];
					$link = $moocs['link_to_provider'];
					
				
			//creates a variable for gps that google maps can read to place a pin at the provider coordinates
		$coord_array = explode(",", $coord);
		$latlng = '{ lat: ' . $coord_array[0] . ',  lng: ' . $coord_array[1] . '  }';
		
		
		
?> 
			//used to tell if a pin is selected or not
		pin_<?php echo $id; ?>_selected = 0;
		
			//generates the contents for the infowindow from the database
		var pin_<?php echo $id; ?>info = "<p style='color:black'><?php echo $name;?></p>" +
										 "<p style='color:black'>Country: <?php echo $country;?></p>" +
										 "<p style='color:black'>City: <?php echo $city;?></p>" +
										 "<form action='map/map_window.php' method='post' target='my_frame' style='max-width: 200px'>" +
			    							'<input type="hidden" name="mooc_prov" value="<?php echo $name;?>"/>' +
				//overlay containing course list 
				'<button type="submit" rel="#overlay1" class="overlay-link" name="my_link" id="my_link">Show List of MOOCs</button>' +
				'</form>';
										
		
			//declaring the infowindow 
		var infowindow = new google.maps.InfoWindow({
			//content is inserted later
		});
		
			//creates a new unique marker using an id number  ie.(pin_1_marker)
		pin_<?php echo $id; ?>marker = new google.maps.Marker({
			position: <?php echo $latlng; ?>,
			map: map,
		}); 
		
			//sets markers to the default color (normal)
		pin_<?php echo $id; ?>marker.setIcon(normal);
		
			//the name of the provider appears when the user hovers over a pin
		pin_<?php echo $id; ?>marker.setTitle('<?php echo $name; ?>');
		
			//sets all pins to the default icon when the map is clicked
		google.maps.event.addListener(map, 'click', function() {	
			pin_<?php echo $id; ?>marker.setIcon(normal);
	
		});
		
			//when the infowindow is closed the a "click" is triggered on the map, setting pins to the default icon
		google.maps.event.addListener(infowindow, 'closeclick', function() {
			google.maps.event.trigger(map, 'click');
		});
		
			//when the icon of a marker is changed the infowindow will close, this means the window closes when the map is clicked
		google.maps.event.addListener(pin_<?php echo $id; ?>marker, 'icon_changed', function() {
			infowindow.close(map, pin_<?php echo $id; ?>marker);
		});

			//when a map pin is clicked 
		google.maps.event.addListener(pin_<?php echo $id; ?>marker, 'click', function() {
			pin_<?php echo $id; ?>marker.setIcon(normal);
				//clicking the pin triggers a "click" on the map which resets all pins to the default icon
			google.maps.event.trigger(map, 'click');
			
				//if the pin was not previously selected
			if (pin_<?php echo $id; ?>_selected == 0) {
					
						//sets the pin to the selected icon
					pin_<?php echo $id; ?>marker.setIcon(selected);		
					
						//sets variable to selected
					pin_<?php echo $id; ?>_selected =1; 
						
						//opens the info window 
					infowindow.open(map, this);	
					
						//fills the info window with the relevant information for the pin that was clicked
					infowindow.setContent(pin_<?php echo $id; ?>info);
			}
			
				//if the pin was already selected
			else {
					//sets variable to unselected
				pin_<?php echo $id; ?>_selected =0; 
			}
		});
		
<?php      
		


	} 
 }
 

?>
	
}


</script>
