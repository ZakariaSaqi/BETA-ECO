<!doctype html>
<html lang="en">

<head>
  <title>BETA ECO - Se connecter</title>
  <?php include('links.html') ?>
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
                  <img src="../assets/images/iconBlue.svg" width="180" alt="">
                </a>
                <h3 class="text-center ">Se connecter </h3>
                <hr>
                <form>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Se souvenir de cet appareil
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Mot de passe oublié ?</a>
                  </div>
                  <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Se connecter</a>
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