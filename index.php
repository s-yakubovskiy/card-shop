<?php
if (!isset($_GET['page']) or $_GET['page'] === 'home')
  $page = "app/items/home.php";
elseif ($_GET['page'] === 'about')
  $page = "view/about.html";
elseif ($_GET['page'] === 'sign_in')
  $page = "app/auth/sign_in.php";
elseif ($_GET['page'] === 'sign_up')
  $page = "app/auth/sign_up.php";
elseif ($_GET['page'] === 'cart')
  $page = "app/items/cart.php";
elseif ($_GET['page'] === 'modify')
  $page = 'app/auth/modify.php';
elseif ($_GET['page'] === 'admin_home')
  $page = 'app/admin/admin_home.php';
elseif ($_GET['page'] === 'item')
  $page = 'app/items/item_desc.php';
elseif ($_GET['page'] === 'edit_item')
  $page = 'app/admin/edit_item.php';
elseif ($_GET['page'] === 'orders')
  $page = 'app/items/orders.php';
elseif ($_GET['page'] === 'order_details')
  $page = 'app/items/order_details.php';
elseif ($_GET['page'] === 'control')
  $page = 'app/admin/control.php';
$link = @mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
if (mysqli_connect_errno()) {
    try {
        include("install.php");
    }
    catch (mysqli_sql_exception $ex) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
}

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>42 shop | MTG</title>
</head>
<body>

<div class="header">
  <h1>42 e-shop</h1>
  <p>Best prices for mtg singles.</p>
</div>
<div class='topnav'>
  <ul>
    <li><a href="index.php?page=home"><i class="fa fa-fw fa-home"></i>Home</a></li>
    <li><a href="index.php?page=about"><i class="fa fa-question"></i> About</a></li>
    <li><a href="index.php?page=cart"><i class="fa fa-shopping-cart"></i> My cart
    <?php
    if (isset($_SESSION['cart']))
        echo "  | ", sizeof($_SESSION['cart']) ?></a></li>
    <?php
    if (!isset($_SESSION['logged_in_user']))
        $_SESSION['logged_in_user'] = '';
    if ($_SESSION['logged_in_user'] === '' or !isset($_SESSION['logged_in_user'])) {
      ?><html><li><a href="index.php?page=sign_in"><i class="fa fa-fw fa-user"></i>Sign in</a></li></html><?php
    }
    else {
    ?>
    <li class="dropdown">
      <a href="#" class="dropbtn"><?php echo $_SESSION['logged_in_user']; ?> <i class="fa fa-caret-down"></i></a>
      <div class="dropdown-content">
        <a href="index.php?page=modify"><i class="fa fa-fw fa-user"></i>Modify account</a>
        <a href="index.php?page=orders"><i class="fa fa-cart-arrow-down"></i> Check Orders</a>
        <?php
          if ($_SESSION['logged_in_user_isadmin']) {?>
            <a href="index.php?page=admin_home"><i class="fa fa-cogs"></i> Admin zone</a>
        <?php
        }?>
        <a href="app/auth/sign_out.php"><i class="fa fa-sign-out"></i>Sign out</a>
      </div>
    </li></html><?php
    }?>
  </ul>
</div>
<?php include $page;?>
<div class="footer">
  © fbernier, yharwyn-, 2019
</div>

</body>
</html>

