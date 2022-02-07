<?php
include('connect.php');
session_start();

if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $img = $_FILES['file']['tmp_name'];

    $query_check = "SELECT * FROM `tb_users` WHERE `u_email` = '$email'";
    $result_check  = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) != 0) {
        $_SESSION['error'] = "อีเมลเคยถูกใช้ไปแล้ว";
        header('location:../page_login_user/register.php');
    } else {

        if ($img != '') {
            $type = strrchr($_FILES['file']['name'], ".");
            $newname = $numrand . $type;
            $path  = "../Photo/";
            $pathuploads = $path . $newname;
            move_uploaded_file($_FILES['file']['tmp_name'], $pathuploads);
        }
        $query_insert = "INSERT INTO `tb_users`(`u_fname`, `u_lname`, `u_email`, `u_password`, `u_address`, `u_img`) VALUES ('$fname','$lname','$email','$password','$address','$newname')";
        mysqli_query($conn, $query_insert);
        header('location:../page_login_user/login_user.php');
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_check  = "SELECT * FROM `tb_users` WHERE `u_email` = '$email' AND `u_password` = '$password' LIMIT 1";
    $result_check  = mysqli_query($conn, $query_check);
    $fetch_check = mysqli_fetch_assoc($result_check);


    if (mysqli_num_rows($result_check) == 0) {
        $_SESSION['error'] = "อีเมลหรือรหัสผ่านผิด";
        header('location:../page_login_user/login_user.php');
    } else {
        if ($fetch_check['u_status'] == 1) {
            $_SESSION['error'] = "ผู้ใช้งานยังไม่ได้รับการอนุมัติ";
            header('location:../page_login_user/login_user.php');
        } else if ($fetch_check['u_status'] == 3) {
            $_SESSION['error'] = "ผู้ใช้งานโดนบล็อค";
            header('location:../page_login_user/login_user.php');
        } else {
            if ($fetch_check['u_gid'] == 1) {
                $_SESSION['myid'] = $fetch_check['u_memberid'];
                header('location:../page_post_user/post_user.php');
            } else {
                $_SESSION['adminid'] = $fetch_check['u_memberid'];
                $_SESSION['myid'] = $fetch_check['u_memberid'];
                header('location:../page_admin/profile_admin.php');
            }
        }
    }
}
