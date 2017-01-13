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
	<h1>Dans votre panier</h1>
	<div class="aside_cart">
		<p>
			Il y a <b>5</b> articles <br>
			Total TTC : <b><?php echo number_format(1044, 2, ",", " "); ?> &euro;</b><br>
			Total TVA (19.6) : <b><?php echo number_format(872.91, 2, ",", " "); ?> &euro;</b>
		</p>
	</div>
	<h1>Les categories</h1>

</div>