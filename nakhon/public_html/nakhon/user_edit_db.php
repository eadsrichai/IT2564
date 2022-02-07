<?php

    session_start();
    require('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $mail = $_POST['mail'];

    $userid = $_GET['userid'];

    $sql = "UPDATE  tb_user SET  username = '$username', password = '$password', fullname = '$fullname', mail = '$mail' WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script> alert('บันทึกการแก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=user_edit.php');
    }else {
        echo "<script> alert('บันทึกการแก้ไขข้อมูลไม่สำเร็จ | โปรดลองอีกครั้ง'); </script>";
        header('Refresh:0; url=user_edit.php');
    }
   

?>