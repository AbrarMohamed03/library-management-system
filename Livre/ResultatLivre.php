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
<!-- Retour à la liste des Livre ListerLivre.php
Retour au formaulaire de saisie FormSearchLivre.php -->

<body>
    <style>
        <?php
        include('../inclodes/style.css');
        ?>
    </style>

    <?php include('menu.html'); ?>

    <?php
    $codedo = $_POST['txt1'];
    $sql = "SELECT * FROM livre WHERE code_livre = " . $codedo; // créer la requête
    $table = $conx->query($sql); // Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerLivre.php" class="" style="text-decoration: none;color:white">Retour à la liste des Livre</a></button>
            <button type="button" class="btn btn-dark"><a href="FormSearchLivre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <div class="all container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="row1">
                        <th>Code Livre</th>
                        <th>titre de Livre </th>
                        <th>auteur </th>
                        <th>Annee edition </th>
                        <th>Editeur </th>
                        <th>Photo </th>
                        <th>Langue </th>
                        <th>Domaine </th>
                    </tr>
                </thead>
                <tbody class="rounded">
                    <tr>
                        <td><?php echo $row['code_livre'] ?> </td>
                        <td><?php echo $row['titre'] ?> </td>
                        <td><?php echo $row['auteur'] ?> </td>
                        <td><?php echo $row['annee_edition'] ?> </td>
                        <td><?php echo $row['editeur'] ?> </td>
                        <td><?php
                            echo '<img src="data:image;base64,' . base64_encode($row['photo']) . '" width=100px/>';
                            ?>
                        </td>
                        <td><?php echo $row['code_langue'] ?> </td>
                        <td><?php echo $row['code_domaine'] ?> </td>
                    </tr>
                <tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>