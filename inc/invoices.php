<h1>Categories</h1>
<?php
$sql = "SELECT * FROM customer WHERE CustomerID = '" . $_SESSION['user_id'] . "'";
$res = do_sql($sql);
$row = $res->fetch(PDO::FETCH_ASSOC);

$names = explode(" ", $row['CustomerName']);
?>



<h1>My Account</h1>

<div class="left">
    <h2 class="marginTop20">Personal Details</h2>
    <form action="#" method="post">
        <input type="text" name="firstName" id="firstName" value="<?php echo $names[0]; ?>" placeholder="Enter your first name" /><br />
        <input type="text" name="lastName" id="lastName" value="<?php echo $names[1]; ?>" placeholder="Enter your last name" /><br />
        <input type="email" name="email" id="email" value="<?php echo $row['CustomerEmail']; ?>" placeholder="Enter your email address*" required /><br />
        <input type="tel" name="phone" id="phone" value="<?php echo $row['CustomerPhone']; ?>" placeholder="Enter your phone number" pattern=".{10,}" title="Include your area code. Numbers only." /><br />
        <input type="text" name="street" id="street" value="<?php echo $row['CustomerStreet']; ?>" placeholder="Enter your street address" /><br />
        <input type="text" name="suburb" id="suburb" value="<?php echo $row['CustomerSuburb']; ?>" placeholder="Enter your suburb" /><br />
        <input type="text" name="postcode" id="postcode" value="<?php echo $row['CustomerPcode']; ?>" placeholder="Enter your postcode" pattern=".{4,}" title="Minimum of 4 characters." /><br />
        <p><input type="submit" name="updatedetails" value="Update Details" /></p>
    </form>
</div> <!-- end left -->	


<?php
$sql = "SELECT * FROM invoice WHERE InvoiceCustomerID = '" . $_SESSION['user_id'] . "' ORDER BY InvoiceDate DESC";
$res = do_sql($sql);
?>
<div class="right">
    <h2 class="marginTop20">Categories</h2>
    <?php
    if ($res->rowCount() == 0) {
        echo "no invoices, you haven't bourght anything";
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
                            $formatted_date = date( 'd/m/Y H:i', $a_date );
                    echo $formatted_date; ?> </td>
                    <td><a href="index.php?pageid=showinvoice&invid=<?php echo $row['InvoiceID']; ?>">View</a></td>
                </tr>
                <?php
            }
    }
            ?>
    </table>

</div> <!-- right -->


