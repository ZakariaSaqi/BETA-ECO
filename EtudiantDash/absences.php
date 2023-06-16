<?php
session_start();
if (!isset($_SESSION['ide'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select a.*,  s.date_seance, s.heure_debut, s.heure_fin from absence a, seance s, utilisateurs u
    where a.id_user = u.id_user and a.id_seance = s.id_seance and u.type=4 and s.etat = 1 and u.id_user=".$_SESSION['ide'];
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " AND   (s.date_seance like '%$search%')";
    }
    $resultsPerPage = 6;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
?>
<html lang="en">

<head>
    <title>Etudiant - Séances</title>
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
                <form action="absences.php" class="no-styles" method="get">
                    <div class="row mb-2 d-flex align-items-center ">
                        <div class="col-md-6 nav-small-cap">
                            <h4>Liste d'absences</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="search">
                                <input type="text" name="search" class="form-control ps-0"
                                    placeholder="Date" value="<?= htmlspecialchars($search) ?>">
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
                        <th scope="col">Date d'absence</th>
                        <th scope="col">Heure debut</th>
                        <th scope="col">Heure fin </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $req .= " ORDER BY s.date_seance DESC LIMIT $startIndex, $resultsPerPage";
                    $res = $pdo->query($req);
                    if ($res->rowCount() > 0) {
                        foreach ($res as $data) {
                    ?>
                    <tr>
                        <td><?= $data['date_seance'] ?></td>
                        <td><?= $data['heure_debut'] ?></td>
                        <td><?= $data['heure_fin'] ?></td>                
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="5"> Aucun absence !</td>
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
                    echo '" style="color:white" href="absences.php?' . $queryString . '">' . $page . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
    </body>

    </html>
<?php } ?>
