<?php
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from annonce ";
    // Pagination variables
    $resultsPerPage = 3; // Number of results per page
    $totalResults = $pdo->query($req)->rowCount(); // Total number of results
    $totalPages = ceil($totalResults / $resultsPerPage); // Total number of pages

    // Get current page from query string
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the starting index for the results based on current page
    $startIndex = ($currentPage - 1) * $resultsPerPage;
    ?>

    <html lang="en">

    <head>
        <title>Admin - Annonces</title>
        <?php include('links.html') ?>
    </head>

    <body>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <?php include('navbar.php') ?>
            <div class="container-fluid">
                <div class="container">
                    <?php
                    $search = '';
                    if (isset($_GET['search-btn'])) {
                        $search = trim($_GET['search']);
                        $req .= " WHERE id_annonce = '$search' OR titre LIKE '%$search%' OR description LIKE '%$search%' ";
                    }
                    ?>
                    <form action="" class="no-styles" method="get">
                        <div class="row mb-2 d-flex align-items-center ">
                            <div class="col-md-6 nav-small-cap">
                                <h4>Gestion des annonces</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="search">
                                    <input type="text" name="search" class="form-control ps-0"
                                        placeholder="ID, Titres, Description, Date ...">
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
                            <th scope="col" colspan="3">
                                <a href="ajoutAnnonce.php" class="btn btn-light py-2 px-4" style="width:max-content">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Ajouter une nouvelle annonce</p>
                                </a>
                            </th>
                            <th scope="col" colspan="3">
                                <button class="btn btn-light py-2 px-4">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Exporter au format PDF</p>
                                </button>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Image</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col" style="width:50px">Opération</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $req .= " ORDER BY id_annonce DESC LIMIT $startIndex, $resultsPerPage";
                        $res = $pdo->query($req);
                        if ($res->rowCount() > 0) {
                            foreach ($res as $data) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?= $data['id_annonce'] ?>
                                    </th>
                                    <td><img src="<?= $data['image_annonce'] ?>" alt="" srcset="" style="width:50px"></td>
                                    <td>
                                        <?= $data['titre'] ?>
                                    </td>
                                    <td>
                                        <?= $data['description'] ?>
                                    </td>
                                    <td>
                                        <?= $data['date_annonce'] ?>
                                    </td>
                                    <td class="row">
                                        <a href="operations_demande.php?action=view&id=" class="view col-4" title="View"
                                            data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="operations_demande.php?action=Edit&id=" class="edit col-4" title="Edit"
                                            data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="operations_demande.php?action=Delete&id=" class="delete col-4" title="Delete"
                                            data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"> Aucune annonce !</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php
                    for ($page = 1; $page <= $totalPages; $page++) {
                        echo '<a class="btn btn-primary mx-1';
                        if ($page === $currentPage) {
                            echo ' active';
                        }
                        echo '" style="color:white" href="annonces.php?page=' . $page . '">' . $page . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>