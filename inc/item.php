<?php
$sql = 'SELECT * FROM `item` WHERE ItemID = ' . $item_id;
$res = do_sql($sql);
$row = $res->fetch(PDO::FETCH_ASSOC);
?>

<div class="item">
    <div class="itemImage">
        <p><img src="images/<?php echo $row['ItemImage']; ?>" alt="<?php echo $row['ItemDesc']; ?>"></p>
    </div> <!-- end itemImage -->
    <div class="itemDetails">
        <h2><?php echo $row['ItemName']; ?></h2>
        <p><?php echo $row['ItemDesc']; ?></p>
        <p class="itemPrice"><?php echo $row['ItemPrice']; ?></p>
        <form action="index.php?pageid=cartadd" method="POST">
            <input type="submit" name="cart" value="Add to Cart" />
            <input type="hidden" name="itemid" value="<?php echo $row['ItemID']; ?>">
        </form>
    </div> <!-- end itemDetails -->
</div> <!-- end item -->

