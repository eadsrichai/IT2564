<?php

    session_start();
    require('connect.php');

    if(isset($_POST['btn-l'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = md5($password);

        $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['userid'] = $row=['userid'];
            $_SESSION['username'] = $row=['username'];
            $_SESSION['password'] = $row=['password'];
            $_SESSION['fullname'] = $row=['fullname'];
            $_SESSION['mail'] = $row=['mail'];
            $_SESSION['level'] = $row=['level'];

            if($_SESSION['level'] == ['admin']) {
                echo "<script> alert('เข้าสู่ระบบผู้ดูแลสำเร็จ | ยินดีต้อนรับผู้ดูแลระบบ'); </script>";
                header('Refresh:0; url=a.php');
            }else {
                echo "<script> alert('เข้าสู่ระบบผู้ใช้งานสำเร็จ | ยินดีต้อนรับผู้ใช้งาน'); </script>";
                header('Refresh:0; url=home.php');
            }
        }else {
            echo "<script> alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง | โปรดลองอีกครั้ง'); </script>";
            header('Refresh:0; url=index.php');
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>เข้าสู่ระบบ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="card text-align">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <h4 class="card-title">เข้าสู่ระบบ</h4>
                <p class="card-text">ล็อคอินเข้าสู่ระบบเพื่อใช้งาน</p>

                <form action="home.php" method="post">
                    <div class="form-group">
                        <label for="">Your Username</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="กรอกชื่อผู้ใช้งาน"
                            aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="">Your Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="กรอกรหัสผ่าน"
                            aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn-l" id="" class="form-control btn btn-primary col-3"
                            value="เข้าสู่ระบบ" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <h6 class="title">ยังไม่มีบัญชีผู้ใช้งานใช่หรือไม่ ?</h6>
                        <a href="r.php" class="form-control btn btn-danger col-3">
                            สมัครบัญชีผู้ใช้งาน</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
