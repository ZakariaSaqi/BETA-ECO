<?php
session_start();
if (!isset($_SESSION['ida'])) {
    header('Location: ../login.php');
    exit(); // Added exit() to stop further execution
} else {
    require_once('../connexion.php');
    if (isset($_POST['btn'])) {
        $titre = trim(ucfirst($_POST['titre']));
        $date = date("Y-m-d");
        $escapedTitre = str_replace("'", "\'", $titre);
        $description = trim($_POST['description']);
        $escapedDescription = str_replace("'", "\'", $description);
        $img = "../images/annonce/" . $titre . $date . ".jpeg";
        $image = move_uploaded_file($_FILES["imgann"]["tmp_name"], $img);
        $req = "INSERT INTO annonce (titre, description, image_annonce, date_annonce, id_user) 
        VALUES ('$titre', '$escapedDescription', '$img', '$date', " . $_SESSION['ida'] . ")";
        $res = $pdo->query($req);
        if ($res) {
            $req3 = "select  id_user from utilisateurs where type = 3";
            $res3 = $pdo->query($req3);
            while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
                $req_notif = "insert into notification (type_notif,message_notif, etat_notif, id_user) values('Nouvelle annonce', '$escapedTitre', 1," . $row3['id_user'] . ")";
                $res_notif = $pdo->query($req_notif);
            }
        }
        header('Location: annonces.php');
        exit(); // Added exit() to stop further execution
    }
}
?>
<html lang="en">

<head>
    <title>Admin - Ajouter annonce</title>
    <?php include('links.html') ?>
</head>
<style>
    .form-control,
    .form-select {
        border-radius: 5px;
        height: 35px;
        border-color: #5D87FF;
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
                        <h4>Ajouter annonce</h4>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row gutters-sm">
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Titre</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="titre" id="" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="description" class="form-control" id="" cols="30" rows="10"
                                                style="height:10rem"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="imgann" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <button class="btn btn-info" name="btn" type="submit"> Ajouter</button>
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