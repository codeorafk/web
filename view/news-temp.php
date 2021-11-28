<?php include('partials-front/menu.php'); 

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM tbl_news WHERE id = '$id'");
    $news = mysqli_fetch_assoc($res);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
<?php 
echo '<div><h1>'.$news['title'].'</h1></div><div class="text-center"><img src="'.Ppath.'images/news/'.$news['image_name'].'"></div><div>'.$news['description'].'</div>';

?>
<div id ="title"></div>
<div id ="text"></div>
</div>
<?php include('partials-front/footer.php'); ?>