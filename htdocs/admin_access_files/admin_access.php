<?php
// This file appears when the user clicks the admin access button on the main page of MOOCBase.
?>

<!DOCTYPE HTML>
<html>
    <head>
            <link rel="stylesheet" href="../css/main.css">
            <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
            <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
            <meta charset="UTF-8">
            
            <title>MOOCBase Admin Access</title>
    </head>
    <body>
        <div class="main_wrapper">
            <div class="my_header">
        		<div class="my_logo"> 
        			<img src="../images/logo.png" alt="Moocbase_Logo" class="logo" id="admin_logo">
        		</div>    	
    	       <div class="my_nav">
                    <div class="left-align">
                    	<!-- dropdown container -->
                    	<div class="dropdown_container">
                    	    <!-- trigger button -->
                    	    <button>Navigation</button>
                    	    <!-- dropdown menu -->
                    	    <ul class="my_drop_list">
                    	        <li><a href="../index.php">Home</a></li>
                    	        <li><a href="../about.php">About</a></li>
                    	    </ul>
                    	</div>
                    </div>
			    </div>
                <div class="my_headlines" id="access">
        			<h2>Welcome to the Administrator's Interface of MOOCBASE</h2>
        			<h3>Find the MOOC that's right for you</h3>
        			<h4>Please log in to proceed:</h4>
        		</div>
        		

        </div>		
        
        	<div id="main_content_admin">
                
                    <div id="my_login">
                        <form action="../helpers/secure.php" method="post">
                            <table>
                            <tr>
                            <td><label for="my_user">Username:</label></td>
                            <td><input type="text" name="my_user"><br></td>
                            </tr>
                            <tr>
                            <td><label for="my_pw">Password:</label></td>
                            <td><input type="password" name="my_pw"><br></td>
                            </tr>
                            <tr><td><input type="submit" value="Log In" name="my_pw_submit" class="styled_button"></td></tr>
                            </table>
                        </form>
                    </div>
            </div>

        </div>
    </body>
</html>