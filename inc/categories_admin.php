<?php
if ($category_id) {

    $sql = "SELECT * FROM category WHERE CategoryID = " . $category_id;
    $res = do_sql($sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="left">
        <h2 class="marginTop20">Edit Category</h2>
        <form action="index.php?pageid=updatecat" method="post" enctype="multipart/form-data">
            <input type="text" name="label" id="Name" value="<?php echo $row['CategoryLabel']; ?>"  placeholder=" Category Label" required/><br />
            <input type="text" name="description" id="Name" value="<?php echo $row['CategoryDesc']; ?>" placeholder="Category Description" required /><br />
            <input type="hidden" name="catid" value="<?php echo $row['CategoryID']; ?>"/>       
            <input type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"><br/>
            <img src="images/<?php echo $row['CategoryImage']; ?>" alt="<?php $row['CategoryDesc']; ?>" width="100" height="100" >
            <p><input type="submit" name="updatedetails" value="Update Details" /></p>
        </form>
    </div> <!-- end left -->	

<?php } else { ?>

    <div class="left">
        <h2 class="marginTop20">Add Category</h2>
        <form action="index.php?pageid=newcat" method="post" enctype="multipart/form-data">
            <input type="text" name="label" id="Name"  placeholder=" Category Label" required/><br />
            <input type="text" name="description" id="Name"  placeholder="Category Description" required/><br />
            <input type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"><br/>
            <p><input type="submit" name="updatedetails" value="Add Details" /></p>
        </form>
    </div> <!-- end left -->

<?php } ?>

<div class="right">
    <h2 class="marginTop20">Categories</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Label</th>
            <th></th>
        </tr>

        <?php
        $sql = "SELECT * FROM category";
        $res = do_sql($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['CategoryID']; ?></td>
                <td><?php echo $row['CategoryLabel']; ?></td>
                <td><a href="index.php?pageid=editcat&catid=<?php echo $row['CategoryID']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>

</div> <!-- right -->

