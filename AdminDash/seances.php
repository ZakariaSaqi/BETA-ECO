<html lang="en">

<head>
    <title>Admin - Séances</title>
    <?php include('links.html') ?>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="container">

                <div class="row mb-2 d-flex align-items-center ">
                    <div class="col-md-6 nav-small-cap">
                        <h4>Gestion des séances</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" class="form-control ps-0" placeholder="ID, Niveau, Date ...">
                            <button class="btn btn-primary"><i class="fa fa-search" style="color:white"></i></button>
                        </div>
                    </div>

                </div>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="5">
                        <button class="btn btn-light py-2 px-4">
                            <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                            <p class="text-uppercase m-0">Ajouter une nouvelle séances</p>
                        </button>
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
                        <th scope="col" style="width:50px">Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>PME</td>
                        <td>11-6-2023</td>
                        <td>18:00</td>
                        <td>20:00</td>
                        <td>Cours</td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-ban"></i></a>
                                <i class="fa-solid fa-check"></i>
                                <i class="fa-sharp fa-solid fa-clock"></i>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
    </div>
</body>

</html>