<?php
	include "mysql.php";
	session_start();
	
	if($_SESSION["islogin"] != true){
		header("Location: login.php");
		$restrt_id =$_POST["Restrt_ID"];
		$username =  $_POST["Username"];
		$item_id = $_POST["Item_ID"];
		$quantity =$_POST["Quantity"];
		if(isset($cookie_ID)){
			$cookie_ID ++;


		}
	}else
	{
		
		$restrt_id =$_POST["Restrt_ID"];
		header("Location: menu_page.php?Restrt_Type=$restrt_id");
		
		$username =  $_POST["Username"];
		$item_id = $_POST["Item_ID"];
	
		$quantity =$_POST["Quantity"];
		
		//echo $quantity;
		if($quantity != 0){
			
			
			$sql_select = 'select * from shopping_cart_info where Username ="'.$username.'" and Item_ID ='.$item_id.' and Restrt_ID ='.$restrt_id.';';
			$sql_insert='insert into shopping_cart_info (Username, Item_ID, Restrt_ID, Quantity) values("'.$username.'", '.$item_id.', '.$restrt_id.','.$quantity.')';
			$result = mysql_query($sql_select);
			$row_number = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			$sql_update = 'update shopping_cart_info set Quantity = '.($quantity+$row["Quantity"]).' where  Username ="'.$username.'" and Item_ID ='.$item_id.' and Restrt_ID ='.$restrt_id.';';
			
			if( $row_number != 0){
				
				$result = mysql_query($sql_select);
				
				$insert_check = mysql_query($sql_update) or die(mysql_error());
			}else{
				
				$insert_check = mysql_query($sql_insert) or die(mysql_error());
			}
			
			
		}
		
		
	}
?>

