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
    include('menu.html');
    ?>

    <div class="all">
        <form method="POST" action="Editlangue.php">

            <div class="header">
                <h2>Edit Une langue</h2>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput"><b>Code langue</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: 1.." name="txt1">
            </div>

            <div class="myBtn">
                <button type="submit" class="btn btn-dark">Edit</button>
            </div>

        </form>
    </div>

</body>

</html>