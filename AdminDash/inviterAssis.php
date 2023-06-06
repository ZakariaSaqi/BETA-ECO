<html lang="en">

<head>
    <title>Admin - Inviter assistante</title>
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
                        <h4>assistant / Inviter </h4>
                    </div>
                </div>
                <form action="" method="post">
                <div class="row gutters-sm">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" id="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <button class="btn btn-info">Inviter</button>
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