<?php
$sql = "SELECT * FROM customer WHERE IsAdmin = 0";
$res = do_sql($sql);
?>

<h1>Users</h1>

<div class="left">
    <h2 class="marginTop20">User Details</h2>
    <p>All users in the system.</p>
    <table>
        <tr>
            <th colspan="3">Users</th>
        </tr>
        <?php while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['CustomerName']; ?></td>
                <td><?php echo $row['CustomerEmail']; ?>l</td>
                <td>
                    <a href="index.php?pageid=showusers&userid=<?php echo $row['CustomerID']; ?>">View</a> : 
                    <a href="index.php?pageid=deleteuser&userid=<?php echo $row['CustomerID']; ?>">Del</a>

                </td>
            </tr>
        <?php }
        ?>    

    </table>
</div> <!-- end left -->	
<div class="right">
    <h2 class="marginTop20">User Invoice List</h2>
    <p>Invoices per user</p>

    <?php
    if ($user_id) {

        $sql = "SELECT * FROM invoice WHERE InvoiceCustomerID = '" . $user_id . "' ORDER BY InvoiceDate DESC";
        $res = do_sql($sql);

        if ($res->rowCount() == 0) {
            echo "no invoices, you haven't bourgh anything";
        } else {
            ?>
            <table>
                <tr>
                    <th>Reference</th>
                    <th>Purchase Date</th>
                    <th></th>
                </tr>
                <?php
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo sprintf('%05d', $row['InvoiceID']); ?></td>
                        <td><?php
                            $a_date = strtotime($row['InvoiceDate']);
                            $formatted_date = date('d/m/Y H:i', $a_date);
                            echo $formatted_date;
                            ?> </td>
                        <td><a href="index.php?pageid=showinvoice&invid=<?php echo $row['InvoiceID']; ?>">View</a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
    </table>

</div> <!-- right -->