<?php
    session_start();
    include('../include/conn.php');

    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $queryCheck = $conn->query("SELECT * FROM user WHERE username = '".$username."' ");
        $fetchCheck = $queryCheck->fetch_assoc();

        if(isset($_FILES['upload'])){
            $name_file = $_FILES['upload']['name'];
            $tmp_name = $_FILES['upload']['tmp_name'];
            $loca = '../image/user/';
            move_uploaded_file($tmp_name,$loca.$name_file);
            if($name_file == ''){
                $name_file = 'default.png';
            }
        }
        if($fetchCheck == null){
            $queryReg = $conn->query("INSERT INTO user(image, username, password, firstname, lastname, role, status)VALUES('$name_file', '$username', '$password', '$firstname', '$lastname', 0, 0) ");
            $_SESSION['registerSuccess'] = true;
            header('location: ../index.php');
        }else{
            $_SESSION['registerError'] = true;
            header('location: ../index.php?register');
        }
    }

?>