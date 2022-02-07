<?php

    include('../include/conn.php');
    session_start();

    if(isset($_POST['addPost'])){
        $detail = $_POST['detail'];
        $userId = $_POST['userId'];

        if(isset($_FILES['upload'])){
            $name_file = $_FILES['upload']['name'];
            $tmp_name = $_FILES['upload']['tmp_name'];
            $loca = '../image/post/';
            if($name_file == ''){
                $name_file = "null";
            }
            move_uploaded_file($tmp_name,$loca.$name_file);
        }
        $_SESSION['addPostSuccess'] = true;
        $addPost = $conn->query("INSERT INTO post(user_id,image,detail,date)VALUES('$userId','$name_file','$detail',NOW())");

        header('location: ../user.php');
    }
?>
