
<section id="category">
    <h1>Shop by Category</h1>

    <?php
    $sql = "SELECT * FROM category";
    $row_result = do_sql($sql);

    while ($row = $row_result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="category">
            <div class="catImage">
                <p><a href="index.php?pageid=shop&catid=<?php echo $row['CategoryID'] . '"'; ?>><img src="images/<?php echo $row['CategoryImage']; ?>" alt="<?php echo $row['CategoryDesc']; ?>"></a></p>
            </div> <!-- end catImage -->
            <div class="catDetails">
                <h2><a href="index.php?pageid=shop&catid=<?php echo $row['CategoryID'] . '">' . $row['CategoryLabel']; ?></a></h2>
                       </div> <!-- end catDetails -->
                       </div> <!-- end category -->
                       <?php
                   }
                   ?>

                   </section> <!-- end category -->



