<?php
$reqNo = "select *from notification where etat_notif=1 and id_user=" . $_SESSION['idc'];
$resNo = $pdo->query($reqNo);
$countnotif = $resNo->rowCount()
  ?>
<style>
  .navbar-nav .dropdown-toggle::after {
    display: none;
  }

  .dropdown-menu i {
    font-size: 15px;
    color: #2A3547;
    padding-right: 10px;
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
      <span class="fa fa-bars navbar-toggler" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
        aria-expanded="false" aria-label="Toggle navigation"></span>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">A propos</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="annonces.php" class="nav-link">Annonces</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

          <li class="nav-item"><a href="profil.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="fa-solid fa-bell"></i>
              <?php if ($countnotif > 0) { ?>
                <div class="notification bg-primary rounded-circle" id="active"></div>
              <?php } ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" id="notificationContainer">
              <li>
                <?php if ($countnotif > 0) {
                  foreach ($resNo as $dataNoti) { ?>
                    <div class="dropdown-item">
                      <h4 class="fw-blod">
                        <?= $dataNoti['type_notif'] ?>
                        </h5>
                        <p style="font-size:10px" class="mb-3">
                          <?= $dataNoti['date_notif'] ?>
                        </p>
                        <p  class="mb-1">
                        <i class="fa-solid fa-file-plus"></i>
                          <?= $dataNoti['message_notif'] ?>
                        </p>
                    </div>
                  <?php }
                } else
                  echo "<p class='px-3 py-1'>Aucune notification !<p>" ?>
                </li>

        </ul>
      </div>
    </div>
  </div>
</nav>
<script>

  document.getElementById('dropdownMenuButton').addEventListener('click', function () {
    <?php
    $updatenotif = "UPDATE notification SET etat_notif = 0 WHERE etat_notif = 1 AND id_user =" . $_SESSION['idc'];
    $pdo->query($updatenotif);

    ?>

  });
</script>