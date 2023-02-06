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
    $codeme = $_POST['txt1'];
    $sql = "SELECT * FROM membre WHERE code_membre = " . $codeme; //créer la requête
    $table = $conx->query($sql);

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codeme ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerMembre.php" class="" style="text-decoration: none;color:white">Retour à la liste des membre</a></button>
            <button type="button" class="btn btn-dark"><a href="FormDeleteMembre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Delete</a></button>
        </div>
        <?php
    } else {

        //Récupérer les données saisies dans le formulaire
        $sql = "DELETE FROM membre WHERE code_membre = " . $codeme; //créer la requête
        $resultat = $conx->query($sql); //Exécuter la requête

        if ($resultat == FALSE) {
        ?>
            <div class="myMsg">
                <p class="alert alert-danger header">le code <b>' <?php echo $codeme ?> '</b> n'existe pas<br /></p>
            </div>;
        <?php
        } else {
            header("location:ListerMembre.php");
        }
    }
        ?>
</body>

</html>