<?php
session_start();
if (!isset($_SESSION['ida'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from seance ";
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " WHERE id_seance = '$search' OR niveau LIKE '%$search%' OR type LIKE '%$search%'";
    }
    if (isset($_POST['change_etat'])) {
        $id = $_POST['idSeance'];
        $reqUp = "UPDATE seance SET etat = 0 WHERE id_seance = $id ";
        $resUp = $pdo->query($reqUp);
        header('location:seances.php');
    }
    $resultsPerPage = 4;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
?>
<html lang="en">

<head>
    <title>Admin - Séances</title>
    <?php include('links.html') ?>
</head>
<style>
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
            <div class="container">
                <form action="seances.php" class="no-styles" method="get">
                    <div class="row mb-2 d-flex align-items-center ">
                        <div class="col-md-6 nav-small-cap">
                            <h4>Gestion des séances</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="search">
                                <input type="text" name="search" class="form-control ps-0"
                                    placeholder="Numero, Type, Niveau..." value="<?= htmlspecialchars($search) ?>">
                                <button class="btn btn-primary" name="search-btn"><i class="fa fa-search"
                                        style="color:white"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="6">
                            <a href="ajoutSeance.php" class="btn btn-light py-2 px-4" style="width:max-content">
                                <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                <p class="text-uppercase m-0">Ajouter une nouvelle séances</p>
                            </a>
                        </th>
                        <th scope="col" colspan="2">
                            <!-- <button class="btn btn-light py-2 px-4">
                            <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                            <p class="text-uppercase m-0">Exporter au format PDF</p>
                        </button> -->
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Niveau</th>
                        <th scope="col">Date</th>
                        <th scope="col">Heure debut</th>
                        <th scope="col">Heure fin</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="width:80px">Etat</th>
                        <th scope="col">Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $req .= " ORDER BY date_seance DESC LIMIT $startIndex, $resultsPerPage";
                    $res = $pdo->query($req);
                    if ($res->rowCount() > 0) {
                        foreach ($res as $data) {
                    ?>
                    <tr>
                        <th scope="row"><?= $data['id_seance'] ?></th>
                        <td><?= $data['niveau'] ?></td>
                        <td><?= $data['date_seance'] ?></td>
                        <td><?= $data['heure_debut'] ?></td>
                        <td><?= $data['heure_fin'] ?></td>
                        <td><?= $data['type'] ?></td>
                        <td >
                            <?php
                                if (date("Y-m-d") < $data['date_seance']) { 
                                 if ($data['etat'] == 0) { echo "Annulée"; } 
                                 else { echo "En attente"; }
                                 }
                         else {echo "Terminée"; } ?>
                        </td>
                        <td class="row" >
                            <?php
                             if (date("Y-m-d") < $data['date_seance']){ 
                                if(  $data['etat'] == 1 ){ ?>
                                    <form action="" method="post" class="col-3">
                                <input type="hidden" name="idSeance" value="<?= $data['id_seance'] ?>">
                                <input type="hidden" name="etat" value="<?= $data['etat'] ?>">
                                <button type="submit" name="change_etat" class="crud_btn">
                                    <i class="fa-solid fa-circle-xmark" title="Annuler" style="cursor: pointer;"></i>
                                </button>
                            </form>
                                  <?php }  ?>
                             
                            <a href="operaSeance.php?action=update&id=<?= $data['id_seance'] ?>" class="edit col-3"
                                            title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <?php } ?>
                        </td>
                        
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="5"> Aucun séance !</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                for ($page = 1; $page <= $totalPages; $page++) {
                    $params = $_GET;
                    $params['page'] = $page;
                    $queryString = http_build_query($params);
                    echo '<a class="btn btn-primary mx-1';
                    if ($page === $currentPage) {
                        echo ' active';
                    }
                    echo '" style="color:white" href="seances.php?' . $queryString . '">' . $page . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
    </body>

    </html>
<?php } ?>
