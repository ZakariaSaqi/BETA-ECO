<?php
session_start();
if(!isset($_SESSION['ida'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
  <?php
$req ="select * from utilisateurs where id_user=".$_SESSION['ida'];
$res = $pdo -> query($req);
$row = $res -> fetch(PDO :: FETCH_ASSOC);
?>
<html lang="en">
<head>
    <title>Assistant - Profil</title>
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
                        <h4>Votre profile</h4>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['prenom']." ".$row['nom'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['phone'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['adresse'] ?>
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
                                    <?= $row['login'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mots de passe</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['psw'] ?>
                                    </div>
                                    <!-- <input type="text" class="form-control" value="Bay Area, San Francisco, CA"> -->
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-sm-6">
                            <a class="btn btn-info " href="modifierProfil.php">Modifier</a>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>