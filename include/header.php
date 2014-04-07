<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="http://localhost/winterclash/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/winterclash/css/navbar-static-top.css" rel="stylesheet">
    <script type="text/javascript" src="http://localhost/winterclash/js/connection.js"></script>
    <script type="text/javascript">
      function get_teams(divid){
        url = 'http://localhost/winterclash/include/winterclash.php';
        param = 'fn=get_teams';
        post_connection(url,divid,param);
      }
    </script>
    <!--[if lt IE 9]>
      <script src="http://localhost/winterclash/js/html5shiv.js"></script>
      <script src="http://localhost/winterclash/js/respond.min.js"></script>
    <![endif]-->
  </head>


<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" onmouseover="get_teams('teams')">Teams</a>
          <ul class="dropdown-menu" id="teams">
            <!-- <li><a href="#">All Teams</a></li> -->
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tournaments</a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grounds</a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Statistics</b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile</b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
<script src="http://localhost/winterclash/js/jquery.js"></script>
<script src="http://localhost/winterclash/js/bootstrap.js"></script>