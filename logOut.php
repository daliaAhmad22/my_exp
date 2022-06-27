<?php  
	session_start(); //start the session

	session_unset(); //Unset the data

	session_destroy();  //Destroy the session

	header('location:login.php');
	exit();

?>