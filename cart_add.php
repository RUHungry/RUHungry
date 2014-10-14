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
			//echo "worked!";
			$sql_select = 'select inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
		}
		else{ echo "No user!";}
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
			$outputlist.= '<input class="cart_quantity_input" type="text" name="quantity" value="'.$row["Quantity"].'" autocomplete="off" size="2" kl_vkbd_parsed="true">';
			$outputlist.= '</div>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_total">';
			$outputlist.= '<p class="cart_total_price">'.($row["Price"]*$row["Quantity"]).'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<form action="cart_delete.php" method="post">  <input name="Item_Name" value="'.$row["Item_ID"].'" style="display:none;">';
			$outputlist.= '<input name="Username" value="'.$username.'" style="display:none;">';
			$outputlist.= '<button class="submit btn btn-default">delete</button> </form>';
			$outputlist.= '</td>';
			$outputlist.= '</tr>';
			
			print $outputlist;
		}
	}

	function deleteItem($Username, $Item_ID){
		if(isset($Username)){
			$sql_delete = 'delete from shopping_cart_info where Username = "'.$Username.'" and Item_ID = "'.$Item_ID.'" ;';
			mysql_query($sql_delete);
		}else{
			echo "not successful";
		}
	}


?>























