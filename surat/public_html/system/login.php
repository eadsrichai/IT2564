<?php
    session_start();
    include('../include/conn.php');

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $queryLog = $conn->query("SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."' AND status = 1");
        $fetchLog = $queryLog->fetch_assoc();

        if($fetchLog){
            $_SESSION['userId'] = $fetchLog['user_id'];
            $_SESSION['username'] = $fetchLog['username'];
            $_SESSION['firstname'] = $fetchLog['firstname'];
            $_SESSION['lastname'] = $fetchLog['lastname'];
            $_SESSION['role'] = $fetchLog['role'];
            
            if($fetchLog['role'] == 0){
                header('location: ../user.php');
            }
            if($fetchLog['role'] == 1){
                header('location: ../admin/index.php');
            }
        }else{
            $_SESSION['errorLogin'] = true;
            header('location: ../index.php');
        }
    }
?>