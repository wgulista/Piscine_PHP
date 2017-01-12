<?php include "./layout/header.php"; ?>

	<div class="content">
		<h1>Se connecter</h1>	
		<form action="connexion.php" method="post">
			<input type="text" name="login">
			<input type="password" name="password">
			<button type="submit">Se connecter</button>
		</form>
	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>		