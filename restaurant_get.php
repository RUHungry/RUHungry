<?php

//this funciton is for getting from DB
include "mysql.php";
//session_start();	

function homepageRestaurantInfo($RestrtType){
		if($RestrtType == ""){
		$sql_select = "select * from restaurant_info;";
		$result = mysql_query($sql_select) or die("sql error!");
		while($row = mysql_fetch_array($result)) {
			$outputlist = "";
			$outputlist.= '<div class="col-sm-4">';
			$outputlist.= '<div class="product-image-wrapper">';
			$outputlist.= '<div class="single-products">';
			$outputlist.= '<div class="productinfo text-center">';
			$outputlist.= '<img src="'.$row["Img"].'" alt="" />';
			$outputlist.= '<h2>'.$row["Restrt_Name"].'</h2>';
			$outputlist.= '<p>'.$row["Description"].'</p>';
			$outputlist.= '<a action="inventory.php" class="btn btn-default" value="'.$row['Restrt_ID'].'" >More Detail</a>';
			$outputlist.= '</div>';
			$outputlist.= '</div></div></div>';
			print $outputlist;
			}
		}else{
			$sql_select = 'select * from restaurant_info where Restrt_Type="'.$RestrtType.'";';
			$result = mysql_query($sql_select) or die("sql error!");
			while($row = mysql_fetch_array($result)) {
				$outputlist = "";
				$outputlist.= '<div class="col-sm-4">';
				$outputlist.= '<div class="product-image-wrapper">';
				$outputlist.= '<div class="single-products">';
				$outputlist.= '<div class="productinfo text-center">';
				$outputlist.= '<img src="'.$row["Img"].'" alt="" />';
				$outputlist.= '<h2>'.$row["Restrt_Name"].'</h2>';
				$outputlist.= '<p>'.$row["Description"].'</p>';
				$outputlist.= '<a action="inventory.php" class="btn btn-default" value="'.$row['Restrt_ID'].'" >More Detail</a>';
				$outputlist.= '</div>';
				$outputlist.= '</div></div></div>';
				print $outputlist;
			}
		} 
	}		
	function homepageRestaurantSearch($search){
		$sql_select = 'select * from restaurant_info WHERE Restrt_Name like "%'.$search.'%";'
		;
			$result = mysql_query($sql_select) or die("sql error!");
			while($row = mysql_fetch_array($result)) {
				$outputlist = "";
				$outputlist.= '<div class="col-sm-4">';
				$outputlist.= '<div class="product-image-wrapper">';
				$outputlist.= '<div class="single-products">';
				$outputlist.= '<div class="productinfo text-center">';
				$outputlist.= '<img src="'.$row["Img"].'" alt="" />';
				$outputlist.= '<h2>'.$row["Restrt_Name"].'</h2>';
				$outputlist.= '<p>'.$row["Description"].'</p>';
				$outputlist.= '<a action="inventory.php" class="btn btn-default" value="'.$row['Restrt_ID'].'" >More Detail</a>';
				$outputlist.= '</div>';
				$outputlist.= '</div></div></div>';
				print $outputlist;
			}
	}
?>

