<?php 
define('SITEURL', 'http://localhost/NishiMaru/');
    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

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
                window.location.href='".SITEURL."admin/manage-admin.php';
            </script>";
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";
        echo "<script>
                alert('Failed to Delete Admin. Try again later.');
                window.location.href='".SITEURL."admin/manage-food.php';
            </script>";
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>