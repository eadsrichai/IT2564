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

    $post_select = "SELECT * FROM tb_posts ORDER BY p_id DESC";
    $result_active = mysqli_query($conn, $post_select);
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
                    <p class="h5 text-white">โพสต์ทั้งหมด</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <?php while ($fetch_post = mysqli_fetch_array($result_active)) {
                        $pid = $fetch_post['p_id'];
                        ?>
                        <div align="right">
                            <a href="../page_admin/admin_report.php<?php echo "?pid=$pid" ?>"><input type="button" class="btn btn-primary shadow" value="ดูรายละเอียด"></a>
                        </div>
                        <div class="card-body">
                            <div>
                                <img src="../Photo/<?php echo $fetch_post['p_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 20%;">
                                &nbsp;&nbsp;
                                <label for=""><?php echo $fetch_post['p_text'] ?></label>

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