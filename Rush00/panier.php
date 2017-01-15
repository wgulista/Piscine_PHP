<?php
	include "./layout/header.php";

	if (isset($_GET) && !empty($_GET))
	{
		if (!$_GET[quantity]) {
			$_GET[quantity] = 1;
		}
		if (isset($_GET[add]) && !empty($_GET[add])) {
			$query = 'SELECT * FROM products WHERE id='.$_GET[add].';';
			$array = mysqli_query($bdd, $query);
			if (($array = mysqli_fetch_assoc($array)) === NULL)
			{
				$error = "Le produit n'existe pas";
				return ;
			}
			if ($array[quantity] < $_GET[quantity])
				return ;
			if (!$_SESSION[panier]) {
				$_SESSION[panier] = [];
			}
			if ($_SESSION[panier][$_GET[add]]) {
				$_SESSION[panier][$_GET[add]] += $_GET[quantity];
			} else {
				$_SESSION[panier][$_GET[add]] = $_GET[quantity];
			}
		} else if ($_GET[del]) {																	//del product
			$query = 'SELECT * FROM products WHERE id="'.$_GET[del].'"';
 			$array = mysqli_query($bdd, $query);
 			if (($array = mysqli_fetch_assoc($array)) === NULL)
 			{
				$error = "Le produit n'existe pas";
 				return ;
 			}
			if ($_SESSION[panier][$_GET[del]]) {
				unset($_SESSION[panier][$_GET[del]]);
			}
		} else if ($_GET[minus]) {																	//minus product
			$query = 'SELECT * FROM products WHERE id="'.$_GET[minus].'"';
 			$array = mysqli_query($bdd, $query);
 			if (($array = mysqli_fetch_assoc($array)) === NULL)
 			{
				$error = "Le produit n'existe pas";
 				return ;
 			}
			if ($_SESSION[panier][$_GET[minus]] > 1) {
				$_SESSION[panier][$_GET[minus]] -= 1;
			}
		} else if ($_GET[plus]) {																	//plus product
			$query = 'SELECT * FROM products WHERE id="'.$_GET[plus].'"';
 			$array = mysqli_query($bdd, $query);
 			if (($array = mysqli_fetch_assoc($array)) === NULL)
 			{
				$error = "Le produit n'existe pas";
 				return ;
 			}
 			if ($array[quantity] > $_SESSION[panier][$_GET[plus]]) {
 				if ($_SESSION[panier][$_GET[plus]]) {
					$_SESSION[panier][$_GET[plus]] += 1;
			}}
			else
				$error = "Pas assez de stock";
		}
	}
?>
	<div class="content">
		<h1>Votre panier</h1>
		<table class="cart_table">
			<tbody>
				<tr style="border-bottom: 2px solid #e0e0e0;">
					<th></th>
					<th>Description</th>
					<th>Prix TTC</th>
					<th>Quantit&eacute;</th>
					<th>Enlever</th>
					<th>Total</th>
				</tr>
				<?php if (!empty($_SESSION[panier])) { ?>
				<?php foreach ($_SESSION[panier] as $id => $nb) { ?>
				<?php $req = mysqli_query($bdd, 'SELECT * FROM products WHERE id="'.$id.'"'); ?>
				<?php $row = mysqli_fetch_assoc($req); ?>
				<tr>
					<td><img src="<?php echo $row[image]; ?>" height="80px" width="120px" alt=""></td>
					<td><?php echo $row[content]; ?></td>
					<td><?php echo $row[price]; ?>&euro;</td>
					<td>
						<input type="text" style="width:50px;height:20px;text-align:center" name="quantity" value="<?php echo $nb; ?>" disabled="true" />
						<a href="panier.php?plus=<?php echo $id; ?>"><img src="http://findicons.com/files/icons/99/office/128/add1.png" height="20" alt=""></a>
						<a href="panier.php?minus=<?php echo $id; ?>"><img src="http://icons.veryicon.com/256/System/Icons8%20Metro%20Style/Very%20Basic%20Minus.png" height="20" alt=""></a>
					</td>
					<td>
						<a href="panier.php?del=<?php echo $id; ?>"><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a>
					</td>
					<td><b><?php echo number_format($row[price] * $nb, 2, ",", " "); ?> &euro;</b></td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>
	</div>
	<?php include "./layout/aside.php"; ?>
	<br clear="both">
<?php include "./layout/footer.php"; ?>
