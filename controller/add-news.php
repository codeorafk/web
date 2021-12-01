<?php
    include('../config/constants.php');
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $image_name = $_FILES['image']['name'];
    
        $tmp = explode('.', $_FILES['image']['tmp_name']);
        $ext = end($tmp);
    
        //Rename the Image
        $image_name = "news_".rand(000, 999).'.'.$ext; 
        
    
        $source_path = $_FILES['image']['tmp_name'];
    
        $destination_path = "../public/images/news/".$image_name;
    
        //Finally Upload the Image
        $upload = move_uploaded_file($source_path, $destination_path);
        $id = $_POST['id'];
        $news_id = $_POST['news-id'];
        $res2 = mysqli_query($conn, "INSERT INTO tbl_news SET description = '$description', title='$title', image_name='$image_name', status='Active'");
        header('location:'.view.'admin/manage-news.php');
    }
    else
        echo "no image to add";
?>