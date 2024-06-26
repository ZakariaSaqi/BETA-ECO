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
        <title>Assistant - Opération</title>
        <?php include('links.html') ?>
    </head>
    <?php
    if ($_GET['action'] == 'update') {
        $id = $_GET['id'];
        $req = "select * from seance where  id_seance=$id ";
        $res = $pdo->query($req);
        $row = $res->fetch(PDO::FETCH_ASSOC); ?>

        <body>
            <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-siddbartype="full"
                data-sidebar-position="fixed" data-header-position="fixed">
                <?php include('navbar.php'); ?>
                <div class="container-fluid">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-md-12 nav-small-cap">
                                <h4>Modifier le cours</h4>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['btn'])) {
                            $req = "update seance set type ='" . $_POST['type'] . "',
                            niveau= '" . $_POST['niveau'] . "',
                             date_seance=  '" . $_POST['date'] . "',
                             heure_debut=  '" . $_POST['hd'] . "',
                             heure_fin=  '" . $_POST['hf'] . "',
                             etat =1,
                             id_user= '" . $_SESSION['ida'] . "' 
                             where id_seance=$id";
                            $res = $pdo->query($req);
                            header('location:seances.php');
                        }

                        ?>
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
                                                    <input type="date" value="<?= $row['date_seance'] ?>" name="date" id=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Heure début</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="time" value="<?= $row['heure_debut'] ?>" name="hd" id=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Heure fin</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="time" name="hf" value="<?= $row['heure_fin'] ?>" id=""
                                                        class="form-control">
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
                                                    <select name="niveau" class="form-select  mb-3">
                                                        <option value="<?= $row['niveau'] ?>" selected><?= $row['niveau'] ?>
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
                                                    <select name="type" class="form-select  mb-3">
                                                        <option value="<?= $row['type'] ?>" selected><?= $row['type'] ?>
                                                        </option>
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
                                            <button class="btn btn-info" name="btn" type="submit"> Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    <?php }
}
?>

</html>
<?php ob_end_flush(); ?>