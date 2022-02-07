<?php
    
    session_start();
    require('connect.php');

    if(isset($_POST['btn-r'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $mail = $_POST['mail'];


        $sql = "SELECT * FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows == 0) {
            $password = md5($password);

            $insert_sql = "INSERT INTO tb_user(username,password,fullname,mail) VALUES('$username','$password','$fullname','$mail')";
            $insert_query = mysqli_query($conn, $insert_sql);

            if($insert_query) {
                echo "<script> alert('สมัครบัญชีผู้ใช้งานสำเร็จ | ยินดีต้อนรับ'); </script>";
                header('Refresh:0; url=index.php');
            }else {
                echo "<script> alert('ไม่สามารถสมัครบัญชีผู้ใช้งานได้ | โปรดลองอีกครั้ง'); </script>";
                header('Refresh:0; url=r.php');
            }
        }else {
            echo "<script> alert('ชื่อผู้ใช้งานนี้ไม่สามารถใช้งานได้ | โปรดเปลี่ยนและลองอีกครั้ง'); </script>";
            header('Refresh:0; url=r.php');
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>สมัครบัญชีผู้ใช้งาน</title>
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
                <h4 class="card-title">สมัครบัญชีผู้ใช้งาน</h4>
                <p class="card-text">สมัครบัญชีผู้ใช้งานเพื่อเข้าสู่ระบบ</p>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="">Your Username</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="กรอกชื่อผู้ใช้งาน"
                            aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="">Your Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="กรอกรหัสผ่าน"
                            aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="">Your Fullname</label>
                        <input type="text" name="fullname" id="" class="form-control" placeholder="กรอกชื่อ-นามสกุล"
                            aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="">Your Mail</label>
                        <input type="email" name="mail" id="" class="form-control" placeholder="กรอกอีเมล"
                            aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn-r" id="" class="form-control btn btn-primary col-3"
                            value="สมัครสมาชิก" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <a href="index.php" class="form-control btn btn-danger col-3">
                            < กลับไปยังหน้าล็อคอิน</a>
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