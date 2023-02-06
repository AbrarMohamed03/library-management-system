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
<!-- Retour à la liste des pret ListerPret.php
Retour au formaulaire de saisie FormSearchPret.php -->

<body>
    <style>
        <?php
        include('../inclodes/style.css');
        ?>
    </style>

    <?php include('menu.html'); ?>

    <?php
    $codepre = $_POST['txt1'];
    $sql = "SELECT * FROM pret WHERE code_pret = " . $codepre; // créer la requête
    $table = $conx->query($sql); // Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codepre ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerPret.php" class="" style="text-decoration: none;color:white">Retour à la liste des pret</a></button>
            <button type="button" class="btn btn-dark"><a href="FormSearchPret.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <div class="all container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="row1">
                        <th>Code pret</th>
                        <th>Code exemplaire</th>
                        <th>Code membre </th>
                        <th>Date pret </th>
                        <th>Date retour </th>
                        <th>Remarque </th>
                    </tr>
                </thead>
                <tbody class="rounded">
                    <tr>
                        <td><?php echo $row['code_pret'] ?> </td>
                        <td><?php echo $row['code_exemplaire'] ?> </td>
                        <td><?php echo $row['code_membre'] ?> </td>
                        <td><?php echo $row['date_pret'] ?> </td>
                        <td><?php echo $row['date_retour'] ?> </td>
                        <td><?php echo $row['remarque'] ?> </td>
                    </tr>
                <tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>