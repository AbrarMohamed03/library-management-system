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
    <style>
        
    </style>
</head>
<!-- Retour à la liste des membre ListerMembre.php
Retour au formaulaire de saisie FormSearchMembre.php -->

<body>
    <style>
        <?php
        include('../inclodes/style.css');
        ?>
    </style>

    <?php include('menu.html'); ?>

    <?php
    $codedo = $_POST['txt1'];
    $sql = "SELECT * FROM membre WHERE code_membre = " . $codedo; // créer la requête
    $table = $conx->query($sql); // Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerMembre.php" class="" style="text-decoration: none;color:white">Retour à la liste des membre</a></button>
            <button type="button" class="btn btn-dark"><a href="FormSearchMembre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    ?>

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
				</tr>
			</thead>
			<tbody class="rounded">
					<tr>
						<td><?php echo $row['code_membre'] ?> </td>
						<td><?php echo $row['nom'] ?> </td>
						<td><?php echo $row['prenom'] ?> </td>
						<td><?php echo $row['adresse'] ?> </td>
						<td><?php echo $row['ville'] ?> </td>
						<td><?php echo $row['email'] ?> </td>
						<td><?php echo $row['tel'] ?> </td>
					</tr>
			<tbody>
		</table>
	</div>
    <?php } ?>
</body>

</html>