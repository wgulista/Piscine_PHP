<?php 
	include "./layout/header.php";

	if (!estConnecte()) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
?>

	<div class="content">
		
		<h1>Votre compte</h1>
		
		<a href="delete_account.php?id=<?php echo $_SESSION['user']['id'] ;?>" onclick="confirm('Etes vous sur de vouloir supprimer votre compte ?')">Supprimer son compte</a>
	</div>
	<?php include "./layout/aside.php"; ?>
<?php include "./layout/footer.php"; ?>		