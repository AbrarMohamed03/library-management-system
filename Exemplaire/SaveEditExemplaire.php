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


    
    
	$codeEx = $_POST["txt1"];
	$Anee = $_POST["txt2"];
	$Prix = $_POST["txt3"];
	$Dispo = $_POST["txt4"];
	$Codeli = $_POST["txt5"];


    $sql = "UPDATE `exemplaire` SET  
    annee_achat  =" . $Anee . ", 
    prix_achat  =" . $Prix . ",
    disponible  =" . $Dispo . ",
    code_livre  =" . $Codeli . "
    where code_exemplaire=" . $codeEx; //créer la requête

    $resultat = $conx->query($sql); //Exécuter la requête
    if ($resultat == FALSE) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">Error<br /></p>
        </div>;
    <?php
    } else {
        // header("location:ListerExemplaire.php");
    ?>
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerExemplaire.php" class="" style="text-decoration: none;color:white">Retour à la liste des exemplaire</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditExemplaire.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Edit</a></button>
        </div>
    <?php
    }
    ?>
</body>

</html>