<?php
include('config.php');
session_start();
if(isset($_POST['submit'])){
    if($_POST['password'] !=$_POST['confirm_password']);
    $_SESSION['err_password'] = 'password ไม่ตรงกัน';
    header('location : index.php');
}else{

    $firstname = mysqli_real_escape_string($_POST['name']);
    $lastname = mysqli_real_escape_string($_POST['lastname']);
    $email =mysqli_real_escape_string($_POST['email']);
    $password =mysqli_real_escape_string($_POST['passwd']);
    
    $query = "SELECT * COUNT email  FROM email AS 'count_email' ";
    $q = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($q,$email);

    
if($row['count_email'] == 0){
    $query = "INSERT INTO users(name,lastname,email,passwd) VALUES('$firstname', '$lastname', '$email', '$password')";
    echo query;
    $result = mysqli_query($conn,$query);

    }else{
        if($result){
            header('location : index.php');  }
        $_SESSION['err_query'] = "query ไม่ถูกต้อง";
        header('location : register.php');}
        else{
        $_SESSION['exist_email'] = "มีอีเมลนี้ในระบบเเล้ว";
        header('location : register.php');
    }}
?>