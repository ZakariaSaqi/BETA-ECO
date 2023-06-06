<!doctype html>
<html lang="en">

<head>
  <title>BETA ECO - Inscription</title>
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
                <div class="row">
                  <div class="col-md-12">
                    <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                      <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                    </a>
                    <p class="text-center">Inscription</p>
                  </div>
                </div>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Prénom</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Niveau</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Confirmation de mots de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">S'inscrire</a>
                      <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">Vous avez déjà un compte ?</p>
                        <a class="text-primary fw-bold ms-2" href="login.php">Se connecter</a>
                      </div>
                    </div>
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