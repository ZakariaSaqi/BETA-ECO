<?php
ob_start();
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    ?>
    <html lang="en">

    <head>
        <title>Directeur - Ajouter cours</title>
        <?php include('links.html') ?>
    </head>
    <style>
        .form-control,
        .form-select {
            border-radius: 5px;
            height: 35px;
            border-color: #5D87FF;
        }
    </style>

    <body>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <?php include('navbar.php') ?>
            <div class="container-fluid">
                <div class="main-body">

                    <div class="row">
                        <div class="col-md-12 nav-small-cap">
                            <h4>Cours / Ajouter</h4>
                        </div>
                        <?php
                        if (isset($_POST['btn']) && isset($_FILES['imgcours'])) {
                            $cour = "../images/cours/" . $_POST['type'] . "-" . $_POST['metier'] . "-" . $_POST['titre'];
                            $fileExtension = pathinfo($_FILES['imgcours']['name'], PATHINFO_EXTENSION);
                            $courWithExtension = $cour . "." . $fileExtension;
                            $cours = move_uploaded_file($_FILES['imgcours']['tmp_name'], $courWithExtension);

                            $req = "INSERT INTO cours (type, titre, cours,metier ,niveau, id_user)
                                    VALUES (
                                        '" . $_POST['type'] . "',
                                        '" . ucfirst($_POST['titre']) . "',
                                        '" . $courWithExtension . "',
                                        '" . ucfirst($_POST['metier']) . "',
                                        '" . $_POST['niveau'] . "',
                                        '" . $_SESSION['idd'] . "'
                                    )";
                            $res = $pdo->query($req);
                            header('location:cours.php');
                        }
                        ?>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row gutters-sm">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Type</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="type" class="form-select  mb-3" required>
                                                    <option value="" selected disabled>Choisir</option>
                                                    <option value="Cours">Cours</option>
                                                    <option value="Exercices">Exercices</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Titre</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="titre" class="form-control" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Métier</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="metier" class="form-control" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Description</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea name="description" class="form-control" cols="30" rows="10"
                                                    style="height:10rem" required></textarea>
                                            </div>
                                        </div>
                                        <hr> -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Cours</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" name="imgcours" class="form-control" required
                                                    accept=".doc,.docx,.pdf">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Niveau</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="niveau" class="form-select  mb-3">
                                                    <option value="" selected disabled>Choisir</option>
                                                    <option value="BAC">BAC</option>
                                                    <option value="BTS">BTS</option>
                                                    <option value="ENCG">ENCG</option>
                                                    <option value="OFPPT">OFPPT</option>
                                                    <option value="Faculté">Faculté</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <button class="btn btn-info" type="submit" name="btn">Ajouter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php }
ob_end_flush(); ?>