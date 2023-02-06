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
	//Récupérer les données saisies dans le formulaire
	$codeli = $_POST["txt1"];
	$titli = $_POST["txt2"];
	$autli = $_POST["txt3"];
	$aneli = $_POST["txt4"];
	$edili = $_POST["txt5"];
	$img_li = file_get_contents($_FILES['txt6']['tmp_name']);
	$namela = $_POST["txt7"];
	$namedo = $_POST["txt8"];

	$test = "SELECT * FROM livre WHERE code_livre = " . $codeli; //créer la requête
	$table = $conx->query($test);

	if ($table->rowCount() != 0) {
	?>
		<div class="myMsg">
			<p class="alert alert-danger header">le code <b>' <?php echo $codeli ?> '</b> est existe <br /></p>
		</div>;
		<div class="butt">
			<button type="button" class="btn btn-dark"><a href="ListerLivre.php" class="" style="text-decoration: none;color:white">Retour à la liste des Livre</a></button>
			<button type="button" class="btn btn-dark"><a href="FormAddLivre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Ajouter</a></button>
		</div>
		<?php

	} else {

		$sql = "INSERT INTO livre VALUES(" . $codeli . ",'" . $titli . "','" . $autli . "'," . $aneli . ",'" . $edili . "','" . addslashes($img_li) . "'," . $namela . "," . $namedo . ")"; //créer la requête
		$resultat = $conx->query($sql); //Exécuter la requête

		if ($resultat == FALSE) {
		?>
			<div class="myMsg">
				<p class="alert alert-danger header">Error<br /></p>
			</div>;
		<?php
		} else {
			// header("location:ListerLivre.php");
		?>
			<div class="butt">
				<button type="button" class="btn btn-dark"><a href="ListerLivre.php" class="" style="text-decoration: none;color:white">Retour à la liste des Livre</a></button>
				<button type="button" class="btn btn-dark"><a href="FormAddLivre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
			</div>
	<?php
		}
	}
	?>
</body>

</html>