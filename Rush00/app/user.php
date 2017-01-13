<?php 

	/**
	 * recupere un user
	 * @param $post $_POST values
	 */
	function getUser($post)
	{
		global $bdd;
		$resultat = array();

		if (isset($post) && !empty($post))
		{
			$req = mysqli_prepare($bdd, 'SELECT * FROM users WHERE login=? AND password=?;');
			if ($req == NULL)
				return (false);
			if (!empty($post['login']) && !empty($post['password']))
			{
				$login = isset($post['login']) ? htmlentities($post['login']) : $post['login'];
				$password = isset($post['password']) ? htmlentities($post['password']) : $post['password'];
				$password = md5($password);
				mysqli_stmt_bind_param($req, "ss", $login, $password);
				mysqli_stmt_execute($req);
				mysqli_stmt_bind_result($req, $d['id'], $d['login'], $d['password'], $d['rights']);
				while (mysqli_stmt_fetch($req)) {
					$resultat = $d;
				}
				return ($resultat);
			}
		}
		return (false);
	}

	/**
	 * creer un user
	 * @param $post $_POST values
	 */
	function createUser($post)
	{
		global $bdd;
		$resultat = array();

		if (isset($post) && !empty($post))
		{
			$req = mysqli_prepare($bdd, 'INSERT INTO users (login, password, rights) VALUES (?, ?, ?);');
			if ($req == NULL)
				return (false);
			if (!empty($post['login']) && !empty($post['password']))
			{
				$login = isset($post['login']) ? htmlentities($post['login']) : $post['login'];
				$password = isset($post['password']) ? htmlentities($post['password']) : $post['password'];
				$password = md5($password);
				$rights = 1;
				mysqli_stmt_bind_param($req, "ssi", $login, $password, $rights );
				mysqli_stmt_execute($req);
				return (true);
			}
		}
		return (false);
	}

	/**
	 * existance d'un user
	 * @param $post $_POST values
	 */
	function existUser($login)
	{
		global $bdd;

		if ($login != NULL)
		{
			$req = mysqli_prepare($bdd, 'SELECT login FROM users WHERE login=?;');
			$user_login = isset($login) ? htmlentities($login) : $login;
			mysqli_stmt_bind_param($req, "s", $user_login);
			mysqli_stmt_execute($req);
			if (mysqli_stmt_fetch($req) === true)
				return (true);

		}
		return (false);
	}

	/**
	* Teste si un quelconque client est connecté
	* @return vrai ou faux 
	*/
	function estConnecte() {
		return (isset($_SESSION['user']) && !empty($_SESSION['user']) && !empty($_SESSION['user']));
	}

	/**
	 * Enregistre dans une variable session les infos d'un visiteur
	 * @param $user
	 */
	function connectUser($user) {
		if (!empty($user))
		{
			$_SESSION['user']['id'] = $user['id'];
			$_SESSION['user']['login'] = $user['login'];
			$_SESSION['user']['password'] = $user['password'];
			$_SESSION['user']['rights'] = $user['rights'];
			return (true);
		}
		return false;
	}

	/**
	* Verifie si c'est un admin
	* @return vrai ou faux 
	*/
	function estAdmin() {
		return (isset($_SESSION['user']['rights']) && $_SESSION['user']['rights'] == 100);
	}
?>