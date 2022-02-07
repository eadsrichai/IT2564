<!DOCTYPE html>
<html lang="en">
<?php
include('../services/connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
    $query_myself = "SELECT * FROM tb_users WHERE u_memberid = $myid";
    $result_myself = mysqli_query($conn, $query_myself);
    $fetch_myself = mysqli_fetch_assoc($result_myself);
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="icon" href="../Photo/logo.png">
    <title>Hello people</title>
</head>

<body style="background-color: whitesmoke;">
    <?php
    if (isset($_SESSION['adminid'])) {
        include("../item_header/header_admin.php");
    } else {
        include("../item_header/header_user.php");
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1" style="height: 40px;"></div>
            <div align="center">
                <div align="center">
                    <img src="../Photo/logo.png" alt="" style="width: 100px;">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col">

                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div>
                        <p class="h5">แก้ไขรหัสผ่าน</p>
                    </div>
                    <?php if (isset($_SESSION['errorp'])) { ?>
                        <div class="card-body">
                            <h5 class="text-danger"><?php
                                                    echo $_SESSION['errorp'];
                                                    unset($_SESSION['errorp']);
                                                    ?></h5>
                        </div>
                    <?php } ?>
                    <form action="../services/edit_system.php" method="post">
                        <div class="card-body">
                            <div class="form-group">

                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="รหัสผ่านปัจจุบัน" required>

                            </div>
                            <br>
                            <div class="form-group">

                                <input type="password" class="form-control" name="new_password" id="" aria-describedby="helpId" placeholder="รหัสผ่านใหม่" required>

                            </div>
                            <br>
                            <div align="center">
                                <input type="submit" name="edit_password" class="btn btn-primary shadow" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการเปลี่ยนรหัสผ่านหรือไม่')">
                            </div>
                            <br>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col">
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div>
                        <p class="h5">แก้ไขอีเมล</p>
                    </div>
                    <?php if (isset($_SESSION['errore'])) { ?>
                        <div class="card-body">
                            <h4 class="text-danger"><?php
                                                    echo $_SESSION['errore'];
                                                    unset($_SESSION['errore']);
                                                    ?></h4>
                        </div>
                    <?php } ?>
                    <form action="../services/edit_system.php" method="post">
                        <div class="card-body">
                            <div class="form-group">

                                <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" value="<?php echo $fetch_myself['u_email'] ?>" placeholder="Email" required>

                            </div>

                            <br>
                            <div align="center">
                                <input type="submit" class="btn btn-primary shadow" name="edit_email" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการเปลี่ยนอีเมลหรือไม่')">
                            </div>
                            <br>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <!-- row 2 -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div>
                        <p class="h5">แก้ไขข้อมูลส่วนตัว</p>
                    </div>
                    <?php if (isset($_SESSION['errorm'])) { ?>
                        <div class="card-body">
                            <h4 class="text-danger"><?php
                                                    echo $_SESSION['errorm'];
                                                    unset($_SESSION['errorm']);
                                                    ?></h4>
                        </div>
                    <?php } ?>
                    <form action="../services/edit_system.php" method="post">
                        <div class="card-body">
                            <div class="form-group">

                                <input type="text" class="form-control" name="fname" value="<?php echo $fetch_myself['u_fname'] ?>" id="" aria-describedby="helpId" placeholder="ชื่อ" required>

                            </div>
                            <br>
                            <div class="form-group">

                                <input type="text" class="form-control" name="lname" id="" value="<?php echo $fetch_myself['u_lname'] ?>" aria-describedby="helpId" placeholder="นามสกุล" required>

                            </div>
                            <br>
                            <div class="form-group">

                                <input type="text" class="form-control" name="address" id="" value="<?php echo $fetch_myself['u_address'] ?>" aria-describedby="helpId" placeholder="ที่อยู่" required>

                            </div>
                            <br>
                            <div align="center">
                                <input type="submit" class="btn btn-primary shadow" name="edit_info" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการเปลี่ยนข้อมูลของคุณหรือไม่')">
                            </div>
                            <br>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4"></div>

        </div>

    </div>
</body>

</html>