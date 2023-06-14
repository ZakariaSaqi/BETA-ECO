<?php
    require_once('../connexion.php');
?>
<html lang="en">

<head>
    <title>Admin - Ajouter absence</title> 
</head>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

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
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">N° séance</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary d-flex">
                                            <input type="text" name="num" id="" class="form-control" required>
                                            <button class="btn btn-info" name="ok" type="submit"> OK </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (isset($_GET['ok'])) {
                    $id_se= $_GET['num'];
                    $reqS = "SELECT * FROM seance 
                            WHERE  etat=1   AND id_seance = $id_se  ";
                    $resS = $pdo->query($reqS);
                    $reqU = "SELECT u.nom, u.prenom, s.* FROM seance s, utilisateurs u
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
                                    <th scope="row"><?= $rowS['id_seance'] ?></th>
                                    <td><?= $rowS['niveau'] ?></td>
                                    <td><?= $rowS['date_seance'] ?></td>
                                    <td><?= $rowS['heure_debut'] ?></td>
                                    <td><?= $rowS['heure_fin'] ?></td>
                                    <td><?= $rowS['type'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Effectuer une absence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($resU as $data) {
                            ?>
                                    <tr>
                                        <td>
                                            <?= $data['prenom'] . " " . $data['nom'] ?>
                                        </td>
                                        <td class="row">
                                            <a href="affecterAbs.php?id=<?= $data['id_user'] ?>" class="edit col-3" title="Affecter" data-toggle="tooltip">
                                                <i class="fas fa-circle-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                } ?>
                        </tbody>
                    </table>
               <?php } else {
                            ?>
                                
                                    <p >Aucune etudian !</p>
                                
                            <?php } } ?>
            </div>
        </div>
    </div>
</body>

</html>

