<?php
include('partials-front/menu.php');
// Get the order ID from the URL parameter
$order_id = $_GET['id'];

// Update the order status to "Cancelled" in the database
$sql = "UPDATE tbl_order SET order_status='Cancelled' WHERE order_id='$order_id'";
mysqli_query($db, $sql);
mysqli_close($db);

// Display the alert box
echo "<script>alert('Order has been successfully cancelled.');</script>";

// Redirect back to the order view page
echo "<meta http-equiv='refresh' content='0;URL=\"orderview.php\"'>";
exit();
?>
