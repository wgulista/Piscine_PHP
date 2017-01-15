<?php 
	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

?>
	<div class="content">
		<h1>Toutes les categories</h1>
		<table class="cart_table">
			<tbody>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<?php 
				$resultat =  mysqli_query($bdd, 'SELECT * FROM categories;');
				while ($d = mysqli_fetch_assoc($resultat)) { ?>
					<tr>
						<td>1</td>
						<td><?php echo $d['name']; ?></td>
						<td><a href="update_category.php?id=<?php echo $d['id']; ?>"><img src="http://www.freeiconspng.com/uploads/blue-refresh-icon-png-6.png" height="20" salt=""></a></td>
						<td><a href="delete_category.php?id=<?php echo $d['id']; ?>"><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a></td>
					</tr>
				<?php
				}
				mysqli_free_result($resultat);
				?>
			</tbody>
		</table>
	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		