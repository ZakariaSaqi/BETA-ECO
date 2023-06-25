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
        <title>Directeur - Ajouter séance</title>
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
                                        '" . $_SESSION['idd'] . "'
                                    )";
                        $res = $pdo->query($req);
                        if ($res) {
                            $req3 = "select id_user from utilisateurs where type = 4 and etat = 1 and niveau='".$_POST['niveau']."'" ;
                            $res3 = $pdo->query($req3);
                            while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
                                $req_notif = "insert into notification (type_notif, etat_notif, id_user) values('Nouvelle séance ". "Le ".$_POST['date'].". 
                                <br> A partire de ".$_POST['hd'].".  ', 1," . $row3['id_user'] . ")";
                                $res_notif = $pdo->query($req_notif);
                            }
                        }
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
                                                <input type="date" name="date" id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Heure début</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary" required>
                                                <input type="time" name="hd" id="" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0" required>Heure fin</h6>
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
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Type</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="type" class="form-select  mb-3" required>
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
ob_end_flush(); ?>