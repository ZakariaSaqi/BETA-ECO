<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<!doctype html>
<html lang="en">
<head>
  <title>Admin - Accueil </title>
  <?php include('links.html') ?>
</head>
<body>
<?php 
include('navbar.php');
include('conversation.php') ?>
</body>

</html>
<?php } ?>