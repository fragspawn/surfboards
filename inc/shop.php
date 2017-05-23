<?php
if ($category_id) {
    $sql = 'SELECT * FROM item WHERE ItemCategoryID = ' . $category_id;
} else {
    $sql = 'SELECT * FROM item WHERE stock > 0 ORDER BY ItemLastUpdate DESC LIMIT 3';
}

$row_result = do_sql($sql);

while ($row = $row_result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="items">
            <div class="itemsImage">
                <p><img src="images/<?php echo $row['ItemImage']; ?>" alt="<?php echo $row['ItemName']; ?>"></p>
            </div> <!-- end itemsImage -->
            <div class="itemsDetails">
                <h2><a href="index.php?pageid=item&itemid=<?php echo $row['ItemID']; ?>"><?php echo $row['ItemName']; ?></a></h2>
                <p class="itemPrice"><?php echo $row['ItemPrice']; ?></p>
                <form action="index.php?pageid=cartadd" method="POST">
                    <input type="submit" name="cart" value="Add to Cart" />
                    <input type="hidden" name="itemid" value="<?php echo $row['ItemID']; ?>">
                </form>
            </div> <!-- end itemsDetails -->
        </div> <!-- end item -->

<?php 
} // while
?>
