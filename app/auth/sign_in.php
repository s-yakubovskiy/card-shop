<?php
if (!isset($_POST['submit']))
    $_POST['submit'] = '';
if ($_POST['submit'] !== 'Submit') {
    ?>
    <html>
    <div class="leftcolumn" id="form">
    <div class="card">
    <h2>Sign in</h2>
    <div class="form">
      <form method="post" action="">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Your login...">
        <label for="passwd">Password</label>
        <input type="password" id="passwd" name="passwd" placeholder="Your password...">
        <input type="submit" name="submit" value="Submit">
      </form>
      <a href="index.php?page=sign_up">Don't have account? Sign up!</a>
    </div>
    </div>
    </div>
    </html>
    <?php
    exit();
}

if (!$_POST['login'] || !$_POST['passwd']) {
?>
    <html>
        <div class="card">
            <p>Error: All field are nessesery</p>
            <a href="index.php?page=sign_in">Go back</a>
        </div>
    </html>
    <?php
    exit();
}
$link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
    if (mysqli_connect_errno()) {
        echo "Connect failed: %s\n", mysqli_connect_error();
        exit();
    }
$passwd = hash('whirlpool', $_POST['passwd']);
$login = mysqli_real_escape_string($link, $_POST['login']);
if ($result = mysqli_query($link, "SELECT user_id, user_name, passwd, isadmin FROM users WHERE isactive=1")) {
    while ($user = mysqli_fetch_assoc($result)) {
        if ($user['user_name'] === $login and $user['passwd'] === $passwd) {
            $_SESSION['logged_in_user'] = $user['user_name'];
            $_SESSION['logged_in_user_id'] = $user['user_id'];
            $_SESSION['logged_in_user_isadmin'] = $user['isadmin'];
            header("Location: ./index.php");
            mysqli_close($link);
            exit();
        }
    }
}
?>
<html>
    <div class="card">
        <p>Error: No such user and password combination</p>
        <a href="index.php?page=sign_in">Try again</a>
    </div>
</html>
<?php
mysqli_close($link);
?>
