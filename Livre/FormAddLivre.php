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
    $sql1 = "SELECT * FROM langue"; // créer la requête
    $table1 = $conx->query($sql1);

    $sql2 = "SELECT * FROM domaine"; // créer la requête
    $table2 = $conx->query($sql2);
    
    ?>

    <div class="all">
        <form enctype="multipart/form-data" method="POST" action="Addlivre.php">

            <div class="header">
                <h2>Ajouter Une Nouvelle livre</h2>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Code livre</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>titre de livre</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: learn mathematics.." name="txt2" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>auteur </b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: Name.." name="txt3" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Annee edition </b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 1978.." name="txt4" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Editeur </b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: Name.." name="txt5" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Photo</b></label>
                <input type="file" class="form-control" id="customFile" name="txt6"/>
            </div>

            <div class="form-group">
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
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>

        </form>
    </div>