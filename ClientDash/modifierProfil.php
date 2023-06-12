<?php
session_start();
if (!isset($_SESSION['idc'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from utilisateurs where id_user=" . $_SESSION['idc'];
    $res = $pdo->query($req);
    $row = $res->fetch(PDO::FETCH_ASSOC); ?>
    <html lang="en">

    <head>
        <title>Admin - Cours</title>
    </head>
    <?php include('links.css'); ?>

    <body>
        <style>
            .navbar-nav-wrapper ul li i {
                font-size: 1.2rem;
                padding-left: .5rem;
                padding-right: .5rem;
            }
        </style>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container ">
                <!-- Logo -->
                <a class="navbar-brand" href="index.php">
                    <img src="../images/website/iconBlue.svg" alt="BETA ECO" srcset="" style="width: 2.5rem;">
                </a>

                <!-- Navigation List -->
                <div class="navbar-nav-wrapper">
                    <span class="fa fa-bars navbar-toggler" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"></span>
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-bell"></i></a></li>
                            <li class="nav-item"><a href="#index.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                            </li>
                            <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                        class="fa-solid fa-right-from-bracket"></i></a></li>
                        </ul>
                    </div>

                </div>
        </nav>
        <section id="profil" class="hero-wrap hero-wrap-2" style="background-image: url(../images/website/bg_3.jpg')"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end">
                    <div class="col-md-9 ftco-animate pb-5">
                        <p class="breadcrumbs mb-2">
                            <span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
                            <span>Votre profil <i class="ion-ios-arrow-forward"></i></span>
                        </p>
                        <h1 class="mb-0 bread">Modfier profil</h1>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="ftco-section">
            <div class="container">
                <?php
                if (isset($_POST['btn'])) {
                    if ($_POST['psw'] == $_POST['cpsw']) {
                        $phoneRegex = "/^\+\d{1,3}\d{4,14}$/";
                        if (preg_match($phoneRegex, $_POST['phone']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            // hadi ktverfier wesh domain kyn olala
                            list(, $domain) = explode('@', $_POST['email']);
                            if (checkdnsrr($domain, 'MX')) {
                                $req2 = "update utilisateurs set prenom ='" . ucfirst($_POST['prenom']) . "', service ='" . $_POST['srv'] . "', nom= '" . strtoupper($_POST['nom']) . "', phone= '" . $_POST['phone'] . "', email='" . $_POST['email'] . "', adresse ='" . $_POST['adresse'] . "', login ='" . $_POST['login'] . "', psw = '" . $_POST['psw'] . "'
                where type=3  and id_user =" . $_SESSION['idc'];
                                $res2 = $pdo->query($req2);
                                header('location:index.php#profil');
                                // echo "<center>Profil modifié avec succès</center>";
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
                                            <h6 class="mb-0">Service</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <select name="srv" class="form-select  mb-3">
                                  <option value="<?=  $row['service'] ?>" selected ><?=  $row['service'] ?></option>
                                  <option value="CNCS">CNCS</option>
                                  <option value="Consultation">Consultation</option>
                                  <option value="Formation">Formation</option>
                                </select>
                                        </div>
                                    </div>
                                    <hr>
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
        </section>
        <?php include('footer.php');
        ?>
    </body>

    </html>
<?php } ?>