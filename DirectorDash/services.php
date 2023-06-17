<?php
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from service ";
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " WHERE id_serv = '$search' OR titre like '%$search%' OR description LIKE '%$search%'";
    }
    $resultsPerPage = 3;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
    ?>
    <html lang="en">

    <head>
        <title>Directeur - Services</title>
        <?php include('links.html') ?>
    </head>

    <body>
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <?php include('navbar.php') ?>
            <div class="container-fluid">
                <div class="container">
                    <form action="" class="no-styles" method="get">
                        <div class="row mb-2 d-flex align-items-center ">
                            <div class="col-md-6 nav-small-cap">
                                <h4>Gestion des Services</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="search">
                                    <input type="text" name="search" class="form-control ps-0"
                                        placeholder="ID,Titre, Description ..." value="<?= htmlspecialchars($search) ?>">
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
                            <th scope="col" colspan="5">
                                <a href="ajoutService.php" class="btn btn-light py-2 px-4" style="width:max-content">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Ajouter un nouveau service</p>
                                </a>
                            </th>
                            <!-- <th scope="col" colspan="2">
                                <button class="btn btn-light py-2 px-4">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Exporter au format PDF</p>
                                </button>
                            </th> -->
                        </tr>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col" style="width:50px">Opération</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $req .= " ORDER BY id_serv asc LIMIT $startIndex, $resultsPerPage";
                        $res = $pdo->query($req);
                        if ($res->rowCount() > 0) {
                            foreach ($res as $data) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $data['id_serv'] ?></th>
                                    <td><?= $data['titre'] ?></td>
                                    <td><?= substr($data['description'],0,200)."..." ?></td>
                                    <td class="row">
                                        <a href="operaService.php?action=view&id=<?= $data['id_serv'] ?>" class="view col-4"
                                            title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="operaService.php?action=update&id=<?= $data['id_serv'] ?>" class="edit col-4"
                                            title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="operaService.php?action=delete&id=<?= $data['id_serv'] ?>" class="edit col-4"
                                            title="Supprimer" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"> Aucune service !</td>
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
                        echo '" style="color:white" href="services.php?' . $queryString . '">' . $page . '</a>';
                    }
                    ?>
                </div>


            </div>
        </div>
        </div>
    </body>

    </html>
<?php } ?>