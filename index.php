<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="inclodes/Indexstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <!-- header -->
    <section class="header">
        <nav>
            <a href="index.php" class="logo"><div class="bibli">Bibliothèque</div> </a>
            <div class="nav-links">
                
                <ul class="nav nav-pills m-3 justify-content-center" id="pills-tab" role="tablist">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b> 📚 Domaine</b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Domaine/ListerDomaine.php">≣≣ Lister Domaine</a></li>
                            <li><a class="dropdown-item" href="Domaine/FormAddDomaine.php"> ➕ Add Domaine</a></li>
                            <li><a class="dropdown-item" href="Domaine/FormEditDomaine.php">✏ Edit Domaine </a></li>
                            <li><a class="dropdown-item" href="Domaine/FormDeleteDomaine.php">🗑 Delete Domaine</a></li>
                            <li><a class="dropdown-item" href="Domaine/FormSearchDomaine.php">🔎 Search Domaine</a></li>
                        </ul>
                    </div>


                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1 " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>🈲 Langue</b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Langue/ListerLangue.php">≣≣ Lister Langue</a></li>
                            <li><a class="dropdown-item" href="Langue/FormAddLangue.php">➕ Add Langue</a></li>
                            <li><a class="dropdown-item" href="Langue/FormEditLangue.php">✏ Edit Langue</a></li>
                            <li><a class="dropdown-item" href="Langue/FormDeleteLangue.php">🗑 Delete Langue</a></li>
                            <li><a class="dropdown-item" href="Langue/FormSearchLangue.php">🔎 Search Langue</a></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>📖 Livre </b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Livre/ListerLivre.php">≣≣ Lister Livre</a></li>
                            <li><a class="dropdown-item" href="Livre/FormAddLivre.php">➕ Add Livre</a></li>
                            <li><a class="dropdown-item" href="Livre/FormEditLivre.php">✏ Edit Livre</a></li>
                            <li><a class="dropdown-item" href="Livre/FormDeleteLivre.php">🗑 Delete Livre</a></li>
                            <li><a class="dropdown-item" href="Livre/FormSearchLivre.php">🔎 Search Livre</a></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>✔ Exemplaire</b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Exemplaire/ListerExemplaire.php">≣≣ Lister Exemplaire</a></li>
                            <li><a class="dropdown-item" href="Exemplaire/FormAddExemplaire.php">➕ Add Exemplaire</a></li>
                            <li><a class="dropdown-item" href="Exemplaire/FormEditExemplaire.php">✏ Edit Exemplaire</a></li>
                            <li><a class="dropdown-item" href="Exemplaire/FormDeleteExemplaire.php">🗑 Delete Exemplaire</a></li>
                            <li><a class="dropdown-item" href="Exemplaire/FormSearchExemplaire.php">🔎 Search Exemplaire</a></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>👨‍🎓 Membre</b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Membre/ListerMembre.php">≣≣ Lister Membre</a></li>
                            <li><a class="dropdown-item" href="Membre/FormAddMembre.php">➕ Add Membre</a></li>
                            <li><a class="dropdown-item" href="Membre/FormEditMembre.php">✏ Edit Membre</a></li>
                            <li><a class="dropdown-item" href="Membre/FormDeleteMembre.php">🗑 Delete Membre</a></li>
                            <li><a class="dropdown-item" href="Membre/FormSearchMembre.php">🔎 Search Membre</a></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-hover m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>↺ Pret </b>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="Pret/ListerPret.php">≣≣ Lister Pret</a></li>
                            <li><a class="dropdown-item" href="Pret/FormAddPret.php">➕ Add Pret</a></li>
                            <li><a class="dropdown-item" href="Pret/FormEditPret.php">✏ Edit Pret</a></li>
                            <li><a class="dropdown-item" href="Pret/FormDeletePret.php">🗑 Delete Pret</a></li>
                            <li><a class="dropdown-item" href="Pret/FormSearchPret.php">🔎 Search Pret</a></li>
                        </ul>
                    </div>

                </ul>

            </div>
        </nav>
        <style>
            .all{
                text-align: center
            }
        </style>
        <div class="all">
            <h1>
                <div class="d-flex justify-content-evenly mid ">
                Made by <br> <br>
                Mohamed Abrar <br> & <br> Zine-eddine Bardoud 
                </div>
            </h1>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>