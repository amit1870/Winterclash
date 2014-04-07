<?php

include_once 'db_connect.php';
include_once 'wc-config.php';

$error_msg = "";
if (isset($_POST['player'], $_POST['handle'], $_POST['confirm'], $_POST['p'], $_POST['birthday'], $_POST['birthmonth'], $_POST['birthyear'])) {
    // Sanitize and validate the data passed in
    $name = filter_input(INPUT_POST, 'player', FILTER_SANITIZE_STRING);
    $handle = filter_input(INPUT_POST, 'handle', FILTER_SANITIZE_EMAIL);
    $handle = filter_var($handle, FILTER_VALIDATE_EMAIL);
    if (!filter_var($handle, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    
    $passkey = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($passkey) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    
    $prep_stmt = "SELECT id FROM players WHERE handle = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    
    if ($stmt) {
        $stmt->bind_param('s', $handle);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this handle already exists.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Database error</p>';
    }
    
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.2014-04-02

    $birthdate =  $_POST['birthyear']."-".$_POST['birthmonth']."-".$_POST['birthday'];
    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        // Create salted password 
        $passkey = hash('sha512', $passkey . $random_salt);

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO players (name, handle, birthdate, password, salt) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssss', $name, $handle, $birthdate, $passkey, $random_salt);    
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
                exit();
            }
        }
        $id = $mysqli->insert_id;
        $stmt = $mysqli->prepare("UPDATE players SET pid = ? WHERE id = ?") ;
        $stmt->bind_param('ii', $id,$id);
        $stmt->execute();

        header('Location: ./register_success.php');
        exit();
    }
}