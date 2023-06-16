<?php
ob_start();
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    ?>
    <html lang="en">

    <head>
        <title>Directeur - Opération</title>
        <?php include('links.html') ?>
    </head>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'view') {
            $id = $_GET['id'];
            $req = "select * from annonce where  id_annonce=$id ";
            $res = $pdo->query($req);
            $row = $res->fetch(PDO::FETCH_ASSOC);
            ?>

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
                                                        <?= $row['titre'] ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">description</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $row['description'] ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Date de publication</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $row['date_annonce'] ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Image</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <img style="width:10rem" src="<?= $row['image_annonce'] ?>" alt=""
                                                            srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </body>

        <?php }
    }
    if ($_GET['action'] == 'update') {
        $id = $_GET['id'];
        $id = $_GET['id'];
        $req = "select * from annonce where  id_annonce=$id ";
        $res = $pdo->query($req);
        $row = $res->fetch(PDO::FETCH_ASSOC); ?>

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
                        <?php
if (isset($_POST['btn'])) {
    $titre = trim(ucfirst($_POST['titre']));
    $escapedTitre = $pdo->quote($titre);
    $description = trim($_POST['description']);
    $escapedDescription = $pdo->quote($description);
    $img = $_POST['oldimg'];

    if (is_uploaded_file($_FILES["imgann"]["tmp_name"])) {
        unlink($img);
        $img = "../images/annonce/" . $titre . $date . ".jpeg";
        if (move_uploaded_file($_FILES["imgann"]["tmp_name"], $img)) {
            $img = $img;
        } else {
           echo "L\'image ne change pas.";
        }
    }

    $req = "UPDATE annonce SET titre = $escapedTitre, description = $escapedDescription, image_annonce = '$img' WHERE id_annonce = $id";
    $res = $pdo->query($req);
    header('location: annonces.php');
}
?>

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
                            <input type="text" value="<?= $row['titre'] ?>" name="titre" id="" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea name="description" class="form-control" id="" cols="20" rows="10"
                                style="height:10rem"><?= $row['description'] ?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Image</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img style="width:5rem" src="<?= $row['image_annonce'] ?>" alt="" srcset="">
                            <input type="hidden" name="oldimg" value="<?= $row['image_annonce'] ?>" id=""
                                class="form-control">
                            <input type="file" name="imgann" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <button class="btn btn-info" name="btn" type="submit">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </body>


    <?php }
    if ($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $req = "delete from annonce where id_annonce=$id";
        $res = $pdo->query($req);
        header('location: annonces.php');
    }
}
?>

</html>
<?php ob_end_flush(); ?>