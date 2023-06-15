<?php
require_once('connexion.php');
?>
<!doctype html>
<html lang="en">
<head>
  <title>BETA ECO - Se connecter</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images//website/iconWhite.svg" type="image/x-icon">
<link rel="stylesheet" href="assets/assets1/css/styles.min.css" />
<link rel="stylesheet" href="assets/assets2/icons/css/all.css">
<script src="assets/assets1/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/assets1/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets1/js/sidebarmenu.js"></script>
  <script src="assets/assets1/js/app.min.js"></script>
  <script src="assets/assets1/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/assets1/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/assets1/js/dashboard.js"></script>
  <!-- <link rel="stylesheet" href="assets/assets1/bootsrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="assets/assets1/css/style1.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="images/website/iconBlue.svg" width="180" alt="">
                </a>
                <h3 class="text-center ">Se connecter </h3>
                <hr>
                <?php 
                if(isset($_POST['btn'])){
                  $req = "select *from utilisateurs where login='".$_POST['login']."' and psw='".$_POST['psw']."'";
                  $res = $pdo -> query($req);
                  $row = $res -> fetch(PDO :: FETCH_ASSOC);
                  if($res -> rowCount() > 0){
                    session_start();
                    if($row['type'] == 1){
                      $_SESSION['idd'] = $row['id_user'];
                      header('location:DirectorDash/index.php');
                    }
                    if($row['type'] == 2    ){
                      $_SESSION['ida'] = $row['id_user'];
                      if($row['acces'] == 0){
                        header('location:AssistantDash/deactive.php');
                      }
                      else {
                      header('location:AssistantDash/index.php');
                      }
                    }
                    if($row['type'] == 3){
                      $_SESSION['idc'] = $row['id_user'];
                      header('location:ClientDash/index.php');
                    }
                    if($row['type'] == 4 ){
                      $_SESSION['ide'] = $row['id_user'];
                      if($row['etat'] == 0){
                        header('location:EtudiantDash/deactive.php');
                      }
                      else {
                        header('location:EtudiantDash/index.php');
                      }
                    }
                  } else echo "<p class='text-center' style='color:red'>Nom d'utilisateur ou mots de passe est incorrecte !</p>";
                }
                ?>
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="psw" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <a class="text-primary fw-bold" href="forgotpsw.php">Mot de passe oublié ?</a>
                  </div>
                  <button  type="submit" name="btn" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Se connecter</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Nouveau sur BETA ECO  ?</p>
                    <a class="text-primary fw-bold ms-2" href="register.php">Créer un compte</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>