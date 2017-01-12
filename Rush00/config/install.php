<?php 

	try {
		$bdd = mysqli_connect("localhost", "root", "");

		if ($bdd === false) {
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		/* ============================================
			CREATE DATABASE
		=============================================*/
		$dbname = "CREATE DATABASE IF NOT EXISTS minishop;";
		if (mysqli_query($bdd, $dbname)) {
		    echo "Database minishop created successfully;<br/>";
		} else {
		    echo "ERROR: Could not able to execute $dbname.<br/>" . mysqli_error($bdd);
		}
		mysqli_close($bdd);
		
	} catch (Exception $e) {
		die("Creation de la base de donnee echoue");
	}


	try {
		$bdd = mysqli_connect("localhost", "root", "", "minishop");
		$users = "CREATE TABLE IF NOT EXISTS users(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			login VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			rights INT NOT NULL
		)";
		if (mysqli_query($bdd, $users)) {
		    echo "User table created successfully;<br/>";
		} else {
		    echo "ERROR: Could not able to execute $users.<br/>" . mysqli_error($bdd);
		}

		// Create product table
		$products = "CREATE TABLE IF NOT EXISTS products(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			content TEXT NULL
		)";
		if (mysqli_query($bdd, $products)) {
		    echo "Product table created successfully;<br/>";
		} else {
		    echo "ERROR: Could not able to execute $products.<br/>" . mysqli_error($bdd);
		}

		// Create cart table
		$carts = "CREATE TABLE IF NOT EXISTS carts(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			user_id INT NOT NULL,
			product_id INT NOT NULL
		)";
		if (mysqli_query($bdd, $carts)) {
		    echo "Cart table created successfully;<br/>";
		} else {
		    echo "ERROR: Could not able to execute $carts.<br/>" . mysqli_error($bdd);
		}

		mysqli_close($bdd);
	} catch (Exception $e) {
		die("Creation des tables echoue");
	}

?>