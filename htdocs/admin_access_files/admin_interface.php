<?php
// This is the admin interface page that includes all insertion forms

// Check if the user logged in by checking if the login-cookies were set. if not, redirect to the login script.
if (!isset($_COOKIE["my_username"]) || (!isset($_COOKIE["my_pw"])))
{
    header('location: ../admin_access.php');
    exit;
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <script>
        </script>

        <title>MOOCBase Admin Interface</title>
            <link rel="stylesheet" href="../css/main.css">
            <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
            <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
    </script>
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
                    	        <li><a href="../providers/provider_form.php">Add a MOOC Provider</a></li>
                    	        <li><a href="../courses/course_form.php">Add a MOOC</a></li>
                    	        <li><a href="../about.php">About</a></li>
                    	        <li><a href="../index.php">Home</a></li>
                    	    </ul>
                    	</div>
                    </div>
			    </div>
                <div class="my_headlines" id="access">
        			<h2>Welcome to the Administrator's Interface of MOOCBASE</h2>
        			<h3>Find the MOOC that's right for you</h3>
        		</div>
        		
        </div>		
        
        	<div id="main_content_admin" style="font-weight: 600;">
            <p><a href="../providers/provider_form.php">Add a Provider</a></p>
            <p><a href="../courses/course_form.php">Add a Course</a></p>
            <p><a href="../index.php">Home</a></p>
            </div>

        </div>
       
    </body>
</html>