<?php include "./layout/header.php"; ?>

<?php $req = mysqli_query($bdd, 'SELECT * FROM products WHERE id="'.$_GET[id].'"'); ?>
<?php $row = mysqli_fetch_assoc($req); ?>
	<div class="content">

		<div class="info_product">
			<img src="<?php echo $row[image] ?>" width="100%" alt="">
			<h2>Titre</h2>
			<p>
				<?php echo $row[content] ?>
			</p>
			<h3>prix</h3>
			<p>
				<?php echo $row[price] ?> &euro;
			</p>
			<a class="add_cart" href="panier.php?add=<?php echo $row['id']; ?>">Ajouter au panier</a>
		</div>

	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>
