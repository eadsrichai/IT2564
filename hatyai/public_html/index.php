<?php
include './system/connect.php';

if (!isset($_GET["page"])) {
    $_GET["page"] = "home";
}
if (!$_GET) {
    $_GET["page"] = "home";
}
if (!$_GET["page"]) {
    $_GET["home"] = "home";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.css" />
    <script src="./asset/js/jquery-3.6.0.min.js"></script>
    <script src="./asset/js/bootstrap.js"></script>
    <style>
        .user-avatar {
            width: 32px;
            height: 32px;
        }

        .dropdown-right-fix {
            right: 0;
            left: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="">SocialSystem</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=home">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=create_post">สร้างโพสต์</a>
                </li>

            </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= isset($_SESSION['user_id']) ? $_SESSION['username'] : 'ผู้ใช้' ?></a>
                <div class="dropdown-menu dropdown-right-fix" aria-labelledby="dropdownId">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                    ?>
                        <a class="dropdown-item" href="?page=edit_info">แก้ไขข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="?page=friend">เพื่อน</a>
                        <a class="dropdown-item" href="?page=logout">ออกจากระบบ</a>
                    <?php
                    } else {
                    ?>
                        <a class="dropdown-item" href="?page=login">เข้าสู่ระบบ</a>
                        <a class="dropdown-item" href="?page=register">สมัครสมาชิก</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if (isAdmin($_SESSION['user_id'])) {
            ?>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการระบบ</a>
                    <div class="dropdown-menu dropdown-right-fix" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="?page=admin&admin_page=accept_account">อนุมัติบัญชี</a>
                        <a class="dropdown-item" href="?page=admin&admin_page=manage_account">จัดการบัญชี</a>
                        <a class="dropdown-item" href="?page=admin&admin_page=report_system">รายงานระบบ</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
    <br />
    <?php
    if ($_GET["page"] == "home" || $_GET["page"] == "search") {
    ?>
        <div class="col-md-3 row m-1">
            <input type="text" name="search" id="search_user" class="form-control col-9" />
            <button class="col-3 btn btn-success" onclick="window.location = '?page=search&search=' + $('#search_user').val()">ค้นหา</button>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <?php
        if ($_GET["page"] == "home") {
            include './page/home.php';
        } else if ($_GET["page"] == "login") {
            include './page/login.php';
        } else if ($_GET["page"] == "register") {
            include './page/register.php';
        } else if ($_GET["page"] == "logout") {
            include './page/logout.php';
        } else if ($_GET["page"] == "create_post") {
            include './page/create_post.php';
        } else if ($_GET["page"] == "friend") {
            include './page/friend.php';
        } else if ($_GET["page"] == "edit_info") {
            include './page/edit_info.php';
        } else if ($_GET["page"] == "admin") {
            include './page/admin.php';
        } else if ($_GET["page"] == "search") {
            include './page/search.php';
        } else if ($_GET["page"] == "edit_post") {
            include './page/edit_post.php';
        } else if ($_GET["page"] == "edit_comment") {
            include './page/edit_comment.php';
        }
        ?>
    </div>
</body>

</html>
<?php
if (isset($_POST['action_friend'])) {
    if ($_POST['action_friend'] == 'delete_friend') {
        $sql_delete_friend = 'DELETE FROM friendrelation WHERE (user_id_1 = "' . $_SESSION['user_id'] . '" AND user_id_2 = "' . $_POST['user_id'] . '") OR (user_id_1 = "' . $_POST['user_id'] . '" AND user_id_2 = "' . $_SESSION['user_id'] . '") AND AreFriend = "True"';
        $res_delete_friend = mysqli_query($connect, $sql_delete_friend);
        if ($res_delete_friend) {
            ?>
            <script>
                window.location = window.location;
            </script>
            <?php
        }
    } else if ($_POST['action_friend'] == 'cancel_request') {
        $sql_delete_friend = 'DELETE FROM friendrelation WHERE (user_id_1 = "' . $_SESSION['user_id'] . '" AND user_id_2 = "' . $_POST['user_id'] . '") AND AreFriend = "False"';
        $res_delete_friend = mysqli_query($connect, $sql_delete_friend);
        if ($res_delete_friend) {
            ?>
            <script>
                window.location = window.location;
            </script>
            <?php
        }
    } else if ($_POST['action_friend'] == 'accept_friend') {
        $sql_accept_friend = 'UPDATE friendrelation SET AreFriend = "True" WHERE user_id_1 = "' . $_POST['user_id'] . '" AND user_id_2 = "' . $_SESSION['user_id'] . '"';
        $res_accept_friend = mysqli_query($connect, $sql_accept_friend);
        if ($res_accept_friend) {
            ?>
            <script>
                window.location = window.location;
            </script>
            <?php
        }
    } else if ($_POST['action_friend'] == 'add_friend') {
        $sql_add_friend = 'INSERT INTO friendrelation (`user_id_1`, `user_id_2`) VALUES ("' . $_SESSION['user_id'] . '", "' . $_POST['user_id'] . '")';
        $res_add_friend = mysqli_query($connect, $sql_add_friend);
        if ($res_add_friend) {
            ?>
            <script>
                window.location = window.location;
            </script>
            <?php
        }
    }
}
?>