<?php

$sql2 = "SELECT * FROM invoice WHERE InvoiceID = " . $invoice_id;
$res2 = do_sql($sql2);
$row2 = $res2->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM customer WHERE CustomerID = " . $row2['InvoiceCustomerID'];
$res = do_sql($sql);
$row = $res->fetch(PDO::FETCH_ASSOC);
?>

<h1>Invoice <?PHP echo sprintf('%05d', $row2['InvoiceID']); ?></h1>

<div class="left">
    <h2 class="marginTop20">Shipping Details</h2>
    <p><?php echo $row['CustomerName']; ?></p>
    <p><?php echo $row['CustomerStreet']; ?></p>
    <p><?php echo $row['CustomerSuburb']; ?>  <?php echo $row['CustomerPcode']; ?> </p>
    <p><?php echo $row['CustomerEmail']; ?></p>
</div> <!-- end left -->	

<div class="right">
    <h2 class="marginTop20">Order Details</h2>
    <table>
        <tr>
            <th>Reference</th>
            <th>Purchase Date</th>
            <th>Order Status</th>
        </tr>
        <tr>
            <td><?PHP echo sprintf('%05d', $row2['InvoiceID']); ?></td>
            <td><?php
                $a_date = strtotime($row2['InvoiceDate']);
                $formatted_date = date('d/m/Y H:i', $a_date);
                echo $formatted_date;
                ?> </td>
            <td>Shipped</td>
        </tr>
    </table>	

    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php
        $sql3 = 'SELECT * FROM Invoice_item WHERE InvItemInvoiceID = ' . $row2['InvoiceID'];
        $res3 = do_sql($sql3);
        $invoice_total = 0;
        while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
            $sql4 = 'SELECT * FROM item WHERE ItemID = ' . $row3['InvItemItemID'];
            $res4 = do_sql($sql4);
            $row4 = $res4->fetch(PDO::FETCH_ASSOC);
            $invoice_total += $row3['InvItemTotalPrice'];
        ?>
        <tr>
            <td><?php echo $row4['ItemName']; ?></td>
            <td><?php echo number_format($row3['InvItemTotalPrice'], 2, '.', ','); ?></td>
            <td><?php echo $row3['InvItemQty']; ?> </td>
        </tr>
        <?php
        }
        ?>

    </table>

    <table>
        <tr>
            <th>Subtotal</th>
            <th>Shipping</th>
            <th>Total Payment</th>
        </tr>
        <tr>
            <td><?php echo number_format($invoice_total, 2, '.', ','); ?> </td>
            <td class="red">Free</td>
            <td ><?php echo number_format($invoice_total, 2, '.', ','); ?></td>
        </tr>
    </table>	

</div> <!-- right -->