<?php include "./layout/header.php"; ?>

	<div class="content">
		<h1>Votre panier</h1>	
		<table class="cart_table">
			<tbody>
				<tr style="border-bottom: 2px solid #e0e0e0;">
					<th></th>
					<th>Description</th>
					<th>Prix TTC</th>
					<th>Quantit&eacute;</th>
				</tr>
				<tr>
					<td><img src="http://static.aujardin.info/cache/th/img9/rosa-fleur-600x450.jpg" height="80px" alt=""></td>
					<td>Une rose magnifique</td>
					<td>53.25 &euro;</td>
					<td>
						<input type="text" style="width:50px;text-align:center" name="quantity" value="10" disabled="true" />
						<a href=""><img src="http://findicons.com/files/icons/99/office/128/add1.png" height="20" alt=""></a>
						<a href=""><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a>
					</td>
				</tr>
				<tr>
					<td><img src="http://static.aujardin.info/cache/th/img9/rosa-fleur-600x450.jpg" height="80px" alt=""></td>
					<td>Une rose magnifique</td>
					<td>53.25 &euro;</td>
					<td>
						<input type="text" style="width:50px;text-align:center" name="quantity" value="10" disabled="true" />
						<a href=""><img src="http://findicons.com/files/icons/99/office/128/add1.png" height="20" alt=""></a>
						<a href=""><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php include "./layout/aside.php"; ?>
	<br clear="both">
<?php include "./layout/footer.php"; ?>		