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
    $sql1 = "SELECT * FROM livre"; // créer la requête for livre
    $table1 = $conx->query($sql1);

    ?>

    <?php
    $codeEx = $_REQUEST['Ref'];
    $sql = "SELECT * FROM exemplaire WHERE code_exemplaire = " . $codeEx; //créer la requête
    $table = $conx->query($sql); //Exécuter la requête


    if ($table->rowCount() == 0) {
    ?>
        <div class="myMsg">
            <p class="alert alert-danger header">le code <b>' <?php echo $codeEx ?> '</b> n'existe pas<br /></p>
        </div>;
        <div class="butt">
            <button type="button" class="btn btn-dark"><a href="ListerExemplaire.php" class="" style="text-decoration: none;color:white">Retour à la liste des exemplaire</a></button>
            <button type="button" class="btn btn-dark"><a href="FormEditExemplaire.php" class="" style="text-decoration: none;color:white">Retour au formaulaire de saisie</a></button>
        </div>
    <?php
    } else
        while ($row = $table->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="all">
            <form enctype="multipart/form-data" method="POST" action="../SaveEditExemplaire.php">

                <div class="header">
                    <h2>Edit exemplaire</h2>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>Code exemplaire</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" value="<?php echo $row['code_exemplaire'];?>"readonly>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>annee achat</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 1978.." name="txt2" value="<?php echo $row['annee_achat'];?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>prix achat</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 197dh.." name="txt3" value="<?php echo $row['prix_achat'];?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2"><b>disponible </b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 10.." name="txt4" value="<?php echo $row['disponible'];?>">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput"><b>livre</b></label>
                    <select class="form-select" name="txt5">
                        <?php while ($row1 = $table1->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row1['code_livre'] ?>"><?php echo $row1['titre'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="myBtn">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div <?php } ?> </body>

            </form>
        </div>

</html>