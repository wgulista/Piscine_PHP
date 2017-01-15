<?php 
	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = intval($_GET['id']);
		$res = mysqli_query($bdd, 'SELECT * FROM categories WHERE id='.$id);
		if ($res != NULL && is_numeric($id) && isset($_POST)  && !empty($_POST))
		{
			$name = isset($_POST['name']) ? htmlentities($_POST['name']) : $_POST['name'];
			settype( $name , 'string');
			if (!is_string($name) || empty($name) || $name == "") {
				echo "<div class='flash'>La categorie n'est pas valide </div>";
			} else {
				$sql = "UPDATE categories SET name=? WHERE id=?;";
				$req = mysqli_prepare($bdd, $sql);
				if (!$req) {
					echo "<div class='flash'>Erreur SQL !</div>";
				}
				mysqli_stmt_bind_param($req, "si", $name, $id);
				if (!mysqli_stmt_execute($req)) {
					echo "<div class='flash'>Erreur pour mettre a jour la categorie !</div>";
				}
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_category.php">';
			} 
		}
	} else {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_category.php">';
	}
?>
	<div class="content">
		<h1>Modifier la categorie</h1>
		<?php if ($d = mysqli_fetch_assoc($resultat)) { ; ?>
		<form action="" method="post">
			<label for="name">Titre</label>
			<input type="text" name="name" value="<?php echo $d['name']?>">
			<button type="submit">Envoyer</button>
		</form>
		<?php
		}
		mysqli_free_result($resultat);
		?>
	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>	