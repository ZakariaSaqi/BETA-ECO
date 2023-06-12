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
        <title>Admin - Opération</title>
        <?php include('links.html') ?>
    </head>
    <?php
    if ($_GET['action'] == 'update') {
        $id = $_GET['id'];
        $req = "select * from cours where  id_cours=$id ";
        $res = $pdo->query($req);
        $row = $res->fetch(PDO::FETCH_ASSOC); ?>

        <body>
            <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-siddbartype="full"
                data-sidebar-position="fixed" data-header-position="fixed">
                <?php include('navbar.php'); ?>
                <div class="container-fluid">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-md-12 nav-small-cap">
                                <h4>Modifier le cours</h4>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['btn'])) {
                            $cours = $_POST['coursold'];
                            if (isset($_FILES['imgcours']['tmp_name']) && !empty($_FILES['imgcours']['tmp_name'])) {
                                $cour = "../images/cours/" . $_POST['type'] . "-" . $_POST['titre'];
                                $fileExtension = pathinfo($_FILES['imgcours']['name'], PATHINFO_EXTENSION);
                                $courWithExtension = $cour . "." . $fileExtension;
                                $isMoved = move_uploaded_file($_FILES['imgcours']['tmp_name'], $courWithExtension);
                                if ($isMoved) {
                                    $cours = $courWithExtension;
                                    unlink($row['cours']); // Delete the old file
                                    // Update the file in the /annonce folder
                                    $annonceFilePath . $_POST['type'] . "-" . $_POST['titre'];
                                    $annonceFilePathWithExtension = $annonceFilePath . "." . $fileExtension;
                                    $isMovedToAnnonceFolder = move_uploaded_file($_FILES['imgcours']['tmp_name'], $annonceFilePathWithExtension);
                                    if (!$isMovedToAnnonceFolder) {
                                        echo "Failed to update the file in the /annonce folder.";
                                    }
                                } else {
                                    echo "L'image n'a pas été mise à jour.";
                                }
                            }
                            $req = "update cours set type='" . $_POST['type'] . "' , titre= '" . $_POST['titre'] . "', cours='$courWithExtension'
                             , metier= '" . $_POST['metier'] . "' ,
                              niveau= '" . $_POST['niveau'] . "' where id_cours=$id ";
                            $res = $pdo->query($req);
                            header('location:cours.php');
                        }

                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row gutters-sm">
                                <div class="col-md-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Type</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select name="type" class="form-select   mb-3" required>
                                                        <option value="<?= $row['type'] ?>" selected><?= $row['type'] ?>
                                                        </option>
                                                        <option value="Cours">Cours</option>
                                                        <option value="Exercices">Exercices</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Titre</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="titre" class="form-control"
                                                        value="<?= $row['titre'] ?>" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Métier</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="metier" value="<?= $row['metier'] ?>"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Description</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea name="description" class="form-control" cols="30" rows="10"
                                                    style="height:10rem" required></textarea>
                                            </div>
                                        </div>
                                        <hr> -->
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Cours</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="hidden" name="coursold" value="<?= $row['cours'] ?>"
                                                        class="form-control" required accept=".doc,.docx,.pdf">
                                                    <input type="file" name="imgcours" class="form-control"
                                                        accept=".doc,.docx,.pdf">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Niveau</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select name="niveau" class="form-select   mb-3">
                                                        <option value="<?= $row['niveau'] ?>" selected><?= $row['niveau'] ?>
                                                        </option>
                                                        <option value="PME 2">PME 2</option>
                                                        <option value="PME 1">PME 1</option>
                                                        <option value="ENCG">ENCG</option>
                                                        <option value="ISTA">ISTA</option>
                                                        <option value="FAC">FAC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-info" type="submit" name="btn">Ajouter</button>
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
        $reqFilePath = "SELECT cours FROM cours WHERE id_cours=$id";
        $resFilePath = $pdo->query($reqFilePath);
        $rowFilePath = $resFilePath->fetch(PDO::FETCH_ASSOC);
        $filePath = $rowFilePath['cours'];

        if ($filePath) {
            unlink($filePath); // Delete the file from the folder
        }
        $reqDelete = "delete from cours where id_cours=$id";
        $resDelete = $pdo->query($reqDelete);
        header('location:cours.php');
    } elseif ($_GET['action'] == 'Telecharger') {
        $id = $_GET['id'];
        $reqdown = "SELECT cours FROM cours WHERE id_cours=$id";
        $resdown = $pdo->query($reqdown);
        $rowdown = $resdown->fetch(PDO::FETCH_ASSOC);
        if (!empty($rowdown['cours'])) {
            $file = $rowdown['cours'];

            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . basename($file));
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
            readfile($file);
            exit; // Stop script execution after the file is downloaded
        }
        header('location:cours.php');
    }



}
?>

</html>
<?php ob_end_flush(); ?>