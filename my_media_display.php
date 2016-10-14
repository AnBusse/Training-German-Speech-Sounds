<?php
/* This file contains the media display function */
	function my_media_display($my_id, $my_url, $my_url2, $my_div_class_audio, $my_div_class_video, $my_audio_tag_class, $my_video_tag_class) {
		
	//	If strpos finds the .mp3 ending in the url piece in from the database, display an audio element:
									if (strpos($my_url, '.mp3') !== false) {
									?>
									<div class="<?php echo $my_div_class_audio; ?>">
										<audio controls class="media" id="<?php echo $my_id; ?>">
											  <source src="../../media/<?php echo $my_url; ?>" type="audio/mpeg">
											  <source src="../../media/<?php echo $my_url2; ?>" type="audio/wav">
											  Your browser does not support the audio tag.
										</audio>
									</div>
								
									<?php								
									}
									//	If strpos finds the .mp4 ending in the url_to_file, display a video element:
									elseif (strpos($my_url, '.mp4') !== false){
									?>
								
									<div class="<?php echo $my_div_class_video; ?>"><!--  --> 
											<video class="media" width="300" id="<?php echo $my_id; ?>" controls preload="metadata">
												<source src="../../media/<?php echo $my_url; ?>" type="video/mp4">
												<source src="../../media/<?php echo $my_url2; ?>" type="video/ogg">
												Your browser does not support the video tag.
											</video>
										</div>
									<?php
										}
										
  }
?>