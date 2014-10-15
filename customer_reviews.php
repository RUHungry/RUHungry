<?php

//Connect to Database
require('./mysql.php');

session_start();

if (isset($_POST['submit']))
{
	if($_SESSION["islogin"] == true)
	{
		$insert = "insert into item_reviews (Username, Restrt_ID, Review_Date, Rate, Description)
		values ('".$_SESSION["username"]."',".$_POST['restrt_id'].", now(), ".$_POST['rating'].", '".$_POST['review']."')";
		$add_check = mysql_query($insert) or die("Post review failed.");
		header("Location: menu_page.php?Restrt_Type=".$_POST['restrt_id']);
	}
	else
	{
		die("You should login first. <a href=login.php>Click here to login</a>");		
	}
}
?>
