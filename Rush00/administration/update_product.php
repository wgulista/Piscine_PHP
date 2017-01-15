<?php

	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = intval($_GET['id']);
		$resultat = mysqli_query($bdd, 'SELECT * FROM products WHERE id='.$id);
		if (is_numeric($id) && isset($_POST)  && !empty($_POST))
		{
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
				$sql = "UPDATE products SET name=?, content=?, price=?, image=?, quantity=?, category_id=? WHERE id=?;";
				$req = mysqli_prepare($bdd, $sql);
				if (!$req) {
					echo "<div class='flash'>Erreur SQL !</div>";
				}
				mysqli_stmt_bind_param($req, 'ssisiii',$name,$description,$price,$image,$quantity,$category_id,$id);
				if (!mysqli_stmt_execute($req)) {
					echo "<div class='flash'>Erreur pour mettre a jour le produits !</div>";
				}
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_product.php">';
			}
		}
	} else {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_product.php">';
	}

?>
	<div class="content">
		<h1>Modifier le produit produit</h1>
		<?php if ($d = mysqli_fetch_assoc($resultat)) { ; ?>
		<form action="" method="post">
			<label for="name">Titre</label>
			<input type="text" name="name" value="<?php echo $d['name']?>">

			<label for="description">Description</label>
			<textarea name="description" id="description" cols="89" rows="10"><?php echo $d['content'] ?></textarea>

			<label for="price">Prix</label>
			<input type="text" name="price" value="<?php echo $d['price']?>">

			<label for="price">Image URL</label>
			<input type="text" name="image" value="<?php echo $d['image']?>">

			<label for="quantity">Quantit&eacute;</label>
			<input type="text" name="quantity" value="<?php echo $d['quantity']?>">

			<label for="categorie">Categorie</label>
			<select name="category_id" id="categorie">
				<option>Select Category</option>
				<?php 
				$r =  mysqli_query($bdd, 'SELECT id, name FROM categories;');
				while ($d = mysqli_fetch_assoc($r)) { ?>
					<option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
				<?php
				}
				mysqli_free_result($r);
				?>
			</select>
			<button type="submit">Envoyer</button>
		<?php
		}
		mysqli_free_result($resultat);
		?>
		</form>
	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>	