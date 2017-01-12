<?php
	include "./bdd.php";

	/**
	 * Ajoute un le panier
	 * @param $prod_id correspond a l'id du produit 
	 * Ajoute la variable de type session correspondant a un produit
	 */
	public function addProduit($prod_id){
		if (isset($_SESSION['produit'][$prod_id])) {
			if ($_SESSION['produit'][$prod_id] > 9) {
				$_SESSION['produit'][$prod_id] = 10;
			} else {
				$_SESSION['produit'][$prod_id]++;
			}
		} else {
			$_SESSION['produit'][$prod_id] = 1;
		}
	}

	/**
	 * Supprimer dans le panier
	 * @param $prod_id correspond a l'id du produit
	 * Supprime la variable de type session correspondant a un produit
	 */
	public function delProduit($prod_id){
		if (isset($_SESSION['produit'][$prod_id])) {
			if ($_SESSION['produit'][$prod_id] >= 2) {
				$_SESSION['produit'][$prod_id]--;
			} else {
				unset($_SESSION['produit'][$prod_id]);
			}
		} else {
			unset($_SESSION['produit'][$prod_id]);
		}
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	public function prodTotalPrixTTC($prod_id){
		$total = 0;
		$ids = $_SESSION['produit'];
		if (empty($ids)) {
			$produit = array();
		} else {
			try {
				$produit = getOneProduit($prod_id);
			} catch(Exception $e) {
				echo 'Erreur SQL : '.$e->getMessage().'<br />';
			}
		}
		foreach($produit as $prod){
			$total += ($prod['prix'] * 1.196 * $_SESSION['produit'][$prod_id]);
		}
		return $total;
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	public function totalPrixTTC(){
		$total = 0;
		$ids = array_keys($_SESSION['produit']);
		if (empty($ids)) {
			$produit = array();
		} else {
			$implode = implode("','", $ids);
			try {
				$produit = getProduit($implode);
			}catch(Exception $e){
				echo 'Erreur SQL : '.$e->getMessage().'<br />'.$sql;'<br />';
			}
		}
		foreach($produit as $prod){
			$total += $prod->prix * 1.196 * $_SESSION['produit'][$prod->id];
		}
		return $total;
	}

	/*
	* Teste si un client est ancien ou si il a une commande a plus de 200€ ou 
	*/
	public function existeRemise($client, $prix){
		$chiffreAffaire = getCA($client);
		$chiffreAffaire = array_shift($chiffreAffaire);
		return ($chiffreAffaire['CA'] >= 200 || $prix >= 200);
	}

	/**
	* Ajoute une remise sur le total si le prix depasse un certain montant
	*/
	public function totalAvecRemise($prix, $client) {
		if (existeRemise($client, $prix)) {
			// remise = prix * (1 - (5/100));
		}
	}
	
	/**
	* Return le montant TVA
	*/
	public function montantTVA($prix) {
		return ($prix * 0.196);
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	public function prodTotalPrix() {
		$total = 0;
		$ids = array_keys($_SESSION['produit']);
		if (empty($ids)) {
			$produit = array();
		} else {
			$implode = implode("','", $ids);
			try {
				$produit = getProduit($implode);
			} catch(Exception $e) {
				echo 'Erreur SQL : '.$e->getMessage().'<br />';
			}
		}
		foreach($produit as $prod) {
			$total += $prod->prix * $_SESSION['produit'][$prod->id];
		}
		return $total;
	}

?>