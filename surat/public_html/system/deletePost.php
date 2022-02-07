<?php
    include('../include/conn.php');
    session_start();

    if(isset($_POST['deletePost'])){
        $postId = $_POST['postId'];

        $deletePost = $conn->query("DELETE FROM post WHERE post_id = '".$postId."'");
        $_SESSION['deletePostSuccess'] = true;
        if($_SESSION['role'] == 0){
            header('location: ../user.php');
        }
        if($_SESSION['role'] == 1){
            header('location: ../admin/manage-post.php');
        }
    }


?>