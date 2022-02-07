<?php

include('connect.php');
session_start();


if (isset($_SESSION['adminid'])) {
    $myid = $_SESSION['adminid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}



if (isset($_GET['active'])) {
    $uid = $_GET['uid'];
    $query_update  = "UPDATE `tb_users` SET `u_status` = 2 WHERE `u_memberid` = $uid";
    mysqli_query($conn, $query_update);
    header('location:../page_admin/admin_wait.php');
}

if (isset($_GET['active2'])) {
    $uid = $_GET['uid'];
    $query_update  = "UPDATE `tb_users` SET `u_status` = 2 WHERE `u_memberid` = $uid";
    mysqli_query($conn, $query_update);
    header('location:../page_admin/admin_deactive.php');
}

if (isset($_GET['deactive'])) {
    $uid = $_GET['uid'];
    $query_update  = "UPDATE `tb_users` SET `u_status` = 3 WHERE `u_memberid` = $uid";
    mysqli_query($conn, $query_update);
    header('location:../page_admin/admin_active.php');
}

if (isset($_GET['delete_com'])) {
    $cid = $_GET['cid'];
    $query_delete = "DELETE FROM `tb_comments` WHERE `c_id` = $cid";
    mysqli_query($conn, $query_delete);
    header('location:../page_admin/admin_post.php');
}

if (isset($_GET['delete_post'])) {
    $pid = $_GET['pid'];
    $query_delete = "DELETE FROM `tb_posts` WHERE `p_id` = $pid";
    mysqli_query($conn, $query_delete);
    header('location:../page_admin/admin_post.php');
}
