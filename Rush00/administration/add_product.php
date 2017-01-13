<?php 
	include "./layout/header.php";
	include "./app/user.php";

	if (!estAdmin()) {
		header("Location: index.php");
	}

?>

	<div class="content">
		<h1>Ajouter un produit</h1>
		<form action="add_product.php" method="post">
			<label for="name">Titre</label>
			<input type="text" name="name">

			<label for="description">Description</label>
			<textarea name="description" id="description" cols="89" rows="10"></textarea>

			<label for="price">Prix</label>
			<input type="text" name="price">

			<label for="quantity">Quantit&eacute;</label>
			<input type="text" name="quantity">

			<label for="categorie">Categorie</label>
			<input type="text" name="categorie">
			<select name="categorie" id="categorie">
				<option>Select Category</option>
			</select>

			<button type="submit">Envoyer</button>
		</form>
	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>		