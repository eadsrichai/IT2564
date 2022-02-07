<?php
include('connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}



if (isset($_GET['send_req'])) {
    $uid = $_GET['uid'];


    $query_insert_1  = "INSERT INTO `tb_relations`(`r_memberid`, `r_uid`, `r_status`) VALUES ($myid,$uid,1)";
    $query_insert_2  = "INSERT INTO `tb_relations`(`r_memberid`, `r_uid`, `r_status`) VALUES ($uid,$myid,2)";
    mysqli_query($conn, $query_insert_1);
    mysqli_query($conn, $query_insert_2);

    header('location:../page_relation/relation.php');
}

if (isset($_GET['submit_req'])) {
    $uid = $_GET['uid'];


    $query_update = "UPDATE `tb_relations` SET `r_status` = 3 WHERE `r_memberid` = $myid AND `r_uid` = $uid OR `r_memberid` = $uid AND `r_uid`  = $myid";
    mysqli_query($conn, $query_update);

    header('location:../page_relation/relation.php');
}


if (isset($_GET['delete_req'])) {
    $uid = $_GET['uid'];


    $query_delete = "DELETE FROM `tb_relations` WHERE `r_memberid` = $myid AND `r_uid` = $uid OR `r_memberid` = $uid AND `r_uid`  = $myid";
    mysqli_query($conn, $query_delete);

    header('location:../page_relation/relation.php');
}
