<?php

    include('../include/conn.php');
    session_start();
    echo("1");

    if(isset($_POST['addComment'])){ 
        
        echo("2");

        $detail = $_POST['detail'];
        $userId = $_POST['userId'];
        $postId = $_POST['postId'];

        $_SESSION['addCommentSuccess'] = true;
        $addComment = $conn->query("INSERT INTO comment(post_id,user_id,detail,date)VALUES('$postId','$userId','$detail',NOW())");

        header('location: ../user.php');
    }
    echo("3");
?>
