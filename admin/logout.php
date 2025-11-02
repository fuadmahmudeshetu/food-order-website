<?php
// Include constants.php to use site url
include('../config/constants.php');

// Destroy Session

session_destroy();

// Redirect to login page
header('location:'.SITEURL.'admin/login.php');

?>