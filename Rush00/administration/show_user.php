<?php 
	include "../layout/header.php";

	if ((!estConnecte() && !estAdmin()) || (estConnecte() && !estAdmin())) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = intval($_GET['id']);
		$res = mysqli_query($bdd, "SELECT id FROM users WHERE id=".$id." AND rights=1;");
		if ($d = mysqli_fetch_assoc($res))
		{
			if (is_numeric($id)) {
				mysqli_query($bdd, "DELETE FROM users WHERE id=".$id." AND rights=1;");
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_user.php">';
			} else {
				echo "<div class='flash'>L'id n'est pas valide </div>";
			}
		} else {
			echo "<div class='flash'>Pas d'utilisateur trouve </div>";
		}
	}
?>
	<div class="content">
		<h1>Tout les utilisateurs</h1>
		<table class="cart_table">
			<tbody>
				<tr>
					<th>#</th>
					<th>Login</th>
					<th>Delete</th>
				</tr>
				<?php 
				$resultat = mysqli_query($bdd, 'SELECT * FROM users WHERE rights=1;');
				while ($d = mysqli_fetch_assoc($resultat)) { ?>
					<tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['login']; ?></td>
						<td><a href="show_user.php?id=<?php echo $d['id']; ?>"><img src="http://findicons.com/files/icons/1262/amora/128/delete.png" height="20" alt=""></a></td>
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