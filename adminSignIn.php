<?php
ob_start();
include('dashboard/functions.php');
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $_SESSION['user_id'] = $_COOKIE['id'];
    $_SESSION['username'] = $_COOKIE['username'];
}
if (isset($_SESSION['username'])) {
	header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		$email = "'".$_POST['email']."'";
		$password = "'".md5($_POST['password'])."'";
		$Admin->signIn($email, $password);
	}
}

?>
<!DOCTYPE html>



<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>sign in</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="One page parallax responsive HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Bingo HTML Template v1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- CSS
  ================================================== -->
	<!-- Themefisher Icon font -->
	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
	<!-- Lightbox.min css -->
	<link rel="stylesheet" href="plugins/lightbox2/css/lightbox.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="plugins/animate/animate.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="plugins/slick/slick.css">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body id="body">

	<!--
  Start Preloader
  ==================================== -->

	<!--
  End Preloader
  ==================================== -->




	<div class="thesignin">
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<div class="main-panel maindashboard">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-12 grid-margin">
							<div class="card theform2">
								<div class="card-body">
									<div class="theform2">

										<form action="" method="POST">
											<h3>تسجيل الدخول</h3>
											<input type="email" class="form-control" placeholder="Email" name="email" required>
											<br>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											<br>
											<input type="submit" name="submit" class="btn btn-main ">
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
