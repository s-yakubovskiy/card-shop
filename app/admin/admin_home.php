<?php
function comp_name($a, $b) {
    if (isset($a['item_name']) && isset($b['item_name']))
        return strnatcmp($a['item_name'], $b['item_name']);
}
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['logged_in_user_isadmin']) or !$_SESSION['logged_in_user_isadmin']) {
    print_r($_SESSION);
    header("Location: ../../index.php");
    exit();
}
if (!isset($_POST['submit']))
    $_POST['submit'] = '';
if ($_POST['submit'] === 'Add new item') {
  include ('add_item.php');
}
if ($_POST['submit'] === 'Complete order') {
  $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
  if (mysqli_connect_errno()) {
        echo "Connect failed: %s\n", mysqli_connect_error();
        exit();
  }
  $remove_id = $_POST['remove_id'];
  mysqli_query($link, "UPDATE orders SET status='completed' WHERE order_id=$remove_id");
  header("Refresh:0");
}
?>

<div class="row">

  <div class="leftcolumn" id="admin_left_col">
  <?php
    $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
    if (mysqli_connect_errno()) {
          echo "Connect failed: %s\n", mysqli_connect_error();
          exit();
    }
    if ($result = mysqli_query($link, "SELECT * FROM orders WHERE status='in progress'")) {
      while ($order = mysqli_fetch_assoc($result)) {
        $orders[] = $order;
      }
      if (isset($orders) && sizeof($orders)) {
        foreach ($orders as $order) {
          $order_id = $order['order_id'];
          if ($result1 = mysqli_query($link, "SELECT * FROM order_items WHERE order_id=$order_id")) {
            unset($items);
            while ($item = mysqli_fetch_assoc($result1))
              $items[] = $item;
            ?><html>
              <div class="card">
                <h3>Order#<?php echo $order['order_id']?></h3>
                <table class="items">
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                  <?php
                    usort($items, 'comp_name');
                    $total_price = 0;
                    foreach ($items as $item) {
                      $item_id = $item['item_id'];
                      if ($result2 = mysqli_query($link, "SELECT item_name, price, img FROM items WHERE item_id=$item_id"))
                        $item_desc = mysqli_fetch_assoc($result2);
                      $user_id = $order['user_id'];
                      if ($result3 = mysqli_query($link, "SELECT user_name, email FROM users WHERE user_id=$user_id"))
                        $user = mysqli_fetch_assoc($result3);
                      ?><tr>
                        <td><a href="index.php?page=item&id=<?php echo $item_id;?>"><?php echo $item_desc['item_name']; ?><div .img_hov><img src='<?php echo $item_desc['img'];?>' /></div></a></td>
                        <td><?php echo $item_desc['price']; ?>$</td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['quantity'] * $item_desc['price']; ?>$</td>
                        </html><?php
                        $total_price += $item['quantity'] * $item_desc['price'];
                    }
                        ?></tr>
                </table>
                <p><b>User name: </b><?php echo $user['user_name']?></p>
                <p><b>E-mail: </b><?php echo $user['email']?></p>
                <p><b>Total price: </b><?php echo $total_price?>$</p>
                <form method="post" action="">
                    <input id="remove_id" type="number" name="remove_id" value="<?php echo $order['order_id']?>">
                    <input id="remove_btn" type="submit" name="submit" value="Complete order">
                </form>
              </div>
                </html><?php
          }
        }  
      }
      else {
          ?><html><div class="card"><p>No orders yet</p></div></html><?php
      }
    }
      ?>
  <?php 
  
  ?>
    <div class="leftcolumn">
    </div>
  </div>
  <div class="rightcolumn" id="admin_right_col">
  <div class="card" style="width: 100%">
      <h3>Users</h3>
      <form method="POST" action="index.php?page=control">
          <a href="index.php?page=control">
              <input id="submit" type="submit" name="control" value="Control Access"></a>
      </form>
  </div>
    <div class="card">
      <h2>Add new item</h2>
      <form action="" method="post">
        <div class="form" id="orange">
          <form method="post" action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="item_name" placeholder="Item name...">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" placeholder="Description..."></textarea>
            <label for="flavor">Flavor text</label>
            <textarea id="flavor" name="flavor" rows="2" placeholder="Flavor text..."></textarea>
            <label for="img_url">Image url</label>
            <input type="text" id="img_url" name="img_url" placeholder="Item url...">
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist" placeholder="Artist...">
            <label for="rarity">Rarity</label>
            <select class="selector" id="rarity" name="rarity">
                <option value="Common">Common</option>
                <option value="Uncommon">Uncommon</option>
                <option value="Rare">Rare</option>
                <option value="Mythic">Mythic</option>
            </select>
            <label>Color</label>
            <div class="row">
                <div class="colunm">
                    <label class="container" id="red">Red
                      <input type="checkbox" name="Red" value="1">
                      <span class="checkmark"></span>
                    </label>
                    <label class="container" id="green">Green
                      <input type="checkbox" name="Green" value="1">
                      <span class="checkmark"></span>
                    </label>
                    <label class="container" id="blue">Blue
                      <input type="checkbox" name="Blue" value="1">
                      <span class="checkmark"></span>
                    </label>
                </div>
                <div class="column">
                    <label class="container" id="black">Black
                      <input type="checkbox" name="Black" value="1">
                      <span class="checkmark"></span>
                    </label>
                    <label class="container" id="white">White
                      <input type="checkbox" name="White" value="1">
                      <span class="checkmark"></span>
                    </label>
                    <label class="container" id="colorless">Colorless
                      <input type="checkbox" name="Colorless" value="1">
                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <label for="isfoil">Foil</label>
            <select class="selector" id="isfoil" name="isfoil">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <label for="price">Price in <i class="fa fa-usd"></i></label>
            <input type="text" id="price" name="price" placeholder="Item price...">
            <input type="submit" name="submit" value="Add new item">
          </form>
        </div>
      </form>
    </div>
  </div>
</div>
