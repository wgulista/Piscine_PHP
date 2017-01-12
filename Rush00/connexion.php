<?php
	if (session_status() !== PHP_SESSION_ACTIVE) 
		session_start();
	if (isset($_POST)) {
		include "./app/bdd.php";
		include "./app/user.php";

		$user = getUser($_POST);
		if (!empty($user) && connectUser($user)) {
			$_SESSION['flash']['connect'] = "Vous etes maintenant connecte";
			header("Location: index.php");
		} else {
			$_SESSION['flash']['connect'] = "Login ou mot de passe incorrect";
			header("Location: index.php");
		}
	}
?>	