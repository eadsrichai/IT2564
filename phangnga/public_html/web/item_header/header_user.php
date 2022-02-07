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
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark shadow" style="background-color:white;">
        &nbsp;
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <div>
                <a href="../page_post_user/post_user.php"><img src="../Photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;"></a>

            </div>
            &nbsp;
            <div>
                <p class="h5">HOME</p>
            </div>
        </div>
        <div>
            <form action="../page_friend/search.php" method="post">
                <img src="../Photo/logo.png" alt="" style="width: 30px;">
                <input type="text" name="search" id="search" placeholder="ค้นหาผู้คน">
                <input type="submit" class="btn btn-primary shadow" name="search_sub" value="ตกลง">
            </form>
        </div>
        <div>
            <a href="../services/logout.php"> <input type="button" class="btn btn-danger shadow" value="ออกจากระบบ" onclick="return confirm('คุณแน่ใจที่จะทำการออกจ่กระบบหรือไม่')"></a>
        </div>
    </nav>
</body>

</html>