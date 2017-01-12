<?php include "./layout/header.php"; ?>

	<div class="content">
		<h1>Vous n'avez pas de compte, remplissez le formulaire</h1>	
		<form action="connexion.php" method="post">
			<input type="text" name="login">
			<input type="password" name="password">
			<button type="submit">S'inscrire</button>
		</form>
	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>		