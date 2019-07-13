<?php
// connect to database
$link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
if (mysqli_connect_errno()) {
    echo "Connect failed: %s\n", mysqli_connect_error();
    exit();
}

//status of orders;
$user_id = mysqli_real_escape_string($link, $_SESSION['logged_in_user_id']);

$email = mysqli_real_escape_string($link, "email");
$sql = "SELECT status, order_id FROM orders WHERE user_id=$user_id";

if ($result = mysqli_query($link, $sql)) {
    while ($item = mysqli_fetch_assoc($result)) {
        $items[] = $item;
    }
}
//print_r($items);
if (isset($items))
    {
?>


<?php


//print_r($_SESSION['logged_in_user_id']);
//print_r($_SESSION);

?>

<html>
<div>
    <br>
    <table class="items">
        <tr>
            <th>ORDER ID</th>
            <th>STATUS</th>
            <th>PRICE</th>
        </tr>
        <?php
        foreach ($items as $item) {
        $id = $item['order_id'];
        $status = $item['status'];
        ?><tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $status; ?></td>
            <td><a href="index.php?page=order_details&<?php echo "id=".$id;?>">order details</a></td>
            </html><?php
            }
            ?>
        </tr>
    </table>

</div>
<?php
}
else
{ ?><html><div class="card"><p>No orders found. Make some <a href="index.php?page=home">here.</a></p></div></html><?php }