<?php if (strstr(getcwd(), "administration")): ?>
	<div class="aside">
		<?php if (estAdmin()) : ?>
		<h1>Action</h1>
		<div class="links">
			<h2>Produits</h2>
			<a href="add_product.php">Ajouter un produit</a>
			<a href="show_product.php">Voir les produits</a>
		</div>
		<div class="links">
			<h2>Categories</h2>
			<a href="add_category.php">Ajouter une categorie</a>
			<a href="show_category.php">Voir les categories</a>
		</div>
		<div class="links">
			<h2>Client</h2>
			<a href="show_user.php">Voir les clients</a>
		</div>
		<?php else: ?>
			<h1>Connectez vous</h1>
		<?php endif; ?>
	</div>
<?php else: ?>
	<div class="aside">
	<?php if (!estConnecte() && estAdmin()): ?>
	<h1>Se connecter</h1>
	<form action="connexion.php" method="post">
		<label for="login">Identifiant</label>
		<input type="text" name="login">
		<label for="password">Mot de passe</label>
		<input type="password" name="password">
		<button type="submit">Se connecter</button>
	</form>
	<?php elseif(!estConnecte() && !estAdmin()): ?>
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
	<?php if (!$_SESSION[panier]) {
		$_SESSION[panier] = [];
	}?>
	<?php $i = 0; $tot = 0; foreach ($_SESSION[panier] as $id => $nb) { ?>
	<?php $req = mysqli_query($bdd, 'SELECT * FROM products WHERE id="'.$id.'"'); ?>
	<?php $row = mysqli_fetch_assoc($req); ?>
	<?php $tot += $row[price] * $nb; ?>
	<?php $i++; } ?>
	<h1>Dans votre panier</h1>
	<div class="aside_cart">
		<p>
			Il y a <b><?php echo $i; ?></b> articles <br>
			Total TTC : <b><?php echo number_format($tot, 2, ",", " "); ?> &euro;</b><br>
			Total TVA (19,6) : <b><?php echo number_format($tot * 0.196, 2, ",", " "); ?> &euro;</b>
		</p>
	</div>
	<h1>Les categories</h1>
</div>
<?php endif; ?>
