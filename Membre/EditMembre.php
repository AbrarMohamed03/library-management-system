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

    <?php include('menu.html'); ?>

    <?php
    $codeme = $_POST['txt1'];
    $sql = "SELECT * FROM membre WHERE code_membre = " . $codeme; //créer la requête
    $table = $conx->query($sql); //Exécuter la requête

    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codeme ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerMembre.php" class="" style="text-decoration: none;color:white">Retour à la liste des membre</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditMembre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="all">
            <form method="POST" action="SaveEditMembre.php">

                <div class="header">
                    <h2>Edit membre</h2>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code membre</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" value="<?php echo $row['code_membre']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Nom</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Nom.." name="txt2" value="<?php echo $row['nom']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Prenom</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Prenom.." name="txt3" value="<?php echo $row['prenom']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Adresse</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Rue 16.." name="txt4" value="<?php echo $row['adresse']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Ville</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: agadir.." name="txt5" value="<?php echo $row['ville']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Email</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: user@mail.com.." name="txt6" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Telephone</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 060000000.." name="txt7" value="<?php echo $row['tel']; ?>"required>
                </div>

                <div class="myBtn">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div>

            <?php } ?>
</body>

</html>