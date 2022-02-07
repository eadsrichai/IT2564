<?php
if (isAdmin($_SESSION["user_id"])) {
    $sql_account_pending = 'SELECT * FROM account WHERE acc_status = "pending"';
    $res_account_pending = mysqli_query($connect, $sql_account_pending);
    if ($res_account_pending) {
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
                while ($fetch_account_pending = mysqli_fetch_assoc($res_account_pending)) {
                ?>
                    <tr>
                        <td scope="row"><?= $fetch_account_pending["user_id"] ?></td>
                        <td><?= $fetch_account_pending["username"] ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="user_id" value="<?= $fetch_account_pending["user_id"] ?>" />
                                <button type="submit" class="float-right btn btn-success" name="accept_account">อนุมัติ</button>
                            </form>
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

if (isset($_POST['accept_account'])) {
    $sql_insert_friend = 'INSERT INTO friendrelation (user_id_1, user_id_2, AreFriend) VALUES ("' . $_POST['user_id'] . '", "' . $_POST['user_id'] . '", "True")';
    $res_insert_friend = mysqli_query($connect, $sql_insert_friend);
    $sql_accept_account = 'UPDATE account SET acc_status = "accept" WHERE user_id = "' . $_POST['user_id'] . '"';
    $res_accept_account = mysqli_query($connect, $sql_accept_account);
    if ($res_accept_account) {
        ?>
        <script>
            window.location = window.location;
        </script>
        <?php
    }
}