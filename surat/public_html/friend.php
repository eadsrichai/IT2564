<?php
session_start();
include('include/conn.php');
include('include/head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-6">
                <?php
                if (isset($_SESSION['acceptFriendSuccess'])) {
                    unset($_SESSION['acceptFriendSuccess']);
                ?>
                    <div class="alert alert-success">Accept friend successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['deleteFriendSuccess'])) {
                    unset($_SESSION['deleteFriendSuccess']);
                ?>
                    <div class="alert alert-success">Delete friend successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['ignoreFriendSuccess'])) {
                    unset($_SESSION['ignoreFriendSuccess']);
                ?>
                    <div class="alert alert-success">Ignore friend successfully</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>Friends</h5>
                    </div>
                    <div class="card-body">
                        <div class="scroll_table">
                            <div class="table-responsive">
                                <table class="table table-hover">


                                    <thead>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $findFriend = $conn->query("SELECT * FROM friend WHERE user_id1 = '" . $_SESSION['userId'] . "' AND status = 1");
                                        $i = 1;
                                        while ($result = $findFriend->fetch_assoc()) {
                                            $findUser = $conn->query("SELECT * FROM user WHERE user_id = '" . $result['user_id2'] . "'");
                                            $fetchUser = $findUser->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><img src="image/user/<?= $fetchUser['image'] ?>" width="30px" alt=""></td>
                                                <td><?= $fetchUser['firstname'] ?></td>
                                                <td><?= $fetchUser['lastname'] ?></td>
                                                <td>
                                                    <form action="system/friend.php" method="post">
                                                        <input type="text" name="userId2" value="<?= $result['user_id2'] ?>" hidden>
                                                        <button name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this friend ?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header bg-danger text-center text-white">
                        <h5>Request List</h5>
                    </div>
                    <div class="card-body">
                        <div class="scroll_table">
                            <div class="table-responsive">


                                <table class="table table-hover">


                                    <thead>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $findFriend = $conn->query("SELECT * FROM friend WHERE user_id2 = '" . $_SESSION['userId'] . "' AND status = 0");
                                        $i = 1;
                                        while ($result = $findFriend->fetch_assoc()) {
                                            $findUser = $conn->query("SELECT * FROM user WHERE user_id = '" . $result['user_id1'] . "'");
                                            $fetchUser = $findUser->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><img src="image/user/<?= $fetchUser['image'] ?>" width="30px" alt=""></td>
                                                <td><?= $fetchUser['firstname'] .  $fetchUser['lastname'] ?></td>
                                                <td>
                                                    <form action="system/friend.php" method="post">
                                                        <input type="text" name="userId1" value="<?= $result['user_id1'] ?>" hidden>
                                                        <input type="text" name="friendId" value="<?= $result['friend_id'] ?>" hidden>
                                                        <div class="form-group">
                                                            <button name="accept" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to accept this friend ?')">Accept</button>
                                                        </div>
                                                        <div class="form-group">
                                                            <button name="ignore" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this friend ?')">Ignore</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>