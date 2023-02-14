<?php

	ob_start();
	session_start();
	$timeZone = date_default_timezone_set('America/Toronto');
	$con = mysqli_connect("localhost", "root","","Portal");

	if(mysqli_connect_errno()){
		echo "Failed to connect to database" . mysqli_connect_errno();
	}

?>