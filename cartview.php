<?php include('partials-front/menu.php'); ?>

	<section class="food-search2">
		<div class="container">
        <h2 class="text-center text-white">Cart 🛒</h2>
        <?php
      
    // Get the customer's first and last name from tbl_cust
    $username = $_SESSION['username'];
    $sql_cust = "SELECT cust_fname, cust_lname FROM tbl_cust WHERE cust_uname = '$username'";
    $result_cust = mysqli_query($db, $sql_cust);
    $row_cust = mysqli_fetch_assoc($result_cust);
    $fname = $row_cust['cust_fname'];
    $lname = $row_cust['cust_lname'];

    // Get the cart items for the logged-in user with matching first and last name
    $user = $_SESSION['id'];
    $sql_cart = "SELECT * FROM tbl_cart WHERE  cart_custfname = '$fname' AND cart_custlname = '$lname'";
    $result_cart = mysqli_query($db, $sql_cart);

    if(isset($_POST['update'])) {
        $cart_id = $_POST['cart_id'];
        $new_quantity = $_POST['new_quantity'];

        //Update Quantity and Total Price
        $update_query = "UPDATE tbl_cart SET cart_qty = '$new_quantity', cart_total = '$new_quantity' * cart_price WHERE cart_id = '$cart_id'";
        mysqli_query($db, $update_query);
        
    }

    // Display the cart items or "Cart is Empty"
    if (mysqli_num_rows($result_cart) > 0) {
        // Table header
        echo "<table class='text-center text-white cartview-table'><tr><th class='cartview-th'>Food</th><th class='cartview-th'>Price</th><th class='cartview-th'>Quantity</th><th class='cartview-th'>Total</th><th class='cartview-th'>Action</th></tr>";
        // Table data
        while($row = mysqli_fetch_assoc($result_cart)) {
            echo "<tr><td class='cartview-td'>" . $row["cart_food"] . "</td><td class='cartview-td'>" . "₱" . $row["cart_price"] . "</td><td class='cartview-td'><form method='post'><input type='hidden' name='cart_id' value='" . $row["cart_id"] . "'><input type='number' min='1' name='new_quantity' value='" . $row["cart_qty"] . "' style='width: 50px'><button type='submit' name='update' class='btn btn-primary'>Update</button></form></td><td class='cartview-td'>" . "₱" .  $row["cart_total"] . "</td><td class='cartview-td'><form method='post'><input type='hidden' name='cart_id' value='" . $row["cart_id"] . "'><button type='submit' name='delete' class='btn btn-danger mr-1'>Delete</button></form></td></tr>";
        }
        
        // Table footer
        echo "</table>";
    }
    else {
        echo '<h2 class="text-center text-white">Cart is Empty</h2>';
    }
    if(isset($_POST['delete'])) {
        $cart_id = $_POST['cart_id'];
        $delete_query = "DELETE FROM tbl_cart WHERE cart_id = $cart_id";
        mysqli_query($db, $delete_query);
    }
    
?>
    <br><br><br>
    <div class="text-center">
            <form method="post">
                <button type="submit" name="checkout" class="btn btn-success btn-lg">Checkout</button>
            </form>
    </div>



		</div>
	</section>

<?php
if (isset($_POST['checkout'])) {
    // Check if there are any items in the cart
    $select_cart_query = "SELECT * FROM tbl_cart WHERE cart_custfname = '$fname' AND cart_custlname = '$lname'";
    $result_cart = mysqli_query($db, $select_cart_query);
    if (mysqli_num_rows($result_cart) == 0) {
        echo "<script>alert('Your Cart is EMPTY.\\n\\n Please add items to your cart before checking out.');</script>";
    } else {
        if (checkoutCart($db, $fname, $lname)) {
            echo "<script>alert('Food Ordered Successfully.'); window.location.href='".SITEURL."orderview.php'</script>";
        } else {
            echo "<script>alert('Order Failed to Checkout.'); window.location.href='".SITEURL."orderview.php'</script>";
        }
    }
}


    

    function checkoutCart($db, $fname, $lname) {
    
        // Select the cart items for the current customer
        $select_cart_query = "SELECT * FROM tbl_cart WHERE cart_custfname = '$fname' AND cart_custlname = '$lname'";
        $result_cart = mysqli_query($db, $select_cart_query);
        
        // Insert each cart item into the order_items table
        while ($row = mysqli_fetch_assoc($result_cart)) {
          $food = $row["cart_food"];
          $price = $row["cart_price"];
          $qty = $row["cart_qty"];
          $total = $row["cart_total"];
          $order_date = date('Y-m-d h:i:s A', strtotime('now'));
          $order_status = "Ordered";
          $contact = $row["cart_contact"];
          $email = $row["cart_email"];
          $address = $row["cart_address"];
          $insert_order_query = "INSERT INTO tbl_order (order_id, order_food, order_price, order_qty, order_total, order_date, order_status, order_custfname, order_custlname, customer_contact, customer_email, customer_address) VALUES ('', '$food', '$price', '$qty', '$total','$order_date','$order_status','$fname','$lname','$contact','$email','$address')";
          $checkout = mysqli_query($db, $insert_order_query);
        }
        
        // Delete the cart items for the current customer
        $delete_cart_query = "DELETE FROM tbl_cart WHERE cart_custfname = '$fname' AND cart_custlname = '$lname'";
        mysqli_query($db, $delete_cart_query);

        return true;
    }
    
  
?>

<?php include('partials-front/footer.php'); ?>

