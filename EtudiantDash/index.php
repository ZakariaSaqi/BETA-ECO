<?php
session_start();
if(!isset($_SESSION['ide'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<!doctype html>
<html lang="en">
<head>
  <title>Etudiant - Accueil </title>
  <?php include('links.html'); ?>
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('conversation.php');
        
      ?>
    </div>
</body> 
</html>
<?php } ?>