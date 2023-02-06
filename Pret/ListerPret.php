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
	$sql = "select * from pret"; //créer la requête

	$table = $conx->query($sql); //Exécuter la requête



	?>
	<div class="header">
		<h3><?php echo 'Nombre de pret : ' . $table->rowCount(); ?></h3>
	</div>
	<div class="all container">
		<table class="table table-dark table-striped">
			<thead>
				<tr class="row1">
					<th>Code pret</th>
					<th>Code exemplaire</th>
					<th>Code membre </th>
					<th>Date pret </th>
					<th>Date retour  </th>
					<th>Remarque  </th>
					<th class="text-success"> Modifier</th>
					<th class="text-danger">Supprimer</th>
				</tr>
			</thead>
			<tbody class="rounded">
				<?php
				while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><?php echo $row['code_pret'] ?> </td>
						<td><?php echo $row['code_exemplaire'] ?> </td>
						<td><?php echo $row['code_membre'] ?> </td>
						<td><?php echo $row['date_pret'] ?> </td>
						<td><?php echo $row['date_retour'] ?> </td>
						<td><?php echo $row['remarque'] ?> </td>
						<td><a class="text-success dec-a" style="text-decoration: none;" href=<?php echo "Editpret2.php/?Ref=" . $row['code_pret']; ?>>Modifier</a> </td>
						<td><a class="text-danger dec-a" style="text-decoration: none;" href=<?php echo "Deletepret2.php/?Ref=" . $row['code_pret']; ?>>Supprimer</a> </td>
					</tr>
				<?php
				}
				?>
			<tbody>
		</table>
	</div>

</body>

</html>