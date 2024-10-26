<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Contact</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
							<img src="assets/img/logo.png" alt="Logo">
							</a>
						</div>
						<!-- logo -->
						
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">Over Ons</a></li>
								<li><a href="onzemissie.html">Onze missie</a></li>
								<li><a href="wat we doen.html">Wat we doen</a></li>
								<li><a href="voor wie.html">Voor wie</a></li>
								<li><a href="nieuws.html">Nieuws</a></li>
								<li><a href="vrijwilligen.html">Vrijwilligen en/of lid worden</a></li>
								<li class="current-list-item"><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Contacteer ons</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Heb je vragen?</h2>
						<p>Vul dit formulier in of zoek contact op via telefoon of email.</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form action="mail.php" method="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
							<p>
								<input type="text" placeholder="Naam" name="Naam" id="Naam" required>
								<input type="email" placeholder="Email" name="email" id="email" required>
							</p>
							<p>
								<input type="tel" placeholder="Telefoon" name="telefoon" id="telefoon">
								<input type="text" placeholder="Onderwerp" name="Onderwerp" id="Onderwerp">
							</p>
							<p><textarea name="bericht" id="bericht" cols="30" rows="10" placeholder="Bericht" required></textarea></p>

							<!-- PHP code to generate CSRF token -->
							<?php
							session_start();
							$_SESSION['token'] = bin2hex(random_bytes(32));  // Generate CSRF token
							?>
							<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />

							<p><input type="submit" value="Verzend"></p>
						</form>
					</div>
				</div>
				<!-- Additional contact information section -->
				<div class="col-lg-4">
					<div class="contact-info-box">
						<h4>Contact informatie</h4>
						<p>Email: <a href="mailto:contact@mett-u.be">contact@mett-u.be</a></p>
						<p>Telefoon: +32 123 456 789</p>
						<p>Adres: Mett-U Straat 12, 1000 Brussel, België</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Over ons</h2>
						<p>METT-U wordt gedragen door het bestuur en vrijwilligers. Het is belangrijk dat zorggasten én vrijwilligers, op ons kunnen rekenen...</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Vragen?</h2>
						<a href="contact.php" class="boxed-btn">Mail ons</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pagina's</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="onzemissie.html">Onze missie</a></li>
							<li><a href="wat we doen.html">Wat we doen</a></li>
							<li><a href="voor wie.html">Voor wie</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>VZW &copy; 2024 - <a href="index.html">METT-U</a>, Officieel</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</