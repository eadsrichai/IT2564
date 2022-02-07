<h4 class="text-center">สมัครสมาชิก</h4>
<?php
if (isset($_POST["submit_register"])) {
    $sql_check_user = 'SELECT * FROM account WHERE username = "' . $_POST['username'] . '"';
    $res_check_user = mysqli_query($connect, $sql_check_user);
    if (mysqli_num_rows($res_check_user) == 0) {
        $file_name = '';
        if ($_FILES["up"]["size"] != 0) {
            $time = time();
            if (move_uploaded_file($_FILES["up"]["tmp_name"], './asset/img_profile/' . $time . $_FILES["up"]["name"])) {
                $file_name = $time . $_FILES["up"]["name"];
            }
        }
        $sql_insert_user = 'INSERT INTO account (`username`, `password`, `FirstName`, `Lastname`, `img_profile`) VALUES ("' . $_POST['username'] . '", "' . $_POST['password'] . '", "' . $_POST['FirstName'] . '", "' . $_POST['LastName'] . '", "' . $file_name . '")';
        $res_insert_user = mysqli_query($connect, $sql_insert_user);
        if ($res_insert_user) {
?>
            <div class="alert alert-success" role="alert">
                สมัครสมาชิกสำเร็จ
            </div>
            <script>
                setTimeout(() => {
                    window.location = '?page=login';
                }, 3000);
            </script>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            ชื่อผู้ใช้นี้ถูกใช้แล้ว
        </div>
<?php
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="FirstName" class="form-control" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="LastName" class="form-control" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="text" name="password" class="form-control" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>โปรไฟล์</label>
                <input type="file" name="up" class="form-control p-1" />
            </div>
        </div>
        <button class="col-12 btn btn-success" type="submit" name="submit_register">สมัครสมาชิก</button>
    </div>
</form>