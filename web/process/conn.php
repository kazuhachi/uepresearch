<?php
	// $hostname = "localhost";
	// $username = "viewer";
	// $password = "Fiom9yrxnBFZpe8B";
	// $database = "uep_research";
	// $conn = mysqli_connect( $hostname , $username, $password, $database)or die("error connection"); // open

	require("../../-r-conns/conn.php");
	include_once("browser-info.php");
	require("../../-r-conns/token.php");
	
	session_start();


	echo "asdasd". (checkToken() ? "not null": "is null") . "Asdasd";


	// echo password_hash("passwordcat", PASSWORD_DEFAULT);

?>