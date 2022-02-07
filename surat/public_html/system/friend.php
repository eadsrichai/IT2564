<?php
    include('../include/conn.php');
    session_start();

    if(isset($_POST['cancel'])){
        $friendId = $_POST['friendId'];

        $deleteFriend = $conn->query("DELETE FROM friend WHERE friend_id = '".$friendId."'");
        $_SESSION['cancelFriendSuccess'] = true;
        header('location: ../member.php');
    }
    if(isset($_POST['addFriend'])){
        $userId = $_POST['userId'];
        $myId = $_SESSION['userId'];
        $addFriend = $conn->query("INSERT INTO friend(user_id1,user_id2,status)VALUES('$myId', '$userId', 0)");
        $_SESSION['addFriendSuccess'] = true;
        header('location: ../member.php');
    }
    if(isset($_POST['delete'])){
        $userId2 = $_POST['userId2'];
        $myId = $_SESSION['userId'];
        $delFriend = $conn->query("DELETE FROM friend WHERE user_id1 = '".$myId."' AND user_id2 = '".$userId2."'");
        $delFriend2 = $conn->query("DELETE FROM friend WHERE user_id2 = '".$myId."' AND user_id1 = '".$userId2."'");
        $_SESSION['deleteFriendSuccess'] = true;
        header('location: ../friend.php');
    }
    if(isset($_POST['accept'])){
        $userId = $_POST['userId1'];
        $friendId = $_POST['friendId'];
        $myId = $_SESSION['userId'];

        $addFriend = $conn->query("INSERT INTO friend(user_id1,user_id2,status)VALUES('$myId', '$userId', 1)");
        $updateFriend = $conn->query("UPDATE friend SET status = 1 WHERE friend_id = '".$friendId."'");
        $_SESSION['acceptFriendSuccess'] = true;
        header('location: ../friend.php');
    }
    if(isset($_POST['ignore'])){
        $friendId = $_POST['friendId'];

        $deleteFriend = $conn->query("DELETE FROM friend WHERE friend_id = '".$friendId."'");
        $_SESSION['ignoreFriendSuccess'] = true;
        header('location: ../friend.php');
    }
