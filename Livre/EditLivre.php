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
    $sql1 = "SELECT * FROM langue"; // créer la requête
    $table1 = $conx->query($sql1);

    $sql2 = "SELECT * FROM domaine"; // créer la requête
    $table2 = $conx->query($sql2);

    ?>

    <?php
    $codedo = $_POST['txt1'];
    $sql = "SELECT * FROM livre WHERE code_livre = " . $codedo; //créer la requête
    $table = $conx->query($sql); //Exécuter la requête


    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerLivre.php" class="" style="text-decoration: none;color:white">Retour à la liste des Livre</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditLivre.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="all">
            <form enctype="multipart/form-data" method="POST" action="SaveEditLivre.php">

                <div class="header">
                    <h2>Edit Livre</h2>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code livre</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" value="<?php echo $row['code_livre']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>titre de livre</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: learn mathematics.." name="txt2" value="<?php echo $row['titre']; ?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>auteur </b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: Name.." name="txt3" value="<?php echo $row['auteur']; ?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Annee edition </b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 1978.." name="txt4" value="<?php echo $row['annee_edition']; ?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Editeur </b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: Name.." name="txt5" value="<?php echo $row['editeur']; ?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Photo</b></label>
                    <label class="form-control"><b><?php echo '<img src="data:image;base64,' . base64_encode($row['photo']) . '" width=100px/>'; ?></b></label>
                </div>

                <div class=" form-group">
                    <label for="formGroupExampleInput"><b>Langue</b></label>
                    <select class="form-select" name="txt7">
                        <?php while ($row1 = $table1->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row1['code_langue'] ?>"><?php echo $row1['nom_langue'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Domaine</b></label>
                    <select class="form-select" name="txt8">
                        <?php while ($row2 = $table2->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row2['code_domaine'] ?>"><?php echo $row2['nom_domaine'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="myBtn">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div <?php } ?> </body>

            </form>
        </div>

</html>