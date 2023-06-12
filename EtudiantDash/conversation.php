<?php
session_start();
if (!isset($_SESSION['ide'])) {
  header('location:../login.php');
} else {
  require_once('../connexion.php');
  $req = "select phone from utilisateurs where type=1";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  $phoneNumber = $row['phone'];
  $numberWithoutPlus = ltrim($phoneNumber, '+');
  ?>
  <html lang="en">

  <head>
    <title>Etudiant - Conversation</title>
    <?php include('links.html') ?>
  </head>

  <body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <?php include('navbar.php') ?>
      <div class="container-fluid">
        <div class="container">
          <div class="row mb-2 d-flex align-items-center ">
            <div class="col-md-12 nav-small-cap">
              <h4>Contactez-nous via WhatsApp!</h4>
            </div>
          </div>
          <div class="row mb-2 d-flex align-items-center ">
            <div class="col-md-12 px-5">
              <p>Bienvenue dans l'espace de conversation par WhatsApp de  Beta Éco ! <br> Si vous avez des
                questions, des préoccupations ou besoin d'une assistance personnalisée, notre équipe dévouée est là pour
                vous aider. Utilisez ce lien pour nous contacter directement sur WhatsApp et obtenir des réponses rapides
                à vos demandes.<br> Nous sommes impatients de vous accompagner dans votre parcours d'apprentissage et de vous
                offrir le soutien dont vous avez besoin. <br> N'hésitez pas à nous contacter dès maintenant !</p>
            </div>
          </div>
          <style>
            .wtsp{
              background-color: #2A3547;
              text-transform: capitalize;
              font-size: 15px;
              width: 200px;
              color: #fff;
              font-weight: 600;
              border-radius: 10px;
            }
          </style>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center ">
            <a href="https://wa.me/<?= $numberWithoutPlus ?>" class="wtsp px-4 py-1 d-flex align-items-center justify-content-around">Cliquez ici <i class="fa-brands fa-whatsapp" style="color:#FFFF; font-size:2rem"></i></a>
      
            </div>
          </div>
        </div>
        </div>
  </body>

  </html>
<?php } ?>