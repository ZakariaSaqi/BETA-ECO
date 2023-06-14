<?php
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from cours ";
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " WHERE titre LIKE '%$search%' OR niveau LIKE '%$search%' OR metier LIKE '%$search%' ";
    }
    $resultsPerPage = 6;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
    ?>
    <html lang="en">

    <head>
        <title>Admin - Cours & Exercices</title>
        <?php include('links.html') ?>
    </head>

    <body>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <?php include('navbar.php') ?>
            <div class="container-fluid">
                <div class="container">
                    <form action="cours.php" class="no-styles" method="get">
                        <div class="row mb-2 d-flex align-items-center ">
                            <div class="col-md-6 nav-small-cap">
                                <h4>Cours & Exercices</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="search">
                                    <input type="text" name="search" class="form-control ps-0"
                                        placeholder="Niveau, Métier, Titre ..." value="<?= htmlspecialchars($search) ?>">
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
                            <th scope="col" colspan="7">
                                <a href="ajoutCours.php" class="btn btn-light py-2 px-4" style="width:max-content">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Ajouter une nouveau cours & exercices</p>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Métier</th>
                            <th scope="col">Niveau</th>
                            <th scope="col" style="width:200px">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $req .= " ORDER BY niveau DESC LIMIT $startIndex, $resultsPerPage";
                        $res = $pdo->query($req);
                        if ($res->rowCount() > 0) {
                            foreach ($res as $data) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $data['type'] ?>
                                    </td>
                                    <td>
                                        <?= $data['titre'] ?>
                                    </td>
                                    </td>
                                    <td>
                                        <?= $data['metier'] ?>
                                    </td>
                                    </td>
                                    <td>
                                        <?= $data['niveau'] ?>
                                    </td>
                                    </td>
                                    <td class="row">
                                    <a href="operaCour.php?action=Telecharger&id=<?= $data['id_cours'] ?>" class="view col-3"
                                            title="Télécharger" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                                        <a href="operaCour.php?action=update&id=<?= $data['id_cours'] ?>" class="edit col-3"
                                            title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="operaCour.php?action=delete&id=<?= $data['id_cours'] ?>" class="edit col-3"
                                            title="Supprimer" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"> Aucune cours !</td>
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
                        echo '" style="color:white" href="cours.php?' . $queryString . '">' . $page . '</a>';
                    }
                    ?>
                </div>


            </div>
        </div>
        </div>
    </body>

    </html>
<?php } ?>