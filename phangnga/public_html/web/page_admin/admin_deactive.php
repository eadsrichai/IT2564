<!DOCTYPE html>
<html lang="en">

<?php
include('../services/connect.php');
session_start();
if (isset($_SESSION['adminid'])) {
    $myid = $_SESSION['adminid'];
    $query_myself = "SELECT * FROM tb_users WHERE u_memberid = $myid";
    $result_myself = mysqli_query($conn, $query_myself);
    $fetch_myself = mysqli_fetch_assoc($result_myself);

    $count_active = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 3";
    $result_active = mysqli_query($conn, $count_active);
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

<body style="background-color:whitesmoke;">
    <?php
    include("../item_header/header_admin.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card p-1 mt-3" style="background-color:slategrey;">
                    <p class="h5 text-white">ผู้ใช้งานที่ถูกยกเลิก</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white ">

                    <div class="card-body">
                        <?php while ($fetch_active = mysqli_fetch_assoc($result_active)) {
                            $uid = $fetch_active['u_memberid'];
                        ?>
                            <div>
                                <img src="../Photo/<?php echo $fetch_active['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 60px;">
                                &nbsp;
                                <label for="">
                                    <h4><?php echo $fetch_active['u_fname'] . "   " . $fetch_active['u_lname'] ?></h4>
                                </label>
                            </div>
                            <br>

                            <div align="right">
                                <a href="../services/admin_system.php<?php echo "?uid=$uid&active2=2" ?>"><input type="button" class="btn btn-danger shadow" value="ยกเลิก"></a>
                            </div>
                            <br>
                            <div class="border-bottom"></div>
                            <br>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>