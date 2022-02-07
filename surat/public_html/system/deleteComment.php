<?php
    include('../include/conn.php');
    session_start();

    if(isset($_POST['deleteComment'])){
        $commentId = $_POST['commentId'];

        $deleteComment = $conn->query("DELETE FROM comment WHERE comment_id = '".$commentId."'");
        $_SESSION['deleteCommentSuccess'] = true;
        if($_SESSION['role'] == 0){
            header('location: ../user.php');
        }
        if($_SESSION['role'] == 1){
            header('location: ../admin/manage-comment.php');
        }
    }


?>