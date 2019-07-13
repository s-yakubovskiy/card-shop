<?php
if (!isset($_POST['submit']))
    $_POST['submit'] = '';
if ($_POST['submit'] !== 'Submit') {
    ?>
    <html>
    <div class="leftcolumn" id="form">
    <div class="card">
    <h2>Sign up</h2>
    <div class="form">
      <form method="post" action="">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Your login...">
        <label for="passwd1">Password (minimum 6 characters)</label>
        <input type="password" id="passwd1" name="passwd1" placeholder="Your password...">
        <label for="passwd2">Repeat password</label>
        <input type="password" id="passwd2" name="passwd2" placeholder="Repeat password...">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail...">
        <input type="submit" name="submit" value="Submit">
      </form>
      <a href="index.php?page=sign_in">Have account? Sign in!</a>
    </div>
    </div>
    </div>
    </html>
    <?php
    exit();
}

if (!$_POST['login'] or !$_POST['passwd1'] or !$_POST['passwd2'] or !$_POST['email']) {
    ?>
    <html>
        <div class="card">
            <p>Error: All field are nessesery</p>
            <a href="index.php?page=sign_up">Go back</a>
        </div>
    </html>
    <?php
    exit();
}
if ($_POST['passwd1'] !== $_POST['passwd2']) {
    ?>
    <html>
        <div class="card">
            <p>Error: Passwords have to be idential</p>
            <a href="index.php?page=sign_up">Go back</a>
        </div>
    </html>
    <?php
    exit();
}

$login = $_POST['login'];
$passwd = $_POST['passwd1'];
$email = $_POST['email'];

if (strlen($passwd) < 6) {
?>
    <html>
        <div class="card">
            <p>Error: Password has to be mininimum 6 characters</p>
            <a href="index.php?page=sign_up">Go back</a>
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
if ($result = mysqli_query($link, "SELECT user_name, passwd, email FROM users WHERE isactive=1")) {
    while ($user = mysqli_fetch_assoc($result)) {
        if ($user['user_name'] === $login) {
            ?>
            <html>
                <div class="card">
                    <p>Error: Login is already in use</p>
                    <a href="index.php?page=sign_up">Go back</a>
                </div>
            </html>
            <?php
            mysqli_close($link);
            exit();
        }
        if ($user['email'] === $_POST['email']) {
            ?>
            <html>
                <div class="card">
                    <p>Error: Email is already in use</p>
                    <a href="index.php?page=sign_up">Go back</a>
                </div>
            </html>
            <?php
            mysqli_close($link);            
            exit();
        }
    }
    mysqli_free_result($result);
}
$passwd = hash('whirlpool', $passwd);
$login = mysqli_real_escape_string($link, $login);
$email = mysqli_real_escape_string($link, $email);
if ($result = mysqli_query($link, "INSERT INTO users (user_name, passwd, email) VALUES ('$login', '$passwd', '$email')")) {
    ?>
    <html>
        <div class="card">
            <p>User successfuly created. Now you can sign in!</p>
            <a href="index.php?page=sign_in">Sign in</a>
        </div>
    </html>
    <?php
}
mysqli_close($link);
?>
