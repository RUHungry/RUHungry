<?php
	//this function will handle the post method and store the form into cart database
	include "mysql.php";
	session_start();
	
	function addCart(){
		if(isset($_POST)){
			$username = $_POST["username"];
			$itemid = $_POST["itemid"];
			$restrtname = $_POST["restrtname"];
			$quality = $_POST["quality"];
		}

		$sql_insert = "insert into shopping_cart_info values(".$username.",".$itemid.",".$restrtname.",".$quality.");";
		mysql_query($sql_isnert);
		
		print "index.php";
	}


	function checkCart($username){
		if(isset($username)){
			echo "worked!";
			$sql_select = 'select inventory_info.Item_Name, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
		}
		else{ echo "not work!";}
		$result = mysql_query($sql_select) or die("sql error!");
		

		while($row = mysql_fetch_array($result)){
			//print html form of the shopping cart
			$outputlist = "";
			$outputlist.= '<tr>';
			$outputlist.= '<td >';
			$outputlist.= '<h4><a href="">'.$row["Restrt_Name"].'</a></h4>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<p>'.$row["Item_Name"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_price">';
			$outputlist.= '<p>'.$row["Price"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_quantity">';
			$outputlist.= '<div class="cart_quantity_button">';
			$outputlist.= '<a class="cart_quantity_up" href=""> . </a>';
			$outputlist.= '<input class="cart_quantity_input" type="text" name="quantity" value="'.$row["Quantity"].'" autocomplete="off" size="2" kl_vkbd_parsed="true">';
			$outputlist.= '<a class="cart_quantity_down" href=""> - </a>';
			$outputlist.= '</div>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_total">';
			$outputlist.= '<p class="cart_total_price">'.$row["Price"]*$row["Quantity"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_delete">';
			$outputlist.= '<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>';
			$outputlist.= '</td>';
			$outputlist.= '</tr>';
			
			print $outputlist;
		}
	}


?>























