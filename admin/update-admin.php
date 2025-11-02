<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>


        <?php
        
        // Get the id of the selected admin
            $id = $_GET['id'];
        // Create Sql query to get the detail
        $sql = "SELECT * FROM tbl_admin WHERE id = $id";

        //Execute the query
        $result = mysqli_query($conn, $sql);

        // Check whether the query is executed or not
        if ($result==true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($result);
            // echo "<br><br>";
            if($count==1){
                // echo "Admin available";
                $row = mysqli_fetch_assoc($result);

                $full_name = $row['full_name'];
                $username = $row['username'];

            }
            else {
                // Redirect to the manage admin page 
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        
        
        
        
        ?>

        <form action="" method="POST" style="
            width: 400px;
            margin: 20px auto;
            padding: 25px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;">

            <label for="full-name">Full Name</label style="
                display: block;
                margin-bottom: 6px;
                font-weight: bold;
                color: #555;
            ">
            <input type="text" id="full-name" name="full_name" placeholder="Enter full name" value="<?php echo $full_name; ?>" style="    width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s;">

            <label for="username">Username</label style="display: block;
                margin-bottom: 6px;
                font-weight: bold;
                color: #555;">
            <input style="    width: 100%;
                padding: 10px 12px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 14px;
                transition: border 0.3s;"
                type="text" id="username" value="<?php echo $username; ?>" name="username" placeholder="Enter username">

                <input type="hidden" value="<?php echo $id; ?>" name="id">

            <input style="    width: 100%;
            padding: 12px;
            background-color: #1da1f2;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);"
                type="submit" name="update" value="Update">
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    // Whether the submit button is clicked or not

    if (isset($_POST['update'])) {
        // echo "Update button is clicked";
        // Get the value from the form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Create Sql Query 
        $sql = "UPDATE tbl_admin SET full_name = '$full_name', username = '$username' WHERE id = $id";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        if ($result == true) {
            // Query executed and updated
            $_SESSION['update'] = "<h1 style='color: green;'>Admin updated successfully</h1>";

            // Redirect to the manage admin page 
            header('location:'.SITEURL.'admin/manage-admin.php');

        }
        else {
            $_SESSION['update'] = "Failed to update admin";

            // Redirect to the manage admin page 
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }

?>
