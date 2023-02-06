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
<!-- Retour à la liste des Domaine ListerDomaine.php
Retour au formaulaire de saisie FormSearchDomaine.php -->

<body>
    <style>
        <?php
        include('../inclodes/style.css');
        ?>
    </style>

    <?php include('menu.html'); ?>

    <?php
    $codedo = $_POST['txt1'];
    $sql = "SELECT * FROM Domaine WHERE code_domaine = " . $codedo; // créer la requête
    $table = $conx->query($sql); // Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerDomaine.php" class="" style="text-decoration: none;color:white">Retour à la liste des Domaine</a></button>
            <button type="button" class="btn btn-dark"><a href="FormSearchDomaine.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <div class="all container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="row1">
                        <th>Code Domaine</th>
                        <th>Nom Domaine</th>
                    </tr>
                </thead>
                <tbody class="rounded">
                    <tr>
                        <td ><?php echo $row['code_domaine'] ?> </td>
                        <td><?php echo $row['nom_domaine'] ?> </td>
                    </tr>
                <tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>