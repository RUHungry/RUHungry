<?php
    $db_host    = 'localhost:8080';
    $db_username= 'root';
    $db_password= 'toor';
    $db_database= 'ruhungry';
 
        $db = mysql_connect($db_host, $db_username, $db_password);
		if (!$db)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
      mysql_select_db($db_database, $db);
?>