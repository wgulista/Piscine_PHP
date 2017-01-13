<?php
	include "./app/panier.php";
	if (isset($_GET) && !empty($_GET))
	{
		foreach ($_GET as $key => $v) {
			if ($key == 'add') {
				$action = 'add';
			}else if ($key == 'plus') {
				$action = 'plus';
			} else if ($key == 'minus') {
				$action = 'minus';
			} else if ($key == 'del') {
				$action = 'del';
			}
			$value = $v;
		}
		if (!empty($action))
		{
			if ($action == 'add') {

			} else if ($action == 'plus') {

			} else if ($action == 'minus') {
				
			} else if ($action == 'del') {
				
			} else {
				header("Location: panier.php");
			}
		}
	}
	include "./layout/header.php";
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
				<tr>
					<td><img src="http://static.aujardin.info/cache/th/img9/rosa-fleur-600x450.jpg" height="80px" alt=""></td>
					<td>Une rose magnifique</td>
					<td>53.25 &euro;</td>
					<td>
						<input type="text" style="width:50px;height:20px;text-align:center" name="quantity" value="10" disabled="true" />
						<a href="panier.php?plus=1"><img src="http://findicons.com/files/icons/99/office/128/add1.png" height="20" alt=""></a>
						<a href="panier.php?minus=1"><img src="http://icons.veryicon.com/256/System/Icons8%20Metro%20Style/Very%20Basic%20Minus.png" height="20" alt=""></a>
					</td>
					<td>
						<a href="panier.php?del=1"><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a>
					</td>
					<td><b><?php echo number_format(1044, 2, ",", " "); ?> &euro;</b></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php include "./layout/aside.php"; ?>
	<br clear="both">
<?php include "./layout/footer.php"; ?>		