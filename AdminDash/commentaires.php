<html lang="en">

<head>
    <title>Admin - Commentaires</title>
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
                        <h4>Derniers Commentaires</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" class="form-control ps-0" placeholder="Date, Mot ...">
                            <button class="btn btn-primary"><i class="fa fa-search" style="color:white"></i></button>
                        </div>
                    </div>

                </div>
            </div>


            <table class="table" id="Comments">
                <thead>
                    <tr>
                        <th scope="col">Commentaires</th>
                        <th scope="col" style="width:50px">Opération</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row container">
                            <div class="row align-items-center">
                                <div class="col-md-1 d-flex ">
                                <i class="fa-solid fa-user p-3" style="font-size:20px"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3>Zakaria SAKI  <span class="ms-1"> repondre au annoce1</span> </h3>
                                    <p>Aujourd'hui</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatibus animi quaerat incidunt mollitia rem consectetur voluptas?</p>
                                </div>
                            </div>
                        </th>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-check"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-reply"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row container">
                            <div class="row align-items-center">
                                <div class="col-md-1 d-flex ">
                                <i class="fa-solid fa-user p-3" style="font-size:20px"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3>Zakaria SAKI  <span class="ms-1"> repondre au annoce1</span> </h3>
                                    <p>Aujourd'hui</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatibus animi quaerat incidunt mollitia rem consectetur voluptas?</p>
                                </div>
                            </div>
                        </th>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-check"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-reply"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row container">
                            <div class="row align-items-center">
                                <div class="col-md-1 d-flex ">
                                <i class="fa-solid fa-user p-3" style="font-size:20px"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3>Zakaria SAKI  <span class="ms-1"> repondre au annoce1</span> </h3>
                                    <p>Aujourd'hui</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatibus animi quaerat incidunt mollitia rem consectetur voluptas?</p>
                                </div>
                            </div>
                        </th>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-check"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-reply"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    
                
                </tbody>
            </table>


        </div>
    </div>
    </div>
</body>

</html>