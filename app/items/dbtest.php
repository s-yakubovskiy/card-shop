<?php
0.59
Rare
0
{"Black":"1"}
http://static.starcitygames.com/sales/cardscans/MTG/NEM/en/nonfoil/AetherBarrier.jpg
//David Martin




<div>
    <table class="items">
      <tr>
        <th>ID</th>
        <th>STATUS</th>
        <th>Price</th>
      </tr>
      <?php
        foreach ($items as $item) {
          $id = $item['item_id'];
          $img = $item['img'];
          ?><tr>
            <td><a href="index.php?page=item&id=<?php echo $id;?>"><?php echo $item['item_name']; ?><div .img_hov><img src='<?php echo $img?>' /></div></a></td>
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






Array ( [0] => Array ( [status] => in progress [order_id] => 1 )
[1] => Array ( [status] => in progress [order_id] => 4 )

) something Array ( [logged_in_user] => root [logged_in_user_id] => 1 [logged_in_user_isadmin] => 1 )



    <?php
  else {
    ?><html><p>No results =(</p></html><?php
    }
    ?>












            <table class="items">
          <tr>
            <th>Name</th>
            <th>Rarity</th>
            <th>Price</th>
            <th>Foil</th>
            <th>Quantity</th>
          </tr>
          <?php
            usort($items, 'comp_name');
            foreach ($items as $item) {
              $id = $item['item_id'];
              $img = $item['img'];
              ?><tr>
                <td><a href="index.php?page=item&id=<?php echo $id;?>"><?php echo$item['item_name']; ?><div .img_hov><img src='<?php echo $img?>' /></div></a></td>
                <td><?php echo $item['rarity']; ?></td>
                <td><?php echo $item['price']; ?>$</td>
                <td><?php if ($item['isfoil']) {echo "Yes";} else {echo "No";} ?></td>
                <td>1</td>
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



















              ?><tr>
                <td><a href="index.php?page=item&id=<?php echo $id;?>"><?php echo $item['item_name']; ?><div .img_hov><img src='<?php echo $img?>' /></div></a></td>
                <td><?php echo $item['rarity']; ?></td>
                <td><?php echo $item['price']; ?>$</td>
                <td><?php if ($item['isfoil']) {echo "Yes";} else {echo "No";} ?></td>
                <td>1</td>
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