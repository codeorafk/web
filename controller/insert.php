<?php 
    include('../config/constants.php');
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['name']);
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);

    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $image_name = $_FILES['image']['name'];

        $ext = end(explode('.', $_FILES['image']['tmp_name']));

        //Rename the Image
        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
        

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../public/images/category/".$image_name;

        //Finally Upload the Image
        $upload = move_uploaded_file($source_path, $destination_path);
    }
    else
        $image_name = "Food_Category_77.jpg";
    //Execute the Query
    $res2 = mysqli_query($conn, "INSERT INTO tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active', id = '$id'");
    if($res2==true)
    {
        //Category Updated
        echo "Category insert Successfully" ;
    }
    else
    {
        //failed to update category
        echo "Failed to insert Category" ;
    }
?>

