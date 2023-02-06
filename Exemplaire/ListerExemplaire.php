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
	$sql = "select * from exemplaire"; //créer la requête

	$table = $conx->query($sql); //Exécuter la requête



	?>
	<div class="header">
		<h3><?php echo 'Nombre de exemplaire : ' . $table->rowCount(); ?></h3>
	</div>
	<div class="all container">
		<table class="table table-dark table-striped">
			<thead>
				<tr class="row1">
					<th>Code Exemplaire</th>
					<th>annee Achat  </th>
					<th>prix Achat </th>
					<th>disponible  </th>
					<th>code Livre  </th>
					<th class="text-success"> Modifier</th>
					<th class="text-danger">Supprimer</th>
				</tr>
			</thead>
			<tbody class="rounded">
				<?php
				while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><?php echo $row['code_exemplaire'] ?> </td>
						<td><?php echo $row['annee_achat'] ?> </td>
						<td><?php echo $row['prix_achat'] ?> </td>
						<td><?php echo $row['disponible'] ?> </td>
						<td><?php echo $row['code_livre'] ?> </td>
						<td><a class="text-success dec-a" style="text-decoration: none;" href=<?php echo "Editexemplaire2.php/?Ref=" . $row['code_exemplaire']; ?>>Modifier</a> </td>
						<td><a class="text-danger dec-a" style="text-decoration: none;" href=<?php echo "Deleteexemplaire2.php/?Ref=" . $row['code_exemplaire']; ?>>Supprimer</a> </td>
					</tr>
				<?php
				}
				?>
			<tbody>
		</table>
	</div>

</body>

</html>