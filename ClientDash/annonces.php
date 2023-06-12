<section id="annonces" class="hero-wrap hero-wrap-2" style="background-image: url('../images/website/image_1.jpg');"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil <i
                class="ion-ios-arrow-forward"></i></a></span> <span>Annonces <i
              class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread">Annonces</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      <?php
      require_once('../connexion.php');
      $reqAnn = "SELECT  *from  annonce";
      $resultsPerPage = 12;
      $totalResults = $pdo->query($reqAnn)->rowCount();
      $totalPages = ceil($totalResults / $resultsPerPage);
      $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
      $startIndex = ($currentPage - 1) * $resultsPerPage;
      $reqAnn .= " ORDER BY id_annonce DESC LIMIT $startIndex, $resultsPerPage";
      $resAnn = $pdo->query($reqAnn);
      foreach ($resAnn as $dataAnn) { ?>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="annonce.php" class="block-20 rounded"
              style="background-image: url('<?= $dataAnn['image_annonce'] ?>');">
            </a>
            <div class="text p-4">
              <div class="meta mb-2">
                <div><a href="#">
                    <?= $dataAnn['date_annonce'] ?>
                  </a></div>
                <div>
                  <a href="#" class="meta-chat">
                    <span class="fa fa-comment">
                      <?php
                      $reqComnNumer = "SELECT COUNT(*) as num FROM commentaire WHERE id_annonce =". $dataAnn['id_annonce'] ;
                      $resComnNumer = $pdo->query($reqComnNumer);
                      $rowComn = $resComnNumer -> fetch(PDO :: FETCH_ASSOC);
                      echo $rowComn['num'];
                      ?>
                    </span>
                  </a>
                </div>
              </div>
              <h3 class="heading"><a href="#">
                  <?= $dataAnn['titre'] ?>
                </a>
              </h3>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
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
        echo '" style="color:white" href="annonces.php" >' . $page . '</a>';
      }
      ?>
    </div>
  </div>
</section>