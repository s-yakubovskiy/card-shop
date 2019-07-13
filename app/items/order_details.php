
<?php
function comp_name($a, $b) {
  return strnatcmp($a['item_name'], $b['item_name']);
}
?>

<html>
    <div class="card">
        <?php
        $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
        if (mysqli_connect_errno()) {
            echo "Connect failed: %s\n", mysqli_connect_error();
            exit();
        }
        if (isset($_GET['id'])) {
          $id_item = $_GET['id'];
          $id = mysqli_real_escape_string($link, $id_item);
          $query = "SELECT item_id, quantity FROM order_items where order_id = $id_item";
        if ($result = mysqli_query($link, $query)) {
            while ($item = mysqli_fetch_assoc($result)) {
              $items[] = $item;
            }
        }
      }
      if (isset($items)) {
        ?>
        <p class="order_number">Order number: #<?php echo $id_item?></p>
        <table class="items">
        <tr>
          <th>Name</th>
          <th>Rarity</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Foil</th>

        </tr>
          <?php
            foreach ($items as $item) {
              $id_item = $item['item_id'];
              $quantity = $item['quantity'];

              $id = mysqli_real_escape_string($link, $id_item);
              $query = "SELECT item_name, rarity, price, isfoil, colors, img FROM items where item_id = $id_item";
              if ($result = mysqli_query($link, $query)) {
                  $item = mysqli_fetch_assoc($result);
              }
            ?>
                <tr>
                <td><a href="index.php?page=item&id=<?php echo $id;?>"><?php echo $item['item_name']; ?><div .img_hov><img src='<?php echo $item['img']?>' /></div></a></td>
                <td><?php echo $item['rarity']; ?></td>
                <td><?php echo $item['price']; ?>$</td>
                <td><?php echo $quantity?></td>
                <td><?php if ($item['isfoil']) {echo "Yes";} else {echo "No";} ?></td>

                </html><?php
            }
                ?>
              </tr>
        </table>
      <?php
      }
      else {
        ?><html><p>No results =(</p></html><?php
      }
