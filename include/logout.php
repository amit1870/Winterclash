<?php

include_once 'functions.php';
include_once 'db_connect.php';
sec_session_start();

$stmt = $mysqli->prepare("UPDATE players SET status = ? WHERE id = ?") ;
$id = $_SESSION['player_id'] ;
$stmt->bind_param('ii',$status = 0,$id);
if($stmt->execute()){
	// Unset all session values 
	$_SESSION = array();

	// get session parameters 
	$params = session_get_cookie_params();

	// Delete the actual cookie. 
	setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

	// Destroy session 
	session_destroy();
	header("Location: ../index.php");
	exit();
}



