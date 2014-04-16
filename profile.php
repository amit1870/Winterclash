<?php

include_once 'include/header.php';
include_once 'include/winterclash.php';

function update_profile($pid,$mysqli){
	// Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    $error = "";
    $profile_pic = "";
    if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['size'] != 0){
    	// Check $_FILES['profile_pic']['error'] value.
	    switch ($_FILES['profile_pic']['error']) {
	        case UPLOAD_ERR_OK:
	            break;
	        case UPLOAD_ERR_NO_FILE:
	        	$error = "No file sent";
	            // throw new RuntimeException('No file sent.');
	        case UPLOAD_ERR_INI_SIZE:
	        case UPLOAD_ERR_FORM_SIZE:
	        	$error = "Exceeded filesize limit";
	            // throw new RuntimeException('Exceeded filesize limit.');
	        default:
	        	$error = "Unknown errors";
	            // throw new RuntimeException('Unknown errors.');
	    }
	    if ($_FILES['profile_pic']['size'] > 8388608) {
	    	$error = "Exceeded filesize limit";
	        // throw new RuntimeException('Exceeded filesize limit.');
	    }
	    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
	    // Check MIME Type by yourself.
		$image_mime = image_type_to_mime_type(exif_imagetype($_FILES['profile_pic']['tmp_name']));
	    if (false === $image_mime = array_search(
        						$image_mime,
        						array(
        							'jpg' => 'image/jpeg',
        							'png' => 'image/png',
        							'gif' => 'image/gif',
        							),
        						true
        	)) {
	    	$error = "Invalid file format";
	    	// throw new RuntimeException('Invalid file format.');
	    }
	    // You should name it uniquely.
    	// DO NOT USE $_FILES['profile_pic']['name'] WITHOUT ANY VALIDATION !!
    	$profile_pic = sha1_file($_FILES['profile_pic']['tmp_name']).".".$image_mime;
    	if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'],sprintf('img/uploads/%s.%s',sha1_file($_FILES['profile_pic']['tmp_name']),$image_mime))) {
    		$error = "Failed to move uploaded file";
    		// throw new RuntimeException('Failed to move uploaded file.');
    	}
    }

    if(isset($_POST['player']) && strlen($_POST['player']) > 0 ){
		$player = filter_input(INPUT_POST, 'player', FILTER_SANITIZE_STRING);
	}else {
		$error = "Empty player name";
	}
	if(!$error){
		$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
		$character = $_POST['role'];
		$tid = $_POST['team'];
		// if($character <0 ) $character = 0;
		// if ($tid <0) $tid = 0;
		$birthdate = $_POST['birthdate'];
		$history = $_POST['history'];
		if($profile_pic){
			// echo $profile_pic;
			$stmt = $mysqli->prepare("UPDATE players SET `name`=?, `location`=?, `character`=?, `birthdate`=?, `tid`=?, `history`=?, `profile_pic`=? WHERE id = ?");
    		$stmt->bind_param('ssisissi', $player,$location,$character,$birthdate,$tid,$history,$profile_pic,$pid); 
		}else{
			$stmt = $mysqli->prepare("UPDATE players SET `name`=?, `location`=?, `character`=?, `birthdate`=?, `tid`=?, `history`=? WHERE id = ?");
    		$stmt->bind_param('ssisisi', $player, $location, $character, $birthdate, $tid, $history, $pid); 	
		}		
    	$stmt->execute();
    	$alert_msg = "";
    	if($stmt->affected_rows == 1){
    		$alert_msg .="<div class='container'><div class='row'><div class='col-md-2'></div><div class='col-md-8'>";
    		$alert_msg .= "<div class='fade in' style='text-align:center;'>";
    		$alert_msg .= "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times</button>";
    		$alert_msg .="<p class='alert alert-success'>Your profile is updated</p></div>";
    		$alert_msg .="</div><div class='col-md-2'></div></div>";
    		echo $alert_msg;
    	}else {
    		$alert_msg .="<div class='container'><div class='row'><div class='col-md-2'></div><div class='col-md-8'>";
    		$alert_msg .= "<div class='fade in' style='text-align:center;'>";
    		$alert_msg .="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times</button>";
    		$alert_msg .="<p class='alert alert-danger'>Your profile is not updated</p></div>";
    		$alert_msg .="</div><div class='col-md-2'></div></div>";
    		echo $alert_msg;
    	}
	}

}

if(isset($_POST['fn']) && $_POST['fn'] == 'update_profile'){
	update_profile($_SESSION['player_id'],$mysqli);	
}



?>
<!DOCTYPE html>
<html>
	<head>
		<link href="<?php echo ROOT ; ?>/css/bootstrap-modal.css" rel="stylesheet">
		<link href="<?php echo ROOT ; ?>/css/bootstrap-modal-bs3patch.css" rel="stylesheet">
		<script type="text/javascript">


		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
		        <div class="col-md-2"><?php include 'include/chatbar.php'; ?> </div>
		        <div class="col-md-8"><?php  echo get_profile($_GET['id'],$mysqli); ?>
		        </div>
		        <div class="col-md-2"></div>
		    </div>
		</div>
	</body>
	
</html>
