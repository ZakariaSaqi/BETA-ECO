<?php
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select * from utilisateurs WHERE type=3 ";
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " AND ( id_user = '$search' OR  nom like '%$search%' OR prenom LIKE '%$search%' OR service LIKE '%$search%' )";
    }
    $resultsPerPage = 6;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
    ?>
    <html lang="en">

    <head>
        <title>Directeur - Clients</title>
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
                                <h4>Gestion des Clients</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="search">
                                    <input type="text" name="search" class="form-control ps-0"
                                        placeholder="ID, Nom, Prénom, Service ..." 
                                        value="<?= htmlspecialchars($search) ?>">
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
                            <!-- <th scope="col" colspan="3">
                        <button class="btn btn-light py-2 px-4">
                            <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                            <p class="text-uppercase m-0">Ajouter une nouveau annonce</p>
                        </button>
                        </th> -->
                            <th scope="col" colspan="5">
                                <button class="btn btn-light py-2 px-4">
                                    <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                                    <p class="text-uppercase m-0">Exporter au format PDF</p>
                                </button>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Services</th>
                            <th scope="col" style="width:50px">Opération</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $req .= " ORDER BY prenom ASC LIMIT $startIndex, $resultsPerPage";
                        $res = $pdo->query($req);
                        if ($res->rowCount() > 0) {
                            foreach ($res as $data) { ?>
                                <tr>
                                    <th scope="row">
                                        <?= $data['id_user'] ?>
                                    </th>
                                    <td>
                                        <?= $data['prenom'] . " " . $data['nom'] ?>
                                    </td>
                                    <td>
                                        <?= $data['email'] ?>
                                    </td>
                                    <td>
                                        <?= $data['service'] ?>
                                    </td>
                                    <td class="row">
                                        <a href="operaClients.php?action=view&id=<?= $data['id_user'] ?>" class="view col-4" title="View"
                                            data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="operaClients.php?action=update&id=<?= $data['id_user'] ?>" class="edit col-4" title="Edit"
                                            data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="operaClients.php?action=delete&id=<?= $data['id_user'] ?>" class="edit col-4" title="Supprimer"
                                            data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5"> Aucune client !</td>
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
                        echo '" style="color:white" href="clients.php?' . $queryString . '">' . $page . '</a>';
                    } ?>
                </div>
                </tbody>
                </table>


            </div>
        </div>
        </div>
    </body>

    </html>
<?php } ?>