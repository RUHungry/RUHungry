<?php
	
	$restrt_id =$_POST["Restrt_ID"];
	//header("Location: http://localhost:8888/RUHungry/menu_page.php?Restrt_Type=$restrt_id");
	//header("Location:cart_page.php");
	//include "cart_add.php";
	include "mysql.php";
	//include "cart_page.php";
	//echo "sb";
	$username =  $_POST["Username"];
	$item_id = $_POST["Item_ID"];
	
	$quantity =$_POST["Quantity"];
	$sql='insert into shopping_cart_info values("",'.$username.'","'.$item_id.'","'.$restrt_id.'","'.$quantity.'")';
	echo $sql;
	mysql_query($sql);

?>

