<?php

function add_new_cat() {
    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);

    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }


    $sql = "INSERT INTO category (CategoryLabel, CategoryDesc,CategoryImage) VALUES ('" .
            $label . "', '" . $desc . "', '" . $image_filename . "')";
    $row_result = do_sql($sql);
    return true;
}

function edit_cat($category) {
    $label = sanatise_input($_POST['label']);
    $desc = sanatise_input($_POST['description']);

    if (isset($_FILES['filetoupload'])) {
        $destination_path = './images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }

    $sql = "UPDATE category SET CategoryLabel = '" .
            $label . "', CategoryDesc = '" . $desc . "', CategoryImage = '" . $image_filename .
            "' WHERE CategoryID = " . $category;

    $row_result = do_sql($sql);
}
?>

