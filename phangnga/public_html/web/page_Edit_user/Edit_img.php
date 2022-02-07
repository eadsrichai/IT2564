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
    if(isset($_SESSION['adminid'])){
        include("../item_header/header_admin.php");
    }else{
        include("../item_header/header_user.php");
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col">
                <div class="shadow p-3 mb-5 rounded bg-white mt-1">
                    <div class="card-body">
                        <form action="../services/edit_system.php" method="post" enctype="multipart/form-data">
                            <div align="center">
                                <img src="../Photo/<?php echo $fetch_myself['u_img'] ?>" class="rounded img-fluid img-thumbnail shadow p-1" alt="" style="width: 150px;">
                            </div>
                            <br>
                            <div align="center">
                                <input type="file" name="file" id="" class="btn btn-info shadow">
                            </div>
                            <br>
                            <div align="right">
                                <input type="submit" name="edit_img" class="btn btn-primary shadow" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะทำการเปลี่ยนโปรไฟล์หรือไม่')">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>