<?php 

    include('../config/constants.php');

    // get the id of the deleted category
    echo $id = $_GET['id'];

    // Create sql to delete the category

    $sql = "DELETE FROM tbl_category WHERE id = $id";

    //Execute the query
    $result = mysqli_query($conn , $sql);

    //Redirect to manage-category page with the success message

    if ($result == true) {
        $_SESSION['delete-category']="Deleted Success";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else {
        $_SESSION['delete-category'] = "Field to delete the category, please try again";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }

?>