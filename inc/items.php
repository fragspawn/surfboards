<?php
$sql_cat = "SELECT * FROM category";
$res_cat = do_sql($sql_cat);

if ($item_id) {

    $sql = "SELECT * FROM item WHERE ItemID = " . $item_id;
    $res = do_sql($sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="left">
        <h2 class="marginTop20">Edit Item</h2>
        <form action="index.php?pageid=updateprod" method="post" enctype="multipart/form-data">
            <input type="text" name="label" id="label" value="<?php echo $row['ItemName']; ?>"  placeholder=" Item Name" required/><br />
            <input type="text" name="description" id="description" value="<?php echo $row['ItemDesc']; ?>" placeholder="Item Description" required /><br />
            <input type="number" name="price" id="price" value="<?php echo $row['ItemPrice']; ?>" placeholder="Item Price" required /><br />        
            <input type="hidden" name="itemid" value="<?php echo $row['ItemID']; ?>"/>       
            
            <select name="category" style="width: 200px">
                <?php
                while ($row_cat = $res_cat->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row_cat['CategoryID'] . '" ';
                    if($row_cat['CategoryID']  ==  $row['ItemCategoryID']) {
                        echo ' selected ';
                    }
                    echo '>' . $row_cat['CategoryLabel'] . '</option>';
                }
                ?>
            </select><br/>            
            
            <input type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"><br/>
            <img src="images/<?php echo $row['ItemImage']; ?>" alt="<?php $row['ItemDesc']; ?>" width="100" height="150" >
            <p><select name="qty">
            <?php 
            for($loop=0;$loop<100;$loop++) { 
                if($row['stock'] == $loop) {
                    echo '<option value="' . $loop . '" selected>' . $loop . '</option>';
                } else { 
                    echo '<option value="' . $loop . '">' . $loop . '</option>';
                }
            } ?>
            </select> QTY</p>
            <p><input type="submit" name="updatedetails" value="Update Details" /></p>
        </form>
    </div> <!-- end left -->	

<?php } else { ?>

    <div class="left">
        <h2 class="marginTop20">Add Item</h2>
        <form action="index.php?pageid=newprod" method="post" enctype="multipart/form-data">
            <input type="text" name="label" id="label" placeholder=" Item Name" required/><br />
            <input type="text" name="description" id="description"  placeholder="Item Description" required /><br />
            <input type="number" name="price" id="price"  placeholder="Item Price" required /><br />        
            <select name="category" style="width: 200px">
                <?php
                while ($row_cat = $res_cat->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row_cat['CategoryID'] . '" ';
                    echo '>' . $row_cat['CategoryLabel'] . '</option>';
                }
                ?>
            </select><br/>

            <input type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"><br/>
            <p><select name="qty">
            <?php 
            for($loop=0;$loop<100;$loop++) { 
                echo '<option value="' . $loop . '">' . $loop . '</option>';
            } ?>
            </select> QTY</p>
            <p><input type="submit" name="updatedetails" value="Add Details" /></p>
        </form>
    </div> <!-- end left -->

<?php } ?>

<div class="right">
    <h2 class="marginTop20">Items</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Label</th>
            <th></th>
        </tr>

        <?php
        $sql = "SELECT * FROM item";
        $res = do_sql($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['ItemID']; ?></td>
                <td><?php echo $row['ItemName']; ?></td>
                <td><a href="index.php?pageid=editprod&itemid=<?php echo $row['ItemID']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>

</div> <!-- right -->

