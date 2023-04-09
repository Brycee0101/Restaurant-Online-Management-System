<?php 
    //Include COnstants Page
    include('../config/constants.php');
    define('SITEURL', 'http://localhost/NishiMaru/');

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the Image if Available
        //CHeck whether the image is available or not and Delete only if available
        if($image_name != "")
        {
            // IT has image and need to remove from folder
            //Get the Image Path
            $path = "../images/food/".$image_name;

            //REmove Image File from Folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to Remove image
                echo "<script>
                    alert('Failed to Remove Image File');
                    window.location.href='".SITEURL."admin/manage-food.php';
                </script>";
                //Stop the Process of Deleting Food
                die();
            }

        }

        //3. Delete Food from Database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($db, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res==true)
        {
            //Food Deleted
            echo "<script>
                    alert('Food Deleted Successfully.');
                    window.location.href='".SITEURL."admin/manage-profile.php';
                </script>";
        }
        else
        {
            //Failed to Delete Food
            echo "<script>
                    alert('Failed to Delete Food.');
                    window.location.href='".SITEURL."admin/manage-profile.php';
                </script>";
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        echo "<script>
                    alert('Unauthorized Access');
                    window.location.href='".SITEURL."admin/manage-food.php';
                </script>";
    }

?>