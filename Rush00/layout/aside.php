<div class="aside">
	<?php 
		if (!estConnecte()):
	?>
	<h1>Se connecter</h1>
	<form action="connexion.php" method="post">
		<label for="login">Identifiant</label>
		<input type="text" name="login">
		<label for="password">Mot de passe</label>
		<input type="password" name="password">
		<button type="submit">Se connecter</button>
	</form>
	<?php else: ?>
		<h1>Bonjour <?php echo isset($_SESSION['user']['login']) ? ucfirst($_SESSION['user']['login']) : "" ?></h1>
	<?php endif; ?>
	<h1>Votre panier</h1>
	<p>Il n'y a rien dans votre panier</p>
</div>