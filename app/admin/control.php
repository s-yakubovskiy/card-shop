<?php
if (isset($_POST['role']) or isset($_POST['delete'])) {
    $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
    if (mysqli_connect_errno()) {
        echo "Connect failed: %s\n", mysqli_connect_error();
        exit();
    }
    if (isset($_POST['role'])) {
        $id = mysqli_real_escape_string($link, $_POST['role']);
        $query1 = "SELECT isadmin FROM users WHERE user_name = '$id'";
        $res = mysqli_query($link, $query1);
        $order = mysqli_fetch_assoc($res);
        if ($order['isadmin'] == 1 and $id !== "root")
            $val = 0;
        else
            $val = 1;
        $query = "UPDATE users SET isadmin = $val WHERE user_name = '$id'";
        mysqli_query($link, $query);
    }
    else if (isset($_POST['delete'])) {
        $id = mysqli_real_escape_string($link, $_POST['delete']);
        $query = "UPDATE users SET isactive=0 where user_name='$id'";
        if ($result = mysqli_query($link, $query)) {
            mysqli_close($link);
            if ($_SESSION['logged_in_user'] === $id) {
                $_SESSION['logged_in_user'] = '';
                $_SESSION['logged_in_user_id'] = '';
                header("Location: ../../index.php");
                exit();
            }
        }

    }
}
?>

<html>
    <div class="card" id="user-config">
        <h3>User management</h3>
        <table class="items">
            <tr>
                <th>Login</th>
                <th>Role</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        <?php
        $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
        if (mysqli_connect_errno()) {
            echo "Connect failed: %s\n", mysqli_connect_error();
            exit();
        }
        if ($result = mysqli_query($link, "SELECT user_name, isactive, isadmin FROM users")) {
            while ($user = mysqli_fetch_assoc($result)) {
                $users[] = $user;
            }
            if (isset($users) && sizeof($users)) {
                foreach ($users as $i) {
                    $isadmin = $i['isadmin'];
                    $user = $i['user_name'];
                    $isactive = $i['isactive'];
                    if ($isactive == 1) {
                    ?>
                    <tr>
                        <td><?php echo $user ?></td>
                        <td><?php echo $isadmin; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="role" value="<?php echo $user ?>">
                                <input id="change_role" type="submit"  value="change role">
                            </form>
                        </td>
                        <?php
                         if ($user !== 'root')
                         {
                         ?><td>
                            <form method="POST" action="">
                                <input type="hidden" name="delete" value="<?php echo $user ?>">
                                <input id="clr-basket" type="submit"  value="delete user">
                            </form>
                        </td>
                        <?php }?>
                    </tr>
                    <?php
                    }
                }
            }
        }
?>
        </table>
    </div>
</html>


