<?php include('config/constants.php');
define('SITEURL', 'http://localhost/NishiMaru/'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="img/logo.png">
	<title>Nishi Maru Bento</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free Website Template" name="keywords">
	<meta content="Free Website Template" name="description">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

	<!-- Link our CSS file -->
	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>
	<!-- Nav Bar Start -->
	<section class="navbar">
		<div class="container">
			<div class="logo">
				<a href="#" title="Logo">
					<img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
				</a>
			</div>

			<div class="menu text-right">
				<ul>
					<li>
						<a href="<?php echo SITEURL; ?>Signup.php">Register</a>
					</li>

				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
	</section>
	<!-- Nav Bar End -->
	<section class="food-search2">
		<div class="container">

			<h2 class="text-center text-white">Login</h2>

			<form action="index.php" method="POST" class="order">

				<fieldset>
					<legend>Enter Credentials</legend>
					<div class="order-label">Username</div>
					<input type="text" name="username" placeholder="" class="input-responsive" required>

					<div class="order-label">Password</div>
					<input type="password" name="password" placeholder="" class="input-responsive" required>
					<a href="home.php"><input type="submit" name="submit" value="login" class="btn btn-primary"></a>
					<p class="text-center text-white">Not yet a member? <a href="Signup.php">Sign up</a></p>
				</fieldset>

			</form>

		</div>
	</section>
</body>

</html>
<!-- Footer Section Ends Here -->

<?php include('partials-front/footer.php'); ?>