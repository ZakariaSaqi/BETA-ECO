<?php
session_start();
require '../assets/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../connexion.php');
if(!isset($_SESSION['idd'])){
  header('location:../login.php');
}else{
  ?>
  <html lang="en">
<head>
    <title>Directeur - Inviter assistante</title>
    <?php include('links.html') ?>
</head>
<style>
    .form-control, .form-select{
        border-radius: 5px;
        height: 35px;
        border-color:#5D87FF ;
    }
</style>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="main-body">

                <div class="row">
                    <div class="col-md-12 nav-small-cap">
                        <h4>assistant / Inviter </h4>
                    </div>
                </div>
                <?php
    if (isset($_POST['btn'])) {
        $req ="select * from utilisateurs where id_user=".$_SESSION['idd'];
        $res = $pdo -> query($req);
        $row = $res -> fetch(PDO :: FETCH_ASSOC);
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // hadi ktverfier wesh domain kyn olala
            list(, $domain) = explode('@', $email);
            if (checkdnsrr($domain, 'MX')) {
                $to = $email;
                $subject = 'Invitation a     devenir un assistant dans la gestion de notre entreprise BETA ECO via notre site web';
                $sub_before = $subject;
                $sub_after = str_replace("é", "e", $sub_before);

                $message = '
                Cher Monsieur/Madame,<br>
                Nous espérons que ce courriel vous trouve bien. Nous souhaitons vous présenter une opportunité passionnante d\'améliorer la gestion de votre entreprise BETA ECO. Nous aimerions inviter une personne qualifiée à rejoindre notre équipe en tant qu\'assistant dans la gestion de l\'entreprise.
                Pour faciliter le processus d\'inscription, nous avons créé un lien spécifique sur notre site web. <br><br>
                <center><button class="btn" style="cursor:pointer;width:120px; height: 30px; background-color:#5D87FF; border: none; outline: none; border-radius: 10px;">
                <a href="hhttp://localhost/server/BETA-ECO/AssistanteDash/register.php" style="color:#fff; text-decoration:none;">Cliquez ici</a>
                </button> </center> <br><br>
                En cliquant sur ce lien, la personne pourra accéder directement à la page d\'inscription. Nous croyons que cette personne apportera une valeur ajoutée à votre entreprise grâce à ses compétences et à son expertise.
                N\'hésitez pas à nous contacter si vous avez des questions ou si vous souhaitez discuter plus en détail de cette opportunité. Nous sommes impatients de collaborer avec vous pour renforcer et optimiser la gestion de l\'entreprise BETA ECO.
                Cordialement,<br>
                '.$row['prenom']." ".$row['nom'] .' <br>
                Directeur <br>
                BETA ECO';

                // Create a new PHPMailer instance
                $mail = new PHPMailer(true);

                try {
                    // Set up SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sakizakaria7@gmail.com';
                    $mail->Password = 'hraxdwrzibkbitim';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    // Set up sender and recipient
                    $mail->setFrom('sakizakaria7@gmail.com', 'BETA ECO');
                    $mail->addAddress($to);
                    $mail->isHTML(true);

                    // Set email subject and body
                    $mail->Subject = $sub_after;
                    $mail->Body = $message;

                    // Send the email
                    $mail->send();
                    echo '<center>Email envoyé<i class="fa-solid fa-check"></i></center>';
                } catch (Exception $e) {
                    echo '<center>Échec de l\'envoi de l\'e-mail. <i class="fa-sharp fa-solid fa-triangle-exclamation"></i></center>';
                }
            } echo '<center>Adresse email non valide  <i class="fa-sharp fa-solid fa-triangle-exclamation"></i></center>';
            
        } echo '<center>Adresse email non valide <i class="fa-sharp fa-solid fa-triangle-exclamation"></i></center>';
    }

    ?>
                <form action="" method="post">
                <div class="row gutters-sm">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" id="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <button class="btn btn-info" type="submit" name="btn">Inviter</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>