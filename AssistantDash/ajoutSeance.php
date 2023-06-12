<?php
ob_start();
session_start();
if (!isset($_SESSION['ida'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    ?>
    <html lang="en">

    <head>
        <title>Admin - Ajouter séance</title>
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
                            <h4>Séances / Ajouter </h4>
                        </div>
                    </div>
                    <?php if (isset($_POST['btn'])) {
                    $req = "INSERT INTO seance (`type`, `niveau`, `date_seance`, `heure_debut`, `heure_fin`, `etat`,`id_user`)
                                    VALUES (
                                        '" . $_POST['type'] . "',
                                         '" . $_POST['niveau'] . "',
                                        '" . $_POST['date'] . "',
                                        '" . $_POST['hd'] . "',
                                        '" . $_POST['hf'] . "',
                                        1,
                                        '" . $_SESSION['ida'] . "'
                                    )";
                            $res = $pdo->query($req);
                             header('location:seances.php');
                        } ?>
                    <form action="" method="post">
                        <div class="row gutters-sm">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="date" name="date" id="" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Heure début</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="time" name="hd" id="" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Heure fin</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="time" name="hf" id="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Niveau</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="niveau" class="form-select  mb-3" required>
                                                    <option value="" selected>Choisir</option>
                                                    <option value="PME 2">PME 2</option>
                                                    <option value="PME 1">PME 1</option>
                                                    <option value="ENCG">ENCG</option>
                                                    <option value="ISTA">ISTA</option>
                                                    <option value="FAC">FAC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Type</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="type" class="form-select  mb-3">
                                                    <option value="" selected disabled>Choisir</option>
                                                    <option value="Cours">Cours</option>
                                                    <option value="TP">TP</option>
                                                    <option value="TD">TD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <button class="btn btn-info" name="btn" type="submit"> Ajouter</button>
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
ob_end_flush();?>
