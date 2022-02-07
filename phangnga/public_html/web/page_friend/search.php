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

if (isset($_POST['search_sub'])) {
    $search = $_POST['search'];
    $search_query = "SELECT * FROM `tb_users` WHERE `u_memberid` != $myid AND `u_status` = 2 AND `u_fname` LIKE '%$search%' OR `u_lname` LIKE '%$search%' ";
    $result_search = mysqli_query($conn, $search_query);
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
    include("../item_header/header_user.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="shadow p-3 mb-5 rounded bg-white mt-3">
                    <h4>ผู้ค้นที่ค้นหาเจอ</h4>
                    <div class="card-body">
                        <?php while ($fetch_search = mysqli_fetch_array($result_search)) { ?>
                            <div>
                                <img src="../Photo/<?php echo $fetch_search['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 60px;">
                                &nbsp;
                                <label for="">
                                    <h4><?php echo $fetch_search['u_fname'] . "   " . $fetch_search['u_lname'] ?></h4>
                                </label>
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