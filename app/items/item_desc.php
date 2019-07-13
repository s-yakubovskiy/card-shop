<?php
if (!isset($_GET['id']) or $_GET['id'] === '') {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
if (!isset($_POST['submit']))
    $_POST['submit'] = '';
if ($_POST['submit'] === 'Add to cart') {
  if (!isset($_POST['quantity']) or $_POST['quantity'] === '' or $_POST['quantity'] <= 0) {
    ?>
    <html>
        <div class="card">
            <p>Error: Quantity has to be positive integer!</p>
            <a href="index.php?page=item&id=<?php echo $id?>">Go back</a>
        </div>
    </html>
    <?php
    exit();
  }
  if (!isset($_SESSION['cart'][$id]))
    $_SESSION['cart'][$id] = (int)$_POST['quantity'];
  else
    $_SESSION['cart'][$id] += (int)$_POST['quantity'];
  ?>
  <html>
      <div class="card">
          <p>Item succefuly was added to cart</p>
          <a href="index.php?page=home" style="padding-right: 10px">Go home</a>
          <a href="index.php?page=cart" style="padding-right: 10px">Make order</a>
          <a href="index.php?page=item&id=<?php echo $id?>">Add more cards</a>
      </div>
  </html>
  <?php
  exit();
}
?>
<html>
<div class="row">
    <div class="leftcolumn">
        <div class="card"><?php 
            $link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
            if (mysqli_connect_errno()) {
                echo "Connect failed: %s\n", mysqli_connect_error();
                exit();
            }
            $was_item = false;
            $query = "SELECT * FROM items WHERE item_id=$id";
            if ($result = mysqli_query($link, $query)) {
              while ($item = mysqli_fetch_assoc($result)) {
                  $was_item = true;
                  ?><html>
                      <h2><?php echo $item['item_name'] ?></h2>
                      <p><b>Rarity: </b><?php echo $item['rarity'] ?></p>
                      <p><b>Color: </b><?php
                        foreach(json_decode($item['colors'], true) as $color => $value) {
                            echo "$color ";
                        }
                      ?></p>
                      <?php if ($item['description']) {?>
                      <p><b>Card text: </b><?php echo $item['description'] ?></p>
                      <?php }?>
                      <?php if ($item['flavor_text']) {?>
                      <p><b>Flavor text: </b><i><?php echo $item['flavor_text'] ?></i></p>
                      <?php }?>
                      <p><b>Foil: </b><?php if ($item['isfoil']) {echo "Yes";} else {echo "No";} ?></p>
                      <p><b>Artist: </b><?php echo $item['artist'] ?></p>
                      <p><b>Price: </b><?php echo $item['price'] ?>$</p>
                        <form method="post" action="">
                          <input type="number" id="quantity" name="quantity"  value="1" placeholder="Quantity...">
                          <input type="submit" id = "add_to_cart" name="submit" value="Add to cart">
                        </form>
                      <?php
                      if (isset($_SESSION['logged_in_user_is_admin']) && $_SESSION['logged_in_user_isadmin']) {
                      ?> <html>
                        <a href="index.php?page=edit_item&id=<?php echo $item['item_id'];?>"><button class="edit_btn" id="">Edit item</button></a>

                        <button class="del_btn" id="myBtn">Delete item</button>


                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                                            
                          <!-- Modal content -->
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="close">&times;</span>
                              <h2>Are you sure?</h2>
                            </div>
                            <div class="modal-body">
                              <p>Deleting this item will be permanent!</p>
                              <a href='app/admin/delete_item.php?item_id=<?php echo $id;?>'><button class="del_btn">Yes, delete this item!</button></a>
                            </div>
                            </div>
                                            
                        </div>
                                            
                        <script>
                        // Get the modal
                        var modal = document.getElementById('myModal');
                                            
                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");
                                            
                        // Get the <span> element that closes the modal
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
                  </html><?php
                      }
        ?></div>
    </div>
    <div class="rightcolumn">
        <div class="card">
            <?php
            $img = $item['img'];
            $name = $item['item_name'];
            echo "<img class='img' src='$img' alt=\"$name\">";
                }
            }
            if (!$was_item) {
              header("Location: index.php");
              exit();
            }
            ?>
        </div>
    </div>
</div>
</html>

