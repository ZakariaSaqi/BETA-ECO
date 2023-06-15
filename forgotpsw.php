<?php
require_once('connexion.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>BETA ECO - MP oublié</title>
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
                                <h3 class="text-center ">Mot de passe oublié</h3>
                                <hr>
                                <?php
                                require 'assets/vendor/autoload.php';
                                use PHPMailer\PHPMailer\PHPMailer;
                                use PHPMailer\PHPMailer\Exception;

                                if (isset($_POST['btn'])) {
                                    $email = $_POST['email'];
                                    // echo $email;
                                    $req = "SELECT id_user, email FROM utilisateurs WHERE email = '$email' ";
                                    $res = $pdo->query($req);
                                    $row = $res->fetch(PDO::FETCH_ASSOC);
                                    $count = $res->rowCount();
                                    // echo $count;
                                    if ($count > 0) {
                                        $to = $email;
                                        $subject = 'Reinitialiser le mot de passe.';
                                        $message = 'Nous avons bien reçu votre demande de réinitialisation de mot de passe pour votre compte.
        <br>
        Cliquez sur le button suivant pour accéder à la page de réinitialisation de mot de passe :
        <br>
        <br>
        <center>
        <center><button class="btn" style="cursor:pointer;width:120px; height: 30px; background-color:#5D87FF; border: none; outline: none; border-radius: 10px;">
  <a href="http://localhost/server/BETA-ECO/resetpsw.php?id='.$row['id_user'].'" style="color:#fff; text-decoration:none;">Cliquez ici</a>
</button>
 </center> <br><br>
    </center>
    
        ';

                                        // Create a new PHPMailer instance
                                        $mail = new PHPMailer(true);

                                        try {
                                            // Set up SMTP
                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            $mail->SMTPAuth = true;
                                            $mail->Username = 'sakizakaria7@gmail.com';
                                            $mail->Password = 'ertxnxnxvctveqge';
                                            $mail->SMTPSecure = 'tls';
                                            $mail->Port = 587;

                                            // Set up sender and recipient
                                            $mail->setFrom('damydonsang@gmail.com', 'DAMY');
                                            $mail->addAddress($to);
                                            $mail->isHTML(true);
                                            // Set email subject and body
                                            $mail->Subject = $subject;
                                            $mail->Body = $message;

                                            // Send the email
                                            $mail->send();

                                            echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé.</p></div>';
                                        } catch (Exception $e) {
                                            echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail. ' . $mail->ErrorInfo . '</p></div>';
                                        }
                                    } else {
                                        echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Nous ne trouvons pas cet e-mail !</p></div>";
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Veuillez saisir votre adresse
                                            email pour récupérer votre compte.</label>
                                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="btn"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Envoyer</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Nouveau sur BETA ECO ?</p>
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