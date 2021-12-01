<?php include('partials-front/menu.php');

$id = mysqli_real_escape_string($conn, $_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM tbl_news WHERE id = '$id'");
$news = mysqli_fetch_assoc($res);

if (isset($_SESSION['guess'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['guess']);
    $shit = mysqli_query($conn, "SELECT * FROM tbl_guess WHERE username ='$username'");
    $guess = mysqli_fetch_assoc($shit);
}
if (isset($_POST['commentBtn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    if (isset($_SESSION['guess'])) {
        $guess_id = $guess['id'];
        $shit = mysqli_query($conn, "INSERT INTO tbl_comment SET full_name='$full_name', email='$email', guess_id='$guess_id', news_id='$id', comment='$comment'");
    } else {
        $shit = mysqli_query($conn, "INSERT INTO tbl_comment SET full_name='$full_name', email='$email', news_id='$id', comment='$comment'");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style src="../public/css/news-temp.css"></style>
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row wrapper-row pd-page" style = "padding: 0px 90px 90px 90px;">
            <div class="col-12 ">
                <div class="box-article-heading clearfix">
                    <?php
                    echo '<div class="">
                    <img src="' . Ppath . 'images/news/' . $news['image_name'] . '"  style = "width: 100%" ;>
                    </div>';

                    ?>
                    <h1 class="sb-title-article">
                        <?php
                        echo $news['title']
                        ?>
                    </h1>

                    <?php 
                        echo '<div>' . $news['description'] . '</div>';
                        $res1 = mysqli_query($conn, "SELECT * FROM section where news_id = '$id'");
                        while($row1=mysqli_fetch_assoc($res1)){
                            if($row1['title'] != "") echo '<hr><p><span style="font-size:20px"><strong>'.$row1['title'].'</strong></span></p>';
                            echo '<p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">'.$row1['description'].'</span></p><div class="row d-flex justify-content-center">';
                            $section_id = $row1['id'];
                            $resImg = mysqli_query($conn, "SELECT * FROM image_news where section_id = '$section_id'");
                            while($row2=mysqli_fetch_assoc($resImg)){
                                echo '<p style="text-align: center; margin: 20px"><img src="'.Ppath."images/news/".$row2['image_name'].'" style="max-width: 600px; max-height: 600px"></p>';
                            }
                            echo '</div>';
                            if(isset($_SESSION['user'])){
                                echo '<div class="admin-area">';
                                echo '<form class="form-add-image" action="'.controller.'add-image-section.php" method="POST" enctype="multipart/form-data"><input type="hidden" name="news-id" value="'.$id.'"><input type="hidden" name="id" value="'.$row1['id'].'"><label for="image'.$row1['id'].'">Choose Image</label><input id="image'.$row1['id'].'" type="file" name="image" hidden><button class="btn-add-image btn btn-outline-danger"> add Image </button></form>';
                                echo '<form class="form-add-image" action="'.controller.'del-section.php" method="POST"><input type="hidden" name="news-id" value="'.$id.'"><input type="hidden" name="id" value="'.$row1['id'].'"><button class="btn-del-section btn btn-outline-danger"> Remove section </button></form></form>';
                                echo '</div>';
                            }
                        }
                        echo '<hr><button class="btn-add-section btn btn-outline-info"> add section </button>';
                        echo '<form class="form-add-section d-none" action="'.controller.'add-section.php" method="POST"><input type="hidden" name="id" value="'.$id.'"><div> title <input type="text" name="title"></div><div> description<textarea name="description"></textarea></div><button class="btn-add-image btn btn-outline-danger"> add section </button></form></div>'
                    ?>
                    
                <?php 
             $res = mysqli_query($conn, "SELECT * FROM tbl_comment where news_id = '$id'");
             echo "<hr> <div class='comment-area'>";
             while($row=mysqli_fetch_assoc($res)){
            ?>                                                                                                                                  
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $row['full_name'] ?></span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text"><?php echo $row['comment'] ?></p>
                            </div>
                        </div>
                    </div>
            <?php 

             }
             echo "</div>";
            ?>
                <br /><br />
                <div role="tabpanel" class="article-comment">
                    <div class="title-bl">
                        <h2>
                            <a data-spy="scroll" aria-controls="comment" role="tab">Viết bình luận</a>
                        </h2>
                    </div>
                    <div id="comment">
                        <div id="comments" class="comments ">
                            <div class="comment_form">
                                <form accept-charset='UTF-8' action='' class='comment-form' id='article--comment-form' method='post'>
                                    <input name='form_type' type='hidden' value='new_comment'>
                                    <input name='utf8' type='hidden' value='✓'>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input required type="text" id="comment_author" name="full_name" size="40" class="text form-control" placeholder="Tên của bạn " value="<?php if (isset($_SESSION['guess'])) {
                                                                                                                                                                                            echo $guess['full_name'];
                                                                                                                                                                                        } ?>" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input required type="text" id="comment_email" name="email" size="40" class="text form-control" placeholder="Email của bạn" value="<?php if (isset($_SESSION['guess'])) {
                                                                                                                                                                                        echo $guess['email'];
                                                                                                                                                                                    } ?>" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="comment_body" name="comment" cols="40" rows="5" class="text form-control" placeholder="Viết bình luận ..." required="required"></textarea>
                                    </div>
                                    <button name="commentBtn" type="submit" class="readmore btn-rb clear-fix btn btn-outline-info" id="comment-submit">Gửi bài viết</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="d-flex justify-content-center row"> -->
                <!-- <div class="col-md-8"> -->
                <!-- comment here -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</body>
<script src="<?php echo Ppath; ?>js/article.js"> </script>
</html>
<?php include('partials-front/footer.php'); ?>