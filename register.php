<?php
require_once('connexion.php');
?>
<!doctype html>
<html lang="en">

<head>
  <title>BETA ECO - Inscription</title>
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
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                      <img src="images/website/iconBlue.svg" width="180" alt="">
                    </a>
                    <h3 class="text-center pb-4">Inscription</h3>
                  </div>
                </div>
                <form action="" method="get">
                  <div class="row">
                    <div class="col-sm-10 text-secondary">
                      <select name="type" class="form-select  mb-3">
                        <option value="" selected>Type</option>
                        <option value="Clients">Clients</option>
                        <option value="Etudiants">Etudiants</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-info" type="submit" name="btn">Choisir</button>
                    </div>
                  </div>
                </form>
                <?php
                 if (isset($_GET['btn'])) {
                  $type = $_GET['type'];
                  if ($type == "Etudiants") {
                  if (isset($_POST['btn'])) {
                    if ($_POST['psw'] == $_POST['cpsw']) {
                    $phoneRegex = "/^\+212[5-7]\d{8}$/";
                    if (preg_match($phoneRegex, $_POST['phone']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                      // hadi ktverfier wesh domain kyn olala
                      list(, $domain) = explode('@', $_POST['email']);
                      if (checkdnsrr($domain, 'MX')) {
                          $req = "insert into utilisateurs (type, date_inscription, etat,prenom,  nom, phone, email, adresse, niveau, login, psw)
                      values (4,'".date("Y-m-d")."' ,  1,'" . ucfirst($_POST['prenom']) . "', '" . strtoupper($_POST['nom']) . "', '" . $_POST['phone'] . "','" . $_POST['email'] . "', '" . $_POST['adresse'] . "','" . $_POST['niveau'] . "', '" . $_POST['login'] . "','" . $_POST['psw'] . "')";
                          $res = $pdo->query($req);
                          header('location:login.php');
                      }  else echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
                    } else echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
                  } else echo "<center>Mots de passe pas correspondant !";
                }
                    
                    ?>
                    <form method="post">
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="exampleInputEmail1"
                              aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="exampleInputtext1"
                              aria-describedby="textHelp" required>
                          </div>
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label" required>Phone</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputPassword1" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputtext1"
                              aria-describedby="textHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Addresse</label>
                            <input type="text" class="form-control" name="adresse" id="exampleInputEmail1"
                              aria-describedby="">
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Niveau</label>
                            <div class="col-sm-10 text-secondary">
                              <select name="niveau" class="form-select  mb-3">
                                <option value="" selected disabled>Choisir</option>
                                <option value="PME 2">PME 2</option>
                                <option value="PME 1">PME 1</option>
                                <option value="ENCG">ENCG</option>
                                <option value="ISTA">ISTA</option>
                                <option value="FAC">FAC</option>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="login" id="exampleInputEmail1"
                              aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
                            <input type="password" class="form-control" name="psw" id="exampleInputPassword1" required>
                          </div>
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Confirmation du mots de passe</label>
                            <input type="password" class="form-control" name="cpsw" id="exampleInputPassword1" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit"
                            name="btn">S'inscrire</button>
                          <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-bold">Vous avez déjà un compte ?</p>
                            <a class="text-primary fw-bold ms-2" href="login.php">Se connecter</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  <?php } else if ($type == "Clients") { 
                    if (isset($_POST['btn'])) {
                      if ($_POST['psw'] == $_POST['cpsw']) {
                      $phoneRegex = "/^\+212[5-7]\d{8}$/";
                      if (preg_match($phoneRegex, $_POST['phone']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        // hadi ktverfier wesh domain kyn olala
                        list(, $domain) = explode('@', $_POST['email']);
                        if (checkdnsrr($domain, 'MX')) {
                            $req = "insert into utilisateurs (type,date_inscription ,prenom, nom, phone, email, adresse, service, login, psw)
                        values (3,'".date("Y-m-d")."', '" . ucfirst($_POST['prenom']) . "', '" . strtoupper($_POST['nom']) . "', '" . $_POST['phone'] . "','" . $_POST['email'] . "', '" . $_POST['adresse'] . "','" . $_POST['srv'] . "', '" . $_POST['login'] . "','" . $_POST['psw'] . "')";
                            $res = $pdo->query($req);
                            header('location:login.php');
                        }  else echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
                      } else echo "<center>Numero de téléphone ou adresse email incorrecte !</center>";
                    } else echo "<center>Mots de passe pas correspondant !";
                  }?>
                      <form method="post">
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Prénom</label>
                              <input type="text" class="form-control" name="prenom" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputtext1" class="form-label">Nom</label>
                              <input type="text" class="form-control" name="nom" id="exampleInputtext1"
                                aria-describedby="textHelp" required>
                            </div>
                            <div class="mb-4">
                              <label for="exampleInputPassword1" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="phone" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputtext1" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" id="exampleInputtext1"
                                aria-describedby="textHelp" required>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label" required>Services</label>
                              <div class="col-sm-10 text-secondary">
                                <select name="srv" class="form-select  mb-3">
                                  <option value="" selected disabled>Choisir</option>
                                  <option value="CNCS">CNCS</option>
                                  <option value="Consultation">Consultation</option>
                                  <option value="Formation">Formation</option>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                              <input type="text" class="form-control" name="login" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-4">
                              <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
                              <input type="password" class="form-control" name="psw" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-4">
                              <label for="exampleInputPassword1" class="form-label">Confirmation du mots de passe</label>
                              <input type="password" class="form-control" name="cpsw" id="exampleInputPassword1" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="btn"
                              type="submit">S'inscrire</button>
                            <div class="d-flex align-items-center justify-content-center">
                              <p class="fs-4 mb-0 fw-bold">Vous avez déjà un compte ?</p>
                              <a class="text-primary fw-bold ms-2" href="login.php">Se connecter</a>
                            </div>
                          </div>
                        </div>
                      </form>
                  <?php }
                } ?>
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