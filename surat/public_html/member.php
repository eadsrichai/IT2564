<?php
include('include/head.php');
include('include/conn.php');
session_start();

$search = null;

if (isset($_POST['search'])) {
    $search = $_POST['find'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Member</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['addFriendSuccess'])) {
                    unset($_SESSION['addFriendSuccess']);
                ?>
                    <div class="alert alert-success">Add friend successfully</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>All member</h5>
                    </div>
                    <div class="card-body">

                        <div class="text-center">
                            <form action="member.php" method="post">
                                <input type="text" name="find" value="<?= $search ?>" class="form-control col-sm-3 mb-2" placeholder="Search Here">
                                <button type="submit" name="search" value="<?= $search ?>" hidden>
                            </form>
                        </div>

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
                                        $findUser = $conn->query("SELECT * FROM user WHERE status = 1 AND firstname LIKE '%" . $search . "%' ");
                                        $i = 1;
                                        while ($resultUser = $findUser->fetch_assoc()) {
                                            $findFriend = $conn->query("SELECT * FROM friend WHERE user_id1 = '" . $_SESSION['userId'] . "' AND user_id2 = '" . $resultUser['user_id'] . "'");
                                            $fetchFriend = $findFriend->fetch_assoc();
                                        ?>
                                            <form action="system/friend.php" method="post">
                                                <input type="text" name="userId" value="<?= $resultUser['user_id'] ?>" hidden>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><img src="image/user/<?= $resultUser['image'] ?>" width="30px" alt=""></td>
                                                    <td><?= $resultUser['firstname'] ?></td>
                                                    <td><?= $resultUser['lastname'] ?></td>
                                                    <?php

                                                    if ($fetchFriend && $fetchFriend['status'] == 0 && $fetchFriend['user_id1'] == $_SESSION['userId'] && $fetchFriend['user_id2'] == $resultUser['user_id']) { ?>
                                                        <td>
                                                            <input type="text" name="friendId" value="<?= $fetchFriend['friend_id'] ?>" hidden>
                                                            <button class="btn btn-danger btn-sm" name="cancel">Cancel</button>
                                                        </td>
                                                    <?php
                                                    } else
                                            if ($fetchFriend && $fetchFriend['status'] == 1  && $fetchFriend['user_id1'] == $_SESSION['userId']) { ?>
                                                        <td></td>
                                                    <?php
                                                    }
                                                    if (!$fetchFriend && $resultUser['user_id'] != $_SESSION['userId']) { ?>
                                                        <td>
                                                            <button class="btn btn-danger btn-sm" name="addFriend">Add Friend</button>
                                                        </td>
                                                    <?php
                                                    } else
                                            if ($resultUser['user_id'] == $_SESSION['userId']) { ?>
                                                        <td></td>
                                                    <?php
                                                    }
                                                    ?>

                                                </tr>
                                            </form>
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