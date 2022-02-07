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

    $count_active = "SELECT COUNT(u_memberid) FROM tb_users WHERE u_memberid != $myid AND u_status = 2";
    $result_active = mysqli_query($conn, $count_active);
    $fetch_active = mysqli_fetch_assoc($result_active);


    $count_wait = "SELECT COUNT(u_memberid) FROM tb_users WHERE u_memberid != $myid AND u_status = 1";
    $result_wait = mysqli_query($conn, $count_wait);
    $fetch_wait = mysqli_fetch_assoc($result_wait);

    $count_deactive = "SELECT COUNT(u_memberid) FROM tb_users WHERE u_memberid != $myid AND u_status = 3";
    $result_deactive = mysqli_query($conn, $count_deactive);
    $fetch_deactive = mysqli_fetch_assoc($result_deactive);

    $count_post = "SELECT COUNT(p_id) FROM tb_posts";
    $result_post = mysqli_query($conn, $count_post);
    $fetch_post = mysqli_fetch_assoc($result_post);
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
            <div class="col-md-1"></div>
            <div class="col">
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div class="card-body">
                        <div align="center">
                            <img src="../Photo/<?php echo $fetch_myself['u_img'] ?>" class="rounded img-fluid img-thumbnail shadow p-1" alt="" style="width: 150px;">
                        </div>
                        <br>
                        <div align="right">
                            <a href="../page_Edit_user/Edit_img.php"><input type="button" class="btn btn-primary shadow" value="แก้ไขรูปโปรไฟล์ของคุณ"></a>
                            <a href="../page_Edit_user/Edit_information.php"><input type="button" class="btn btn-primary shadow" value="แก้ไขข้อมูลส่วนตัว"></a>
                        </div>
                    </div>
                </div>
                <br>
                <div align="center">
                    <p class="h4"><?php echo $fetch_myself['u_fname'] . "   " . $fetch_myself['u_lname'] ?></p>
                </div>
                <br>
                <div class="border-bottom"></div>

            </div>
            <div class="col-md-1"></div>
        </div>
        <br>
        <!-- row 2 -->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col">
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card p-1 shadow" style="background-color:yellowgreen;">
                                    <div align="center">
                                        <p class="h5 text-black">ผู้ใช้งานในระบบ</p>
                                    </div>
                                    <div align="center">
                                        <a href="../page_admin/admin_active.php" style="text-decoration: none;">
                                            <p class="h1 text-white">
                                                <?php echo $fetch_active['COUNT(u_memberid)'] ?></p>
                                        </a>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-3">
                                <div class="card p-1 shadow" style="background-color:darkgray;">
                                    <div align="center">
                                        <p class="h5 text-black">ผู้ใช้งานที่ยังไม่ได้อนุมัติ</p>
                                    </div>
                                    <div align="center">
                                        <a href="../page_admin/admin_wait.php" style="text-decoration: none;">
                                            <p class="h1  text-white"> <?php echo $fetch_wait['COUNT(u_memberid)'] ?></p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="card p-1 shadow" style="background-color:red;">
                                    <div align="center">
                                        <p class="h5 text-black">ผู้ใช้งานที่ยกเลิก</p>
                                    </div>
                                    <div align="center">
                                        <a href="../page_admin/admin_deactive.php" style="text-decoration: none;">
                                            <p class="h1 text-white"> <?php echo $fetch_deactive['COUNT(u_memberid)'] ?></p>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="card p-1 shadow" style="background-color:deepskyblue;">
                                    <div align="center">
                                        <p class="h5 text-black">โพสต์ทั้งหมด</p>
                                    </div>
                                    <div align="center">
                                        <a href="../page_admin/admin_post.php" style="text-decoration: none;">
                                            <p class="h1 text-white"> <?php echo $fetch_post['COUNT(p_id)'] ?></p>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div>

                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>