<?php include('../config/constants.php'); 
define('SITEURL', 'http://localhost/NishiMaru/');
?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Admin Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        

            <!-- Login Form Starts HEre -->
            <form action="login.php" method="POST" class="text-center">
            Username: <br>
            <input type="text" id="username" name="username" required placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" id="password" name="password" required placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

            
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $query = "SELECT * FROM tbl_admin WHERE username='$username' and pword='$password'";

        //3. Execute the Query
        $result = mysqli_query($db,$query) or die('unable to connect');
        
        //4. COunt rows to check whether the user exists or not
        $rows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['pword'];
            $_SESSION['name'] = $row['full_name'];
            $_SESSION['id'] = $row['id'];
            echo "<script>window.location.href='".SITEURL."admin/index.php'</script>";
        }

    }
?>