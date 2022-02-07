<?php

    include('../include/conn.php');
    session_start();

    if(isset($_POST['updateComment'])){
        $commentId = $_POST['commentId'];
        $newDetail = $_POST['detail'];
        
        $updateComment = $conn->query("UPDATE comment SET detail = '$newDetail' WHERE comment_id = '".$commentId."'");
        
        $_SESSION['updateCommentSuccess'] = true;
        header('location: ../user.php');

    }

