<?php

function create_invoice() {
    if (isset($_SESSION['cart_items'])) {
        // insert new invoice
        $sql = "INSERT INTO invoice (InvoiceCustomerID) VALUES (" . $_SESSION['user_id'] . ")";
        $invoice_id = do_insert_sql($sql);
        
        //iterate over session cart_items to insert them in invoice items
        foreach ($_SESSION['cart_items'] as $an_item) {
            // GET ITEM INFO
            $sql = 'SELECT * FROM item WHERE ItemID = ' . $an_item[0];
            $res = do_sql($sql);
            $row = $res->fetch(PDO::FETCH_ASSOC);

            $subtotal = $row['ItemPrice'] * $an_item[1];

            // INSERT INVOICE ITEMS
            $sql2 = "INSERT INTO invoice_item (InvItemInvoiceID, InvItemItemID, InvItemQty, InvItemTotalPrice) VALUES (" .
                    $invoice_id . ", " . $an_item[0] . ", " . $an_item[1] . ", " . $subtotal . ")";
            $result = do_insert_sql($sql2);

            // UPDATE STOCK LEVEL
            $sql3 = "UPDATE item SET stock = " . ($row['stock'] - $an_item[1]) . " WHERE ItemID = " . $an_item[0];
            $res3 = do_sql($sql3);
        }
        unset($_SESSION['cart_items'] );
        // Say something nice to the session
        $_SESSION['message'] = "thanks for your purchase";
        return true;
    } 
}
?>

