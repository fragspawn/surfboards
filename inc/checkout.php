<h1>My Account</h1>
<?php
$sql = "SELECT * FROM customer WHERE CustomerID = '" . $_SESSION['user_id'] . "'";
$res = do_sql($sql);
$row = $res->fetch(PDO::FETCH_ASSOC);
?>

<div class="left">
    <h2 class="marginTop20">Shipping Details</h2>
    <p>Please confirm your shipping details before placing your order.</p>
    <form action="index.php?pageid=updatereg" method="post">
        <input type="text" name="Name" id="Name" value="<?php echo $row['CustomerName']; ?>" placeholder="Enter your first name" /><br />
        <input type="email" name="email" id="email" value="<?php echo $row['CustomerEmail']; ?>" placeholder="Enter your email address*" required /><br />
        <input type="tel" name="phone" id="phone" value="<?php echo $row['CustomerPhone']; ?>" pattern=".{10,}" title="Include your area code. Numbers only." /><br />
        <input type="text" name="street" id="street" value="<?php echo $row['CustomerStreet']; ?>" placeholder="Enter your street address" /><br />
        <input type="text" name="suburb" id="suburb" value="<?php echo $row['CustomerSuburb']; ?>" placeholder="Enter your suburb" /><br />
        <input type="text" name="postcode" id="postcode" value="<?php echo $row['CustomerPcode']; ?>" placeholder="Enter your postcode" pattern=".{4,}" title="Minimum of 4 characters." /><br />
        <p><input type="submit" name="updatedetails" value="Update Details" /></p>
    </form>
</div> <!-- end left -->	
    <div class="right">
        <h2 class="marginTop20">Order Details</h2>
        <table>
            <tr>
                <th colspan="2">Your Order</th>
            </tr>    
<?php
if (isset($_SESSION['cart_items'])) {
    $cart_total = 0;
    foreach ($_SESSION['cart_items'] as $an_item) {
        $sql = 'SELECT * FROM item WHERE ItemID = ' . $an_item[0];
        $res = do_sql($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        echo "<tr>";
        echo "<td>" . $row['ItemName'] . "</td>";
        echo "<td>" . number_format(($row['ItemPrice'] - ($row['ItemPrice']/11)), 2, '.', ',') . "</td>";
        echo "</tr>"; 
        $subtotal = $row['ItemPrice'] * $an_item[1];
        $cart_total += $subtotal;
    }
    ?>
            <tr>
                <td>Subtotal</td>
                <td><?php echo number_format(($cart_total - ($cart_total/11)), 2, '.', ','); ?></td>
            </tr>
            <tr>
                <td>GST</td>
                <td><?php echo number_format(($cart_total/11), 2, '.', ','); ?></td>
            </tr>
            <!-- loop through cart here -->
            <tr>
                <td>Shipping</td>
                <td class="red">Free</td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="total"><?php echo number_format($cart_total, 2, '.', ','); ?></td>
            </tr>
        </table>
        <p class="blue"><input type="submit" name="order" onclick="location.href = 'index.php?pageid=placeorder';"  value="Place Order" /></p>

    </div> <!-- end right -->	
<?php } ?>

