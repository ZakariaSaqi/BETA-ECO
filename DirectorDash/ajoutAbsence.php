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
        <title>Directeur - Ajouter absence</title>
        <?php include('links.html') ?>
    </head>
    <style>
        .form-control,
        .form-select {
            border-radius: 5px;
            height: 35px;
            border-color: #5D87FF;
        }
        .crud_btn {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
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
                            <h4>Absences / Ajouter</h4>
                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="row gutters-sm">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">N° séance</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary d-flex">
                                                <input type="text" name="num" id="" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <button class="btn btn-info" name="ok" type="submit"> OK </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($_GET['ok'])) {
                        $id_se = $_GET['num'];
                        $reqS = "SELECT * FROM seance 
                            WHERE  etat=1   AND id_seance = $id_se  ";
                        $resS = $pdo->query($reqS);
                        $reqU = "SELECT u.nom, u.prenom, u.id_user as id_et, s.* FROM seance s, utilisateurs u
                            WHERE s.niveau = u.niveau AND s.etat=1  AND u.type = 4 AND s.id_seance = $id_se  order by u.prenom asc ";
                        $resU = $pdo->query($reqU);
                        if ($resS->rowCount() > 0) {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Niveau</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure début</th>
                                        <th scope="col">Heure fin</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($rowS = $resS->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $rowS['id_seance'] ?>
                                            </th>
                                            <td>
                                                <?= $rowS['niveau'] ?>
                                            </td>
                                            <td>
                                                <?= $rowS['date_seance'] ?>
                                            </td>
                                            <td>
                                                <?= $rowS['heure_debut'] ?>
                                            </td>
                                            <td>
                                                <?= $rowS['heure_fin'] ?>
                                            </td>
                                            <td>
                                                <?= $rowS['type'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col" style="width:200px">Affecter une absence</th>
                                        <th scope="col">Etat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($resU as $data) {
                                        $reqA = "SELECT a.* FROM absence a, utilisateurs u, seance s
         WHERE a.id_user = u.id_user AND a.id_seance = s.id_seance 
         AND u.id_user =" . $data['id_et'] . " AND s.id_seance = $id_se";
                                        $resA = $pdo->query($reqA);
                                        $rowA = $resA -> fetch(PDO::FETCH_ASSOC);
                                        $count = $resA->rowCount();
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $data['prenom'] . " " . $data['nom'] ?>
                                            </td>
                                            <td class="row">
                                                <?php
                                                if($count > 0 ){ ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="idUser" value="<?= $data['id_et'] ?>">
                                                    <input type="hidden" name="seance" value="<?= $id_se ?>">
                                                    <button type="submit" name="remove_abse" class="crud_btn">
                                                    <i class="fa-sharp fa-solid fa-circle-xmark"></i>
                                                    </button>
                                                </form>
                                               <?php } else{ ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="idUser" value="<?= $data['id_et'] ?>">
                                                    <input type="hidden" name="seance" value="<?= $id_se ?>">
                                                    <button type="submit" name="add_abse" class="crud_btn">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    </button>
                                                </form>
                                             <?php   } ?>
                                            </td>
                                            <td>
                                            <?php
                                                if($count > 0) echo "Absent";
                                                else echo "Present"; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        <?php } else {
                            ?>

                            <p>Aucune seance !</p>

                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </body>
    <?php
    if (isset($_POST['add_abse'])) {
        $id = $_POST['idUser'];
        $reqUp = "insert into absence (id_user, id_seance ) values ($id, $id_se)";
        $resUp = $pdo->query($reqUp);
        header('location:ajoutAbsence.php?ok=1&num=' . urlencode($id_se));
    }
    if (isset($_POST['remove_abse'])) {
        $id = $_POST['idUser'];
        $reqUp = "delete from absence where id_seance = $id_se and id_user = $id";
        $resUp = $pdo->query($reqUp);
        header('location:ajoutAbsence.php?ok=1&num=' . urlencode($id_se));
    }
    ?>

    </html>
<?php }
ob_end_flush();
?>