<?php

    session_start();
    require('connect.php');


    $sql = "SELECT * FROM tb_user";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['btn-p'])) {

    $posttitle = $_POST['posttitle'];
    $postdetail = $_POST['postdetail'];
    $poststatus = $_POST['poststatus'];


    $insert_post = "INSERT INTO tb_post(posttitle,postdetail,poststatus) VALUES('$posttitle','$postdetail','$poststatus')";
    $insert_result = mysqli_query($conn, $insert_post);

    if($insert_result) {
        echo "<script> alert('สามารถใช้งานได้ '); </script>";
        header('Refresh:0; url=home.php');
    }else {
        echo "<script> alert('ไม่สามารถใช้งานได้ | โปรดเปลี่ยนและลองอีกครั้ง'); </script>";
        header('Refresh:0; url=home.php');
    }

    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>หน้าหลัก</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light text-light">
            <a class="navbar-brand" href="#">Nakhon Book</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle=" collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php"> หน้าหลัก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">โปรไฟล์</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">เมนู</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="show_friend.php">เพื่อนของฉัน</a>
                            <a class="dropdown-item" href="accept_friend.php">คำขอเป็นเพื่อน</a>
                            <a class="dropdown-item" href="not_friend.php">คนที่ยังไม่ได้เพิ่มเป็นเพื่อน</a>
                            <a class="dropdown-item" href="an_friend.php">ยกเลิกการเป็นเพื่อน</a>
                            <a class="dropdown-item" href="user_edit.php">แก้ไขข้อมูลส่วนตัว</a>
                            <a class="dropdown-item" href="l.php" name="btn-log">ออกจากระบบ</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="card text-align">
            <div class="card-body">
                <h4 class="card-title">สร้างโพสต์</h4>
                <p class="card-text">คุณกำลังคิดอะไรอยู่</p>

                <form action="" method="post">
                    <h4><?php echo $_POST['username']?></h4>
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="posttitle" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Post Detail</label>
                        <textarea name="postdetail" id="" cols="60" rows="10"></textarea>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="">Post Status</label>
                        <select name="poststatus" id="" class="btn btn-warning col-2">
                            <option value="public">public</option>
                            <option value="friend">friend</option>
                            <option value="me">me</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn-p" id="" class="form-control btn btn-primary col-3"
                            value="Confirm" aria-describedby="helpId">
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
