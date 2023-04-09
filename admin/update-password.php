<?php include('partials/menu.php');
define('SITEURL', 'http://localhost/NishiMaru/');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
        
        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password" required>
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password" required>
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 

            //CHeck whether the Submit Button is Clicked on Not
            if(isset($_POST['submit']))
            {
                //echo "CLicked";

                //1. Get the DAta from Form
                $current_password = mysqli_real_escape_string($db, $_POST['current_password']); 
                $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
                $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);


                //2. Check whether the user with current ID and Current Password Exists or Not
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($db, $sql);

                if($res==true)
                {
                    //CHeck whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //User Exists and Password Can be CHanged
                        //echo "User FOund";

                        //Check whether the new password and confirm match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the Password
                            $sql2 = "UPDATE tbl_admin SET 
                                pword='$new_password' 
                                WHERE id=$id
                            ";

                            //Execute the Query
                            $res2 = mysqli_query($db, $sql2);

                            //CHeck whether the query exeuted or not
                            if($res2==true)
                            {
                                //Display Succes Message
                                //REdirect to Manage Admin Page with Success Message
                                echo "<script>
                                        alert('Password Changed Successfully');
                                        window.location.href='".SITEURL."admin/manage-profile.php';
                                    </script>";

                            }
                            else
                            {
                                //Display Error Message
                                //REdirect to Manage Admin Page with Error Message
                                echo "<script>
                                        alert('Failed to Change Password.');
                                        window.location.href='".SITEURL."admin/manage-profile.php';
                                    </script>";
                            }
                        }
                        else
                        {
                            //REdirect to Manage Admin Page with Error Message
                            echo "<script>
                                        alert('Password Did not Match.');
                                        window.location.href='".SITEURL."admin/manage-profile.php';
                                    </script>";
                        }
                    }
                    else
                    {
                        //User Does not Exist Set Message and REdirect
                        echo "<script>
                                        alert('User Not Found.');
                                        window.location.href='".SITEURL."admin/manage-profile.php';
                                    </script>";
                    }
                }

                //3. CHeck Whether the New Password and Confirm Password Match or not

                //4. Change PAssword if all above is true
            }

?>


<?php include('partials/footer.php'); ?>