<?php include('partials-front/menu.php'); ?>

	<section class="food-search2">
		<div class="container">
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

    // Display the cart items or "Cart is Empty"

    if(isset($_POST['update'])) {
        $cart_id = $_POST['cart_id'];
        $new_quantity = $_POST['new_quantity'];

        // Update the cart item quantity in the database
        $update_query = "UPDATE tbl_cart SET cart_qty = '$new_quantity' WHERE cart_id = '$cart_id'";
        mysqli_query($db, $update_query);
    }
    if (mysqli_num_rows($result_cart) > 0) {
        // Table header
        echo "<table class='text-center text-white cartview-table'><tr><th class='cartview-th'>Food</th><th class='cartview-th'>Price</th><th class='cartview-th'>Quantity</th><th class='cartview-th'>Total</th><th class='cartview-th'>Customer First Name</th><th class='cartview-th'>Customer Last Name</th><th class='cartview-th'>Contact</th><th class='cartview-th'>Email</th><th class='cartview-th'>Address</th><th class='cartview-th'>Action</th></tr>";
        // Table data
        while($row = mysqli_fetch_assoc($result_cart)) {
            echo "<tr><td class='cartview-td'>" . $row["cart_food"] . "</td><td class='cartview-td'>" . $row["cart_price"] . "</td><td class='cartview-td'><form method='post'><input type='hidden' name='cart_id' value='" . $row["cart_id"] . "'><input type='number' min='1' name='new_quantity' value='" . $row["cart_qty"] . "'><button type='submit' name='update' class='btn btn-primary'>Update</button></form></td><td class='cartview-td'>" . $row["cart_total"] . "</td><td class='cartview-td'>" . $row["cart_custfname"] . "</td><td class='cartview-td'>" . $row["cart_custlname"] . "</td><td class='cartview-td'>" . $row["cart_contact"] . "</td><td class='cartview-td'>" . $row["cart_email"] . "</td><td class='cartview-td'>" . $row["cart_address"] . "</td><td class='cartview-td'><form method='post'><input type='hidden' name='cart_id' value='" . $row["cart_id"] . "'><button type='submit' name='delete' class='btn btn-danger mr-1'>Delete</button></form></td></tr>";
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
    


		</div>
	</section>


<?php include('partials-front/footer.php'); ?>