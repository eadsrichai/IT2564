<h4 class="text-center">สร้างโพสต์</h4>
<?php
if (isset($_POST["create_post"])) {
    $file_name = '';
    if ($_FILES["up"]["size"] != 0) {
        $time = time();
        if (move_uploaded_file($_FILES["up"]["tmp_name"], './asset/img_post/' . $time . $_FILES["up"]["name"])) {
            $file_name = $time . $_FILES["up"]["name"];
        }
    }
    $sql_insert_post = 'INSERT INTO post (`post_text`, `post_img`, `user_id`) VALUES ("' . $_POST['post_msg'] . '", "' . $file_name . '", "' . $_SESSION['user_id'] . '")';
    $res_insert_post = mysqli_query($connect, $sql_insert_post);
    if ($res_insert_post) {
        ?>
        <div class="alert alert-success" role="alert">
            สร้างโพสต์สำเร็จ
        </div>
        <script>
            setTimeout(() => {
                window.location = '?page=home';
            }, 3000);
        </script>
        <?php
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <textarea class="form-control" name="post_msg"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="file" name="up" class="form-control p-1" />
            </div>
        </div>
        <button class="col-12 btn btn-success" type="submit" name="create_post">สร้างโพสต์</button>
    </div>
</form>