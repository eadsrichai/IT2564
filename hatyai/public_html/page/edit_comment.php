<h4 class="text-center">แก้ไขข้อมูล</h4>
<?php
$sql_post = 'SELECT * FROM `comment` WHERE cm_id = "' . $_GET['comment_id'] . '"';
$res_post = mysqli_query($connect, $sql_post);
$fetch_post = mysqli_fetch_assoc($res_post);
if (isset($_POST["submit_edit_comment"])) {
    $sql_insert_user = 'UPDATE `comment` SET cm_msg = "' . $_POST['comment_msg'] . '" WHERE cm_id = "' . $_GET['comment_id'] . '"';
    $res_insert_user = mysqli_query($connect, $sql_insert_user);
    if ($res_insert_user) {
        ?>
        <div class="alert alert-success" role="alert">
            แก้ไขคอมเมนต์สำเร็จ
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
                <input type="text" name="comment_msg" class="form-control" value="<?= $fetch_post["cm_msg"] ?>" />
            </div>
        </div>
        <button class="col-12 btn btn-success" type="submit" name="submit_edit_comment">บันทึกการแก้ไข</button>
    </div>
</form>