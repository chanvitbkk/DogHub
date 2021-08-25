<?php require_once('connect.php');
session_start();
$uid = $_SESSION['UID']; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-animals-nature/256/22214-dog-face-icon.png">
	<title>DogHub</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="assets/css/fontawesome.css">
	<link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
	<link rel="stylesheet" href="assets/css/animated.css">
	<link rel="stylesheet" href="assets/css/owl.css">
	<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
	<!-- ***** Preloader End ***** -->

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<a href="second.php" class="logo">
							<h4>DOG<span>HUB</span></h4>
						</a>
						<!-- ***** Logo End ***** -->
						<!-- ***** Menu Start ***** -->
						<ul class="nav">
							<li class="scroll-to-section">
								<div class="main-red-button"><a href="http://localhost:8000/">Get Hashkey</a></div>
							</li>

						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>

</body>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="themes/css/bootstrappage.css" rel="stylesheet" />

	<!-- global styles -->
	<link href="themes/css/flexslider.css" rel="stylesheet" />
	<link href="themes/css/main.css" rel="stylesheet" />

	<!-- scripts -->
	<script src="themes/js/jquery-1.7.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="themes/js/superfish.js"></script>
	<script src="themes/js/jquery.scrolltotop.js"></script>
	<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>


	<div id="contact" class="contact-us section">
		<div class="container">
			<section class="main-content">
				<?php
				if (isset($_POST['uphash'])) {
					$hashkey = $_POST["Uploadinghashkey"];
					$filename = $_POST["hashkeyname"];
					$assignment = $_POST["Assignment"];
					$note = $_POST["Note"];
					if ($hashkey == null or $filename == null) {
						echo "ERROR! PLEASE TRY AGAIN!"
				?>
						<form action="hashlist.php">
							<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Back"></div>
						</form>
						<?php
					} else {
						$q = "INSERT INTO hashlist (UID,Hashkey,Filename,Assignment,Note) VALUES ('$uid','$hashkey','$filename','$assignment','$note')";
						$result = $mysqli->query($q);
						if (!$result) {
							echo "INSERT failed. Error: " . $mysqli->error;
							return false;
						} else {
							//echo "UPLOAD SUCCESS";
						?>
							<form action="second.php">
								<h1>
									<font color="#FFFFFF"><span>Upload hashkey success. Go back to main page.</span>
								</h1><br>
								<li class="scroll-to-section">
									<div class="main-white-button"><a href="second.php">Back</a></div>
								</li>
							</form>
				<?php
						}
					}
				} ?>
			</section>


		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
					<p>© Copyright 2021 KrataiKhongPreePhoo All Rights Reserved.

					</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="themes/js/common.js"></script>
	<script>
		$(document).ready(function() {
			$('#checkout').click(function(e) {
				document.location.href = "checkout.html";
			})
		});
	</script>
</body>

</html>