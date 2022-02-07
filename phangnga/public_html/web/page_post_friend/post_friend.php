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
    $show_post_me = "SELECT p.p_id,p.p_timestamp,p.p_text,p.p_img,p.p_memberid,p.p_timestamp,u2.u_memberid,u2.u_fname,u2.u_lname,u2.u_img
    FROM tb_posts p,tb_users u1,tb_users u2,tb_relations r
    WHERE u1.u_memberid = $myid 
    AND r.r_memberid = u1.u_memberid
    AND r.r_status = 3
    AND p.p_memberid= r.r_uid
    AND u2.u_memberid = p.p_memberid
    AND u2.u_status = 2
    ORDER BY p.p_timestamp DESC";
    $result_post_me = mysqli_query($conn, $show_post_me);
    $page = 2;

    $near = $fetch_myself['u_address'];
    $query_near = "SELECT * FROM `tb_users` WHERE `u_memberid` != $myid AND `u_status` = 2 AND u_address LIKE '%$near%'  ORDER BY u_memberid DESC LIMIT 2";
    $result_near = mysqli_query($conn, $query_near);
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
    include("../item_header/header_user.php");
    ?>
    <div class="container">
        <!-- row 3 -->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="shadow p-3 mb-5 rounded bg-white mt-3">
                    <div class="card-body">
                        <div>
                            <img src="../Photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                            <label for=""><?php echo $fetch_myself['u_fname'] . "   " . $fetch_myself['u_lname'] ?></label>
                        </div>
                        <br>
                        <form action="../services/post_system.php" method="post" enctype="multipart/form-data">
                            <div>
                                <div class="form-group">

                                    <input type="text" class="form-control" name="p_text" id="" aria-describedby="helpId" placeholder="คุณกำลังคิดอะไรอยู่">

                                    <input type="hidden" name="page" value="<?php echo $page ?>">

                                </div>
                            </div>
                            <br>
                            <div>
                                <input type="file" class="btn btn-info" name="file" style="width:100%" id="">
                            </div>
                            <br>
                            <div align="right">
                                <input type="submit" class="btn btn-primary shadow" name="create_post" value="post" onclick="return confirm('คุณแน่ใจที่จะทำการโพสต์หรือไม่')">
                                <input type="reset" class="btn btn-danger shadow" value="reset">
                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-5 rounded bg-white position-fixed mt-3">

                    <div class="card-body">
                        <p class="h5">คนที่คุณอาจจะรู้จัก</p>
                    </div>
                    <br>
                    <?php while ($fetch_near = mysqli_fetch_array($result_near)) { ?>
                        <div class="p-1">
                            <img src="../Photo/<?php echo $fetch_near['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                            <label for=""><?php echo $fetch_near['u_fname'] . "   " . $fetch_near['u_lname'] ?></label>

                        </div>
                    <?php } ?>
                    <br>
                    <div align="right">
                        <a href="../page_relation/relation.php"><input type="button" class="btn btn-primary shadow" value="เพิ่มเติม"></a>
                    </div>

                </div>
            </div>
            <div clas <div class="col-md-1"></div>
        </div>
        <br>
        <!-- row 4 -->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <?php while ($fetch_post_me = mysqli_fetch_array($result_post_me)) {
                    $pid = $fetch_post_me['p_id'];
                    $uid = $fetch_post_me['p_memberid'];
                    $show_comment = "SELECT * FROM tb_comments,tb_users WHERE c_pid = $pid AND u_memberid = c_memberid";
                    $result_comment = mysqli_query($conn, $show_comment);
                ?>
                    <div class="shadow p-3 mb-5 rounded bg-white">
                        <?php if ($uid == $myid) { ?>
                            <div align="right">
                                <a href="../page_Edit_user/Edit_post.php<?php echo "?pid=$pid&page=$page" ?>"><input type="button" class="btn btn-danger shadow" value="แก้ไข"></a>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <div>
                                <img src="../Photo/<?php echo $fetch_post_me['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                <label for=""><?php echo $fetch_post_me['u_fname'] . "   " . $fetch_post_me['u_lname'] ?></label>
                                &nbsp;
                                &nbsp;
                                <label for=""><?php echo $fetch_post_me['p_timestamp'] ?></label>
                            </div>
                            <br>
                            <div>
                                <p class="h6"><?php echo $fetch_post_me['p_text'] ?></p>
                            </div>
                            <br>

                            <div align="center">
                                <?php if ($fetch_post_me['p_img'] != '') { ?>
                                    <img src="../Photo/<?php echo $fetch_post_me['p_img'] ?>" alt="" class="img-fluid img-thumbnail shadow p-2">
                                <?php } ?>
                            </div>
                            <br>
                            <br>
                            <div class="shadow p-3 mb-5 rounded bg-white">
                                <?php if (mysqli_num_rows($result_comment) != 0) { ?>
                                    <?php while ($fetch_comment = mysqli_fetch_array($result_comment)) {
                                        $cid = $fetch_comment['c_id'];
                                    ?>
                                        <div class="card-body">
                                            <div align="right">
                                                <?php if ($fetch_comment['u_memberid'] == $myid) { ?>
                                                    <a href="../page_Edit_user/Edit_comments.php<?php echo "?cid=$cid&page=$page" ?>"><input type="button" class="btn btn-danger shadow" value="แก้ไข"></a>
                                                <?php } ?>
                                            </div>
                                            <div>
                                                <img src="../Photo/<?php echo $fetch_comment['u_img'] ?>" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 30px;">
                                                <label for=""><?php echo $fetch_comment['u_fname'] . "   " . $fetch_comment['u_lname'] ?></label>
                                            </div>
                                            <br>
                                            <div>
                                                <p class="h6"><?php echo $fetch_comment['c_text'] ?></p>
                                            </div>
                                            <br>
                                            <div class="border-bottom"></div>
                                            <br>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <form action="../services/comment_system.php" method="post">
                                <div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="c_text" id="" aria-describedby="helpId" placeholder="แสดงความคิดเห็น" required>
                                        <input type="hidden" name="pid" value="<?php echo $pid ?>">
                                        <input type="hidden" name="page" value="<?php echo $page ?>">

                                    </div>
                                    <br>
                                    <div align="right">
                                        <input type="submit" name="create_comment" class="btn btn-primary shadow" value="ตกลง" onclick="return confirm('คุณแน่ใจที่จะแสดงความคิดเห็นหรือไม่')">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>