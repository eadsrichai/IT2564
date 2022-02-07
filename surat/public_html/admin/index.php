<?php

include('include/conn.php');
include('include/head.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept user</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['acceptSuccess'])) {
                    unset($_SESSION['acceptSuccess']);
                ?>
                    <div class="alert alert-success">Accept user successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['ignoreSuccess'])) {
                    unset($_SESSION['ignoreSuccess']);
                ?>
                    <div class="alert alert-success">Ignore user successfully</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>
                            Accept user
                        </h5>
                    </div>
                    <div class="card-body">
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
                                        $findUser = $conn->query("SELECT * FROM user WHERE status = 0");
                                        $i = 1;
                                        while ($result = $findUser->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><img src="../image/user/<?= $result['image'] ?>" width="30px" alt=""></td>
                                                <td><?= $result['username'] ?></td>
                                                <td><?= $result['firstname'] ?></td>
                                                <td><?= $result['lastname'] ?></td>
                                                <form action="../system/acceptUser.php" method="post">
                                                    <input type="text" value="<?= $result['user_id'] ?>" name="userId" hidden>
                                                    <td>
                                                        <select class="form-control col-sm-6" name="role" id="">
                                                            <option value=0>User</option>
                                                            <option value=1>Admin</option>
                                                        </select>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" name="acceptUser" onclick="return confirm('Are you sure to accept this account ?')">Accept</button>
                                                        <button class="btn btn-danger btn-sm" name="ignoreUser" onclick="return confirm('Are you sure to ignore this account ?')">Ignore</button>
                                                    </td>
                                                </form>
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