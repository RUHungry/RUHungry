<?php
	header("Location:cart_page.php");
	//header("Location:cart_page.php");
	include "cart_add.php";
	//include "cart_page.php";
	//echo "sb";
	echo $_POST["Username"];
	echo $_POST["Item_Name"];
	if(deleteItem($_POST["Username"],$_POST["Item_Name"])){
		echo "successful delete";
	}
	header("Location:cart_page.php");

?>