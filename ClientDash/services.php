<section  id="services" class="hero-wrap hero-wrap-2" style="background-image: url(../images/website/bg_2.jpg')"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2">
          <span class="mr-2"><a href="index.html">Accueil <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Services <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-0 bread">Nos services</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <?php
      $reqServ = "SELECT titre, description from  service";
      $resServ = $pdo->query($reqServ);
      foreach ($resServ as $dataServ) { ?>
        <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block">
            <div class="icon d-flex mr-2">
              <img src="" alt="" srcset="">
            </div>
            <div class="media-body">
              <h3 class="heading">
                <?= $dataServ['titre'] ?>
              </h3>
              <p>
                <?= $dataServ['description'] ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>