<?php
    include('process2.php');
    
    $user = $_POST['email'];
    $pass = $_POST['passwd'];

    $sql = "SELECT * FROM users WHERE email='$user' and passwd='$pass'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);

    if($result){
        echo"<script>
            alert'ยินดีต้อนรับเข้าสู่ระบบเเอดมิน';
            window.location='homeusers.php';
        </script>";
    }else{
        echo"<script>
        alert'ไม่สามารถเข้าสู่ระบบได้ กรุณาลองอีกครั้ง';
        window.location='index.php';
    </script>";
    }
?>