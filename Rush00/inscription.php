<?php 
	include "./layout/header.php";
	if (isset($_POST) && !empty($_POST)) {
		if (existUser($_POST['login']) === true) {
			$_SESSION['flash']['connect'] = "Cette utilisateur existe deja";
		} else if (existUser($_POST['login']) === false) {
			if (createUser($_POST)) {
				$_SESSION['flash']['connect'] = "Votre compte a ete cree !";
			} else {
				$_SESSION['flash']['connect'] = "Impossible de creer votre compte !";
			}
		}
	}

?>
	<div class="content">
		<h1>Vous n'avez pas de compte, remplissez le formulaire</h1>	
		<form action="inscription.php" method="post">
			<label for="login">Identifiant</label>
			<input type="text" name="login">
			<label for="password">Mot de passe</label>
			<input type="password" name="password">
			<button type="submit">s'inscrire</button>
		</form>
	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>		