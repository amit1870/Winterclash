<?php


include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['player'], $_POST['p'])) {
    $handle = filter_input(INPUT_POST, 'player', FILTER_SANITIZE_EMAIL);
    $passkey = $_POST['p']; // The hashed password.
    
    if (login($handle, $passkey, $mysqli) == true) {
        // Login success 
        header("Location: ../main.php?handle=$handle");
        exit();
    } else {
        // Login failed 
        header('Location: ../index.html?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}