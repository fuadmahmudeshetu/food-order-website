<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <form action="" method="POST" style="
            width: 400px;
            margin: 20px auto;
            padding: 25px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;">

            <label for="full-name">Current Password</label style="
                display: block;
                margin-bottom: 6px;
                font-weight: bold;
                color: #555;
            ">
            <input type="password" id="full-name" name="current_password" placeholder="Old Password" value="" style="    width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s;">

            <label for="new_password">New Password</label style="display: block;
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
                type="password" id="new_password" value="" name="new_password" placeholder="Enter New Password">

            <label for="confirm_password">Confirm Password</label style="display: block;
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
                type="password" id="confirm_password" value="" name="confirm_password" placeholder="Confirm Password">

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
                type="submit" name="change_password" value="Change Password">
        </form>
    </div>
</div>


<?php

//Check whether the submit button is clicked or not

if (isset($_POST['change_password'])) {
    $id = $_GET['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // REMOVE md5() if passwords in DB are plain text
    // ADD md5() if passwords in DB are stored as MD5 hashes
    $oldPassword = md5($current_password); // or just $current_password if plain text
    $newPassword = md5($new_password);
    $confirmPassword = md5($confirm_password);
    // echo "ID = $id<br>";
    // echo "Entered Password = $current_password<br>";
    // echo "Hashed Password = $oldPassword<br>";


    $sql = "SELECT * FROM tbl_admin WHERE id = '$id' AND password = '$oldPassword'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $count = mysqli_num_rows($result);

        if ($count == 1) {

            if ($newPassword == $confirmPassword) {
                // Update password

                $sql = "UPDATE tbl_admin SET password='$newPassword' WHERE id='$id'";

                $result = mysqli_query($conn, $sql);

            }
            else {
                // The new password and the confirm password does not match
                echo "<p style='color:red;'>❌ Password Does Not Match</p>";
            }

            // Show success message and redirect to the manage admin page
            $_SESSION['password-changed'] = "<p style='color:green; margin: 10px;'>✅ Password Changed Successfully";
            header('location:'.SITEURL.'admin/manage-admin.php');


            // echo "<p style='color:green;'>✅ User Found</p>";
        } else {
            echo "<p style='color:red;'>❌ User Not Found</p>";
        }
    } else {
        echo "SQL Error: " . mysqli_error($conn);
    }
}


?>



<?php include('partials/footer.php'); ?>