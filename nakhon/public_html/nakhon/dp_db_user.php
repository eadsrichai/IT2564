<?php

    session_start();
    require('connect.php');

    $postid = $_GET['postid'];

    $sql = "DELETE FROM tb_post WHERE postid = '$postid'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script> alert('ยกเลิกโพสต์สำเร็จ'); </script>";
        header('Refresh:0; url=profile.php');
    }else {
        echo "<script> alert('ไม่สามารถยกเลิกโพสต์นี้ | โปรดลองอีกครั้ง'); </script>";
        header('Refresh:0; url=profile.php');
    }

?>