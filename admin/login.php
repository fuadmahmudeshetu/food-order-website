<?php include('../config/constants.php') ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f7fb;
        }

        .login-container {
            background: #fff;
            width: 380px;
            padding: 45px 35px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            text-align: center;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .login-container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fafafa;
            font-size: 15px;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #1da1f2;
            background: #fff;
            box-shadow: 0 0 8px rgba(29, 161, 242, 0.15);
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 12px;
            color: #aaa;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #1da1f2, #0077b6);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 6px 15px rgba(29, 161, 242, 0.25);
        }

        .submit-button:hover {
            background: linear-gradient(135deg, #0077b6, #1da1f2);
            transform: translateY(-2px);
        }

        .login-footer {
            margin-top: 25px;
            font-size: 14px;
            color: #666;
        }

        .login-footer a {
            color: #1da1f2;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Logo Circle */
        .logo {
            background: linear-gradient(135deg, #1da1f2, #0077b6);
            color: #fff;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 6px 15px rgba(29, 161, 242, 0.3);
        }

        @media (max-width: 420px) {
            .login-container {
                width: 90%;
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="logo">Zeila</div>
        <h2>Welcome Back</h2>
        <p>Login to continue to your dashboard</p>

        <?php

            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                ob_end_flush();
            }

            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>

        <form action="" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username">
                <i>👤</i>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password">
                <i>🔒</i>
            </div>
            <input class="submit-button" type="submit" name="submit" value="Login">
        </form>

        <div class="login-footer">
            <p>Don’t have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>

</body>

</html>

<?php
// Check Whether the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Process for login
    // Get the data from login form

    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $row_password = md5($_POST['password']);

    $password = mysqli_real_escape_string($conn, $row_password);

    // Sql to check the user with username and password exists or not


    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    // Check whether the user is exist in the database or not
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // User available and login success
        $_SESSION['login'] = "<p style='color: green; background-color: #e6ffe6; border: 1px solid #00b300; padding: 10px; border-radius: 5px; font-weight: bold; width: fit-content;'>
                              ✅ Login Successful! Welcome back.
                             </p>";
        $_SESSION['user'] = $username;
        // Redirect to home page dashboard
        header('location:' . SITEURL . 'admin/');
    } else {

        // Incorrect password or username
        $_SESSION['login'] = "<p style='color: red; background-color: #ffe6e6; border: 1px solid #ff4d4d; padding: 10px; border-radius: 5px; font-weight: bold; width: fit-content;'>
                    ❌ Login Unsuccessful! Please check your username and password.
                </p>";
        // Redirect to login page
        header('location:' . SITEURL . 'admin/login.php');
    }
} else {
}

?>