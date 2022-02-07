<?php
if (isset($_GET['search'])) {
    $sql_search_user = 'SELECT * FROM account WHERE FirstName LIKE "%' . $_GET['search'] . '%" OR LastName LIKE "%' . $_GET['search'] . '%"';
    $res_search_user = mysqli_query($connect, $sql_search_user);
    if ($res_search_user) {
        if (mysqli_num_rows($res_search_user) != 0) {
            while ($fetch_search_user = mysqli_fetch_assoc($res_search_user)) {
?>
                <div class="border row p-1">
                    <div class="col-3">
                        <img src="" style="max-width: 110px;" />
                    </div>
                    <div class="col-6">
                        <div class="text-strong"><?php echo $fetch_search_user["FirstName"] . '&emsp;' . $fetch_search_user["LastName"]; ?></div>
                    </div>
                    <div class="col-3">
                        <?php
                        $sql_check_friend = 'SELECT * FROM friendrelation WHERE (user_id_1 = "' . $_SESSION['user_id'] . '" AND user_id_2 = "' . $fetch_search_user["user_id"] . '") OR (user_id_1 = "' . $fetch_search_user["user_id"] . '" AND user_id_2 = "' . $_SESSION['user_id'] . '")';
                        $res_check_friend = mysqli_query($connect, $sql_check_friend);
                        if ($res_check_friend) {
                            $fetch_check_friend = mysqli_fetch_assoc($res_check_friend);
                            if (mysqli_num_rows($res_check_friend) == 1) {
                                if ($fetch_check_friend["user_id_1"] == $_SESSION['user_id'] && $fetch_check_friend["user_id_2"] == $_SESSION['user_id']) {
                                } else {
                                    if ($fetch_check_friend["Arefriend"] == "true") {
                        ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $fetch_search_user["user_id"] ?>" />
                                            <button class="float-right btn btn-danger" type="submit" name="action_friend" value="delete_friend">ลบเพื่อน</button>
                                        </form>
                                        <?php
                                    } else if ($fetch_check_friend["Arefriend"] == "false") {
                                        if ($fetch_check_friend["user_id_1"] == $_SESSION['user_id']) {
                                        ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="user_id" value="<?= $fetch_search_user["user_id"] ?>" />
                                                <button class="float-right btn btn-warning" type="submit" name="action_friend" value="cancel_request">ยกเลิก</button>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="user_id" value="<?= $fetch_search_user["user_id"] ?>" />
                                                <button class="float-right btn btn-success" type="submit" name="action_friend" value="accept_friend">รับเพื่อน</button>
                                            </form>
                                <?php
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $fetch_search_user["user_id"] ?>" />
                                    <button class="float-right btn btn-primary" type="submit" name="action_friend" value="add_friend">เพิ่มเพื่อน</button>
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-warning" role="alert">
                ไม่พบ
            </div>
<?php
        }
    }
}
