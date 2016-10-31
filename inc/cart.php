<h1>My Cart</h1>
<div class="tableLeft">
    <table>
        <tr>
            <th></th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
        </tr>

        <?php
        $cart_total = 0;
        foreach ($_SESSION['cart_items'] as $an_item) {

            $sql = 'SELECT * FROM item WHERE ItemID = ' . $an_item[0];
            $res = do_sql($sql);
            $row = $res->fetch(PDO::FETCH_ASSOC);
            ?>        

            <tr>
                <td><img src="images/<?php echo $row['ItemImage']; ?>" alt="<?php $row['ItemDesc']; ?>" width="100" height="150" ></td>
                <td><a href="index.php?pageid=item&item_id=<?php echo $an_item[0]; ?>"><?php echo $row['ItemName']; ?></a></td>
                <td><?php echo $row['ItemPrice']; ?></td>
                <td>

                    <form action="index.php?pageid=cartupdate" method="post">
                        <input type="hidden" name="itemid" value="<?php echo $an_item[0]; ?>">
                        <select name="itemqty">

                            <?php
                            for ($loop = 0; $loop <= $row['stock']; $loop++) {
                                echo '<option value="' . $loop . '" ';

                                if ($an_item[1] == $loop) {
                                    echo ' selected';
                                }
                                echo '>' . $loop . '</option>';
                            }
                            ?>
                        </select>
                </td>
                <td><?php $subtotal = $row['ItemPrice'] * $an_item[1];
                        echo number_format($subtotal, 2, '.', ','); ?></td>
                <td class="red"><input type="submit" name="submit" value="update"></td>
            </tr>
            </form>
            <?php
            $cart_total += $subtotal;
        }
        ?>


    </table>
</div> <!-- end tableLeft -->	



<div class="tableRight">
    <table>
        <tr>
            <th colspan="2">Your Order</th>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td><?php echo number_format($cart_total, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td>Shipping</td>
            <td class="red">Free</td>
        </tr>
        <tr>
            <td>Total</td>
            <td class="total"><?php echo number_format($cart_total, 2, '.', ','); ?></td>
        </tr>
    </table>
    <p class="center blue"><input type="button" name="checkout" onclick="location.href = 'index.php?pageid=checkout';" value="Checkout" /></p>
    <p class="center blue"><input type="button" name="continue" onclick="location.href = 'index.php?pageid=cartempty';" value="Empty Cart" /></p>   
    <p class="center"><input type="button" name="continue" onclick="location.href = 'index.php?pageid=shop';" value="Continue Shopping" /></p>
</div> <!-- end tableRight -->	
