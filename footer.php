<footer class="footer ">
	<div class="container-fluid px-lg-5">
		<div class="row">
			<div class="col-md-9 py-5">
				<div class="row">
					<div class="col-md-4 mb-md-0 mb-4">
						<div class="row d-flex justify-content-center">
							<img src="images/website/iconWhite.svg" class="m-2" alt="" srcset="" style="width:5rem">
						</div>
						<p style="color:white;">BETA ECO : comptabilité durable, conseils éco-responsables pour une
							gestion financière
							respectueuse de l'environnement. Durabilité et croissance responsable.</p>
						<ul class="ftco-footer-social p-0">
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
									title="Twitter"><span class="fa-brands fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
									title="Facebook"><span class="fa-brands fa-instagram"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
									title="Instagram"><span class="fa-brands fa-whatsapp"></span></a></li>
						</ul>
					</div>
					<div class="col-md-8">
						<div class="row justify-content-center">
							<div class="col-md-12 col-lg-10">
								<div class="row">
									<div class="col-md-6 mb-md-0 mb-4">
										<h2 class="footer-heading">Services</h2>
										<ul class="list-unstyled">
											<li><a href="#" class="py-1 d-block">Comptabilité</a></li>
											<li><a href="#" class="py-1 d-block">Formation</a></li>
											<li><a href="#" class="py-1 d-block">Conseil juridique</a></li>
											<li><a href="#" class="py-1 d-block">Gestion d'exploitation agricol</a></li>
										</ul>
									</div>
									<div class="col-md-6 mb-md-0 mb-4">
										<h2 class="footer-heading">Découvrir</h2>
										<ul class="list-unstyled">
											<li><a href="about.php" class="py-1 d-block">À propos de nous</a></li>
											<li><a href="announces.php" class="py-1 d-block">Annonces</a></li>
											<li><a href="contact.php" class="py-1 d-block">Nous contacter</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
				<h2 class="footer-heading">Consultation gratuite</h2>
				<?php
				require 'assets/vendor/autoload.php';
				use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\Exception;

				require_once('connexion.php');
				if (isset($_POST['btn'])) {
					$email = $_POST['email'];
					$name = ucfirst($_POST['nom']);
					$message = trim($_POST['message']);
                    $escapedMsg = str_replace("'", "\'", $message);
					$sub = trim($_POST['sub']);
                    $escapedsub = str_replace("'", "\'", $sub);
					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						// hadi ktverfier wesh domain kyn olala
						list(, $domain) = explode('@', $email);
						if (checkdnsrr($domain, 'MX')) {
							$to = $email;
							$sub_before = $_POST['sub'];
							$message = "Nom : " . $name . "<br> Email :" . $email . "<br>" . $_POST['message'];
							$sub_after = str_replace("é", "e", $sub_before);

							$message = $_POST['message'] . "<br>"
								. $_POST['nom'] . ' <br>';

							// Create a new PHPMailer instance
							$mail = new PHPMailer(true);

							try {
								// Set up SMTP
								$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com';
								$mail->SMTPAuth = true;
								$mail->Username = 'sakizakaria7@gmail.com';
								$mail->Password = 'ertxnxnxvctveqge';
								$mail->SMTPSecure = 'tls';
								$mail->Port = 587;

								// Set up sender and recipient
								$mail->setFrom('sakizakaria7@gmail.com', 'BETA ECO');
								$mail->addAddress($to);
								$mail->isHTML(true);

								// Set email subject and body
								$mail->Subject = $sub_after;
								$mail->Body = $message;
								$mail->send();
								
								$req3 = "select  id_user from utilisateurs where type = 1";
								$res3 = $pdo -> query($req3);
								while($row3 = $res3 ->fetch(PDO :: FETCH_ASSOC)){
									$req_notif = "insert into notification (type_notif ,message_notif, etat_notif, id_user, from_client)
									values('$escapedsub' , '$name : ".$escapedMsg."', 0,".$row3['id_user'].", 1)";
									$res_notif = $pdo -> query($req_notif);
								}

								echo '<center><p style="color:#fff">Email envoyé<i class="fa-solid fa-check ps-2"></i></p></center>';
							} catch (Exception $e) {
								echo '<center><p style="color:#fff">Échec de l\'envoi de l\'e-mail. <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';
							}
						} else
							echo '<center><p style="color:#fff">Adresse email non valide  <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';

					} else
						echo '<center><p style="color:#fff">Adresse email non valide <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';
				}

				?>
				<form action="#" class="form-consultation" method="post">
					<div class="form-group">
						<input type="text" name="nom" class="form-control" placeholder="Nom" required>
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" name="sub" class="form-control" placeholder="Subject" required>
					</div>
					<div class="form-group">
						<textarea name="message" id="" cols="30" rows="3" class="form-control" placeholder="Message"
							required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="btn" class="form-control btn btn-primary px-3">Envoyer
							message</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</footer>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" />
	</svg></div>


<script src="assets/assets2/js/jquery.min.js"></script>
<script src="assets/assets2/js/jquery-migrate-3.0.1.min.js"></script>
<script src="assets/assets2/js/popper.min.js"></script>
<script src="assets/assets2/js/bootstrap.min.js"></script>
<script src="assets/assets2/js/jquery.easing.1.3.js"></script>
<script src="assets/assets2/js/jquery.waypoints.min.js"></script>
<script src="assets/assets2/js/jquery.stellar.min.js"></script>
<script src="assets/assets2/js/jquery.animateNumber.min.js"></script>
<script src="assets/assets2/js/owl.carousel.min.js"></script>
<script src="assets/assets2/js/jquery.magnific-popup.min.js"></script>
<script src="assets/assets2/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="assets/assets2/js/google-map.js"></script>
<script src="assets/assets2/js/main.js"></script>