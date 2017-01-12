<?php 

	/**
	* Teste si un quelconque client est connecté
	* @return vrai ou faux 
	*/
	function estConnecte() {
		return isset($_SESSION['User']['id']);
	}

	/**
	 * Enregistre dans une variable session les infos d'un visiteur
	 * @param $id 
	 * @param $nom
	 * @param $prenom
	 * @param $active Si c'est 1 le compte est active sinon si c'est 0 on redirige
	 */
	function connectUser($id, $nom, $prenom, $active) {
		if ($active == 1){
			$_SESSION['User']['id'] = $id;
			$_SESSION['User']['nom']= $nom;
			$_SESSION['User']['prenom']= $prenom;
		} else {
			// retourner sur la page de connexion
		}
	}
?>