<?php
session_start();
session_destroy();
echo"<script>
            alert'ยินดีต้อนรับเข้าสู่ระบบเเอดมิน';
            window.location='homeusers.php';
        </script>";
?>