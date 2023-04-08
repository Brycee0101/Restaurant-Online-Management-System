<?php 
    include('../config/constants.php'); 
     include('login-check.php');
?>
 

<html>
    <head>
        <title>Online Food Order</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <!-- <li><a href="manage-category.php">Category</a></li> -->
                    <li><a href="manage-food.php">Food Items</a></li>
                    <li><a href="manage-order.php">Order Section</a></li>
                    <li><a href="manage-admin.php">Manage Admin</a></li>
                    <li class="dropdown">
                            <button class="dropbtn">🔽 Welcome, <?php echo $_SESSION['username']; ?>!</button>
                            <div class="dropdown-content">
                                <a href="manage-profile.php">Profile</a>
                                <a href="logout.php">Logout</a>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->

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

<style>
    /* Style the dropdown button */
.dropbtn {
  background-color: #fff;
  color: #5d9e5f;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown{
  position: relative;
}
/* Style the dropdown content */
.dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Style the links inside the dropdown */
.dropdown-content a {
  text-align: center;
  color: #5d9e5f;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu when the dropdown button is clicked */
.show {
  display: block;
}

</style>