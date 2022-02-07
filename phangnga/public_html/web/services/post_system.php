<?php

include('connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}


if (isset($_POST['create_post'])) {
    $p_text = $_POST['p_text'];
    $img = $_FILES['file']['tmp_name'];
    $page = $_POST['page'];

    if ($img != '') {
        $type = strrchr($_FILES['file']['name'], ".");
        $newname = $numrand . $type;
        $path  = "../Photo/";
        $pathuploads = $path . $newname;
        move_uploaded_file($_FILES['file']['tmp_name'], $pathuploads);
    }

    $query_insert = "INSERT INTO `tb_posts`(`p_memberid`, `p_text`, `p_img`) VALUES ($myid,'$p_text','$newname')";
    mysqli_query($conn, $query_insert);

    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}

if (isset($_POST['edit_post'])) {
    $p_text = $_POST['p_text'];
    $img = $_FILES['file']['tmp_name'];
    $page = $_POST['page'];
    $pid = $_POST['pid'];

    if ($img != '') {
        $type = strrchr($_FILES['file']['name'], ".");
        $newname = $numrand . $type;
        $path  = "../Photo/";
        $pathuploads = $path . $newname;
        move_uploaded_file($_FILES['file']['tmp_name'], $pathuploads);
    }

    $query_update = "UPDATE `tb_posts` SET `p_text` = '$p_text',`p_img` = '$newname' WHERE `p_memberid` = $myid AND `p_id` = $pid";
    mysqli_query($conn, $query_update);
    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}


if (isset($_GET['delete_post'])) {
    $page = $_GET['page'];
    $pid = $_GET['pid'];


    $query_delete = "DELETE FROM `tb_posts` WHERE `p_id` = $pid AND `p_memberid` = $myid";
    mysqli_query($conn, $query_delete);
    if ($page == 1) {
        header('location:../page_post_user/post_user.php');
    } else {
        header('location:../page_post_friend/post_friend.php');
    }
}
