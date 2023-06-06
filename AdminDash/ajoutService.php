<html lang="en">

<head>
    <title>Admin - Ajouter séance</title>
    <?php include('links.html') ?>
</head>
<style>
    .form-control, .form-select{
        border-radius: 5px;
        height: 35px;
        border-color:#5D87FF ;
    }
</style>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="main-body">

                <div class="row">
                    <div class="col-md-12 nav-small-cap">
                        <h4>Service / Ajouter </h4>
                    </div>
                </div>
                <form action="" method="post">
                <div class="row gutters-sm">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Titre</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="description" class="form-control" id="" cols="30" rows="10" style="height:10rem"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prix</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="" id="" class="form-control">
                                    </div>
                                </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <button class="btn btn-info"> Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>