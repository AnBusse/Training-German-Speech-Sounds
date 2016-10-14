<?php
/*
map_window.php for displaying the MOOC list for the map interface
*/
include_once "../helpers/connect_db.php";

$prov_title = $_POST['mooc_prov'];

 $retrieve_mooclist_query = "SELECT course_id, course_title, link FROM course_table
                                        WHERE id_of_provider = (SELECT provider_id FROM provider_table WHERE provider_name ='" . $prov_title . "')";

                      $retrieve_mooclist_result = $the_connector->query($retrieve_mooclist_query);
                	  $my_list_num = $retrieve_mooclist_result->num_rows;
                	  ?>
                	  <div style="font-family: Verdana, Geneva, sans-serif;">
                	  <h2><?php echo $prov_title; ?></h2>
                	  <h4>offers the following MOOCs:</h4>
                	     <ul>
                	  <?php
                           for ($i = 0; $i < $my_list_num; $i++) { 
                             $list_arr = $retrieve_mooclist_result->fetch_assoc();
                             ?><li><a href='<?php echo $list_arr['link'];?>' style="text-decoration: none; color: black" target="_blank">
                             <?php
                             echo $list_arr['course_title'];
                             ?>
                             </a></li>
                    <?php
                           }
                    ?>
                        </ul>
                        </div>