<?php include('partials/menu.php'); 
define('SITEURL', 'http://localhost/NishiMaru/');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_order WHERE order_id=$id";
                //Execute Query
                $res = mysqli_query($db, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);

                    $food = $row['order_food'];
                    $price = $row['order_price'];
                    $qty = $row['order_qty'];
                    $status = $row['order_status'];
                    $customer_name = $row['order_custfname'] ." ". $row['order_custlname'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <?php echo $qty; ?>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" style="width: 100%">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <?php echo $customer_name; ?>
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <?php echo $customer_contact; ?>
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <?php echo $customer_email; ?>
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <?php echo $customer_address; ?>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form

                $status = $_POST['status'];

                //Update the Values
                $sql2 = "UPDATE tbl_order SET order_status = '$status'WHERE order_id=$id";

                //Execute the Query
                $res2 = mysqli_query($db, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    echo "<script>
                            alert('Order Updated Successfully.');
                            window.location.href='".SITEURL."admin/manage-order.php';
                        </script>";
                }
                else
                {
                    //Failed to Update
                    echo "<script>
                            alert('Failed to Update Order.');
                            window.location.href='".SITEURL."admin/manage-order.php';
                        </script>";
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>
