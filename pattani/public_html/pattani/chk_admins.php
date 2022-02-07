<?php
    include('process.php');
     
    $user = $_POST['email'];
    $pass = $_POST['passwd'];

    $sql = "SELECT * FROM admins WHERE email='$user' and passwd='$pass'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
 
    if($result){
        echo"<script>
            alert'ยินดีต้อนรับเข้าสู่ระบบเเอดมิน';
            window.location='homeadmins.php';
        </script>";
    }else{
        echo"<script>
        alert'ไม่สามารถเข้าสู่ระบบได้ กรุณาลองอีกครั้ง';
        window.location='admin.php';
    </script>";
    }
?>