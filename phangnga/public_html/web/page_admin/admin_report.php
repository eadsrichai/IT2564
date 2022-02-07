<!DOCTYPE html>
<html lang="en">

<?php
include('../services/connect.php');
session_start();
if (isset($_SESSION['adminid'])) {
    $myid = $_SESSION['adminid'];
    $query_myself = "SELECT * FROM tb_users WHERE u_memberid = $myid ";
    $result_myself = mysqli_query($conn, $query_myself);
    $fetch_myself = mysqli_fetch_assoc($result_myself);
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $post_select = "SELECT * FROM tb_posts,tb_users WHERE p_id = $pid AND p_memberid  = u_memberid";
    $result_active = mysqli_query($conn, $post_select);
    $fetch_active = mysqli_fetch_assoc($result_active);


    $query_comment  = "SELECT * FROM tb_comments,tb_users WHERE c_pid = $pid AND u_memberid = c_memberid";

    $result_comment  = mysqli_query($conn, $query_comment);
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
                    <p class="h5 text-white">โพสต์ทั้งหมด</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div align="right">
                        <a href="../services/admin_system.php<?php echo "?pid=$pid&delete_post=1" ?>"><input type="button" class="btn btn-danger shadow" value="ลบ"></a>
                    </div>
                    <div class="card-body">
                        <div>
                            <img src="../Photo/<?php echo $fetch_active['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                            <label for=""><?php echo $fetch_active['u_fname'] . "   " . $fetch_active['u_lname'] ?></label>
                            &nbsp;
                            &nbsp;
                            <label for=""><?php echo $fetch_active['p_timestamp'] ?></label>
                        </div>
                        <br>
                        <div>
                            <p class="h6"><?php echo $fetch_active['p_text'] ?></p>
                        </div>
                        <br>

                        <div align='center'>
                            <img src="../Photo/<?php echo $fetch_active['p_img'] ?>" alt="" class="img-fluid img-thumbnail shadow p-2">
                        </div>
                        <br>
                        <br>
                        <div class="shadow p-3 mb-5 rounded bg-white">
                            <div class="card-body">
                                <?php while ($fetch_comment = mysqli_fetch_array($result_comment)) {
                                    $cid = $fetch_comment['c_id'];
                                ?>
                                    <div align="right">
                                        <div align="right">
                                            <a href="../services/admin_system.php<?php echo "?cid=$cid&delete_com=1" ?>"><input type="button" class="btn btn-danger shadow" value="ลบ"></a>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="../Photo/<?php echo $fetch_comment['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                        <label for=""><?php echo $fetch_comment['u_fname'] . "   " . $fetch_comment['u_lname'] ?>0</label>
                                    </div>
                                    <br>
                                    <div>
                                        <p class="h6"><?php echo $fetch_comment['c_text'] ?></p>
                                    </div>
                                    <br>
                                    <div class="border-bottom"></div>
                                    <br>
                                <?php } ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>