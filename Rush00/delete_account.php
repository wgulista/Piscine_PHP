<?php 
	if (session_status() !== PHP_SESSION_ACTIVE) 
		session_start();
	include "./app/user.php";

	if (estConnecte()) {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
	
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = intval($_GET['id']);
		settype($id, 'integer');
		include "./app/bdd.php";
		$res = mysqli_query($bdd, "SELECT id FROM users WHERE id=".$id.";");
		if (($d = mysqli_fetch_assoc($res))) {
			unset($_SESSION['user']);
			session_destroy();
			mysqli_query($bdd, "DELETE FROM users WHERE id=".$d['id'].";");
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		} else {
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		}
	} else {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}

?>