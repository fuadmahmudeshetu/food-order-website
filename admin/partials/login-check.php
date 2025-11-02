<?php
    //Authorization Access-Control
    //Check whether the user is logged in or not

    if (!isset($_SESSION['user'])) // If user session is not set
        {
    // User is not logged in
    // Redirect to login page

        $_SESSION['no-login-message'] = "
        <div style='
        text-align: center;
        color: red;
        background-color: #ffe6e6;
        border: 1px solid #ff4d4d;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        width: fit-content;
        margin: 10px auto;          /* Centers the message horizontally */
        display: block;
    '>
        Please login to access admin channel
    </div>";


    // Redirect to login page
    header('location:'.SITEURL.'admin/login.php');

    }
?>