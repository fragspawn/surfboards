<?php

function add_new_product() {

    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);
    $price = sanatise_input($_POST['price']);
    $category = sanatise_input($_POST['category']);
    $qty = sanatise_input($_POST['qty']);

    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }
    $sql = "INSERT INTO item (ItemCategoryID, ItemName, ItemDesc, ItemPrice, ItemImage, stock) VALUES ('" .
            $category . "', '" . $label . "', '" . $desc . "', " . $price . ", '" . $image_filename . "', " . $qty . ")";
    $row_result = do_sql($sql);

    return true;
}

function edit_product($product) {

    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);
    $price = sanatise_input($_POST['price']);
    $category = sanatise_input($_POST['category']);
    $qty = sanatise_input($_POST['qty']);

    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }
    if($image_filename == '') {
        $sql = "UPDATE item SET ItemCategoryID = " .
            $category . ", ItemName = '" . $label . "', ItemDesc = '" . $desc .
            "', ItemPrice = '" . $price .
            "', stock = " . $qty .
            " WHERE ItemID = " . $product;
    } else {
        $sql = "UPDATE item SET ItemCategoryID = " .
            $category . ", ItemName = '" . $label . "', ItemDesc = '" . $desc .
            "', ItemImage = '" . $image_filename . "', ItemPrice = '" . $price .
            "', stock = " . $qty .
            " WHERE ItemID = " . $product;
    }

    $row_result = do_sql($sql);
}
?>

