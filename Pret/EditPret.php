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
    include('menu.html'); ?>

    <?php
    $sql1 = "SELECT * FROM exemplaire"; // créer la requête
    $table1 = $conx->query($sql1);

    $sql2 = "SELECT * FROM membre"; // créer la requête
    $table2 = $conx->query($sql2);
    
    ?>

    <?php
    $codedo = $_POST['txt1'];
    $sql = "SELECT * FROM pret WHERE code_pret = " . $codedo; //créer la requête
    $table = $conx->query($sql); //Exécuter la requête


    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codedo ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerPret.php" class="" style="text-decoration: none;color:white">Retour à la liste des pret</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditPret.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="all">
            <form enctype="multipart/form-data" method="POST" action="SaveEditPret.php">

                <div class="header">
                    <h2>Edit pret</h2>
                </div>


                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code pret </b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="txt0" value="<?php echo $row['code_pret']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code exemplaire</b></label>
                    <select class="form-select" name="txt1">
                        <?php while ($row1 = $table1->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row1['code_exemplaire'] ?>"><?php echo $row1['code_exemplaire'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Membre Nom</b></label>
                    <select class="form-select" name="txt2">
                        <?php while ($row2 = $table2->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row2['code_membre'] ?>"><?php echo $row2['nom'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Date_pret </b></label>
                    <input type="date" class="form-control" id="formGroupExampleInput" name="txt3" value="<?php echo $row['date_pret']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>Date_retour</b></label>
                    <input type="date" class="form-control" id="formGroupExampleInput2" name="txt4" value="<?php echo $row['date_retour']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Remarque</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput"  name="txt5" value="<?php echo $row['remarque']; ?>" required>
                </div>

                <div class="myBtn">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div <?php } ?> </body>

            </form>
        </div>

</html>