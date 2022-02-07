<?php

include('../include/conn.php');
session_start();
if (isset($_POST['updateUser'])) {
    $userId = $_POST['userId'];
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];
    $newFirstname = $_POST['firstname'];
    $newLastname = $_POST['lastname'];
    $newRole = $_POST['role'];

    
    if (isset($_FILES['upload'])) {
        $name_file = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $loca = '../image/user/';
        move_uploaded_file($tmp_name, $loca.$name_file);
        if ($name_file == '') {
            $findOldPic = $conn->query("SELECT * FROM user WHERE user_id = '" . $userId . "'");
            $fetchOldPic = $findOldPic->fetch_assoc();
            $name_file = $fetchOldPic['image'];
        }
    }
    $updateUser = $conn->query("UPDATE user SET image = '$name_file',username = '$newUsername', password = '$newPassword', firstname = '$newFirstname', lastname = '$newLastname', role = '$newRole' WHERE user_id = '" . $userId . "'");
    $_SESSION['updateUserSuccess'] = true;
    if($_SESSION['role'] == 0){
        header('location: ../profile.php');
    }
    if($_SESSION['role'] == 1){

        header('location: ../admin/manage-user.php?userId=' . $userId);
    }
}
if(isset($_POST['deleteUser'])){
    $userId = $_POST['userId'];
    $deleteAccount = $conn->query("DELETE FROM user WHERE user_id = '".$userId."'");
    $_SESSION['deleteUserSuccess'] = true;
    header('location: ../admin/manage-user.php');

}