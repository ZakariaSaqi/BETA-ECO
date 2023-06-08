<html lang="en">

<head>
    <title>Admin - Cours</title>
</head>
<?php include('links.css')  ;?>
<body>
<style>
    .navbar-nav-wrapper ul li i{
    font-size: 1.2rem;
    padding-left: .5rem;
    padding-right: .5rem;
  }
  </style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container ">
      <!-- Logo -->
      <a class="navbar-brand" href="index.php">
        <img src="../images/website/iconBlue.svg" alt="BETA ECO" srcset="" style="width: 2.5rem;">
      </a>
  
      <!-- Navigation List -->
      <div class="navbar-nav-wrapper">
        <span class="fa fa-bars navbar-toggler" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"></span>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-bell"></i></a></li>
            <li class="nav-item"><a href="#index.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
          </div>
             
    </div>
  </nav>
<section id="profil" class="hero-wrap hero-wrap-2" style="background-image: url(../images/website/bg_3.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2">
            <span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Votre profil <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-0 bread">Modfier profil</h1>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="ftco-section">
    <div class="container">
    <div class="row gutters-sm">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prénom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Adresse</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-3">
                                        <h6 class="mb-0">Niveau</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="" class="form-select  mb-3">
                                            <option value="" selected>Choisir</option>
                                            <option value="">PME 2</option>
                                            <option value="">PME 1</option>
                                            <option value="">ENCG</option>
                                            <option value="">ISTA</option>
                                            <option value="">FA</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Login</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mots de passe</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Confirmation</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-sm-6">
                            <a class="btn btn-info " target="__blank" href="modifier.php">Ajouter</a>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
  </section> 
<?php include('footer.php');
     ?>
</body>

</html>