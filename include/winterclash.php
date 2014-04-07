<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();


function get_teams($mysqli){
	$result = $mysqli->query("SELECT id,tm_name FROM teams") ;
	while($row = $result->fetch_array()){
		$ids[] = $row['id'] ;
		$tm_names[] = $row['tm_name'] ;
	}
	$teams = "";
	$n = 0 ;
  	foreach ($ids as $id) {
  		$teams .="<li><a href='teams.php?tid=$id'>".$tm_names[$n]."</a></li>";
  		$n++;
  		if($n%4==0){
  			$teams .="<li class='divider'></li>";
  		}
  	}
  	echo $teams;
}


if(isset($_POST['fn'])){
	$fn_name = $_POST['fn'];
	get_teams($mysqli);
}


?>