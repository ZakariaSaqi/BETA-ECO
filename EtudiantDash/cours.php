<?php
session_start();
if(!isset($_SESSION['ide'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
  <html lang="en">
<head>
    <title>Admin - Cours</title>
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
                        <h4>Cours & Exercices</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" class="form-control ps-0" placeholder="Métiers, Titre ...">
                            <button class="btn btn-primary"><i class="fa fa-search" style="color:white"></i></button>
                        </div>
                    </div>

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">
                            <form action="" method="get">
                                <select name="type" class="form-select selectpicker p-0" data-style="btn-primary">
                                    <option value="" selected>Type</option>
                                    <option value="Clients">Cours</option>
                                    <option value="Etudiants">Exercices</option>
                                </select>
                            </form>
                        </th>
                        <th scope="col">Titre</th>
                        <th scope="col">Métier</th>
                        <th scope="col" style="width:50px">Télécharger</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Cours</td>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td class=" text-center">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Cours</td>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td class=" text-center">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Cours</td>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td class=" text-center">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Cours</td>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td class=" text-center">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Cours</td>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td class=" text-center">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-sharp fa-solid fa-download"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
    </div>
</body>

</html>
<?php } ?>