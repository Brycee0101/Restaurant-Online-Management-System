
<?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id'])){
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($db, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
                if($count==1){
                    //WE Have DAta
                    //GEt the Data from Database
                    $row = mysqli_fetch_assoc($res);

                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                }
                else{
                    //Food not Availabe
                    //REdirect to Home Page
                    header('location:'.SITEURL);
                }
        }
        else{
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Add to Cart</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name==""){
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else{
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <input type="submit" name="submit" value="Add to Cart" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                // Check whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; // total = price x qty 
                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    // Retrieve customer details from the database based on the logged-in user's session ID or username
                    $cust_id = $_SESSION['id']; // use session ID to retrieve the customer ID
                    $cust_query = "SELECT * FROM tbl_cust WHERE cust_id = $cust_id"; // query to retrieve customer details
                    $cust_result = mysqli_query($db, $cust_query);
                    $cust_row = mysqli_fetch_assoc($cust_result);

                    $cust_fname = $cust_row['cust_fname']; 
                    $cust_lname = $cust_row['cust_lname'];
                    $cust_phone = $cust_row['cust_phone'];
                    $cust_email = $cust_row['cust_email'];
                    $cust_address = $cust_row['cust_street'] . ', ' . $cust_row['cust_brgy'] . ', ' . $cust_row['cust_city'] . ' ' . $cust_row['cust_zip'];

                    // Save the Order in Database
                    // Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_cart VALUES('', '$food', '$price', '$qty', '$total', '$cust_fname','$cust_lname', '$cust_phone', '$cust_email', '$cust_address')";

                    // Execute the Query
                    $res2 = mysqli_query($db, $sql2);

                    // Check whether query executed successfully or not
                    if($res2==true)
                    {
                        // Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Added to Cart.</div>";
                        echo "<script>window.location.href='".SITEURL."index.php'</script>";
                    }
                    else
                    {
                        // Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Add Food to Cart.</div>";
                        echo "<script>window.location.href='".SITEURL."index.php'</script>";
                    }

                }

                ?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>