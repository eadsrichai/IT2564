<!DOCTYPE html>
<html lang="en">

<?php
include('../services/connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $page = $_GET['page'];

    $query_comment = "SELECT * FROM tb_comments,tb_users WHERE c_id = $cid AND u_memberid = $myid";
    $result_comment = mysqli_query($conn, $query_comment);
    $fetch_comment = mysqli_fetch_assoc($result_comment);
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
                        <div class="shadow p-3 mb-5 rounded bg-white">
                            <div class="card-body">
                                <form action="../services/comment_system.php" method="post">
                                    <div align="right">
                                        <input type="submit" name="edit_comment" class="btn btn-primary shadow" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการแก้ไขหรือไม่')">
                                        <a href="../services/comment_system.php<?php echo "?cid=$cid&page=$page&delete_comment=1" ?>"><input type="button" class="btn btn-danger shadow" value="ลบ" onclick="return confirm('คุณแน่ใจที่จะทำการลบหรือไม่')"></a>
                                    </div>
                                    <div>
                                        <img src="../Photo/<?php echo $fetch_comment['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                        <label for=""><?php echo $fetch_comment['u_fname'] . "   " . $fetch_comment['u_lname'] ?></label>
                                    </div>
                                    <br>
                                    <div>
                                        <p class="h6">สิ่งที่แสดงความคิดเห็น</p>
                                    </div>
                                    <div>
                                        <div class="form-group">

                                            <input type="text" class="form-control" value="<?php echo $fetch_comment['c_text'] ?>" name="c_text" id="" aria-describedby="helpId" placeholder="แก้ไขข้อความของคุณ">


                                            <input type="hidden" name="page" value="<?php echo $page ?>">
                                            <input type="hidden" name="cid" value="<?php echo $cid ?>">
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <div class="border-bottom"></div>
                                <br>
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