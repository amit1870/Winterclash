<?php

include_once 'db_connect.php' ;

function get_profile($id,$mysqli){
    $stmt = $mysqli->prepare("SELECT `name`,`location`,`character`,`birthdate`,`tid`,`history`,`profile_pic` FROM players WHERE id = ?");
    $stmt->bind_param('i', $id); 
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($player,$location, $character, $birthdate, $tid, $history, $profile_pic);
    $stmt->fetch();
    $stmt = $mysqli->prepare("SELECT tm_name FROM teams WHERE id= ?");
    $stmt->bind_param('i',$tid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($team);
    $stmt->fetch();
    $profile = "<div class='row'>";
    $profile .="<div class='col-md-6'><b>".$player;
    $profile .="</b><br>Date of birth:&nbsp;<b>".$birthdate;
    $profile .="</b><br>Location:&nbsp;<b>".$location ;
    if ($stmt->num_rows == 1) $profile .="</b><br>Team:&nbsp;<b>".$team;
    else $profile .="</b><br>Team:&nbsp;<b>";

    $profile .= "</b></div><div class='col-md-4'><img src='".ROOT."/img/uploads/$profile_pic' style='width:150px;height:150px' alt='$player' class='img-thumbnail' ></div>";
    if($id == $_SESSION['player_id']){
      $profile .="<div class='col-md-2'><button type='button' data-toggle='modal' data-target='#responsive' class='btn btn-info'>Edit Profile</button></div>";
      $profile .="<div id='responsive' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
      $profile .="<div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
      $profile .="<h3 id='myModalLabel'>Edit Profile</h3>";
      $profile .="</div><div class='modal-body'>";
      $profile .="<form action='profile.php?id=$id' method='post' enctype='multipart/form-data' name='save_profile' class='form-signin' role='form'>";
      $profile .="<img src='".ROOT."/img/uploads/$profile_pic' style='height:70px;width:70px'>";
      $profile .="<input type='file' name='profile_pic' value='upload'>";
      $profile .="<input type='text' class='form-control' value='$player' name='player'  placeholder='Player name'>";
      $profile .="<input type='text' class='form-control' value='$location' name='location' placeholder='Location'>";
      $profile .="<select name='role' class='form-control'>";
      $profile .="<option value='-1' selected>Choose your role</option>";
      
      $result = $mysqli->query("SELECT cid ,char_name FROM characters");
      while ($row = $result->fetch_array()) {
        $cids[] = $row['cid'] ; 
        $char_names[] = $row['char_name'] ;
      }
      $n = 0 ;
      foreach ($cids as $key) {
        if($character == $key) $profile .="<option value='$key' selected>$char_names[$n]</option>";
        else $profile .="<option value='$key'>$char_names[$n]</option>"; 
        $n++;
      }
      $profile .="</select>";

      $profile .="<select name='team' class='form-control'>";
      $profile .="<option value='-1'>Select your team</option>";
      $result = $mysqli->query("SELECT id ,tm_name FROM teams");
      while ($row = $result->fetch_array()) {
        $ids[] = $row['id'] ; 
        $tm_names[] = $row['tm_name'] ;
      }
      $n = 0 ;
      foreach ($ids as $key) {
        if($tid == $key) $profile .="<option value='$key' selected>$tm_names[$n]</option>";
        else $profile .="<option value='$key'>$tm_names[$n]</option>";
        $n++;
      }
      $profile .="</select>";

      $profile .="<input type='text' class='form-control' value='$birthdate' name='birthdate' placeholder='birthdate format(yyyy-mm-dd)'>";
      $profile .="<textarea class='form-control' value='$history' name='history' placeholder='history of player'>$history</textarea>";
      $profile .="<input type='hidden' value='update_profile' name='fn'>";
      $profile .="</div>";
      $profile .="<div class='modal-footer'><button class='btn' data-dismiss='modal' aria-hidden='true'>Cancel</button>";
      $profile .="<button class='btn btn-primary'>Save</button>";
      $profile .="</div></form></div>";
    }
    $profile .="</div><hr>";
    $profile .="<div class='row'><div class='col-md-12'><div class='well'>".$history."</div></div></div>";


    return $profile;

}


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
  	return $teams;
}

function get_tournaments($mysqli){
	$result = $mysqli->query("SELECT id,tour_name,total_tm FROM tournaments") ;
	while ($row = $result->fetch_array()) {
		$ids[] = $row['id'] ; 
		$tour_names[] = $row['tour_name'] ;
		$total_tms[] = $row['total_tm'] ;
	}
	$tournaments = "";
	$n = 0 ;
  	foreach ($ids as $id) {
  		$tournaments .="<li><a href='tournaments.php?tour_id=$id'>".$tour_names[$n]."</a></li>";
  		$n++;
  		if($n%4==0){
  			$tournaments .="<li class='divider'></li>";
  		}
  	}
  	return $tournaments;
}

function get_grounds($mysqli) {
	$result = $mysqli->query("SELECT id,gd_name FROM grounds") ;
	while ($row = $result->fetch_array()) {
		$ids[] = $row['id'] ; 
		$gd_names[] = $row['gd_name'] ;
	}
	$grounds = "";
	$n = 0 ;
  	foreach ($ids as $id) {
  		$grounds .="<li><a href='grounds.php?gid=$id'>".$gd_names[$n]."</a></li>";
  		$n++;
  		if($n%4==0){
  			$grounds .="<li class='divider'></li>";
  		}
  	}
  	return $grounds;

}


function connected_players($tid,$mysqli){
    $tid = sprintf("%d",$tid);
    $result = $mysqli->query("SELECT id , name ,status ,profile_pic FROM players WHERE tid = $tid") ;
    while ($row = $result->fetch_array()) {
        $ids[] = $row['id'] ; 
        $players[] = $row['name'] ;
        $status[] = $row['status'] ;
        $profile_pics[] = $row['profile_pic'];
    }
    $chatbar = "";
    $n = 0 ;
    foreach ($ids as $id) {
        if($status[$n]){
            $chatbar .= "<div id='$id' onclick='open_window(&#39;$id&#39;)' style='height:40px;'><img style='height:40px;width:40px;margin-right:10px;' src='".ROOT."/img/uploads/$profile_pics[$n]'>$players[$n]<img style='float:right;padding-top:13px;' src='".ROOT."/img/online.png'></div>";    
        }else {
            $chatbar .= "<div id='$id' onclick='open_window(&#39;$id&#39;)' style='height:40px'><img style='height:40px;width:40px;margin-right:10px;' src='".ROOT."/img/uploads/$profile_pics[$n]'>$players[$n]<img style='float:right;padding-top:13px;' src='".ROOT."/img/offline.png'></div>";    
        }
        $n++;
    }
    $chatbar .="<script src='".ROOT."/js/chatbar.js' type='text/javascript'></script>";

    return $chatbar;
}



?>