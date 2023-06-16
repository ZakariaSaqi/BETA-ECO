<?php if(isset($_GET['id'])){ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BETA ECO - Annonce</title>
    <?php include('links.css') ?>
  </head>
  <body>
  <?php include('navbar.php') ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/website/image_4.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil <i
                  class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Annonces <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Annonce<i
                class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Annonce</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <?php 
          $req = "select *from annonce where id_annonce=".$_GET['id'];
          $res = $pdo->query($req);
					$row = $res->fetch(PDO::FETCH_ASSOC);
          $file_path = $row['image_annonce'];
          $new_file_path = str_replace("../", "", $file_path);
          ?>
          <p>
            <img src="<?= $new_file_path ?>" alt="" class="img-fluid">
          </p>
          <h2 class="mb-3"><?= $row['titre'] ?></h2>
          <p><?= $row['description'] ?></p>

          <?php $reqc ="select COUNT(*) as num, u.nom, u.prenom, c.date_comment, c.contenu  from commentaire c, utilisateurs u, annonce an
          where u.id_user = c.id_user and c.id_annonce = an.id_annonce and  c.etat=1 and an.id_annonce = ".$_GET['id'];
          $reqN ="select COUNT(*) as num from commentaire c, utilisateurs u, annonce an
          where u.id_user = c.id_user and c.id_annonce = an.id_annonce and  c.etat=1 and an.id_annonce = ".$_GET['id']; 
          $resc = $pdo -> query($reqc);
          $resN = $pdo -> query($reqN);
          $rowN = $resN -> fetch(PDO :: FETCH_ASSOC);
          ?>
          <div class="pt-5 mt-5">
            <h3 class="mb-5">
              <?php 
              if($rowN['num'] == 1) echo $rowN['num']." commentaire";
              elseif ($rowN['num'] == 0) echo "Aucun commentaire";
              else echo $rowN['num']." commentaires";
            ?>
            </h3>
            <?php foreach($resc as $datac){?>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                <i class="fa-solid fa-user px-3" style="font-size:20px; color:#5D87FF"></i>
                </div>
                <div class="comment-body">
                  <h3><?= $datac['prenom'] . " " . $datac['nom'] ?></h3>
                  <div class="meta"><?= $datac['date_comment'] ?></div>
                  <p><?=  $datac['contenu'] ?></p>
                </div>
                </li> 
            </ul>
            <?php } ?>
            <p><a href="login.php" class="btn btn-primary px-3 py-1">Répondre</a></p>
          </div>

        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
          <div class="sidebar-box ftco-animate">
            <h3>Annonces récentes</h3>
      <?php 
      $reqAnn = "SELECT  * from annonce ORDER BY id_annonce DESC LIMIT 4";
      $reqAnn .= " ";
      $resAnn = $pdo->query($reqAnn);
      foreach ($resAnn as $dataAnn) { 
        $file_path = $dataAnn['image_annonce'];
        $new_file_path = str_replace("../", "", $file_path);
        ?>
            <div class="block-21 mb-4 d-flex">
              <a href="annonce.php?id=<?= $dataAnn['id_annonce'] ?>" class="blog-img mr-4"  style="background-image: url('<?= $new_file_path; ?>');" ></a>
              <div class="text">
                <h3 class="heading"><a href="#">  <?= $dataAnn['titre'] ?></a>
                </h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span><?= $dataAnn['date_annonce'] ?></a></div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- <div class="sidebar-box ftco-animate">
            <h3>Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate
              quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos
              fugit cupiditate numquam!</p>
          </div> -->
        </div>

      </div>
    </div>
  </section>
  <?php include('footer.php') ?>
  </body>
</html>
<?php } ?>