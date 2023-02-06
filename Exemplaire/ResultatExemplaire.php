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
<!-- Retour à la liste des exemplaire ListerExemplaire.php
Retour au formaulaire de saisie FormSearchExemplaire.php -->

<body>
    <style>
        <?php
        include('../inclodes/style.css');
        ?>
    </style>

    <?php include('menu.html'); ?>

    <?php
    $codeEx = $_POST['txt1'];
    $sql = "SELECT * FROM exemplaire WHERE code_exemplaire = " . $codeEx; // créer la requête
    $table = $conx->query($sql); // Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codeEx ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerExemplaire.php" class="" style="text-decoration: none;color:white">Retour à la liste des exemplaire</a></button>
            <button type="button" class="btn btn-dark"><a href="FormSearchExemplaire.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de Rechercher</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <div class="all container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="row1">
                        <th>Code Exemplaire</th>
                        <th>annee Achat </th>
                        <th>prix Achat </th>
                        <th>disponible </th>
                        <th>code Livre </th>
                    </tr>
                </thead>
                <tbody class="rounded">
                        <tr>
                            <td><?php echo $row['code_exemplaire'] ?> </td>
                            <td><?php echo $row['annee_achat'] ?> </td>
                            <td><?php echo $row['prix_achat'] ?> </td>
                            <td><?php echo $row['disponible'] ?> </td>
                            <td><?php echo $row['code_livre'] ?> </td>
                        </tr>
                <tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>