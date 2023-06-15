<?php
session_start();
if (!isset($_SESSION['ida'])) {
  header('location:../login.php');
} else {
  require_once('../connexion.php');
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>Admin - Accueil </title>
    <?php include('links.html') ?>
  </head>

  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <?php include('navbar.php') ?>
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Nouveaux e-mails</h5>
                  </div>

                </div>
                <div>
                  <div class="row">
                    <div class="card p-3">
                      <?php
                      $reqA = "select id_user from utilisateurs where type=1";
                      $resA = $pdo->query($reqA);
                      $rowA = $resA -> fetch(PDO::FETCH_ASSOC);
                      $reqNot = "select *from notification where  id_user=" . $rowA['id_user']." limit 3";
                      $resNot = $pdo->query($reqNot);
                      foreach ($resNot as $dataNotif) { ?>
                      <h6>Un nouveau message :</h6>
                      <p style="font-size:12px"><?php  $dataNotif['date_notif']?></p>
                      <p> <?= substr($dataNotif['message_notif'],0,60) ?></p>
                      <hr>
                      <?php } ?>
                    </div>
                    <p style=" color:#5D87FF ">Pour plus d'informations, Vérifier votre boîte de réception !</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <?php
                $req1 = "SELECT count(id_user) as num, niveau FROM utilisateurs WHERE type=4 GROUP BY niveau ORDER by niveau ASC";
                $res1 = $pdo->query($req1);
                $niveau = [];
                $numE = [];
                foreach ($res1 as $data1) {
                  $niveau[] = $data1['niveau'];
                  $numE[] = $data1['num'];
                }
                $sumE = array_sum($numE);
                ?>
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Total des étudiants :
                      <?= " " . $sumE ?>
                    </h5>
                    <div class="row align-items-center">
                      <div class="col-12">
                        <div class="d-flex justify-content-center">
                          <canvas id="myChart"></canvas>

                          <script>
                            const ctx = document.getElementById('myChart');
                            new Chart(ctx, {
                              type: 'line',
                              data: {
                                labels: <?php echo json_encode($niveau); ?>,
                                datasets: [{
                                  label: 'Nombre des étudiants',
                                  data: <?php echo json_encode($numE); ?>,
                                  fill: false,
                                  borderColor: '#5D87FF',
                                  tension: 0.1
                                }]
                              },
                              options: {
                                scales: {
                                  y: {
                                    beginAtZero: true
                                  }
                                }
                              }
                            });
                          </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <h5 class="card-title mb-9 fw-semibold"> Visiteurs mensuels </h5>
                    </div>
                  </div>
                  <?php
                  $query = "SELECT DATE_FORMAT(visit_date, '%M') AS visit_month, COUNT(*) AS visitor_count 
          FROM visitors 
          WHERE visit_date >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
          GROUP BY visit_month 
          ORDER BY visit_date ASC";
                  $result = $pdo->query($query);
                  $data = $result->fetchAll(PDO::FETCH_ASSOC);
                  $monthTranslations = array(
                    'January' => 'Janvier',
                    'February' => 'Février',
                    'March' => 'Mars',
                    'April' => 'Avril',
                    'May' => 'Mai',
                    'June' => 'Juin',
                    'July' => 'Juillet',
                    'August' => 'Août',
                    'September' => 'Septembre',
                    'October' => 'Octobre',
                    'November' => 'Novembre',
                    'December' => 'Décembre'
                  );
                  $visitMonths = [];
                  $visitorCounts = [];
                  foreach ($data as $row) {
                    $englishMonth = $row['visit_month'];
                    $frenchMonth = $monthTranslations[$englishMonth];
                    $visitMonths[] = $frenchMonth;
                    $visitorCounts[] = $row['visitor_count'];
                  }
                  ?>

                  <canvas id="earning"></canvas>
                  <script>
                    var visitMonths = <?php echo json_encode($visitMonths); ?>;
                    var visitorCounts = <?php echo json_encode($visitorCounts); ?>;

                    new Chart("earning", {
                      type: "line",
                      data: {
                        labels: visitMonths,
                        datasets: [
                          {
                            label: 'Nombre des visiteurs',
                            data: visitorCounts,
                            borderColor: "#5D87FF",
                            fill: false,
                          },
                        ],
                      },
                      options: {
                        legend: {
                          display: true,
                        },
                      },
                    });
                  </script>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>

  </html>
<?php } ?>