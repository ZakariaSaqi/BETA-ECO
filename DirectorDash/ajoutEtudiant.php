<?php
session_start();
require_once('../connexion.php');

if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
    exit();
} else {
    if (isset($_POST['btn'])) {
        if ($_POST['psw'] == $_POST['cpsw']) {
            $phoneRegex = "/^\+212[5-7]\d{8}$/";
            if (preg_match($phoneRegex, $_POST['phone']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // hadi ktverfier wesh domain kyn olala
                list(, $domain) = explode('@', $_POST['email']);
                if (checkdnsrr($domain, 'MX')) {
                    $req = "INSERT INTO utilisateurs (type, etat , prenom, nom, phone, email, adresse, niveau, login, psw)
          VALUES (4, 1, '" . ucfirst($_POST['prenom']) . "', '" . strtoupper($_POST['nom']) . "', '" . $_POST['phone'] . "','" . $_POST['email'] . "', '" . $_POST['adresse'] . "','" . $_POST['niveau'] . "', '" . $_POST['login'] . "','" . $_POST['psw'] . "')";
                    $res = $pdo->query($req);
                    header('location:etudiant.php');
                    exit();
                } else {
                    echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
                }
            } else {
                echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
            }
        } else {
            echo "<center>Mots de passe non correspondants !</center>";
        }
    }
    ?>

    <html lang="en">

    <head>
        <title>Admin - Cours</title>
        <?php include('links.html') ?>
    </head>

    <body>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <?php include('navbar.php') ?>
            <div class="container-fluid">
                <div class="main-body">
                    <div class="row">
                        <div class="col-md-12 nav-small-cap">
                            <h4>Ajouter un étudiant</h4>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div class="row gutters-sm">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Prénom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="prenom" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="nom" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="phone" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" class="form-control" name="email" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Adresse</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="adresse" id="">
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
                                                <h6 class="mb-0">Login</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="login" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mots de passe</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" class="form-control" name="psw" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirmation</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" class="form-control" name="cpsw" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <button class="btn btn-info" type="submit" name="btn">Ajouter</button>
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
<?php } ?>