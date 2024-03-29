<?php include('partials/menu.php'); 
define('SITEURL', 'http://localhost/NishiMaru/');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add New Nishi Maru Bento Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the Session is Set or Not
            {
                echo $_SESSION['add']; //Display the Session Message is SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="New Admin Name">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="New Admin Username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Password for New Admin">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = mysqli_real_escape_string($db, $_POST['password']);  //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            pword='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($db, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            echo "<script>
                alert('Admin Added Successfully');
                window.location.href='".SITEURL."admin/manage-admin.php';
            </script>";
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            echo "<script>
                alert('Failed to Add Admin');
                window.location.href='".SITEURL."admin/manage-admin.php';
            </script>";
        }

    }
    
?>