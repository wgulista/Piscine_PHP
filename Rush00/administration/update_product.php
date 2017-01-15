<?php

	include "../app/user.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = intval($_GET['id']);

		if (is_numeric($id)) {
			include "../app/bdd.php";
			mysqli_query($bdd, "DELETE FROM products WHERE id=".$id.";");
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_product.php">';
		} else {
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_product.php">';
		}
	} else {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_product.php">';
	}

?>