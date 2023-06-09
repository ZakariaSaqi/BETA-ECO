<?php
session_start();
if(!isset($_SESSION['ide'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
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
                        <th scope="col">Date</th>
                        <th scope="col">Heure debut</th>
                        <th scope="col">Heure fin</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="width:50px">Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11-6-2023</td>
                        <td>18:00</td>
                        <td>20:00</td>
                        <td>Cours</td>
                        <td class="row">
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
<?php } ?>