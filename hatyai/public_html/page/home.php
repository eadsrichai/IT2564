<?php
if (!isset($_SESSION['user_id'])) {
?>
    <script>
        window.location = '?page=login';
    </script>
<?php
} else {
?>
    <br />
    <h4 class="text-left">Feed</h4><br>
    <?php
    if (isset($_GET["user_id"])) {
        $sql_feed = 'SELECT * FROM post WHERE user_id = "' . $_GET["user_id"] . '"';
    } else {
        $sql_feed = 'SELECT post.* FROM (SELECT * FROM account INNER JOIN (SELECT * FROM friendrelation WHERE (user_id_1 = "' . $_SESSION['user_id'] . '" or user_id_2 = "' . $_SESSION['user_id'] . '") and AreFriend = "True") AS friendrelation ON account.user_id = friendrelation.user_id_1 or account.user_id = friendrelation.user_id_2 GROUP BY account.user_id) AS user_list INNER JOIN post ON user_list.user_id = post.user_id';
    }
    $res_feed = mysqli_query($connect, $sql_feed);
    if ($res_feed) {
        while ($fetch_feed = mysqli_fetch_assoc($res_feed)) {
    ?>
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="border d-flex justify-content-right">
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <img src="<?= './asset/img_profile/' . userInfo($fetch_feed["user_id"])["img_profile"] ?>" class="user-avatar" />
                        </div>
                        <div class="col-8">
                            <h6><?= userInfo($fetch_feed["user_id"])["FirstName"] . '&emsp;' . userInfo($fetch_feed["user_id"])["LastName"] ?></h6>
                            <div><?= $fetch_feed["create_time"] ?></div>
                        </div>
                        <?php
                        if ($fetch_feed["user_id"] == $_SESSION["user_id"] || isAdmin($_SESSION['user_id'])) {
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="post_id" value="<?= $fetch_feed["post_id"] ?>" />
                                <button class="float-right btn btn-danger" type="submit" name="remove_post">ลบโพสต์</button>
                            </form>
                            <button class="btn btn-primary" style="margin-bottom: 1rem;" onclick="window.location = '?page=edit_post&post_id=<?= $fetch_feed["post_id"] ?>'">แก้ไข</button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="border col-md-12">
                        <?php
                        if ($fetch_feed["post_text"] != "") {
                        ?>
                            <div><?= $fetch_feed["post_text"] ?></div>
                        <?php
                        }
                        if ($fetch_feed["post_img"] != "") {
                        ?>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <img src="<?= './asset/img_post/' . $fetch_feed["post_img"] ?>" class="img-responsive col-12" style="max-height:480px;" />
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="border">
                        <?php
                        $sql_comment = 'SELECT * FROM comment WHERE post_id = "' . $fetch_feed["post_id"] . '"';
                        $res_comment = mysqli_query($connect, $sql_comment);
                        if ($res_comment) {
                            while ($fetch_comment = mysqli_fetch_assoc($res_comment)) {
                        ?>
                                <div class="d-flex justify-content-right">
                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                        <img src="<?= './asset/img_profile/' . userInfo($fetch_comment["user_id"])["img_profile"] ?>" class="user-avatar" />
                                    </div>
                                    <div class="col-8">
                                        <h6><?= userInfo($fetch_comment["user_id"])["FirstName"] . '&emsp;' . userInfo($fetch_comment["user_id"])["LastName"] ?></h6>
                                        <div><?= $fetch_comment["cm_msg"] ?></div>
                                    </div>
                                    <?php
                                    if ($fetch_comment["user_id"] == $_SESSION["user_id"] || isAdmin($_SESSION['user_id'])) {
                                    ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="comment_id" value="<?= $fetch_comment["cm_id"] ?>" />
                                            <button class="float-right btn btn-danger" type="submit" name="remove_comment">ลบคอมเมนต์</button>
                                        </form>
                                        <button class="btn btn-primary" style="margin-bottom: 1rem;" onclick="window.location = '?page=edit_comment&comment_id=<?= $fetch_comment["cm_id"] ?>'">แก้ไข</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="border col-md-12">
                        <form action="" method="POST">
                            <div class="row">
                                <input type="hidden" name="post_id" value="<?= $fetch_feed["post_id"] ?>" />
                                <input type="text" name="comment" class="form-control col-8" />
                                <button class="col-4 btn btn-success" type="submit" name="submit_comment">คอมเมนต์</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br />
        <?php
        }
    }
}
if (isset($_POST['submit_comment'])) {
    $sql_comment = 'INSERT INTO `comment` (`post_id`, `user_id`, `cm_msg`) VALUES ("' . $_POST['post_id'] . '", "' . $_SESSION['user_id'] . '", "' . $_POST['comment'] . '")';
    $res_comment = mysqli_query($connect, $sql_comment);
    if ($res_comment) {
        ?>
        <script>
            window.location = window.location;
        </script>
    <?php
    }
}

if (isset($_POST['remove_post'])) {
    $sql_delete_post = 'DELETE FROM post WHERE post_id = "' . $_POST['post_id'] . '"';
    $res_delete_post = mysqli_query($connect, $sql_delete_post);
    if ($res_delete_post) {
    ?>
        <script>
            window.location = window.location;
        </script>
<?php
    }
}

if (isset($_POST['remove_comment'])) {
    $sql_delete_post = 'DELETE FROM `comment` WHERE cm_id = "' . $_POST['comment_id'] . '"';
    $res_delete_post = mysqli_query($connect, $sql_delete_post);
    if ($res_delete_post) {
    ?>
        <script>
            window.location = window.location;
        </script>
<?php
    }
}
?>