<?php
session_start();
if (!isset($_SESSION['idd'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    $req = "select u.nom, u.prenom , c.*, an.titre from commentaire c, annonce an, utilisateurs u 
    where c.id_user=u.id_user and c.id_annonce=an.id_annonce";
    $search = '';
    if (isset($_GET['search-btn'])) {
        $search = trim($_GET['search']);
        $req .= " AND ( date_comment LIKE '%$search%' OR contenu LIKE '%$search%' )";
    }
    if (isset($_POST['change_etat'])) {
        $id = $_POST['idComnt'];
        if ($_POST['etat'] == 1) {
            $reqUp = "UPDATE commentaire SET etat = 0 WHERE id_commente = $id ";
        } elseif ($_POST['etat'] == 0) {
            $reqUp = "UPDATE commentaire SET etat = 1 WHERE id_commente = $id ";
        }
        $resUp = $pdo->query($reqUp);
        header('location:commentaires.php');
    }
    if(isset($_POST['delete'])){
        $id = $_POST['idComnt'];
        $reqdelete ="delete from commentaire where id_commente = $id";
        $resdelete = $pdo -> query($reqdelete);
        header('location:commentaires.php');
    }
    $resultsPerPage = 3;
    $totalResults = $pdo->query($req)->rowCount();
    $totalPages = ceil($totalResults / $resultsPerPage);
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($currentPage - 1) * $resultsPerPage;
    ?>
    <html lang="en">

    <head>
        <title>Directeur - Commentaires</title>
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
                    <form action="commentaires.php" class="no-styles" method="get">
                        <div class="row mb-2 d-flex align-items-center ">
                            <div class="col-md-6 nav-small-cap">
                                <h4>Derniers Commentaires</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="search">
                                    <input type="text" name="search" class="form-control ps-0" placeholder="Date, Mot ..."
                                        value="<?= htmlspecialchars($search) ?>">
                                    <button class="btn btn-primary" name="search-btn"><i class="fa fa-search"
                                            style="color:white"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table" id="Comments">
                    <thead>
                        <tr>
                            <th scope="col">Commentaires</th>
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
                                    <th scope="row container">
                                        <div class="row align-items-center">
                                            <div class="col-md-1 d-flex ">
                                                <i class="fa-solid fa-user px-3" style="font-size:20px"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <h3>
                                                    <?= $data['prenom'] . " " . $data['nom'] ?><span class="ms-1"> a répondu à
                                                        l'annonce
                                                        "
                                                        <?= $data['titre'] ?>"
                                                    </span>
                                                </h3>
                                                <p>
                                                    <?php

                                                    // Assuming $row3['date_demande'] contains the date from the database
                                                    $date = strtotime($data['date_comment']);
                                                    $currentDate = time();
                                                    $secondsDiff = $currentDate - $date;

                                                    // Calculate the time difference in days
                                                    $daysDiff = floor($secondsDiff / (60 * 60 * 24));

                                                    if ($daysDiff == 0) {
                                                        // Output the formatted string
                                                        echo "Aujourd'hui.";
                                                    } else if ($daysDiff == 1) {
                                                        // Output the formatted string
                                                        echo "Hier.";
                                                    } else {
                                                        // Output the formatted string
                                                        echo $daysDiff . " jours.";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <?= $data['contenu'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="row ">
                                       <?php 
                                       if( $data['etat'] == 0 ) { ?>
                                         <form action="" method="post" class=" col-4">
                                            <input type="hidden" name="idComnt" value="<?= $data['id_commente'] ?>">
                                            <input type="hidden" name="etat" value="<?= $data['etat'] ?>">
                                            <button type="submit" name="change_etat" class="crud_btn">
                                                <i class="fa-solid fa-circle-check" style="cursor: pointer;"></i>
                                            </button>
                                        </form>
                                      <?php } ?>
                                      
                                      <form action="" method="post" class=" col-4">
                                            <input type="hidden" name="idComnt" value="<?= $data['id_commente'] ?>">
                                            <button type="submit" name="delete" class="crud_btn">
                                                <i class="fa-solid fa-circle-xmark" style="cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"> Aucune commentaire !</td>
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
                        echo '" style="color:white" href="commentaires.php?' . $queryString . '">' . $page . '</a>';
                    }
                    ?>
                </div>

            </div>
        </div>
        </div>
    </body>

    </html>
<?php } ?>