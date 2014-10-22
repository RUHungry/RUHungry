<?php
	include "mysql.php";
	session_start();

function get_alert_numbers()
{
	$select = mysql_query("select * from purchase_alerts") or die (mysql_error());
	$select_num = mysql_num_rows($select);
	if($select_num == NULL)
	return '<i class="fa fa-warning"></i> Alert(0)</a></li>';
	else
	return '<i class="fa fa-warning"></i> Alert(<span style="color:red">'.$select_num.'</span>)</a></li>';	
}
?>