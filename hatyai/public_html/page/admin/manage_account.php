<?php
if (isAdmin($_SESSION["user_id"])) {
    $sql_account = 'SELECT * FROM account WHERE acc_status != "pending"';
    $res_account = mysqli_query($connect, $sql_account);
    if ($res_account) {
?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fetch_account = mysqli_fetch_assoc($res_account)) {
                ?>
                    <tr>
                        <td scope="row"><?= $fetch_account["user_id"] ?></td>
                        <td><?= $fetch_account["username"] ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-around">
                                <?php
                                if (userInfo($fetch_account["user_id"])["acc_status"] == "accept") {
                                ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="user_id" value="<?= $fetch_account["user_id"] ?>" />
                                        <button type="submit" class="btn btn-danger" name="cancel_account">ระงับการใช้งาน</button>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="user_id" value="<?= $fetch_account["user_id"] ?>" />
                                        <button type="submit" class="btn btn-success" name="accept_account">ยกเลิกระงับการใช้งาน</button>
                                    </form>
                                <?php
                                }
                                ?>
                                <button class="btn btn-primary" onclick="window.location = '?page=edit_info&user_id=<?= $fetch_account["user_id"] ?>'">แก้ไขข้อมูล</button>
                                <button class="btn btn-primary" onclick="window.location = '?page=home&user_id=<?= $fetch_account["user_id"] ?>'">รายการโพสต์</button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
}

if (isset($_POST["cancel_account"])) {
    $sql_cancel_account = 'UPDATE account SET acc_status = "cancel" WHERE user_id = "' . $_POST['user_id'] . '"';
    $res_cancel_account = mysqli_query($connect, $sql_cancel_account);
    if ($res_cancel_account) {
    ?>
        <script>
            window.location = window.location;
        </script>
    <?php
    }
}
if (isset($_POST['accept_account'])) {
    $sql_cancel_account = 'UPDATE account SET acc_status = "accept" WHERE user_id = "' . $_POST['user_id'] . '"';
    $res_cancel_account = mysqli_query($connect, $sql_cancel_account);
    if ($res_cancel_account) {
    ?>
        <script>
            window.location = window.location;
        </script>
<?php
    }
}
