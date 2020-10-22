<?php

include('lib/cart.php');
include('lib/user.php');
include('lib/invoices.php');
include('lib/category.php');
include('lib/product.php');

function do_sql($sql_string) {
    $connection = new PDO("mysql:host=127.0.0.1;dbname=surfboards", 'surfboarduser', 'surfboardpass');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $row_result = $connection->query($sql_string);
    } catch (PDOException $Exception) {
        echo $sql_string . '</br>';
        echo $Exception;
        // debugging only, plese remark out for production
        exit();
    }

    return $row_result;
}

function do_insert_sql($sql_string) {
    $connection = new PDO("mysql:host=127.0.0.1;dbname=surfboards", 'surfboarduser', 'surfboardpass');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $row_result = $connection->query($sql_string);
    } catch (PDOException $Exception) {
        echo $sql_string . '</br>';
        echo $Exception;
        // debugging only, plese remark out for production
        exit();
    }

    if ($row_result) {
        return $connection->lastInsertId();
    } else {
        return false;
    }
}

function sanatise_input($input_string) {
    $input_string = trim($input_string);
    $input_string = htmlspecialchars($input_string, ENT_IGNORE, 'utf-8');
    $input_string = strip_tags($input_string);
    $input_string = stripslashes($input_string);
    return $input_string;
}

function hash_pass($cleartext_pass, $crypted_pass) {
    $salt = 'The Quick Brown Fox Jumps Over The Lazy Dog';
    $hashsalt = md5($salt);

    if ($crypted_pass == false) {
        return $crypt_pass = crypt($cleartext_pass, $hashsalt);
    } else {
        $newly_crypted_pass = crypt($cleartext_pass, $hashsalt);
        if ($crypted_pass == $newly_crypted_pass) {
            return true;
        } else {
            return false;
        }
    }
}
?>
