<?php 
	include "../layout/header.php"; 
	if (!estConnecte() && !estAdmin()) {
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}
?>

	<div class="content">
		
		<h1>Administration</h1>
		<h2>Bienvenue, que voulez vous faire ?</h2>
		

	</div>
	<?php include "../layout/aside.php"; ?>
<?php include "../layout/footer.php"; ?>		