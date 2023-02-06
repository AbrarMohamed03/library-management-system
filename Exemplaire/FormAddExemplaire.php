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
    $sql1 = "SELECT * FROM livre"; // créer la requête
    $table1 = $conx->query($sql1);

    ?>

    <div class="all">
        <form enctype="multipart/form-data" method="POST" action="AddExemplaire.php">

            <div class="header">
                <h2>Ajouter Une Nouvelle exemplaire</h2>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Code exemplaire</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>annee achat</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 1978.." name="txt2" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>prix achat</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 197dh.." name="txt3" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>disponible </b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 10.." name="txt4" required>
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
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>

        </form>
    </div>