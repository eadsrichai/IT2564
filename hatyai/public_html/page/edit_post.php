<h4 class="text-center">แก้ไขข้อมูล</h4>
<?php
$sql_post = 'SELECT * FROM post WHERE post_id = "' . $_GET['post_id'] . '"';
$res_post = mysqli_query($connect, $sql_post);
$fetch_post = mysqli_fetch_assoc($res_post);
if (isset($_POST["submit_edit_post"])) {
    $file_name = $fetch_post["post_img"];
    if ($_FILES["up"]["size"] != 0) {
        $time = time();
        if (move_uploaded_file($_FILES["up"]["tmp_name"], './asset/img_post/' . $time . $_FILES["up"]["name"])) {
            $file_name = $time . $_FILES["up"]["name"];
        }
    }
    $sql_insert_user = 'UPDATE post SET post_text = "' . $_POST['post_msg'] . '", post_img = "' . $file_name . '" WHERE post_id = "' . $_GET['post_id'] . '"';
    $res_insert_user = mysqli_query($connect, $sql_insert_user);
    if ($res_insert_user) {
        ?>
        <div class="alert alert-success" role="alert">
            แก้ไขโพสต์สำเร็จ
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
    <input type="hidden" name="user_id" value="<?= $user["user_id"] ?>" />
    <div class="row">
    <div class="col-12">
            <div class="form-group">
                <textarea class="form-control" name="post_msg"><?= $fetch_post["post_text"] ?></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="file" name="up" class="form-control p-1" />
            </div>
        </div>
        <button class="col-12 btn btn-success" type="submit" name="submit_edit_post">บันทึกการแก้ไข</button>
    </div>
</form>