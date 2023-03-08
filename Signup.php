<?php include('config/constants.php'); 
define('SITEURL', 'http://localhost/NishiMaru/');?>


<!DOCTYPE html>
<html>

<head>

	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/png" href="img/logo.png">
		<title>Register</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="Free Website Template" name="keywords">
		<meta content="Free Website Template" name="description">

		<!-- Favicon -->
		<!--link href="img/favicon.ico" rel="icon"-->

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

		<!-- Link our CSS file -->
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	</head>
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
						<a href=">Login.php">Login</a>
					</li>
				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
	</section>
	<!-- Nav Bar End -->

	<div class="register">
		<section class="food-search2">
			<div class="container">

				<h2 class="text-center text-white">Register</h2>

				<form action="Signup.php" method="POST" class="order">

					<fieldset>
						<legend>Personal Information</legend>
						<div class="order-label">First Name</div>
						<input type="text" name="fname" placeholder="" class="input-responsive" required>

						<div class="order-label">Last Name</div>
						<input type="text" name="lname" placeholder="" class="input-responsive" required>

						<div class="order-label">Email</div>
						<input type="text" name="email" placeholder="" class="input-responsive" required>

						<div class="order-label">Username</div>
						<input type="text" name="username" placeholder="" class="input-responsive" required>

						<div class="order-label">Password</div>
						<input type="password" name="password" placeholder="" class="input-responsive" required>

						<div class="order-label">Contact No.</div>
						<input type="tel" name="contact" placeholder="" class="input-responsive" required>

						<div class="order-label">Address Line 1</div>
						<input type="text" name="ad1" placeholder="Street Address" class="input-responsive" required>

						<div class="order-label">Address Line 2</div>
						<input type="text" name="ad2" placeholder="Barangay" class="input-responsive" required>

						<div class="order-label">City</div>
						<input type="text" name="city" placeholder="Makati" class="input-responsive" required>

						<div class="order-label">Postal Code</div>
						<input type="text" name="zip" placeholder="" class="input-responsive" required>
						
						<input type="submit" name="submit" value="submit" class="btn btn-primary">

						<p class="text-center text-white">Already a member? <a href="Signup.php">Sign up</a></p>
					</fieldset>

				</form>

			</div>
		</section>

</body>

</html>
<!-- Footer Section Ends Here -->

<?php include('partials-front/footer.php'); 

require('config/constants.php');
if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($db,$_POST['fname']);
    $lname = mysqli_real_escape_string($db,$_POST['lname']);
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $phone = mysqli_real_escape_string($db,$_POST['contact']);
	$ad1 = mysqli_real_escape_string($db,$_POST['ad1']);
	$ad2 = mysqli_real_escape_string($db,$_POST['ad2']);
	$city = mysqli_real_escape_string($db,$_POST['city']);
	$zip = mysqli_real_escape_string($db,$_POST['zip']);

    $query = "INSERT INTO tbl_cust values('','$fname','$lname','$email','$username','$password','$phone','$ad1','$ad2','$city','$zip')";
    $exec = $db->query($query);

    $queryy = "INSERT INTO tbl_user values('','$username','$password','Customer')";
    $execc = $db->query($queryy);
    if($exec){
        ?>
        <script>
                window.location="login.php";
        </script>
        <?php
    }
}
?>