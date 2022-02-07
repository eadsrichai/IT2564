<h4 class="text-center">แก้ไขข้อมูล</h4>
<?php
$user = userInfo(isset($_GET['user_id']) ? $_GET['user_id'] : $_SESSION['user_id']);
if (isset($_POST["submit_register"])) {
    $file_name = userInfo($_POST['user_id'])["img_profile"];
    if ($_FILES["up"]["size"] != 0) {
        $time = time();
        if (move_uploaded_file($_FILES["up"]["tmp_name"], './asset/img_profile/' . $time . $_FILES["up"]["name"])) {
            $file_name = $time . $_FILES["up"]["name"];
        }
    }
    $sql_insert_user = 'UPDATE account SET FirstName = "' . $_POST['FirstName'] . '", LastName = "' . $_POST['LastName'] . '", password = "' . $_POST['password'] . '", img_profile = "' . $file_name . '" WHERE user_id = "' . $_POST['user_id'] . '"';
    $res_insert_user = mysqli_query($connect, $sql_insert_user);
    if ($res_insert_user) {
        ?>
        <div class="alert alert-success" role="alert">
            แก้ไขข้อมูลส่วนตัวสำเร็จ
        </div>
        <script>
            setTimeout(() => {
                window.location = window.location;
            }, 3000);
        </script>
        <?php
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?= $user["user_id"] ?>" />
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="FirstName" class="form-control" value="<?= $user["FirstName"] ?>" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="LastName" class="form-control" value="<?= $user["LastName"] ?>" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" value="<?= $user["password"] ?>" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>โปรไฟล์</label>
                <input type="file" name="up" class="form-control p-1" />
            </div>
        </div>
        <button class="col-12 btn btn-success" type="submit" name="submit_register">บันทึกการแก้ไข</button>
    </div>
</form>