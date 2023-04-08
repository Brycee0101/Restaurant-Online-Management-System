<?php
    include('partials/menu.php'); 
    define('SITEURL', 'http://localhost/NishiMaru/');
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM tbl_admin WHERE id = $id";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($res)
?>
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1><?php echo $row["full_name"]?> Profile</h1>
                <br><br><br>
        
                <div class="card">
                    <h1><?php echo $row['username']; ?></h1><br>
                    <h5 class="title">System Administrator</h5>
                    <h5>Nishi Maru Bento</h5><br>
                    <p> 
                        <button class="btn-secondary" onclick="window.location.href='<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>'">Update</button>
                        <button class="btn-primary" onclick="window.location.href='<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>'">Change Password</button>
                    </p> 
                </div>
                <!-- Button to Delete Account -->
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Account</a>
                <br><br><br>
            </div>
        </div>
    <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>

<!-- Indipendent CSS -->
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}
.card p {
  display: flex;
  flex-wrap: wrap;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  font-size: 18px;
  width: 48%; /* make each button take up 48% of the available width */
  margin: 0 2% 2% 0; /* add some margin between the buttons and to the bottom */
}

button:last-child {
  margin-right: 0; /* remove right margin from last button */
}


a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>