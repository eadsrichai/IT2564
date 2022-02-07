<?php
session_start();
session_destroy();
unset($_SESSION['myid']);
unset($_SESSION['adminid']);
header('location:../page_login_user/login_user.php');
