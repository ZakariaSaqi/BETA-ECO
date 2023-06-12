<?php
session_start();
if(!isset($_SESSION['ide'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  $req ="select prenom, nom from utilisateurs where id_user=".$_SESSION['ide'];
  $res = $pdo -> query($req);
  $row = $res -> fetch(PDO :: FETCH_ASSOC);
  ?>
  <!doctype html>
<html lang="en">
<head>
  <title>Assitant - Acces désactive </title>
  <?php include('links.html') ?>
</head>
<style>
  .acces-deactive{
    height: 100vh;
  }
    .acces-deactive p{
      color: #2A3547;
        font-size: 1.5em;
        font-weight: 900;
    }
    .acces-deactive i{
      font-size: 5rem;
    }

</style>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="d-flex align-items-center flex-column justify-content-center acces-deactive">
      <p>Bonjour <?= $row['prenom']." ".$row['nom'] ?>.</p>
        <p >Accès désactivé pour votre compte.</p>
        <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
  </div>
</body>
</html>
<?php } ?>
