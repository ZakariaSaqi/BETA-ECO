<?php
ob_start();
session_start();
if(!isset($_SESSION['idd'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<html lang="en">

<head>
    <title>Directeur - Profil</title>
    <?php include('links.html') ?>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-siddbartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('navbar.php');
        $req = "select * from utilisateurs where id_user=" . $_SESSION['idd'];
        $res = $pdo->query($req);
        $row = $res->fetch(PDO::FETCH_ASSOC); ?>
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="col-md-12 nav-small-cap">
                        <h4>Modifier votre profile</h4>
                    </div>
                </div>
                <?php
                if (isset($_POST['btn'])) {
                    if ($_POST['psw'] == $_POST['cpsw']) {
                        $phoneRegex = "/^\+\d{1,3}\d{4,14}$/";
                        if (preg_match($phoneRegex, $_POST['phone']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            // hadi ktverfier wesh domain kyn olala
                            list(, $domain) = explode('@', $_POST['email']);
                            if (checkdnsrr($domain, 'MX')) {
                                $req2 = "update utilisateurs set prenom ='" . ucfirst($_POST['prenom']) . "', nom= '" . strtoupper($_POST['nom']) . "', phone= '" . $_POST['phone'] . "', email='" . $_POST['email'] . "', adresse ='" . $_POST['adresse'] . "', login ='" . $_POST['login'] . "', psw = '" . $_POST['psw'] . "'
                where type=1  and id_user =" . $_SESSION['idd'];
                                $res2 = $pdo->query($req2);
                                header('location:profil.php');
                            } else
                                echo "<center>Numero de téléphone ou adresse non valide !</center>";
                        } else
                            echo "<center>Numero de téléphone ou adresse non valide !</center>";
                    } else
                        echo "<center>Mots de passe pas correspondant !";
                }
                ?>
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
                                            <input type="text" class="form-control" name="prenom" id=""
                                                value="<?= $row['prenom'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nom</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="nom" id=""
                                                value="<?= $row['nom'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone" id=""
                                                value="<?= $row['phone'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" class="form-control" name="email" id=""
                                                value="<?= $row['email'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Adresse</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="adresse" id=""
                                                value="<?= $row['adresse'] ?>">
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
                                            <h6 class="mb-0">Login</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="login" id=""
                                                value="<?= $row['login'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mots de passe</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="psw" id=""
                                                value="<?= $row['psw'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirmation</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="cpsw" id=""
                                                value="<?= $row['psw'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <button class="btn btn-info " type="submit" name="btn">Confirmer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php }  ob_end_flush(); ?>