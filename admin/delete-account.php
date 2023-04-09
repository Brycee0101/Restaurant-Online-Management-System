<?php 
define('SITEURL', 'http://localhost/NishiMaru/');
    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    // Check if user confirmed the deletion
    if (isset($_GET['confirm'])) {
        //2. Create SQL Query to Delete Admin
        $sql = "DELETE FROM tbl_admin WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($db, $sql);

        // Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed Successully and Admin Deleted
            //echo "Admin Deleted";
            //Create SEssion Variable to Display Message
            echo "<script>
                     alert('Admin Deleted');
                    window.location.href='".SITEURL."admin/login.php';
                </script>";
        }
        else
        {
            //Failed to Delete Admin
            //echo "Failed to Delete Admin";
            echo "<script>
                    alert('Failed to Delete Admin. Try again later.');
                    window.location.href='".SITEURL."admin/login.php';
                </script>";
        }
    } else {
        // Ask user for confirmation
        echo "<script>
                if (confirm('Are you sure you want to delete this admin account? This action is irreversible.')) {
                    window.location.href = 'delete-account.php?id=$id&confirm=true';
                } else {
                    window.location.href='".SITEURL."admin/manage-admin.php';
                }
            </script>";
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>
