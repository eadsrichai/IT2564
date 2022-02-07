<?php

    session_start();
    require('connect.php');

    $userid = $_GET['userid'];

    $sql = "DELETE FROM tb_user WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script> alert('ยกเลิกสิทธิ์การใช้งานของผู้ใช้รายนี้สำเร็จ'); </script>";
        header('Refresh:0; url=delete_user.php');
    }else {
        echo "<script> alert('ไม่สามารถยกเลิกสิทธิ์การใช้งานของผู้ใช้รายนี้ได้สำเร็จ | โปรดลองอีกครั้ง'); </script>";
        header('Refresh:0; url=delete_user.php');
    }

?>