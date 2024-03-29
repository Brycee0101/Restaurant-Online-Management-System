<?php include('partials-front/menu.php'); ?>

	<section class="food-search2">
		<div class="container">
        <h2 class="text-center text-white">Recent Orders🍣</h2>
        <?php

    // Get the customer's first and last name from tbl_cust
    $username = $_SESSION['username'];
    $sql_cust = "SELECT cust_fname, cust_lname FROM tbl_cust WHERE cust_uname = '$username'";
    $result_cust = mysqli_query($db, $sql_cust);
    $row_cust = mysqli_fetch_assoc($result_cust);
    $fname = $row_cust['cust_fname'];
    $lname = $row_cust['cust_lname'];

    // Get the order items for the logged-in user with matching first and last name
    $user = $_SESSION['id'];
    $sql_order = "SELECT * FROM tbl_order WHERE  order_custfname = '$fname' AND order_custlname = '$lname'ORDER BY order_date DESC" ;
    $result_order = mysqli_query($db, $sql_order);
    
    // Display the cart items or "No Recent Orders"
    if (mysqli_num_rows($result_order) > 0) {
        // Table header
        echo "<table class='text-center text-white cartview-table'><tr><th class='cartview-th'>Food</th><th class='cartview-th'>Price</th><th class='cartview-th'>Quantity</th><th class='cartview-th'>Total</th><th class='cartview-th'>Date</th><th class='cartview-th'>Status</th><th class='cartview-th'>Customer Name</th><th class='cartview-th'>Contact</th><th class='cartview-th'>Email</th><th class='cartview-th'>Address</th><th class='cartview-th'>Actions</th></tr>";
        // Table data
        while($row = mysqli_fetch_assoc($result_order)) {
            // Cancel button
            $cancel_button = "";
            if($row["order_status"] == "Ordered" || $row["order_status"] == "Pending") {
                $cancel_button = "<button class='btn btn-danger mr-1' data-order-id='" . $row["order_id"] . "'>Cancel</button>";
            }
            // Table row
            echo "<tr><td class='cartview-td'>" . $row["order_food"] . "</td><td class='cartview-td'>" . "₱" .  $row["order_price"] . "</td><td class='cartview-td'>" . $row["order_qty"] . "</td><td class='cartview-td'>" . "₱" .  $row["order_total"] . "</td><td class='cartview-td'>" . $row["order_date"] . "</td><td class='cartview-td'>" . $row["order_status"] . "</td><td class='cartview-td'>" . $row["order_custfname"] ." ". $row["order_custlname"]. "</td><td class='cartview-td'>" . $row["customer_contact"] . "</td><td class='cartview-td'>" . $row["customer_email"] . "</td><td class='cartview-td'>" . $row["customer_address"] . "</td><td class='cartview-td'>" . $cancel_button . "</td></tr>";
        }        
        // Table footer
        echo "</table>";
    }
    else {
        echo '<h2 class="text-center text-white">No Recent Orders</h2>';
    }
    
    // Cancel button click event
    echo "<script>
            var cancelButtons = document.getElementsByClassName('btn btn-danger mr-1');
            for (var i = 0; i < cancelButtons.length; i++) {
                cancelButtons[i].addEventListener('click', function() {
                    var orderId = this.getAttribute('data-order-id');
                    var orderStatus = this.parentNode.parentNode.childNodes[5].innerHTML;
                    if(orderStatus != 'Ordered' && orderStatus != 'Pending') {
                        alert('Cancel button is only available for Ordered or Pending orders.');
                        return false;
                    }
                    if(confirm('Are you sure you want to cancel this order?')) {
                        window.location.href = 'cancel.php?id=' + orderId;
                    }
                });
            }
          </script>";
    
    
?>
    


		</div>
	</section>


<?php include('partials-front/footer.php'); ?>