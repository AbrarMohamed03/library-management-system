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
	$codedo = $_POST["txt1"];
	$namedo = $_POST["txt2"];

	$test = "SELECT * FROM domaine WHERE code_domaine = " . $codedo; //créer la requête
	$table = $conx->query($test);

	if ($table->rowCount() != 0) { 
	?>
		<div class="myMsg">
			<p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> est existe <br /></p>
		</div>;
		<div class="butt">
			<button type="button" class="btn btn-dark"><a href="ListerDomaine.php" class="" style="text-decoration: none;color:white">Retour à la liste des domaine</a></button>
			<button type="button" class="btn btn-dark"><a href="FormAddDomaine.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Ajoute</a></button>
		</div>
		<?php

	} else {
        
		$sql = "INSERT INTO domaine VALUES(" . $codedo . ",'" . $namedo . "')"; //créer la requête
		$resultat = $conx->query($sql); //Exécuter la requête

		if ($resultat == FALSE) {
		?>
			<div class="myMsg">
				<p class="alert alert-danger header">Error<br /></p>
			</div>;
		<?php
		} else {
			// header("location:Listerdomaine.php");
		?>
			<div class="butt">
				<button type="button" class="btn btn-dark"><a href="ListerDomaine.php" class="" style="text-decoration: none;color:white">Retour à la liste des Domaine</a></button>
				<button type="button" class="btn btn-dark"><a href="FormAddDomaine.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
			</div>
	<?php
		}
	}
	?>
</body>

</html>