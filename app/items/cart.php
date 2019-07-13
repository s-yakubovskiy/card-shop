<?php 
function comp_name($a, $b) {
  return strnatcmp($a['item_name'], $b['item_name']);
}

if (isset($_POST['submit']) && $_POST['submit'] === 'Remove') {
    unset($_SESSION['cart'][$_POST['remove_id']]);
    header("Refresh:0");
}
if (isset($_POST['submit']) && $_POST['submit'] === 'Confirm order') {
    if (!isset($_SESSION['logged_in_user']) or $_SESSION['logged_in_user'] === '') {
        ?>
        <html>
            <div class="card">
                <p>Error: for order conformation you have to <a href="?page=sign_in">sign in!</a></p>
                <a href="index.php?page=cart">Go back</a>
            </div>
        </html>
        <?php
        exit();
    }
    if (!isset($_SESSION['cart']) or !sizeof($_SESSION['cart'])) {
        ?>
        <html>
            <div class="card">
                <p>Error: your cart is empty!</p>
                <a href="index.php?page=cart">Go back</a>
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
    $user_id = $_SESSION['logged_in_user_id'];
    mysqli_query($link, "INSERT INTO orders (user_id) VALUES ($user_id)");
    foreach($_SESSION['cart'] as $item_id => $quantity) {
      mysqli_query($link, "INSERT INTO order_items (order_id, item_id, quantity) VALUES (LAST_INSERT_ID(), $item_id, $quantity)");
    }
    unset($_SESSION['cart']);
    ?>
     <html>
            <div class="card">
                <p>Thanks for your order!</p>
            </div>
        </html>
        <?php
    header("Refresh:2");
}
?>

<?php
if (isset($_POST['submit']) && $_POST['submit'] === 'Clear basket') {
    unset($_SESSION['cart']);
    ?>
     <html>
            <div class="card">
                <p>The basket was cleared</p>
            </div>
        </html>
        <?php
    header("Refresh:2");
}
?>

<html>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <?php
      $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
      if (mysqli_connect_errno()) {
            echo "Connect failed: %s\n", mysqli_connect_error();
            exit();
        }
      $query = "SELECT item_id, item_name, price, img FROM items";
      if ($result = mysqli_query($link, $query)) {
          while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
          }
      }
      if (isset($items))
      {
            foreach ($items as $item) {
              if (isset($_SESSION['cart'][$item['item_id']])) {
                  $item['quantity'] = $_SESSION['cart'][$item['item_id']];
                  $new_items[] = $item;
              }
            }
      }
      if (isset($new_items) && $new_items) {
      ?>
      <table class="cart">
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th></th>
        </tr>
        <?php
          $total_price = 0;
          $total_items = 0;
          usort($new_items, 'comp_name');
          foreach ($new_items as $item) {
            $id = $item['item_id'];
            $img = $item['img'];
            ?><tr>
              <td id="item_col"><a href="index.php?page=item&id=<?php echo $id;?>"><?php echo $item['item_name']; ?><div .img_hov><img src='<?php echo $img?>' /></div></a></td>
              <td id="item_col"><?php echo $item['price']; ?>$</td>
              <td id="item_col"><?php echo $item['quantity']; ?></td>
              <td id="item_col"><?php echo $item['quantity'] * $item['price']; ?>$</td>
              <td id="butn_col">
                <form method="post" action="">
                    <input id="remove_id" type="number" name="remove_id" value="<?php echo $item['item_id']?>">
                    <input id="remove_btn" type="submit" name="submit" value="Remove">
                </form>
              </td>
              </html><?php
              $total_price += $item['quantity'] * $item['price'];
              $total_items += $item['quantity'];
          }
              ?>
      </table><?php
        }
      else {
        ?><html><p>Your cart is empty. Add some cards <a href="index.php?page=home">here.</a></p></html><?php
      }
      ?>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <p><b>Total price: </b><?php
      if (isset($total_price))
        echo (float)$total_price;
      else
          echo "0.00 "?>$</p>
      <p><b>Total cards: </b><?php
      if (isset($total_items))
        echo (int)$total_items;
      else
          echo "0"?></p>


    <?php if (isset($_SESSION['cart']) and sizeof($_SESSION['cart'])) {?>
      <form method="post" action="">
          <input type="submit" name="submit" value="Confirm order">
          <input id="clr-basket" type="submit" name="submit" value="Clear basket">
      </form> <?php }?>






    </div>
  </div>
</div>
</html>
