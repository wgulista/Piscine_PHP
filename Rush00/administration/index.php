<?php 
	include "../layout/header.php"; 
	if (!estConnecte() && !estAdmin()) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}
?>

	<div class="content">
		
		<h1>Administration</h1>
		<form action="../connexion.php" method="post">
			<label for="login">Identifiant</label>
			<input type="text" name="login">
			<label for="password">Mot de passe</label>
			<input type="password" name="password">
			<input type="hidden" name="rights" value="100">
			<button type="submit">Se connecter</button>
		</form>

	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		