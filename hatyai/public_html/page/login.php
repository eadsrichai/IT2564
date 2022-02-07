<?php
if (isset($_SESSION['user_id'])) {
?>
    <script>
        window.location = '?page=home';
    </script>
<?php
} else {
?>
    <h4 class="text-center">เข้าสู่ระบบ</h4>
    <?php
    if (isset($_POST["submit_login"])) {
        $sql_check_user = 'SELECT user_id, username, acc_status FROM account WHERE username = "' . $_POST['username'] . '" AND password = "' . $_POST['password'] . '"';
        $res_check_user = mysqli_query($connect, $sql_check_user);
        if ($res_check_user) {
            if (mysqli_num_rows($res_check_user) == 1) {
                $fetch_check_user = mysqli_fetch_assoc($res_check_user);
                if ($fetch_check_user["acc_status"] == "accept") {
                    $_SESSION['user_id'] = $fetch_check_user["user_id"];
                    $_SESSION['username'] = $fetch_check_user["username"];
    ?>
                    <div class="alert alert-success" role="alert">
                        เข้าสู่ระบบสำเร็จ
                    </div>
                    <script>
                        setTimeout(() => {
                            window.location = window.location;
                        }, 3000);
                    </script>
                <?php
                } else if ($fetch_check_user["acc_status"] == "pending") {
                ?>
                    <div class="alert alert-warning" role="alert">
                        บัญชีของคุณกำลังรออนุมัติ
                    </div>
                <?php
                } else if ($fetch_check_user["acc_status"] == "cancel") {
                ?>
                    <div class="alert alert-danger" role="alert">
                        บัญชีคุณถูกระงับ
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
                </div>
    <?php
            }
        }
    }
    ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>ชื่อผู้ใช้</label>
                    <input type="text" name="username" class="form-control" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" />
                </div>
            </div>
            <button class="col-12 btn btn-success" type="submit" name="submit_login">เข้าสู่ระบบ</button>
        </div>
    </form>
<?php
}
