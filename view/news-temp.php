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
    <style src = "../public/css/news-temp.css"></style></style>
</head>

<body>
<div class="container-fluid">
    <div class="row wrapper-row pd-page">
        <nav id="sidebar" class="col-3 side-bar">

        </nav>
        <div class="col-8">



<?php

echo <<<_END

wrwer.
test
<br>
<br>
<br>
_END;

echo '<div><h1>' . $news['title'] . '</h1></div><div class="text-center"><img src="' . Ppath . 'images/news/' . $news['image_name'] . '"></div><div>' . $news['description'] . '</div>';

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
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Marry Andrews</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                        <div class="bg-white">
                            <div class="d-flex flex-row fs-12">
                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                            </div>
                        </div>
                        <div class="bg-light p-2">
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                        </div>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
</body>

</html>
<?php include('partials-front/footer.php'); ?>