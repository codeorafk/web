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
                <!-- <div class="content-page"> -->
                <div class="box-article-heading clearfix">
                    <!-- <div class="background-img">
                        <img src="//file.hstatic.net/200000033444/article/0328_harry-styles-flaunts-tattooed-chest-in-chic-mesh-coat-as-1024x538_d4606dfa481941aebe7f88ab692cc484_1024x1024.jpg" alt="HARRY STYLES GÃ TRAI NGHIỆN BOOTS CHÍNH HIỆU">
                    </div> -->
                    <?php
                    // echo <<<_fst
                    // <img src="' . Ppath . 'images/news/' . $news['image_name']'">
                    // _fst
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
                            echo '<p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">'.$row1['description'].'</span></p>';
                            $section_id = $row1['id'];
                            $resImg = mysqli_query($conn, "SELECT * FROM image_news where section_id = '$section_id'");
                            while($row2=mysqli_fetch_assoc($resImg)){
                                echo '<p style="text-align: center"><img src="'.Ppath."images/news/".$row2['image_name'].'"></p>';
                            }
                    ?>

                    <?php } ?>
                    <!-- <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">Harry Styles, cái tên mà chắc chắn ai ai cũng đã ít nhất được nghe một hoặc nhiều lần về nó. Dành cho những bạn chưa biết thì Harry Styles chính là thành viên của nhóm nhạc Pop đình đám One Direction đến từ xứ sở sương mù (Anh Quốc). Anh cũng là một trong những thành viên có sự nổi bật nhất trong nhóm bên cạnh đó là người đồng đội Zayn Malik. Sỡ hữu cho mình vẻ ngoài điển trai và giọng hát trầm ấm, Harry đã rất được lòng nhiều fan hâm mộ đặc biệt là các fan nữ và sự ưu ái đó luôn được thể hiện trong mỗi khi anh xuất hiện ở một sự kiện nào đó thì ngay lập tức tiếng kêu gào của các fan nữ như vang nứt trời. Ngoài sự điển trai và giọng hát thiên bẩm, Harry còn là một người rất có gu ăn mặc và được tai mắt của nhiều “fashion cults” để ý đến. Trong bài viết này Team Thewolf sẽ “mổ sẻ” một chút về thời trang boots của Harry Styles nhé. </span></p>
                    <p style="text-align: center"><img style="width: 571px; height: 428px;" src="//file.hstatic.net/200000033444/file/hinh_1_8c259f4b1c8a4f8a8fa1034e47eeb0b5_grande.jpg"></p>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">Trước đây, Thewolf cũng đã có bài viết về Zayn Malik. Hoàn toàn trái ngược với Zayn, hình ảnh của một quý ông lịch lãm nhã nhặn và có đôi chút sự già dặn thì Harry lại chọn cho bản thân một phong cách trẻ trung và phong trần hơn hẵn. Như tiêu đề của bài viết, Harry lại là một gã nghiện boots chính hiệu và bằng chứng cho điều này được thể hiện rất rõ qua ống kính của các paparazi, hầu như Harry luôn mang boots cho mọi hoàn cảnh. Từ những đôi Chelsea boots, Harness boots, zip boots, Jodpur Boots… bất kì hoàn cảnh nào Harry vẫn luôn chọn chúng cho đôi chân của mình. </span></p>
                    <hr>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">CHELSEA BOOT</strong></span></p>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">Với tư cách là một gã trai từ Anh Quốc, thì Chelsea boots luôn là một sự lựa chọn không thể nào bỏ qua được. Sỡ&nbsp;hữu tuổi đời kéo dài gần hai thế kỷ, những đôi Chelsea boots đã có sự vinh dự cực kỳ lớn khi được sánh bước cùng với các tầng lớp quý tộc Anh Quốc vào thế kỷ XIX. Để hưởng ứng cái di sản mà tổ tiên xa xưa để lại, Harry luôn chọn những đôi Chelsea boots mỗi khi xuất hiện trước công chúng. Từ những show diễn, sự kiện thảm đỏ hoặc chỉ đơn giản là những ngày xuống phố bình thường, chúng ta hoàn toàn có thể bắt gặp hình ảnh của Harry sánh bước cùng những đôi Chelsea boots. Đi kèm với Chelsea boots luôn là những chiếc quần Skinny Jeans, ở top thì áo và có thể khoác ngoài thêm một chiếc manto hay blazer để phù hợp với thời tiết nhưng vẫn đảm bảo được tính thẩm mỹ nhất định.</span></p>
                    <p style="text-align: center"><img style="width: 442px; height: 683px;" src="//file.hstatic.net/200000033444/file/hinh5_b79223357b4d42e1a0e61a1d95c927f2_grande.jpg"></p>
                    <p style="text-align: center"> </p>
                    <hr>
                    <p><span style="font-size:20px"><strong>HARNESS BOOT</strong></span></p>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">Nhắc đến Harry Styles thì không thể nào không nhắc đến những đôi Harness boots, đây có thể nói là “best choice” sánh bước cùng anh trong những show diễn và nhiều sự kiện khác. Không thể phủ nhận được hình ảnh của Harness boots trên đôi chân của Harry luôn tạo ra những hiệu ứng mạnh mẽ và đưa items này trở thành “must-have" items&nbsp;trong tủ đồ của mỗi người. Combo vs Harness luôn là những chiếc textured shirt với nhiều họa tiết bắt mắt và vẫn là quần jeans skinny fits như mọi khi. </span></p>
                    <p style="text-align: center"><img style="width: 460px; height: 691px;" src="//file.hstatic.net/200000033444/file/hinh6_3f6b9673e5d1410383a6d345f04bfe04_grande.jpg"></p>
                    <p style="text-align: center"><img style="width: 459px; height: 740px;" src="//file.hstatic.net/200000033444/file/hinh10_95fb1356826449efb18dc8bd9b6b9500_grande.jpg"></p>
                    <p style="text-align: center"> </p>
                    <hr>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:20px"><strong>HEELED ZIP BOOTS - JODPUR BOOTS</strong></span></p>
                    <p style="margin-bottom: 11px; text-align: justify;"><span style="font-size:14px">Cũng như những đôi Harness boots, nhưng đổi lại zip boots lại mang một phong thái đơn điệu hơn hẳn. Heeled zip boots luôn được Harry chọn cho những trang phục đơn giản hơn hoặc có thể là những bộ suit trang trọng cho các sự kiện thảm đỏ.</span></p>
                    <p style="margin-bottom: 11px; text-align: justify;"> </p> -->
                <?php 
             $res = mysqli_query($conn, "SELECT * FROM tbl_comment where news_id = '$id'");
             echo "<hr> <div class='comment-area'>";
             while($row=mysqli_fetch_assoc($res)){
            ?>                                                                                                                                                                       
            <!-- <div class="d-flex justify-content-center row"> -->
                <!-- <div class="col-md-8"> -->
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $row['full_name'] ?></span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text"><?php echo $row['comment'] ?></p>
                            </div>
                        </div>
                        <!-- <div class="bg-white">
                            <div class="d-flex flex-row fs-12">
                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                            </div>
                        </div> -->
                        <!-- <div class="bg-light p-2">
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                        </div> -->
                    </div>
                <!-- </div> -->
            <!-- </div> -->

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

</html>
<?php include('partials-front/footer.php'); ?>