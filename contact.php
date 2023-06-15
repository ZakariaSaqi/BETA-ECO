<!DOCTYPE html>
<html lang="en">

<head>
	<title>BETA ECO - Contact</title>
	<?php include('links.css') ?>
</head>

<body>
	<?php include('navbar.php') ?>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/website/bg_2.jpg');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil <i
									class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i
								class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-0 bread">Contactez-nous</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Contactez-nous</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										<?php
										require 'assets/vendor/autoload.php';
										use PHPMailer\PHPMailer\PHPMailer;
										use PHPMailer\PHPMailer\Exception;

										require_once('connexion.php');
										if (isset($_POST['btn'])) {
											$email = $_POST['email'];
											$name = ucfirst($_POST['nom']);
											if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
												// hadi ktverfier wesh domain kyn olala
												list(, $domain) = explode('@', $email);
												if (checkdnsrr($domain, 'MX')) {
													$to = $email;
													$sub_before = 'BETA ECO : ' . $_POST['sub'];
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

														// Send the email
														$mail->send();
														$req3 = "select  id_user from utilisateurs where type = 1";
								$res3 = $pdo -> query($req3);
								while($row3 = $res3 ->fetch(PDO :: FETCH_ASSOC)){
									$req_notif = "insert into notification (type_notif ,message_notif, etat_notif, id_user) values('Nouvelle consultation' , '$name : ".$_POST['message']."', 1,".$row3['id_user'].")";
									$res_notif = $pdo -> query($req_notif);
								}
														echo '<center><p style="color:#2A3547">Email envoyé<i class="fa-solid fa-check ps-2"></i></p></center>';
													} catch (Exception $e) {
														echo '<center><p style="color:#2A3547">Échec de l\'envoi de l\'e-mail. <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';
													}
												}
												else echo '<center><p style="color:#2A3547">Adresse email non valide  <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';

											}
											else echo '<center><p style="color:#2A3547">Adresse email non valide <i class="fa-sharp fa-solid fa-triangle-exclamation ps-2" ></i></p></center>';
										}

										?>
									</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Nom complet</label>
													<input type="text" class="form-control" name="nom" id="name"
														required placeholder="Nom">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Adresse e-mail</label>
													<input type="email" class="form-control" name="email" id="email"
														required placeholder="E-mail">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Sujet</label>
													<input type="text" class="form-control" name="sub" id="subject"
														required placeholder="Sujet">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30"
														required rows="4" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Envoyer le message" name="btn"
														class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Contactez-nous</h3>
									<p class="mb-4">Nous sommes ouverts à toute suggestion ou simplement pour discuter
									</p>
									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-map-marker"></span>
										</div>
										<div class="text pl-3">
											<p><span>Adresse :</span><a href="#mappp-">Quartier El Quodes N32,
													Chichaoua, Maroc</a></p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Téléphone :</span> <a href="tel://1234567920"> +212 661 506 209</a>
											</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-paper-plane"></span>
										</div>
										<div class="text pl-3">
											<p><span>E-mail :</span> <a
													href="mailto:info@yoursite.com">betaeco4u@gmail.com</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section bg-light" id="mappp-">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2291.6877510442982!2d-8.765331302597149!3d31.543726042811052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdae3db0948b7a0d%3A0x27d0a82b92ff3c42!2z2LTZiti02KfZiNip!5e1!3m2!1sfr!2sma!4v1685730065379!5m2!1sfr!2sma"
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</section>
	<?php include('footer.php') ?>
</body>

</html>