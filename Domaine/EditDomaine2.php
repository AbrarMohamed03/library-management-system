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

    <?php include('menu2.html'); ?>

    <?php
    $codedo = $_REQUEST['Ref'];
    $sql = "SELECT * FROM Domaine WHERE code_Domaine = " . $codedo; //créer la requête
    $table = $conx->query($sql); //Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerDomaine.php" class="" style="text-decoration: none;color:white">Retour à la liste des Domaine</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditDomaine.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="all">
            <form method="POST" action="../SaveEditDomaine.php">

                <div class="header">
                    <h2>Edit Domaine</h2>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code Domaine</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" value="<?php echo $row['code_domaine'];?>" readonly>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Nom Domaine</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Math.." name="txt2" value="<?php echo $row['nom_domaine'];?>">
                </div>

                <div class="myBtn">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div>

            <?php } ?>
</body>

</html>