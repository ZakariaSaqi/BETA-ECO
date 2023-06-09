<?php
session_start();
if(!isset($_SESSION['idd'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
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
                        <h4>étudiant profil</h4>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prénom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Adresse</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
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
                                        <select name="" class="form-select  mb-3">
                                            <option value="" selected>Choisir</option>
                                            <option value="">PME 2</option>
                                            <option value="">PME 1</option>
                                            <option value="">ENCG</option>
                                            <option value="">ISTA</option>
                                            <option value="">FA</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Login</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mots de passe</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Confirmation</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-sm-6">
                            <a class="btn btn-info " target="__blank" href="modifier.php">Ajouter</a>
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