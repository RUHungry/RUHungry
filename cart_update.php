<?php
	//header("Location:cart_page.php");
	header("Location:cart_page.php");
	include "cart_add.php";
	//include "cart_page.php";
	//echo "sb";
	updateItem($_POST["Cart_ID"],$_POST["Quantity"]);
	echo $_POST["Cart_ID"];
	echo $_POST["Quantity"];
	//echo "successful delete";
	
	//header("Location:cart_page.php");

?>