<?php

include_once 'db_connect.php';
include_once 'functions.php';
include_once 'winterclash.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="<?php echo ROOT ; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ROOT ; ?>/css/navbar-fixed-top.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo ROOT ; ?>/js/connection.js"></script>
    <script type="text/javascript">
      
    </script>
    <!--[if lt IE 9]>
      <script src="<?php echo ROOT ; ?>/js/html5shiv.js"></script>
      <script src="<?php echo ROOT ; ?>/js/respond.min.js"></script>
    <![endif]-->
  </head>


<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Winterclash</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams</a>
          <ul class="dropdown-menu" id="teams">
            <?php echo get_teams($mysqli); ?>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tournaments</a>
          <ul class="dropdown-menu">
            <?php echo get_tournaments($mysqli); ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grounds</a>
          <ul class="dropdown-menu">
            <?php echo get_grounds($mysqli); ?>
          </ul>
        </li>
        <li>
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Search player" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Statistics</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo ROOT ; ?>/ranking.php">Ranking</a></li>
            <li><a href="<?php echo ROOT ; ?>/gallery.php">Gallery</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo ROOT ; ?>/img/wc_user.png" style="width:24px;height:24px;"></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo ROOT ; ?>/profile.php?id=<?php echo $_SESSION['player_id'] ;?>"><?php echo $_SESSION['player'] ?></a></li>
            <li><a href="<?php echo ROOT ; ?>/include/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
<script src="<?php echo ROOT ; ?>/js/jquery.js"></script>
<script src="<?php echo ROOT ; ?>/js/bootstrap.js"></script>