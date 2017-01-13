<?php
	/**
	 * Ajoute un le panier
	 * @param $prod_id correspond a l'id du produit 
	 * Ajoute la variable de type session correspondant a un produit
	 */
	function addProduct($prod_id) {
		if (isset($_SESSION['product'][$prod_id])) {
			if ($_SESSION['product'][$prod_id] > 9) {
				$_SESSION['product'][$prod_id] = 10;
			} else {
				$_SESSION['product'][$prod_id]++;
			}
		} else {
			$_SESSION['product'][$prod_id] = 1;
		}
	}

	/**
	 * Supprimer dans le panier
	 * @param $prod_id correspond a l'id du produit
	 * Supprime la variable de type session correspondant a un produit
	 */
	function delProduct($prod_id){
		if (isset($_SESSION['product'][$prod_id])) {
			if ($_SESSION['product'][$prod_id] >= 2) {
				$_SESSION['product'][$prod_id]--;
			} else {
				unset($_SESSION['product'][$prod_id]);
			}
		} else {
			unset($_SESSION['product'][$prod_id]);
		}
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	function prodTotalPrixTTC($prod_id){
		$total = 0;
		$ids = $_SESSION['product'];
		if (empty($ids)) {
			$product = array();
		} else {
			try {
				$product = getOneProduct($prod_id);
			} catch(Exception $e) {
				echo 'Erreur SQL : '.$e->getMessage().'<br />';
			}
		}
		foreach($product as $prod){
			$total += ($prod['prix'] * 1.196 * $_SESSION['product'][$prod_id]);
		}
		return $total;
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	function totalPrixTTC(){
		$total = 0;
		$ids = array_keys($_SESSION['product']);
		if (empty($ids)) {
			$product = array();
		} else {
			$implode = implode("','", $ids);
			try {
				$product = getProduct($implode);
			}catch(Exception $e){
				echo 'Erreur SQL : '.$e->getMessage().'<br />'.$sql;'<br />';
			}
		}
		foreach($product as $prod){
			$total += $prod->prix * 1.196 * $_SESSION['product'][$prod->id];
		}
		return $total;
	}

	/**
	* Return le montant TVA
	*/
	function montantTVA($prix) {
		return ($prix * 0.196);
	}

	/**
	* Affiche le total de tout les produits qui se trouvent dans le panier
	*/
	function prodTotalPrix() {
		$total = 0;
		$ids = array_keys($_SESSION['product']);
		if (empty($ids)) {
			$product = array();
		} else {
			$implode = implode("','", $ids);
			try {
				$product = getProduct($implode);
			} catch(Exception $e) {
				echo 'Erreur SQL : '.$e->getMessage().'<br />';
			}
		}
		foreach($product as $prod) {
			$total += $prod->prix * $_SESSION['product'][$prod->id];
		}
		return $total;
	}

?>