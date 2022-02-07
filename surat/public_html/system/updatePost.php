<?php

    include('../include/conn.php');
    session_start();

    if(isset($_POST['updatePost'])){
        $postId = $_POST['postId'];
        $newDetail = $_POST['detail'];
        if (isset($_FILES['upload'])) {
            $name_file = $_FILES['upload']['name'];
            $tmp_name = $_FILES['upload']['tmp_name'];
            $loca = '../image/post/';
            move_uploaded_file($tmp_name, $loca.$name_file);
            if ($name_file == '') {
                $findOldPic = $conn->query("SELECT * FROM post WHERE post_id = '" . $postId . "'");
                $fetchOldPic = $findOldPic->fetch_assoc();
                $name_file = $fetchOldPic['image'];
            }
        }
        $updatePost = $conn->query("UPDATE post SET image = '$name_file', detail = '$newDetail' WHERE post_id = '".$postId."'");
        
        $_SESSION['updatePostSuccess'] = true;
        header('location: ../user.php');

    }

