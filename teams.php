<?php

include_once 'include/header.php';


function get_team($tid,$mysqli){
	$stmt = $mysqli->prepare("SELECT tm_name,history FROM teams WHERE id = ?");
	$stmt->bind_param('i',$tid);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($tm_name, $history);
	$stmt->fetch();
	$team_info = "<div class='page-header'>";
	$team_info .="<h1>$tm_name</h1></div>";
	$team_info .="<div class='well'><p>$history</p></div>";
	return $team_info;
}

function get_players($tid,$mysqli){
	$tid = sprintf("%d",$tid);
	$result = $mysqli->query("SELECT `id`,`name`,`character` FROM players WHERE tid = $tid");
	while($row = $result->fetch_array()){
		$ids[] = $row['id'];
		$players[] = $row['name'];
		$characters[] = $row['character'];
	}
	$players_table = "<div><table class='table table-bordered table-hover '>";
	$players_table .="<thead class='alert-info'><td>#</td><td>Name</td><td>Profile</td><td>Matches</td><td>Ranking</td></thead><tbody>";
	$i = 0 ;
	foreach ($ids as $id) {
		$stmt = $mysqli->prepare("SELECT char_name FROM characters WHERE cid = ?");
		$stmt->bind_param('i',$characters[$i]);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($character);
		$stmt->fetch();
		$j = $i+1;
		$players_table .="<tr><td>$j</td> <td><a href='profile.php?id=$id'>$players[$i]</a></td> <td>$character</td> <td> </td> <td> </td></tr>";
		$i++;
	}
	$players_table .="</tbody></table></div>";
	return $players_table;
}



?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<div class="container">
			<div class="row">
		        <div class="col-md-2"><?php include 'include/chatbar.php' ; ?></div>
		        <div class="col-md-8">
		        	<?php echo get_team($_GET['tid'],$mysqli); ?>
	        		<?php echo get_players($_GET['tid'],$mysqli) ; ?>
		        </div>
		        <div class="col-md-2"></div>
		    </div>
		</div>
	</body>
</html>