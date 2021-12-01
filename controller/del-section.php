<?php
    include('../config/constants.php');
    $news_id = $_POST['news-id'];
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM section WHERE id = '$id'");
    mysqli_query($conn, "DELETE FROM image_news WHERE section_id = '$id'");
    header('location:'.view.'news-temp.php?id='.$news_id);
?>