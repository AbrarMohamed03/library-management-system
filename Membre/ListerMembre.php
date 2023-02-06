<?php
//créer une chaine de connexion
require("../inclodes/config.php");
try {
	$conx = new PDO("mysql:host=$host;dbname=$dbname", $Login, $PW);
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<style>
		<?php
		include('../inclodes/style.css');
		?>
	</style>
	<?php
	include('menu.html'); ?>


	<?php
	$sql = "select * from membre"; //créer la requête

	$table = $conx->query($sql); //Exécuter la requête



	?>
	<div class="header">
		<h3><?php echo 'Nombre de membre : ' . $table->rowCount(); ?></h3>
	</div>
	<div class="all container">
		<table class="table table-dark table-striped">
			<thead>
				<tr class="row1">
					<th>Code membre</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Adresse</th>
					<th>Ville</th>
					<th>Email</th>
					<th>Telephone</th>
					<th class="text-success">Modifier</th>
					<th class="text-danger">Supprimer</th>
				</tr>
			</thead>
			<tbody class="rounded">
				<?php
				while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><?php echo $row['code_membre'] ?> </td>
						<td><?php echo $row['nom'] ?> </td>
						<td><?php echo $row['prenom'] ?> </td>
						<td><?php echo $row['adresse'] ?> </td>
						<td><?php echo $row['ville'] ?> </td>
						<td><?php echo $row['email'] ?> </td>
						<td><?php echo $row['tel'] ?> </td>
						<td><a class="text-success dec-a" style="text-decoration: none;" href=<?php echo "EditMembre2.php/?Ref=" . $row['code_membre']; ?>>Modifier</a> </td>
						<td><a class="text-danger dec-a" style="text-decoration: none;" href=<?php echo "DeleteMembre2.php/?Ref=" . $row['code_membre']; ?>>Supprimer</a> </td>
					</tr>
				<?php
				}
				?>
			<tbody>
		</table>
	</div>

</body>

</html>