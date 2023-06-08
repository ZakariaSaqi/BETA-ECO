<?php
$req ="select * from utilisateurs where id_user=".$_SESSION['id'];
$res = $pdo -> query($req);
$row = $res -> fetch(PDO :: FETCH_ASSOC);
?>
<section id="profil" class="hero-wrap hero-wrap-2" style="background-image: url(../images/website/bg_2.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2">
            <span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Votre profil <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-0 bread">Votre profil</h1>
        </div>
      </div>
    </div>
  </section>
  <section id="services" class="ftco-section">
    <div class="container">
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date d'inscription</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?= $row['date_inscription'] ?>
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
                                    <?= $row['niveau'] ?>
                                    </div>
                                </div>
                                <hr>
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
  </section> 