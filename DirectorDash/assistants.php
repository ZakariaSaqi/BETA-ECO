<?php
session_start();
if(!isset($_SESSION['idd'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<html lang="en">

<head>
    <title>Admin - Assistants</title>
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
                        <h4>Gestion des assistants</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" class="form-control ps-0" placeholder="ID, Nom, Prénom ...">
                            <button class="btn btn-primary"><i class="fa fa-search" style="color:white"></i></button>
                        </div>
                    </div>

                </div>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="5">
                        <a href="inviterAssis.php" class="btn btn-light py-2 px-4" style="width:max-content">
                            <i class="fa-solid fa-square-plus me-3" style="font-size: 1.3rem;"></i>
                            <p class="text-uppercase m-0">Inviter un nouvel assistant</p>
                        </a>
                        </th>
                        <th scope="col" colspan="2">
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acces</th>
                        <th scope="col" style="width:150px">Changer le role</th>
                        <th scope="col" style="width:50px">Opération</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td>1</td>
                        <td class="text-center"><i class="fa-solid fa-rotate " style="cursor:pointer"></i></td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td>1</td>
                        <td class="text-center"><i class="fa-solid fa-rotate " style="cursor:pointer"></i></td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td>1</td>
                        <td class="text-center"><i class="fa-solid fa-rotate " style="cursor:pointer"></i></td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td>1</td>
                        <td class="text-center"><i class="fa-solid fa-rotate " style="cursor:pointer"></i></td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="operations_demande.php?action=Delete&id=<?= $data['id'] ?>" class="delete col-4"
                                title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Zakaria SAKI</td>
                        <td>sakizakaria7@gmail.com</td>
                        <td>1</td>
                        <td class="text-center"><i class="fa-solid fa-rotate " style="cursor:pointer"></i></td>
                        <td class="row">
                            <a href="operations_demande.php?action=view&id=<?= $data['id'] ?>" class="view col-4"
                                title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="operations_demande.php?action=Edit&id=<?= $data['id'] ?>" class="edit col-4"
                                title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
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
<?php } ?>