<?php
session_start();
if (!isset($_SESSION['idc'])) {
  header('location:../login.php');
} else {
  require_once('../connexion.php');
  ?>
  <html lang="en">

  <head>
    <title>Client - Feedback</title>
  </head>
  <?php include('links.html'); ?>

  <body>
    <style>
      .navbar-nav-wrapper ul li i {
        font-size: 1.2rem;
        padding-left: .5rem;
        padding-right: .5rem;
      }
    </style>
   <?php include('navbar.php') ?>
    <section id="profil" class="hero-wrap hero-wrap-2" style="background-image: url(../images/website/bg_3.jpg)"
      data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
              <span>Témoignages<i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-0 bread">Exprimer à votre satisfaction</h1>
          </div>
        </div>
      </div>
    </section>
    <?php
    if(isset($_POST['btn'])){
      $feedback = trim($_POST['feedback']);
      $escapedfeedback = str_replace("'", "\'", $feedback);
      $req = "insert into feedback (contenu,etat, id_user) values ('".$escapedfeedback."', 0, ".$_SESSION['idc'].")";
      $res = $pdo -> query($req);
      header('location:about.php#feedback');
    }
    ?>
    <section id="services" class="ftco-section">
      <div class="container">
        <form action="" method="post">
          <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Exprimer</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea name="feedback" class="form-control" id="" cols="30" rows="10" style="height:10rem"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-6">
                  <button class="btn btn-info " name="btn" type="submit">Ajouter</button>
                </div>
              </div>
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