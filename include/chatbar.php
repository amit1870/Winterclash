<?php

include_once 'db_connect.php';
include_once 'functions.php';
include_once 'winterclash.php';

?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <?php echo connected_players($tid=1,$mysqli) ; ?>
  </body>
</html>