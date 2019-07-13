<?php 
function comp_name($a, $b) {
  return strnatcmp($a['item_name'], $b['item_name']);
}

function search_color($item, $colors) {
  $item_colors = json_decode($item['colors'], true);
  foreach($colors as $color => $value) {
    if (isset($item_colors[$color]))
      return true;
  }  
  return false;
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
      $filter = '';
      if (isset($_GET['submit']) && $_GET['submit'] === 'Search') {
        if ($_GET['item_name'] !== '') {
          $name = mysqli_real_escape_string($link, $_GET['item_name']);
          if (!$filter)
            $filter = $filter . "item_name='$name'";
          else
            $filter = $filter . " AND " . "item_name='$name'";
        }
        if ($_GET['rarity'] !== '') {
          $rarity = mysqli_real_escape_string($link, $_GET['rarity']);
          if (!$filter)
            $filter = $filter . "rarity='$rarity'";
          else
            $filter = $filter . " AND " . "rarity='$rarity'";
        }
        if ($_GET['isfoil'] !== '') {
          $isfoil = mysqli_real_escape_string($link, $_GET['isfoil']);
          if (!$filter)
            $filter = $filter . "isfoil='$isfoil'";
          else
            $filter = $filter . " AND " . "isfoil='$isfoil'";
        }
      }
      if ($filter)
        $filter = 'WHERE ' . $filter;
      $query = "SELECT item_id, item_name, rarity, price, isfoil, colors, img FROM items " . $filter;
      if ($result = mysqli_query($link, $query)) {
          while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
          }
      }
      if (isset($_GET['submit']) && $_GET['submit'] === 'Search') {
        foreach (array('Red', 'Green', 'Blue', 'Black', 'White', 'Colorless') as $color)
          if (isset($_GET["$color"]))
              $colors["$color"] = $_GET["$color"];
        if (isset($items))
        {
            if (isset($colors) && sizeof($colors)) {
                foreach ($items as $item) {
                    if (search_color($item, $colors)) {
                        $new_items[] = $item;
                    }
                }
                if (!isset($new_items))
                    unset($items);
                else
                    $items = $new_items;
            }
        }
      }
      if (isset($items)) {
        ?>
        <table class="items">
          <tr>
            <th>Name</th>
            <th>Rarity</th>
            <th>Price</th>
            <th>Foil</th>
          </tr>
          <?php
            usort($items, 'comp_name');
            foreach ($items as $item) {
              $id = $item['item_id'];
              $img = $item['img'];
              ?><tr>
                <td><a href="index.php?page=item&id=<?php echo $id;?>" class="img-hover"><?php echo $item['item_name']; ?><div .img_hov><img src='<?php echo $img?>' /></div></a></td>
                <td><?php echo $item['rarity']; ?></td> 
                <td><?php echo $item['price']; ?>$</td>
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
      ?>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card" id="orange">
      <h2>Filters</h2>
      <form method="get" action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="item_name" placeholder="Any name...">
            <label for="rarity">Rarity</label>
            <select class="selector" id="rarity" name="rarity">
                <option value="">Any</option>
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
                <option value="">Any</option>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <input type="submit" name="submit" value="Search">
          </form>
    </div>
  </div>
</div>
</html>
