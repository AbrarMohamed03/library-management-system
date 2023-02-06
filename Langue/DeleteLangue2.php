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
    $codela = $_REQUEST['Ref'];

    $sql = "DELETE FROM langue WHERE code_langue = " . $codela; //créer la requête
    $resultat = $conx->query($sql); //Exécuter la requête

    if ($resultat == FALSE) {
        ?>
            <div class="myMsg">
                <p class="alert alert-danger header">Error<br /></p>
            </div>;
        <?php
        } else {
            // header("location:Listerlangue.php");
        ?>
            <div class="butt">
                <button type="button" class="btn btn-dark"><a href="../Listerlangue.php" class="" style="text-decoration: none;color:white">Retour à la liste des langue</a></button>
            </div>
        <?php
        }
        ?>
</body>

</html>