<?php 
	if (session_status() !== PHP_SESSION_ACTIVE) 
		session_start();
	include "./app/user.php";
	unset($_SESSION['user']);
	session_destroy();
	header("Location: index.php");
?>