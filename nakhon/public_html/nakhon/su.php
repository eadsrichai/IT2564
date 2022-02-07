<?php

    session_start();
    require('connect.php');

    $sql = "SELECT * FROM tb_user";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">

<head>
    <title>ผู้ใช้งานในระบบ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Nakhon book</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle=" collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="a.php"> หน้าหลัก <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">เมนู ผู้ดูแลระบบ</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="su.php">ผู้ใช้งานในระบบ</a>
                            <a class="dropdown-item" href="sp.php">โพสต์ในระบบ</a>
                            <a class="dropdown-item" href="delete_post">ลบโพสต์</a>
                            <a class="dropdown-item" href="delete_user.php">ยกเลิกการใช้งาน</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>



    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">ผู้ใช้งานในระบบ</h4>
            <p class="card-text">รายงานผู้ใช้งานในระบบ</p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">username</th>
                        <th scope="col">password</th>
                        <th scope="col">fullname</th>
                        <th scope="col">mail</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($result)) {?>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo $row['userid'] ?></td>
                        <td scope="row"><?php echo $row['username'] ?></td>
                        <td scope="row"><?php echo $row['password'] ?></td>
                        <td scope="row"><?php echo $row['fullname'] ?></td>
                        <td scope="row"><?php echo $row['mail'] ?></td>
                        <td scope="row"><?php echo $row['level'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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