<?php

    include('../include/conn.php');
    session_start();

    if(isset($_POST['acceptUser'])){
        $userId = $_POST['userId'];
        $role = $_POST['role'];

        // echo $userId;
        // echo $role;
        $updateStatus = $conn->query("UPDATE user SET status = 1, role = '".$role."' WHERE user_id = '".$userId."'");
        
        $_SESSION['acceptSuccess'] = true;
        header('location: ../admin/index.php');

    }
    if(isset($_POST['ignoreUser'])){
        $userId = $_POST['userId'];
        $role = $_POST['role'];

        // echo $userId;
        // echo $role;
        $ignore = $conn->query("DELETE FROM user WHERE user_id = '".$userId."'");
        $_SESSION['ignoreSuccess'] = true;
        header('location: ../admin/index.php');

    }
