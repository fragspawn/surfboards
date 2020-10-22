<?php
function cart_item_add($item) {
    if (isset($_SESSION['cart_items'])) {
        $key = array_search($item, array_column($_SESSION['cart_items'], 0));
        if ($key === false) {
            array_push($_SESSION['cart_items'], array($item, 1));
        } else {
            $new_qty = $_SESSION['cart_items'][$key][1] + 1;
            $_SESSION['cart_items'][$key] = array($item, $new_qty);
        }
    } else {
        $_SESSION['cart_items'] = array(array($item, 1));
    }
}

function cart_item_remove($item) {
    $key = array_search($item, array_column($_SESSION['cart_items'], 0));
    if ($key === false) {
        return false;
    } else {
        if (count($_SESSION['cart_items']) == 1) {
            unset($_SESSION['cart_items']);
        } else {
            unset($_SESSION['cart_items'][$key]);
            $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
        }
    }
}

function cart_item_update($item, $qty) {
    $key = array_search($item, array_column($_SESSION['cart_items'], 0));

    if ($qty == 0) {
        if (count($_SESSION['cart_items']) == 1) {
            unset($_SESSION['cart_items']);
        } else {
            unset($_SESSION['cart_items'][$key]);
        }
    } else {
        $_SESSION['cart_items'][$key] = array($item, $qty);
    }
}

function cart_empty() {
    unset($_SESSION['cart_items']);
}
?>
