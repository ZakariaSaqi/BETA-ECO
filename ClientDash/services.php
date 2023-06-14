<?php
session_start();
if(!isset($_SESSION['idc'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>BETA ECO - Services</title>
    <?php include('links.html') ?>
  </head>
  <body>
    <?php include('navbar.php') ?>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/website/bg_2.jpg')"
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
  <?php include('footer.php') ?>
  </body>
</html>
<!-- <section class="ftco-section ftco-no-pt bg-light ftco-faqs">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="img-faqs w-100">
					<div class="img mb-4 mb-sm-0" style="background-image:url(../images/website/about-2.jpg);">
					</div>
					<div class="img img-2 mb-4 mb-sm-0" style="background-image:url(../images/website/about-1.jpg);">
					</div>
				</div>
			</div>
			<div class="col-lg-6 pl-lg-5">
				<div class="heading-section mb-5 mt-5 mt-lg-0">
					<span class="subheading">FAQs</span>
					<h2 class="mb-3">Questions fréquemment posées</h2>
					<p>Trouvez les réponses à vos questions fréquemment posées : résolution de problèmes, gestion
						des prêts commerciaux et croissance de vos fonds d'investissement.</p>
				</div>
				<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
					<div class="card">
						<div class="card-header p-0" id="headingOne">
							<h2 class="mb-0">
								<button href="#collapseOne"
									class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
									data-parent="#accordion" data-toggle="collapse" aria-expanded="true"
									aria-controls="collapseOne">
									<p class="mb-0">Comment résoudre un problème ?</p>
									<i class="fa" aria-hidden="true"></i>

								</button>
							</h2>
						</div>
						<div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
							<div class="card-body py-3 px-0">
								<ol>
									<li>Identifiez clairement le problème et comprenez sa nature.</li>
									<li>Rassemblez toutes les informations pertinentes sur le problème.</li>
									<li>Générez des idées de solutions en utilisant des techniques de brainstorming.
									</li>
									<li>Évaluez chaque solution potentielle en examinant ses avantages et ses
										inconvénients.</li>
									<li>Sélectionnez la meilleure solution et créez un plan d'action pour sa mise en
										œuvre.</li>
									<li>Mettez en œuvre le plan, surveillez les résultats et apportez les
										ajustements nécessaires.</li>
								</ol>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header p-0" id="headingTwo" role="tab">
							<h2 class="mb-0">
								<button href="#collapseTwo"
									class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
									data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
									aria-controls="collapseTwo">
									<p class="mb-0">Comment gérer vos prêts commerciaux ?</p>
									<i class="fa" aria-hidden="true"></i>
								</button>
							</h2>
						</div>
						<div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
							<div class="card-body py-3 px-0">
								<ol>
									<li>Analysez votre situation financière pour comprendre votre capacité à
										rembourser les prêts.</li>
									<li>Établissez un budget réaliste et allouez des fonds pour les remboursements.
									</li>
									<li>Communiquez régulièrement avec vos créanciers pour discuter de tout problème
										ou retard de paiement potentiel.</li>
									<li>Explorez les options de refinancement ou de restructuration de vos prêts si
										vous avez du mal à les rembourser.</li>
									<li>Faites preuve de discipline financière en évitant de contracter de nouveaux
										prêts si votre situation est précaire.</li>
								</ol>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header p-0" id="headingThree" role="tab">
							<h2 class="mb-0">
								<button href="#collapseThree"
									class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
									data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
									aria-controls="collapseThree">
									<p class="mb-0">Comment faire croître vos fonds d'investissement ?</p>
									<i class="fa" aria-hidden="true"></i>
								</button>
							</h2>
						</div>
						<div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
							<div class="card-body py-3 px-0">
								<ol>
									<li>Définissez des objectifs d'investissement clairs en termes de rendement, de
										risque et de durée.</li>
									<li>Diversifiez vos investissements en répartissant vos fonds sur différents
										actifs, secteurs ou régions géographiques.</li>
									<li>Faites des recherches approfondies sur les opportunités d'investissement et
										suivez de près les marchés financiers.</li>
									<li>Surveillez et évaluez régulièrement les performances de vos investissements,
										en ajustant si nécessaire votre stratégie.</li>
									<li>Consultez un conseiller financier qualifié pour obtenir des conseils
										personnalisés en fonction de votre profil d'investisseur.</li>
								</ol>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header p-0" id="headingFour" role="tab">
							<h2 class="mb-0">
								<button href="#collapseFour"
									class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link"
									data-parent="#accordion" data-toggle="collapse" aria-expanded="false"
									aria-controls="collapseFour">
									<p class="mb-0">Quelles sont les exigences pour les entreprises ?</p>
									<i class="fa" aria-hidden="true"></i>
								</button>
							</h2>
						</div>
						<div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
							<div class="card-body py-3 px-0">
								<ol>
									<li>Enregistrement et immatriculation auprès des autorités compétentes.</li>
									<li>Obtention d'un numéro d'identification fiscale.</li>
									<li>Ouverture d'un compte bancaire professionnel.</li>
									<li>Respect des réglementations locales en matière de licences et de permis
										d'exploitation.</li>
									<li>Tenue d'une comptabilité et d'une déclaration fiscale régulières.</li>
									<li>Respect des lois du travail et des normes de sécurité.</li>
									<li>Conformité aux règles de protection des consommateurs et de la vie privée.
									</li>
									<li>Assurance adéquate pour couvrir les risques liés à l'activité.</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<?php } ?>