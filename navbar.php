<?php
require_once('connexion.php');
$reqPhoneEMail = "select * from utilisateurs where type=1";
$resPhoneEMail = $pdo->query($reqPhoneEMail);
$rowPhoneEMail = $resPhoneEMail->fetch(PDO::FETCH_ASSOC);
?>
<div class="wrap ">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <div class="bg-wrap">
          <div class="row">
            <div class="col-md-6 d-flex align-items-center">
              <p class="mb-0 phone pl-md-2">
                <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> <?= $rowPhoneEMail['phone']; ?></a>
                <a href="#"><span class="fa fa-paper-plane mr-1"></span> <?= $rowPhoneEMail['email']; ?></a>
              </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
              <div class="social-media">
                <p class="mb-0 d-flex">
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="fa-brands fa-facebook"></span></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="fa-brands fa-instagram"></span></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><span
                      class="fa-brands fa-whatsapp"></span></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container ">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
      <img src="images/website/iconBlue.svg" alt="BETA ECO" srcset="" style="width: 2.5rem;">
    </a>

    <!-- Navigation List -->
    <div class="navbar-nav-wrapper">
      <span class="fa fa-bars navbar-toggler" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
        aria-expanded="false" aria-label="Toggle navigation"></span>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">A propos</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="annonces.php" class="nav-link">Annonces</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
    <a href="login.php" class="btn btn-primary">Se connecte</a>

  </div>
</nav>