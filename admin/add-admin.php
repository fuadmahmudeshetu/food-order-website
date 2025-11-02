<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

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
            <input type="text" id="full-name" name="full_name" placeholder="Enter full name" style="    width: 100%;
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
                type="text" id="username" name="username" placeholder="Enter username">

            <label style="display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;" for="password">Password</label>
            <input style="    width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s;"
                type="password" id="password" name="password" placeholder="Enter password">

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
            type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
// 1. Process the value from and save it the data to the database


// 1. Get the data from the form
    

// 2. SQL query to save the data into database

    if (isset($_POST['submit'])) {

        $name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET 
        full_name = '$name', 
        username = '$username', 
        password = '$password'";

        $res = mysqli_query($conn, $sql);

        if ($res==True) {
            // Display Message for added success
            // echo 'Data Inserted Successfully';
            // Create Session Variable To Display Message
            $_SESSION['add'] = "Admin added successfully";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else {
            $_SESSION['add'] = "Failed to add admin";
            header('location:' . SITEURL . 'admin/add-admin.php');
        }

    }

?>