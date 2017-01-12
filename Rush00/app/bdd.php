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
	 * Recupere le chiffre d'affaire
	 * @param $id_client correspond a l'id client
	 */
	function getCA($id_client)
	{
		$req = mysqli_prepare($bdd, 'SELECT CA FROM client WHERE id=?;');
		mysqli_stmt_bind_param($req, "i", $id);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $donnees['CA']);
		while (mysqli_stmt_fetch($req))
			$resultat['CA'] = $donnees['CA'];
		return ($resultat);
	}

	/**
	 * Recupere les produits ainsi que le prix
	 * @param $ids correspond au id des produits
	 */
	function getProduits($ids)
	{
		$req = mysqli_prepare($bdd, 'SELECT id, prix FROM produit WHERE id IN (?);');
		mysqli_stmt_bind_param($req, "i", $ids);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $donnees['id'], $donnees['prix']);
		while (mysqli_stmt_fetch($req)) {
			$resultat['produit'][] = $donnees;
		}
		return ($resultat);
	}

	/**
	 * Recupere un produit avec son prix
	 * @param $id_prod correspond a l'id du produit
	 */
	function getOneProduit($id_prod)
	{
		$req = mysqli_prepare($bdd, 'SELECT id, prix FROM produit WHERE id=?;');
		mysqli_stmt_bind_param($req, "i", $id);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $donnees['id'], $donnees['prix']);
		while (mysqli_stmt_fetch($req)) {
			$resultat['produit'][] = $donnees;
		}
		return ($resultat);
	}
?>