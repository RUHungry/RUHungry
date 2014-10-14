<?php
    $db_host    = 'localhost:yourport'; #change your port the mysql running port. 
    $db_username= '';# change the user name 
    $db_password= '';# change the user password
    $db_database= 'ruhungry';
 
        $db = mysql_connect($db_host, $db_username, $db_password);
		if (!$db)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
      mysql_select_db($db_database, $db);
?>