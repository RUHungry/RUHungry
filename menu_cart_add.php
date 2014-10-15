<?php
	include "mysql.php";
	session_start();
	
	if($_SESSION["islogin"] != true)
	header("Location: login.php");
	else
	{
	$restrt_id =$_POST["Restrt_ID"];
	//header("Location:cart_page.php");
	//include "cart_add.php";

	//include "cart_page.php";
	//echo "sb";
	$username =  $_POST["Username"];
	$item_id = $_POST["Item_ID"];
	
	$quantity =$_POST["Quantity"];
	$sql='insert into shopping_cart_info (Username, Item_ID, Restrt_ID, Quantity) values("'.$username.'", '.$item_id.', '.$restrt_id.','.$quantity.')';
	//echo $sql;
	$insert_check = mysql_query($sql) or die(mysql_error());
	header("Location: menu_page.php?Restrt_Type=$restrt_id");
	}
?>

