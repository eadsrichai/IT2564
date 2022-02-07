<?php

include('include/conn.php');
include('include/head.php');
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
    <title>Manage User</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['deleteUserSuccess'])) {
                    unset($_SESSION['deleteUserSuccess']);
                ?>
                    <div class="alert alert-success">Delete user account successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['updateUserSuccess'])) {
                    unset($_SESSION['updateUserSuccess']);
                ?>
                    <div class="alert alert-success">Update user account successfully</div>
                <?php
                }
                ?>
                <?php
                if (!isset($_GET['userId'])) { ?>

                    <div class="card">
                        <div class="card-header bg-primary text-center text-white">
                            <h5>
                                Manage user
                            </h5>

                        </div>
                        <div class="card-body">

                            <div class="text-center">
                                <form action="manage-user.php" method="post">
                                    <input type="text" name="find" value="<?= $search ?>" class="form-control col-sm-3 mb-2" placeholder="Search Here">
                                    <button type="submit" name="search" value="<?= $search ?>" hidden>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <div class="scroll_table">

                                    <table class="table table-hover ">
                                        <thead>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $findUser = $conn->query("SELECT * FROM user WHERE status = 1 AND firstname LIKE '%".$search."%' ");
                                            $i = 1;
                                            while ($result = $findUser->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><img src="../image/user/<?= $result['image'] ?>" width="30px" alt=""></td>
                                                    <td><?= $result['username'] ?></td>
                                                    <td><?= $result['firstname'] ?></td>
                                                    <td><?= $result['lastname'] ?></td>
                                                    <td><?php echo $result['role'] ? 'admin' : 'user'; ?></td>
                                                    <td>
                                                        <a href="manage-user.php?userId=<?= $result['user_id'] ?>" class="btn btn-secondary btn-sm">See Profile</a>
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
                <?php
                }
                ?>
                <?php
                if (isset($_GET['userId'])) {
                    $userId = $_GET['userId'];
                    $findUserById = $conn->query("SELECT * FROM user WHERE user_id = '" . $userId . "'");
                    $fetchUser = $findUserById->fetch_assoc();
                ?>
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-center text-white"><b><?= $fetchUser['firstname'] ?></b>&nbsp;Profile</div>
                        <div class="card-body">
                            <form action="../system/updateUser.php" method="post" enctype="multipart/form-data">
                                <div class="text-center">
                                    <img src="../image/user/<?= $fetchUser['image'] ?>" width="15%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="" name="upload" class="">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?= $fetchUser['username'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?= $fetchUser['password'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="firstname" name="firstname" value="<?= $fetchUser['firstname'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="lastname" name="lastname" value="<?= $fetchUser['lastname'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <?php
                                        if ($fetchUser['role'] == 0) { ?>
                                            <option value=0 selected>User</option>
                                            <option value=1>Admin</option>
                                        <?php }
                                        if ($fetchUser['role'] == 1) { ?>
                                            <option value=0>User</option>
                                            <option value=1 selected>Admin</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="text" name="userId" value="<?= $fetchUser['user_id'] ?>" hidden>
                                <a class="btn btn-dark" href="manage-user.php">Back</a>
                                <button class="btn btn-danger" name="deleteUser" onclick="return confirm('Are you sure to delete this account ?')">Delete</button>
                                <button class="btn btn-primary" name="updateUser" onclick="return confirm('Are you sure to update this account ?')">Update</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>