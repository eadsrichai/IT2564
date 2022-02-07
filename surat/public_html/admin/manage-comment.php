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
    <title>Manage Comment</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['deleteCommentSuccess'])) {
                    unset($_SESSION['deleteCommentSuccess']);
                ?>
                    <div class="alert alert-success">Delete comment successfully</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>
                            Manage comment
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="scroll_table">

                                <table class="table table-hover ">
                                    <thead>
                                        <th>#</th>
                                        <th>Comment Detail</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $findComment = $conn->query("SELECT * FROM comment ORDER BY comment_id DESC");
                                        $i = 1;
                                        while ($result = $findComment->fetch_assoc()) {
                                            $findUser = $conn->query("SELECT * FROM user WHERE user_id = '" . $result['user_id'] . "'");
                                            $resultUser = $findUser->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $result['detail'] ?></td>
                                                <td><?= $resultUser['firstname'] ?></td>
                                                <td><?= $resultUser['lastname'] ?></td>
                                                <td><?= $result['date'] ?></td>
                                                <td>
                                                    <form action="../system/deleteComment.php" method="post">
                                                        <input type="text" value="<?= $result['comment_id'] ?>" name="commentId" hidden>
                                                        <button class="btn btn-danger btn-sm" name="deleteComment" onclick="return confirm('Are you sure to delete this comment ?')">Delete</button>
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