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
    $titre = $_POST["txt2"];
    $auteur = $_POST["txt3"];
    $annee = $_POST["txt4"];
    $editeur = $_POST["txt5"];
    $codela = $_POST["txt7"];
    $codedo = $_POST["txt8"];


    $sql = "UPDATE `livre` SET 
    titre ='" . $titre . "', 
    auteur ='" . $auteur . "', 
    annee_edition =" . $annee . ", 
    editeur ='" . $editeur . "',
    code_langue =" . $codela . ",
    code_domaine =" . $codela . "
    where code_livre=" . $codeli; //créer la requête

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
            <button type="button" class="btn btn-dark"><a href="FormEditLivre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Edit</a></button>
        </div>
    <?php
    }
    ?>
</body>

</html>