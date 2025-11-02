<?php
    // Include constant.php
    include('../config/constants.php');


    // Get the id of the admin 
    echo $id = $_GET['id'];

    // Create sql query to delete the admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute query
    $result = mysqli_query($conn, $sql);

    // Redirect to manage-admin page with message success
    if ($result==True) {
        // Query Executed Successfully and Admin Deleted
        // Show message admin deleted success

    $_SESSION['delete']= "Deleted Success";
    header('location:' . SITEURL . 'admin/manage-admin.php');
    }
    else {

        $_SESSION['delete'] = "Field to delete the admin, please try again";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>