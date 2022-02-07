<?php

include('connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}


if (isset($_POST['create_comment'])) {
    $c_text = $_POST['c_text'];
    $page = $_POST['page'];
    $pid = $_POST['pid'];


    $query_insert = "INSERT INTO `tb_comments`(`c_pid`, `c_memberid`, `c_text`) VALUES ($pid,$myid,'$c_text')";
    mysqli_query($conn, $query_insert);

    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}


if (isset($_POST['edit_comment'])) {
    $c_text = $_POST['c_text'];
    $page = $_POST['page'];
    $cid = $_POST['cid'];


    $query_update = "UPDATE `tb_comments` SET `c_text` = '$c_text' WHERE `c_id` = $cid AND `c_memberid` = $myid";
    mysqli_query($conn, $query_update);

    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}


if (isset($_GET['delete_comment'])) {
    $cid = $_GET['cid'];
    $page = $_GET['page'];

    $query_delete = "DELETE FROM `tb_comments` WHERE `c_id` = $cid AND `c_memberid` = $myid";
    mysqli_query($conn, $query_delete);

    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}
