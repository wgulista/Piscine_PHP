<?php include "./layout/header.php"; ?>

	<div class="content">

		<div class="list_product">

			<?php
			if (isset($_GET['id']) && !empty($_GET['id'])) {
				$cat_id = intval($_GET['id']);
				settype($cat_id, 'integer');
				$resultat = mysqli_query($bdd, 'SELECT * FROM products WHERE category_id='.$cat_id.';');
			} else {
				$resultat = mysqli_query($bdd, 'SELECT * FROM products;');
			}
			if ( mysqli_fetch_assoc($resultat) == NULL)
			{
				echo '<h1>Pas d\'articles</h1>';
			} else {
				while ($d = mysqli_fetch_assoc($resultat)) { ?>
					<div class="product">
						<h2><?php echo $d['name']; ?></h2>
						<img src="<?php echo $d['image']; ?>" width="200px" height="140px" alt="">
						<h3><?php echo $d['price']; ?> &euro;</h3>
						<a class="details" href="info_product.php?id=<?php echo $d['id']; ?>">Details</a>
						<a class="add_cart" href="panier.php?add=<?php echo $d['id']; ?>">Ajouter au panier</a>
					</div>
			<?php
				}
			}
			mysqli_free_result($resultat);
			?>

		</div>

	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>
