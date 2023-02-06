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


    
    
	//Récupérer les données saisies dans le formulaire
	$codepre = $_POST["txt0"];	
	$codeli = $_POST["txt1"];
	$titli = $_POST["txt2"];
	$autli = $_POST["txt3"];
	$aneli = $_POST["txt4"];
	$edili = $_POST["txt5"];

    $sql = "UPDATE `pret` SET 
    code_exemplaire   =" . $codeli . ", 
    code_membre  ='" . $titli . "', 
    date_pret  ='" . $autli . "', 
    date_retour  ='" . $aneli . "',
    remarque  ='" . $edili . "'
    where code_pret=" . $codepre; //créer la requête

    $resultat = $conx->query($sql); //Exécuter la requête
    if ($resultat == FALSE) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">Error<br /></p>
        </div>;
    <?php
    } else {
        // header("location:ListerPret.php");
    ?>
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerPret.php" class="" style="text-decoration: none;color:white">Retour à la liste des pret</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditPret.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Edit</a></button>
        </div>
    <?php
    }
    ?>
</body>

</html>