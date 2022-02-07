<?php
include('include/conn.php');
$queryProfile = $conn->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['userId'] . "' ");
$fetchProfile = $queryProfile->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

        <div class="col-sm-3 mt-5">
            <center><img src="image/user/<?= $fetchProfile['image'] ?>" alt="" width="35%"></center>
            <hr>
                <div class="text-center"><h4><?= $fetchProfile['firstname'].' &nbsp; '.$fetchProfile['lastname'] ?></h4></div>
            <hr>
            <div class="list-group">
                    <div class="list-group-item list-group-item-action bg-primary text-center text-white">Menu</div>
                    <a href="user.php" class="list-group-item list-group-item-action">Feed</a>
                    <a href="friend.php" class="list-group-item list-group-item-action">Friend</a>
                    <a href="member.php" class="list-group-item list-group-item-action">Member</a>
                    <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>

                    <?php
                        if($fetchProfile['role'] == 1){?>
                            <a href="admin/index.php" class="list-group-item list-group-item-action list-group-item-warning">Go to Admin Page</a>
                            <?php }
                    ?>

                    <a href="system/logout.php" class="list-group-item list-group-item-action list-group-item-danger" onclick="return confirm('Do you want to Logout ?')">Logout</a>
            </div>
        </div>

</body>

</html>