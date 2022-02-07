<?php
include('connect.php');
session_start();


if (isset($_SESSION['myid'])) {
    $myid = $_SESSION['myid'];
} else {
    $_SESSION['error'] = "โปรดเข้าสู่ระบบก่อนใช้งาน";
    header('location:../page_login_user/login_user.php');
}


if (isset($_POST['edit_info'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];

    $query_update = "UPDATE `tb_users` SET `u_fname` = '$fname',`u_lname` = '$lname',`u_address` = '$address' WHERE `u_memberid` = $myid";
    mysqli_query($conn, $query_update);
    header('location:../page_Edit_user/Edit_information.php');
}


if (isset($_POST['edit_password'])) {
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];

    $query_check = "SELECT * FROM `tb_users` WHERE `u_memberid` = $myid AND `u_password` = '$password' LIMIT 1";
    $result_check = mysqli_query($conn, $query_check);
    if (mysqli_num_rows($result_check) == 1) {
        $query_update = "UPDATE `tb_users` SET `u_password` = '$new_password' WHERE `u_memberid` = $myid";
        mysqli_query($conn, $query_update);
        header('location:../page_Edit_user/Edit_information.php');
    } else {
        $_SESSION['errorp'] = "รหัสผ่านปัจจุบันผิด";
        header('location:../page_Edit_user/Edit_information.php');
    }
}

if (isset($_POST['edit_img'])) {
    $img  = $_FILES['file']['tmp_name'];

    if ($img != '') {
        $type = strrchr($_FILES['file']['name'], ".");
        $newname = $numrand . $type;
        $path  = "../Photo/";
        $pathuploads = $path . $newname;
        move_uploaded_file($_FILES['file']['tmp_name'], $pathuploads);
    }

    $query_update = "UPDATE `tb_users` SET `u_img` = '$newname' WHERE `u_memberid` = $myid";
    mysqli_query($conn, $query_update);
    header('location:../page_Edit_user/Edit_img.php');
}

if (isset($_POST['edit_email'])) {
    $email = $_POST['email'];

    $query_check  = "SELECT * FROM `tb_users` WHERE `u_email` = '$email'";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) != 0) {
        $_SESSION['errore'] = "อีเมลเคยถูกใช้งานไปแล้ว";
        header('location:../page_Edit_user/Edit_information.php');
    } else {
        $query_update = "UPDATE `tb_users` SET `u_email` = '$email' WHERE `u_memberid` = $myid";
        mysqli_query($conn, $query_update);
        header('location:../page_Edit_user/Edit_information.php');
    }
}
