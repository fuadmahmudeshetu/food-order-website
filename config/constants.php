<?php
// Start Session
session_start();

// Create constants to store non repeating values
define('SITEURL', 'http://localhost/food_order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

// 3. Execute query and save data to the database
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

?>