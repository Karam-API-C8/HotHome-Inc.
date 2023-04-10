<?php

	ob_start();
	session_start();

	  
   
        
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            session_destroy();
            header('Location: register.php');
            exit;
        }
        if (isset($_GET['action']) && $_GET['action'] == 'logoout') {
            session_destroy();
            header('Location: adminLogin.php');
            exit;
        }

    
    
	$timeZone = date_default_timezone_set('America/Toronto');
	$con = mysqli_connect("localhost", "root","","Portal");

	if(mysqli_connect_errno()){
		echo "Failed to connect to database" . mysqli_connect_errno();
	}

?>