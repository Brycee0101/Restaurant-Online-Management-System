<?php include('config/constants.php'); 
define('SITEURL', 'http://localhost/NishiMaru/');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order System</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>
<?php include('logcheck.php');?>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>logout.php">Signout</a>
                    </li>
                    <li class="dropdown">
                            <button class="dropbtn">Welcome, <?php echo $_SESSION['username']; ?>!</button>
                            <div class="dropdown-content">
                                <a href="<?php echo SITEURL; ?>cartview.php">Cart🛒</a>
                                <a href="<?php echo SITEURL; ?>orderview.php">Orders🍣</a>
                            </div>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <script>
    // Get the dropdown button
    var dropdownBtn = document.getElementsByClassName("dropbtn")[0];

    // Get the dropdown content
    var dropdownContent = document.getElementsByClassName("dropdown-content")[0];

    // Toggle the "show" class when the dropdown button is clicked
    dropdownBtn.onclick = function() {
        dropdownContent.classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
