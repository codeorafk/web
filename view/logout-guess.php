<?php 
    //Include constants.php for SITEURL
    include('../config/constants.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']
    unset($_SESSION['guess']);
    //2. REdirect to Login Page
    header('location:'.view);
?>