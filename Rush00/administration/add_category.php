<?php 
	include "../layout/header.php";

	if (!estConnecte() && !estAdmin()) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_POST) && !empty($_POST)) {
		$req = mysqli_prepare($bdd, 'INSERT INTO categories (name) VALUES (?);');
		if (isset($_POST['name']) && !empty($_POST['name'])){
			$name = isset($_POST['name']) ? htmlentities($_POST['name']) : $_POST['name'];
			settype( $name , 'string');
			if (is_string($_POST['name'])) {
				mysqli_stmt_bind_param($req, "s", $name );
				mysqli_stmt_execute($req);
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=add_category.php">';
			} 
		}
	}
?>

	<div class="content">
		<h1>Ajouter une categorie</h1>
		<form action="add_category.php" method="post">
			<label for="name">Titre</label>
			<input type="text" name="name">
			<button type="submit">Envoyer</button>
		</form>
	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		