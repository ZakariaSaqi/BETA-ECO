<!doctype html>
<html lang="en">

<head>
    <title>BETA ECO - Réinitialisation MP</title>
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
                                <h3 class="text-center ">Réinitialisation de mot de passe </h3>
                                <hr>
                                <?php
                                require('connexion.php');
                                session_start();

                                if (isset($_POST['btnok'])) {
                                    $psw = $_POST['psw'];
                                    if ($psw == $_POST['psw2']) {
                                        $req = "UPDATE utilisateurs SET psw='$psw' WHERE id_user=" . $_GET['id'];
                                        $res = $pdo->query($req);
                                        echo "<div class=\"message\"><i class=\"fa-solid fa-check\"></i><p>Mot de passe réinitialisé</p></div>";
                                        header('location: login.php');
                                        exit;
                                    } else {
                                        echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Les mots de passe ne correspondent pas.</p></div>";
                                    }

                                }
                                ?>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nouveaux mots de pass</label>
                                        <input type="text" name="psw" required class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Confirmation</label>
                                        <input type="text" name="psw2" required class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" name="btnok"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Réinitialiser</button>
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