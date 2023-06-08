<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BETA ECO - Accueil</title>
	<?php include('links.css')  ;?>
  </head>
  <body>
    <?php 
    include('navbar.php');
    include('conversation.php');
    include('séances.php');
    include('cours.php');
    include('profil.php');
    include('footer.php');
     ?>

	
  </body>
</html>
<?php } ?>