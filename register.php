<?php

include('dashboard/functions.php');

ob_start();

if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
	$_SESSION['user_id'] = $_COOKIE['id'];
	$_SESSION['username'] = $_COOKIE['username'];
  }
  if (isset($_SESSION['username'])) {
	  header("Location: index.php");
  }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		$username = "'" . $_POST['username'] . "'";
		$phone = "'" . $_POST['phone'] . "'";
		$email = "'" . $_POST['email'] . "'";
		$password = "'" . md5($_POST['password']) . "'";
		$cpassword = "'" . md5($_POST['cpassword']) . "'";
		if ($password == $cpassword) {

			$Users->Register($username,   $email, $phone, $password);
		} else {
			echo "<script>alert('Password Not Matched.')</script>";
		}
	}
}

include('header.php');
?>


<div class="theform">
	<div>
		<img src="images/pexels-mister-mister-380782.jpg" alt="">
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<h3>Register</h3>
		<input type="text" placeholder="Username" name="username" required>
		<input type="email" placeholder="Email" name="email" required>

		<input type="password" placeholder="Password" name="password" required>

		<input type="password" placeholder="Confirm Password" name="cpassword" required>
		<input type="text" name="phone" placeholder="phone" required>
		<button name="submit" class="btn">Register</button>
		<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
	</form>
</div>
<?php
include('footer.php');
?>