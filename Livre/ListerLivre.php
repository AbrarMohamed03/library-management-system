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
	$sql = "select * from livre"; //créer la requête

	$table = $conx->query($sql); //Exécuter la requête



	?>
	<div class="header">
		<h3><?php echo 'Nombre de livre : ' . $table->rowCount(); ?></h3>
	</div>
	<div class="all container">
		<table class="table table-dark table-striped">
			<thead>
				<tr class="row1">
					<th>Code Livre</th>
					<th>titre de Livre </th>
					<th>auteur </th>
					<th>Annee edition </th>
					<th>Editeur </th>
					<th>Photo </th>
					<th>Langue </th>
					<th>Domaine </th>
					<th class="text-success"> Modifier</th>
					<th class="text-danger">Supprimer</th>
				</tr>
			</thead>
			<tbody class="rounded">
				<?php
				while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>

						<td><?php
							echo '<img src="data:image;base64,' . base64_encode($row['photo']) . '" width=100px/>';
							?>
						</td>
						<td><?php echo $row['code_livre'] ?> </td>
						<td><?php echo $row['titre'] ?> </td>
						<td><?php echo $row['auteur'] ?> </td>
						<td><?php echo $row['annee_edition'] ?> </td>
						<td><?php echo $row['editeur'] ?> </td>
						<td><?php echo $row['code_langue'] ?> </td>
						<td><?php echo $row['code_domaine'] ?> </td>
						<td><a class="text-success dec-a" style="text-decoration: none;" href=<?php echo "EditLivre2.php/?Ref=" . $row['code_livre']; ?>>Modifier</a> </td>
						<td><a class="text-danger dec-a" style="text-decoration: none;" href=<?php echo "DeleteLivre2.php/?Ref=" . $row['code_livre']; ?>>Supprimer</a> </td>
					</tr>
				<?php
				}
				?>
			<tbody>
		</table>
	</div>

</body>

</html>