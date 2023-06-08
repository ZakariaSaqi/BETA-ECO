<?php
if(!isset($_SESSION['id'])){
  header('location:../login.php');
}else{
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
    include('about.php');
    include('services.php');
    include('annonces.php');
    include('profil.php');
    include('footer.php');
     ?>

	
  </body>
</html>
<?php } ?>