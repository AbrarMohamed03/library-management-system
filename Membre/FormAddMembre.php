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

    <div class="all">
        <form method="POST" action="AddMembre.php">

            <div class="header">
                <h2>Ajouter Une Nouvelle membre</h2>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Code membre</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Nom</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Nom.." name="txt2" required>
            </div>
            
            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Prenom</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Prenom.." name="txt3" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Adresse</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: Rue 16.." name="txt4" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Ville</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: agadir.." name="txt5" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Email</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: user@mail.com.." name="txt6" required>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2"><b>Telephone</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 060000000.." name="txt7" required>
            </div>

            <div class="myBtn">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>

        </form>
    </div>