<?php 

	try {
		$bdd = mysqli_connect("localhost", "root", "");

		if ($bdd === false) {
		    die("<br/>ERROR: Could not connect. " . mysqli_connect_error());
		}

		/* ============================================
			CREATE DATABASE
		=============================================*/
		$dbname = "CREATE DATABASE IF NOT EXISTS minishop;";
		if (mysqli_query($bdd, $dbname)) {
		    echo "<br/>Database minishop created successfully;<br/>";
		} else {
		    echo "<br/>ERROR: Could not able to execute $dbname.<br/>" . mysqli_error($bdd);
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
		    echo "<br/>User table created successfully;<br/>";
		} else {
		    echo "<br/>ERROR: Could not able to execute $users.<br/>" . mysqli_error($bdd);
		}

		// Create cart table
		$categories = "CREATE TABLE IF NOT EXISTS categories(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL
		)";
		if (mysqli_query($bdd, $categories)) {
		    echo "<br/>Categories table created successfully;<br/>";
		} else {
		    echo "<br/>ERROR: Could not able to execute $categories.<br/>" . mysqli_error($bdd);
		}

		// Create product table
		$products = "CREATE TABLE IF NOT EXISTS products(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			content TEXT NULL,
			image VARCHAR(255) NULL,
			price DOUBLE DEFAULT 0,
			quantity INT DEFAULT 0,
			category_id INT NOT NULL
		)";
		if (mysqli_query($bdd, $products)) {
		    echo "<br/>Product table created successfully;<br/>";
		} else {
		    echo "<br/>ERROR: Could not able to execute $products.<br/>" . mysqli_error($bdd);
		}

		// Create cart table
		$carts = "CREATE TABLE IF NOT EXISTS carts(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			user_id INT NOT NULL,
			product_id INT NOT NULL,
			valid TINYINT NOT NULL
		)";
		if (mysqli_query($bdd, $carts)) {
		    echo "<br/>Cart table created successfully;<br/>";
		} else {
		    echo "<br/>ERROR: Could not able to execute $carts.<br/>" . mysqli_error($bdd);
		}

		mysqli_close($bdd);
	} catch (Exception $e) {
		die("Creation des tables echoue !");
	}

?>