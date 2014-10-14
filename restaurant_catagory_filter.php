<?php
	include "mysql.php";
	
	function restaurantType(){
		$sql_select ="select distinct Restrt_Type from restaurant_info;";
		$result = mysql_query($sql_select) or die("sql error!");
		while($row = mysql_fetch_array($result)) {
			$outputlist ="";
			$outputlist.='<div class="panel panel-default">';
			$outputlist.='<div class="panel-heading">';
	   		$outputlist.='<h4 class="panel-title"><a href="#">'.$row["Restrt_Type"].'</a></h4>';
	   		$outputlist.='</div>';
	   		$outputlist.='</div>';
	        print $outputlist;
		}
	}   


	



?>








<!--
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="#">Kids</a>
        </h4>
    </div>
</div>
-->