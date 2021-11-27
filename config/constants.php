<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/code_xin/food-order-website-php-main/');
    define('view','http://localhost/code_xin/food-order-website-php-main/view/');
    define('Ppath','http://localhost/code_xin/food-order-website-php-main/public/');
    define('controller','http://localhost/code_xin/food-order-website-php-main/controller/');

    define('LOCALHOST', 'localhost:8111');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'restaurant');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error()); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>