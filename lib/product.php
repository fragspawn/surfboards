<?php

function add_new_product() {

    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);
    $price = sanatise_input($_POST['price']);
    $category = sanatise_input($_POST['category']);

    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }
    $sql = "INSERT INTO item (ItemCategoryID, ItemName, ItemDesc, ItemPrice, ItemImage) VALUES ('" .
            $category . "', '" . $label . "', '" . $desc . "', " . $price . ", '" . $image_filename . "')";
    $row_result = do_sql($sql);

    return true;
}

function edit_product($product) {

    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);
    $price = sanatise_input($_POST['price']);
    $category = sanatise_input($_POST['category']);


    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }

    $sql = "UPDATE item SET ItemCategoryID = " .
            $category . ", ItemName = '" . $label . "', ItemDesc = '" . $desc .
            "', ItemImage = '" . $image_filename . "', ItemPrice = '" . $price .
            "' WHERE ItemID = " . $product;

    $row_result = do_sql($sql);
}
?>

