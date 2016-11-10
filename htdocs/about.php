<?php
// about.php
// Contains information about this project 
?>

<!DOCTYPE HTML>
<html>
        <head>
        	<meta charset="UTF-8">
            <link rel="stylesheet" href="css/main.css"/>
            <link rel="icon" type="image/png" href="../images/favicon-96x96.png" sizes="96x96" />
            <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
            <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
            <title>About MOOCBase</title>    
        </head>
    <body>
            <div class="my_header">
        		<div> 
        			<img src="images/logo.png" alt="Moocbase_Logo" class="logo">
        		</div>    	
    	
                <div class="my_headlines">
        			<h1>Welcome to MOOCBASE</h1>
        			<h2>Find the MOOC that's right for you</h2>
        		</div>
            
            <div class="nav_container">
            	<!-- dropdown container -->
            	<div class="dropdown_container">
            	    <!-- trigger button -->
            	    <button>Navigation</button>
            	    <!-- dropdown menu -->
            	    <ul class="my_drop_list">
            	        <li><a href="admin_access_files/admin_access.php">Administrator Access</a></li>
            	        <li><a href="index.php">Home</a></li>
            	        <li><a href="about.php">About</a></li>
            	    </ul>
            	</div>
            </div>
        </div>
        <div id="main_content_about">
            <h3>About MOOCBase</h3>
            <p>
                MOOCBase is an online-tool, created by Andrea Busse, Matthew Fisher and Isabelle Kraft, that is dedicated to help you find the MOOC you always wanted to take.
                A MOOC is defined as:
                <p><a href="https://en.wikipedia.org/wiki/Massive_open_online_course">"an online course aimed at unlimited participation and open access via the web."</a></p>
            </p>
            <p>The database of MOOCs underlying MOOCBase is up-to-date to the best of the creators' knowledge, as per February 2016.</p>
        </div>
    </body>
