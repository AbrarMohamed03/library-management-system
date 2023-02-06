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

    <div class="all">
        <form enctype="multipart/form-data" method="POST" action="AddPret.php">

            <div class="header">
                <h2>Ajouter Une Nouvelle pret</h2>
            </div>
            
            <div class="form-group">
                <label for="formGroupExampleInput"><b>Code pret </b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="txt0" placeholder="Ex: 1.." required>
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
                <input type="date" class="form-control" id="formGroupExampleInput" name="txt3" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Date_retour</b></label>
                <input type="date" class="form-control" id="formGroupExampleInput2" name="txt4" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Remarque</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: remarque.." name="txt5" required>
            </div>

            <div class="myBtn">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>

        </form>
    </div>