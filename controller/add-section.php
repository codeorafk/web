<?php
    include('../config/constants.php');
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id = $_POST['id'];
    if(empty($title)) { 
        mysqli_query($conn, "INSERT INTO section SET description = '$description', news_id = '$id'");
    }
    else {
        mysqli_query($conn, "INSERT INTO section SET title = '$title', description = '$description', news_id = '$id'");
    }
    header('location:'.view.'news-temp.php?id='.$id);
?>