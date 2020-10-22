<?php

function do_registration() {
    $fname = sanatise_input($_POST['firstName']);
    $lname = sanatise_input($_POST['lastName']);
    $suburb = sanatise_input($_POST['suburb']);
    $street = sanatise_input($_POST['street']);
    $email = sanatise_input($_POST['email']);
    $phone = sanatise_input($_POST['phone']);
    $postcode = sanatise_input($_POST['postcode']);
    $user = sanatise_input($_POST['username']);
    $pass = sanatise_input($_POST['password']);
    $pass = hash_pass($pass, false);
    
    // check username & e-mail are not already in the database;
    $sql = "SELECT * FROM customer WHERE CustomerUName = '" . $user .
            "' OR CustomerEmail = '" . $email . "'";
    $res = do_sql($sql);
    $out_arr = count($res->fetchAll());
    if ($out_arr > 0) {
        $_SESSION['error'] = 'USER ALREADY EXISTS IN THE SYSTEM';
        return false;
    } else {
        //do insert;
        $sql2 = "INSERT INTO customer
                (CustomerName, CustomerEmail, CustomerPhone, CustomerStreet, CustomerSuburb, CustomerUName, CustomerPWord, CustomerPcode)
                VALUES ('" . $fname . " " . $lname . "', '" . $email . "', '" . $phone . "', '" . $street . "', '" . $suburb . "', '" . $user . "', '" . $pass . "', '" . $postcode . "')";
        $res2 = do_insert_sql($sql2);
        $_SESSION['user_id'] = $res2;
        $_SESSION['user_type'] = 'authen';
        return true;
    }
}

function updatereg() {

    $name = sanatise_input($_POST['Name']);
    $suburb = sanatise_input($_POST['suburb']);
    $street = sanatise_input($_POST['street']);
    $email = sanatise_input($_POST['email']);
    $phone = sanatise_input($_POST['phone']);
    $postcode = sanatise_input($_POST['postcode']);

    $sql = "UPDATE customer SET CustomerStreet = '" .
            $street . "', CustomerSuburb = '" .
            $suburb . "', CustomerName = '" .
            $name . "', CustomerEmail = '" .
            $email . "', CustomerPhone = '" .
            $phone . "', CustomerPcode = '" .
            $postcode . "' WHERE CustomerID = '" . $_SESSION['user_id'] . "'";

    $res = do_sql($sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function do_login() {
    $user = sanatise_input($_POST['username']);
    $pass = sanatise_input($_POST['password']);

    // check username and password are the same in the db
    $sql = "SELECT * FROM customer WHERE CustomerUName = '" . $user . "'";
    //         "' AND CustomerPWord = '" . $pass . "'";
    $res = do_sql($sql);

    if ($res->rowCount() == 1) {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if (hash_pass($pass, $row['CustomerPWord'])) {
            if ($row['IsAdmin'] == 1) {
                $_SESSION['user_type'] = 'admin';
                $_SESSION['user_id'] = $row['CustomerID'];
                return 'admin';
            } else {
                $_SESSION['user_type'] = 'authen';
                $_SESSION['user_id'] = $row['CustomerID'];
                return 'authen';
            }
        } else {
            $_SESSION['user_type'] = 'anon';
            return 'anon';
        }
    } else {
        $_SESSION['user_type'] = 'anon';
        return 'anon';
    }
}

function delete_user($user) {
    $sql = 'DELETE FROM customer WHERE CustomerID = ' . $user;
    $res = do_sql($sql);
    return true;
}
?>
