<?php
//session_start();
if (!isset($_SESSION['logged_in_user']) or $_SESSION['logged_in_user'] === '') {
    header("Location: ../../index.php");
    exit();
}
if (!isset($_POST['submit']))
    $_POST['submit'] = '';
if ($_POST['submit'] !== 'Submit' ) {
    ?>
    <html>
    <div class="leftcolumn" id="form">
    <div class="card">
    <h2>Modify account</h2>
    <div class="form">
      <form method="post" action="">
        <label for="passwd1">New password (minimum 6 characters)</label>
        <input type="password" id="passwd1" name="new_passwd1" placeholder="Your password...">
        <label for="passwd2">Repeat password</label>
        <input type="password" id="passwd2" name="new_passwd2" placeholder="Repeat password...">
        <label for="email">New e-mail</label>
        <input type="email" id="email" name="new_email" placeholder="Your e-mail...">
        <input type="submit" name="submit" value="Submit">
      <?php if ($_SESSION['logged_in_user'] !== "root") {?>
      </form>
              <!-- Trigger/Open The Modal -->
        <button class="del_btn" id="myBtn">Delete account</button>
        <?php }?>
        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Are you sure?</h2>
            </div>
            <div class="modal-body">
              <p>Deleting your account will be permanent!</p>
              <a href="app/auth/delete.php"><button class="del_btn">Yes, delete my account!</button></a>
            </div>
            </div>

        </div>

        <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal @onclick
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
    </div>
    </div>
    </div>
    </html>
    <?php
    exit();
}
if ($_POST['new_passwd1'] !== $_POST['new_passwd2']) {
  ?>
  <html>
      <div class="card">
          <p>Error: Passwords have to be idential</p>
          <a href="index.php?page=modify">Go back</a>
      </div>
  </html>
  <?php
  exit();
}

if ($_POST['new_passwd1'] !== '' and isset($_POST['new_passwd1']) and strlen($_POST['new_passwd1']) < 6) {
    ?>
    <html>
        <div class="card">
            <p>Error: Password has to be mininimum 6 characters</p>
            <a href="index.php?page=modify">Go back</a>
        </div>
    </html>
    <?php
    exit();
}

$new_passwd = $_POST['new_passwd1'];
$new_email = $_POST['new_email'];
if (($new_passwd === '' or !isset($new_passwd)) and ($new_email === '' or !isset($new_email)))  {
  ?>
  <html>
    <div class="card">
        <p>Error: Require new password and/or email to modify</p>
        <a href="index.php?page=modify">Go back</a>
    </div>
  </html>
  <?php
  exit();
}
$userid_to_modify = $_SESSION['logged_in_user_id'];
$email_changed = false;
$passwd_changed = false;
if ($new_email !== '' and isset($new_email)) {
  $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
      if (mysqli_connect_errno()) {
          echo "Connect failed: %s\n", mysqli_connect_error();
          exit();
      }
  if ($result = mysqli_query($link, "SELECT email FROM users WHERE isactive=1")) {
    while ($user = mysqli_fetch_assoc($result)) {
      if ($user['email'] === $new_email) {
            ?>
            <html>
                <div class="card">
                    <p>Error: E-mail is already in use</p>
                    <a href="index.php?page=modify">Go back</a>
                </div>
            </html>
            <?php
            exit();
      }
    }
  }
  $new_email = mysqli_real_escape_string($link, $new_email);
  if ($result = mysqli_query($link, "UPDATE users SET email='$new_email' where user_id=$userid_to_modify"))
    $email_changed = true;
}
if ($new_passwd !== '' and isset($new_passwd)) {
    $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
        if (mysqli_connect_errno()) {
            echo "Connect failed: %s\n", mysqli_connect_error();
            exit();
        }
    $new_passwd = hash('whirlpool', $new_passwd);
    if ($result = mysqli_query($link, "UPDATE users SET passwd='$new_passwd' where user_id=$userid_to_modify"))
      $passwd_changed = true;
}
mysqli_close($link);
if ($passwd_changed and $email_changed)
  $res = "Your e-mail and password were succefuly modified";
elseif ($passwd_changed)
  $res = "Your password was succefuly modified";
else
  $res = "Your e-mail was succefuly modified";
?>
<html>
    <div class="card">
        <p><?php echo $res; ?></p>
        <a href="index.php">Return to home page</a>
    </div>
</html>
