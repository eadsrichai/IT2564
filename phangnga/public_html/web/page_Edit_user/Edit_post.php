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
    $show_post_me = "SELECT * FROM tb_posts,tb_users WHERE p_memberid = $myid AND u_memberid = p_memberid ORDER BY p_timestamp DESC";
    $result_post_me = mysqli_query($conn, $show_post_me);
    $page = 1;
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $page = $_GET['page'];

    $query_select_post = "SELECT * FROM tb_posts,tb_users WHERE p_id = $pid AND u_memberid = p_memberid";
    $result_select_post = mysqli_query($conn, $query_select_post);
    $fetch_select_post = mysqli_fetch_assoc($result_select_post);
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
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div class="card-body">
                        <div>
                            <img src="../Photo/<?php echo $fetch_select_post['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                            <label for=""><?php echo $fetch_select_post['u_fname'] . "   " . $fetch_select_post['u_lname'] ?></label>
                            &nbsp;
                            &nbsp;
                            <label for=""><?php echo $fetch_select_post['p_timestamp'] ?></label>
                        </div>
                        <br>
                        <div>
                            <p class="h6">สิ่งที่คุณคิดจะแสดงที่นี่</p>
                        </div>

                        <form action="../services/post_system.php" method="post" enctype="multipart/form-data">
                            <div>
                                <div class="form-group">

                                    <input type="text" class="form-control" name="p_text" id="" aria-describedby="helpId" placeholder="แก้ไขข้อความของคุณ" value="<?php echo $fetch_select_post['p_text'] ?>">

                                    <input type="hidden" name="pid" value="<?php echo $pid ?>">
                                    <input type="hidden" name="page" value="<?php echo $page ?>">

                                </div>
                            </div>
                            <br>

                            <div align="center">
                                <img src="../Photo/<?php echo $fetch_select_post['p_img'] ?>" alt="" class="img-fluid img-thumbnail shadow p-2">
                            </div>
                            <br>
                            <div>
                                <input type="file" name="file" id="" class="btn btn-info shadow" style="width:100%">
                            </div>
                            <br>
                            <div align="right">
                                <input type="submit" name="edit_post" class="btn btn-primary shadow" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการแก้ไขโพสต์หรือไม่')">
                                <a href="../services/post_system.php<?php echo "?pid=$pid&delete_post=1&page=$page" ?>"><input type="button" class="btn btn-danger shadow" value="ลบ" onclick="return confirm('คุณแน่ใจที่จะทำการลบหรือไม่')"></a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>