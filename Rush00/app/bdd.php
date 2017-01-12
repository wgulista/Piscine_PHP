<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$base = "minishop";
	$bdd = null;

	try {
		$bdd = mysqli_connect($host, $user, $pass, $base);
		if ($bdd === false) {
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	} catch (Exception $e) {
		die("Connexion a la base de donnee echoue !");
	}

	/**
	 * Recupere tout les produits
	 * @param $ids correspond au id des produits
	 */
	function getAllProducts()
	{
		$req = mysqli_prepare($bdd, 'SELECT * FROM products;');
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $d['id'], $d['name'], $d['content'], $d['price']);
		while (mysqli_stmt_fetch($req)) {
			$resultat[] = $d;
		}
		return ($resultat);
	}

	/**
	 * Recupere les produits ainsi que le prix
	 * @param $ids correspond au id des produits
	 */
	function getProducts($ids)
	{
		$req = mysqli_prepare($bdd, 'SELECT id, price FROM products WHERE id IN (?);');
		mysqli_stmt_bind_param($req, "i", implode(",", $ids));
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $d['id'], $d['price']);
		while (mysqli_stmt_fetch($req)) {
			$resultat[] = $d;
		}
		return ($resultat);
	}

	/**
	 * Recupere un produit avec son prix
	 * @param $id_prod correspond a l'id du produit
	 */
	function getOneProduct($id_prod)
	{
		$req = mysqli_prepare($bdd, 'SELECT id, price FROM products WHERE id=?;');
		mysqli_stmt_bind_param($req, "i", $id);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $d['id'], $d['price']);
		while (mysqli_stmt_fetch($req)) {
			$resultat[] = $d;
		}
		return ($resultat);
	}
?>