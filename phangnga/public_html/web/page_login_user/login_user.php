<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="icon" href="../Photo/logo.png">
</head>

<body style="background-color: whitesmoke;">
    <div class="container">
        <div class="row">
            <div class="col-md-1" style="height: 130px;"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div align="center">
                    <img src="../Photo/logo.png" alt="" style="width: 100px;">
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white">
                <?php if (isset($_SESSION['error'])) { ?>
                        <div class="card-body">
                            <h4 class="text-danger"><?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?></h4>
                        </div>
                    <?php } ?>
                    <form action="../services/login_system.php" method="post">
                        <div class="card-body">
                            <div class="form-group">

                                <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Email" required>

                            </div>
                            <br>
                            <div class="form-group">

                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="password" required>

                            </div>
                            <br>
                            <div align="center">
                                <input type="submit" name="login" class="btn btn-primary shadow" value="เข้าสู่ระบบ" onclick="return confirm('คุณแน่ใจที่จะทำการเข้าสู่ระบบหรือไม่')">
                            </div>
                            <br>
                            <div class="border-bottom"></div>
                            <br>
                            <div align="center">
                                <a href="../page_login_user/register.php" style="text-decoration: none;">สำหรับผู้ใช้ที่ไม่มีบัญชีใช้งาน</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>