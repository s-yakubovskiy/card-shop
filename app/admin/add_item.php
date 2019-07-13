<?php
foreach (array('Red', 'Green', 'Blue', 'Black', 'White', 'Colorless') as $color)
    if (isset($_POST[$color]) && $_POST[$color])
        $colors[$color] = $_POST[$color];
if (!$_POST['item_name'] or !$_POST['rarity'] or !isset($_POST['price'])
    or !isset($_POST['isfoil']) or !sizeof($colors) or !$_POST['img_url'] or !$_POST['artist']) {
    ?>
    <html>
        <div class="card">
            <p>Error: All field are nessesery to add new item except `Description` and `Flavor text`!</p>
            <a href="index.php?page=admin_home">Go back</a>
        </div>
    </html>
    <?php
    exit();
}
if (!is_numeric($_POST['price'])) {
    ?>
    <html>
        <div class="card">
            <p>Error: Price has to be number!</p>
            <a href="index.php?page=admin_home">Go back</a>
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
$item_name = mysqli_real_escape_string($link, $_POST['item_name']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$flavor = mysqli_real_escape_string($link, $_POST['flavor']);
$rarity = $_POST['rarity'];
$isfoil = $_POST['isfoil'];
$price = $_POST['price'];
$colors = json_encode($colors);
$img = $_POST['img_url'];
$artist = mysqli_real_escape_string($link, $_POST['artist']);

//print_r($query);
//print_r($item_name);
//print_r($price);
//print_r($rarity);
//print_r($isfoil);
//print_r($colors);
//print_r($img);
//print_r($artist);


if (!$description and !$flavor) 
    $query = "INSERT INTO items (item_name, price, rarity, isfoil, colors, img, artist) VALUES
            ('$item_name', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
elseif ($description and !$flavor) 
    $query = "INSERT INTO items (item_name, description, price, rarity, isfoil, colors, img, artist) VALUES
            ('$item_name', '$description', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
elseif (!$description and $flavor)
    $query = "INSERT INTO items (item_name, flavor_text, price, rarity, isfoil, colors, img, artist) VALUES
            ('$item_name', '$flavor', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
else
    $query = "INSERT INTO items (item_name, description, flavor_text, price, rarity, isfoil, colors, img, artist) VALUES
            ('$item_name', '$description', '$flavor', $price, '$rarity', $isfoil, '$colors', '$img', '$artist')";
if ($result = mysqli_query($link, $query)) {
    ?>
    <html>
        <div class="card">
            <p>Item was succesfuly added!</p>
            <a href="index.php?page=admin_home">Go back</a>
        </div>
    </html>
    <?php
    exit();
}
?>
