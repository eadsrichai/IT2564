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
    $show_user = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid NOT IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid)";
    $show_friends = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 3)";
    $show_req_to_me = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 1)";
    $show_req_for_me = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 2)";

    $result_user = mysqli_query($conn, $show_user);
    $result_friend = mysqli_query($conn, $show_friends);
    $result_req_to_me = mysqli_query($conn, $show_req_to_me);
    $result_req_for_me = mysqli_query($conn, $show_req_for_me);
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
    include("../item_header/header_user.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1" style="height: 100px;"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card p-1" style="background-color:slategrey;">
                    <p class="h5 text-white">ผู้ใช้งานในระบบ</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white ">
                    <?php while ($fetch_user = mysqli_fetch_array($result_user)) {
                        $uid = $fetch_user['u_memberid'];
                    ?>
                        <div class="card-body">
                            <div>
                                <div>
                                    <img src="../Photo/<?php echo $fetch_user['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                    <label for=""><?php echo $fetch_user['u_fname'] . "   " . $fetch_user['u_lname'] ?></label>
                                </div>
                                <br>
                                <div align="right">
                                    <a href="../services/relation_system.php<?php echo "?uid=$uid&send_req=1" ?>"><input type="button" class="btn btn-primary shadow" value="เพิ่มเพื่อน"></a>
                                </div>
                                <br>
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <div class="card p-1" style="background-color:slategrey;">
                    <p class="h5 text-white">เพื่อน</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white ">
                    <div class="card-body">
                        <?php while ($fetch_friend = mysqli_fetch_array($result_friend)) {
                            $uid = $fetch_friend['u_memberid']; ?>
                            <div>
                                <div>
                                    <img src="../Photo/<?php echo $fetch_friend['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                    <label for=""><?php echo $fetch_friend['u_fname'] . "   " . $fetch_friend['u_lname'] ?></label>
                                </div>
                                <br>
                                <div align="right">
                                    <a href="../services/relation_system.php<?php echo "?uid=$uid&delete_req=1" ?>"><input type="button" class="btn btn-danger shadow" value="ลบเพื่อน"></a>
                                </div>
                                <br>
                                <div class="border-bottom"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <div class="card p-1" style="background-color:slategrey;">
                    <p class="h5 text-white">คนที่ส่งคำขอมาเป็นเพื่อน</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white ">
                    <div class="card-body">
                        <?php while ($fetch_req_for_me = mysqli_fetch_array($result_req_for_me)) {
                            $uid = $fetch_req_for_me['u_memberid'];

                        ?>
                            <div>
                                <div>
                                    <img src="../Photo/<?php echo $fetch_req_for_me['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                    <label for=""><?php echo $fetch_req_for_me['u_fname'] . "   " . $fetch_req_for_me['u_lname'] ?></label>
                                </div>
                                <br>
                                <div align="right">
                                    <a href="../services/relation_system.php<?php echo "?uid=$uid&submit_req=1" ?>"><input type="button" class="btn btn-primary shadow" value="ตอบรับคำขอ"></a>
                                    <a href="../services/relation_system.php<?php echo "?uid=$uid&delete_req=1" ?>"><input type="button" class="btn btn-danger shadow" value="ยกเลิกคำขอ"></a>

                                </div>
                                <br>
                                <div class="border-bottom"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <div class="card p-1" style="background-color:slategrey;">
                    <p class="h5 text-white">คนที่ส่งคำขอไปเป็นเพื่อน</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white ">
                    <?php while ($fetch_req_to_me = mysqli_fetch_array($result_req_to_me)) {
                        $uid = $fetch_req_to_me['u_memberid'];


                    ?>
                        <div class="card-body">
                            <div>
                                <div>
                                    <img src="../Photo/<?php echo $fetch_req_to_me['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                    <label for=""><?php echo $fetch_req_to_me['u_fname'] . "   " . $fetch_req_to_me['u_lname'] ?></label>
                                </div>
                                <br>
                                <div align="right">

                                    <a href="../services/relation_system.php<?php echo "?uid=$uid&delete_req=1" ?>"><input type="button" class="btn btn-danger shadow" value="ยกเลิกคำขอ"></a>

                                </div>
                                <br>
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>