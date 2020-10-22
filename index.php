<?php

session_start();
ob_start();


include('lib/library.php');

if (isset($_GET['pageid'])) {
    $page_id = sanatise_input($_GET['pageid']);
} else {
    $page_id = 'a case that should default in the right user type';
}

if (isset($_GET['catid'])) {
    $category_id = sanatise_input($_GET['catid']);
} else {
    $category_id = false;
}

if (isset($_GET['itemid'])) {
    $item_id = sanatise_input($_GET['itemid']);
} else {
    $item_id = false;
}

if (isset($_GET['invid'])) {
    $invoice_id = sanatise_input($_GET['invid']);
} else {
    $invoice_id = false;
}

if (isset($_GET['userid'])) {
    $user_id = sanatise_input($_GET['userid']);
} else {
    $user_id = false;
}

if (isset($_POST['itemid'])) {
    $form_item_id = sanatise_input($_POST['itemid']);
} else {
    $form_item_id = false;
}

if (isset($_POST['itemqty'])) {
    $form_item_qty = sanatise_input($_POST['itemqty']);
} else {
    $form_item_qty = false;
}

if (isset($_POST['catid'])) {
    $update_cat_id = sanatise_input($_POST['catid']);
} else {
    $update_cat_id = false;
}

//
//
// if user elects to logout by clicking the logout link
if ($page_id == 'logout') {
    unset($_SESSION['user_type']);
    unset($_SESSION['user_id']);
    $user_type = 'anon';
    $page_id = 'home';
}

//process registration
if ($page_id == 'regprocess') {
    if (do_registration()) {
        if (isset($_SESSION['cart_items'])) {
            $page_id = 'checkout';
        } else {
            $page_id = 'home';
        }
    } else {
        $page_id = 'home';
    }
}

// if there is a session for user type already set
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
} else {
    $user_type = 'anon';
}

// if the login form has been filled out
if ($page_id == 'loginprocess') {
    $user_type = do_login();
    if (isset($_SESSION['cart_items']) && ($user_type == 'authen')) {
        $page_id = 'checkout';
    } else {
        $page_id = 'a case that should default under the right user type';
    }
}

//
// page layout code
include('inc/header.php');

switch ($page_id) {
    case 'home':
        include('inc/home.php');
        include('inc/categories.php');
        break;
    case 'login':
        include('inc/login.php');
        break;
    case 'shop':
        include('inc/shop.php');
        include('inc/categories.php');
        break;
    case 'cartadd':
        cart_item_add($form_item_id);
        header('Location: index.php?pageid=showcart');
        break;
    case 'cartupdate':
        cart_item_update($form_item_id, $form_item_qty);
        if (isset($_SESSION['cart_items'])) {
            include('inc/cart.php');
        } else {
            header('Location: index.php');
        }
        break;
    case 'cartempty':
        cart_empty();
        header('Location: index.php');
        break;
    case 'showcart':
        include('inc/cart.php');
        break;
    case 'item':
        include('inc/item.php');
        break;
    case 'checkout':
        if ($user_type == 'anon') {
            include('inc/login.php');
        } else {
            include('inc/checkout.php');
        }
        break;
    default:
        if ($user_type == 'anon') {
            include('inc/home.php');
        }
        break;
}

if ($user_type == 'admin') {
    switch ($page_id) {
        case 'showusers':
            include('inc/users.php');
            break;
        case 'showinvoice':
            include('inc/invoice.php');
            break;
        case 'deleteuser':
            delete_user($user_id);
            include('inc/users.php');
            break;
        case 'showcat':
            include('inc/categories_admin.php');
            break;
        case 'newcat';
            add_new_cat();
            include('inc/categories_admin.php');
            break;
        case 'editcat';
            include('inc/categories_admin.php');
            break;
        case 'updatecat':
            edit_cat($update_cat_id);
            include('inc/categories_admin.php');
            break;
        case 'showprod':
            include('inc/items.php');
            break;
        case 'newprod';
            add_new_product();
            include('inc/items.php');
            break;
        case 'editprod';
            include('inc/items.php');
            break;
        case 'updateprod':
            edit_product($form_item_id);
            include('inc/items.php');
            break;
        default:
            break;
    }
}

if ($user_type == 'authen') {
    switch ($page_id) {
        case 'invoices':
            include('inc/invoices.php');
            break;
        case 'placeorder':
            create_invoice();
            // send a success/fail message
            include('inc/home.php');
            break;
        case 'updatereg':
            updatereg();
            include('inc/checkout.php');
            break;
        case 'updatereginv':
            updatereg();
            include('inc/invoices.php');
            break;
        case 'showinvoice':
            include('inc/invoice.php');
            break;
    }
}
include('inc/footer.php');
ob_end_flush();
?>

