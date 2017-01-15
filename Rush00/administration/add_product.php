<?php 
	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_POST) && !empty($_POST)) {
		$name = isset($_POST['name']) ? htmlentities($_POST['name']) : $_POST['name'];
		$description = isset($_POST['description']) ? htmlentities($_POST['description']) : $_POST['description'];
		$price = isset($_POST['price']) ? htmlentities($_POST['price']) : $_POST['price'];
		$image = isset($_POST['image']) ? htmlentities($_POST['image']) : $_POST['image'];
		$quantity = isset($_POST['quantity']) ? htmlentities($_POST['quantity']) : $_POST['quantity'];
		$category_id = isset($_POST['category_id']) ? htmlentities($_POST['category_id']) : $_POST['category_id'];

		settype($name, 'string');
		settype($description, 'string');
		settype($price, 'double');
		settype($image, 'string');
		settype($quantity, 'integer');
		settype($category_id, 'integer');

		$error = array();
		if (!is_string($name) || !is_string($description) || !is_string($image)) {
			$error['string'] = "Titre, contenu ou image incorrecte \t - ";
		}
		if (!is_double($price)) {
			$error['double'] = "Le prix n'est pas correcte\t - ";
		}
		if (!is_numeric($quantity) || !is_numeric($category_id)) {
			$error['integer'] = "Quantite ou categorie invalide <br />";
		} 
		if (!empty($error)){
			echo "<div class='flash'>";
			foreach ($error as $value) {
				echo $value;
			}
			echo "</div>";
		} else {
			$req = mysqli_prepare($bdd, 'INSERT INTO products (name, content, price, image, quantity, category_id) VALUES (?, ?, ?, ?, ?, ?);');
			mysqli_stmt_bind_param($req, "ssisii", $name, $description, $price, $image, $quantity, $category_id);
			mysqli_stmt_execute($req);
		}
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

			<label for="price">Image URL</label>
			<input type="text" name="image">

			<label for="quantity">Quantit&eacute;</label>
			<input type="text" name="quantity">

			<label for="categorie">Categorie</label>
			<select name="category_id" id="categorie">
				<option>Select Category</option>
				<?php 
				$resultat =  mysqli_query($bdd, 'SELECT id, name FROM categories;');
				while ($d = mysqli_fetch_assoc($resultat)) { ?>
					<option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
				<?php
				}
				mysqli_free_result($resultat);
				?>
			</select>

			<button type="submit">Envoyer</button>
		</form>
	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		