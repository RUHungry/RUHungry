<?php
	//this function will handle the post method and store the form into cart database
	include "mysql.php";
	session_start();

	function checkCart($username){
		if(isset($username)){
			//echo "worked!";
			$sql_select = 'select shopping_cart_info.Cart_ID,shopping_cart_info.Restrt_ID,inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
		}
		else{ 
			$_SESSION["Username"] = "guest";
			$_SESSION[""] = "";
			$sql_select = 'select shopping_cart_info.Cart_ID,shopping_cart_info.Restrt_ID,inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
		
		}

		$result = mysql_query($sql_select) or die("sql error!");
		$row_number = mysql_num_rows($result);
		if($row_number==0)
		{
			echo '<tr><td>Your cart is empty.</td><tr>';
		}else
		{
		while($row = mysql_fetch_array($result)){
			//print html form of the shopping cart
			$outputlist = "";
			$outputlist.= '<tr>';
			$outputlist.= '<td >';
			$outputlist.= '<h4><a href="menu_page.php?Restrt_Type='.$row["Restrt_ID"].'">'.$row["Restrt_Name"].'</a></h4>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= $row["Item_Name"];
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_price">';
			$outputlist.= $row["Price"];
			$outputlist.= '</td>';
			$outputlist.= '<form action="cart_update.php" method="post"> ';
			$outputlist.= '<input name="Cart_ID" value="'.$row["Cart_ID"].'" style="display:none;">';
			$outputlist.= '<input name="Method" value="update" style="display:none;">';
			$outputlist.= '<td class="cart_quantity">';
			$outputlist.= '<div class="cart_quantity_button">';
			$outputlist.= '<input class="cart_quantity_input" type="text" name="Quantity" value="'.$row["Quantity"].'" autocomplete="off" size="2" kl_vkbd_parsed="true">';
			$outputlist.= '</div>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_total_price">';
			$outputlist.= ($row["Price"]*$row["Quantity"]);
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<button class="btn btn-primary" style="margin-top:0px">update</button> </form>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<form action="cart_delete.php" method="post">  <input name="Item_Name" value="'.$row["Item_ID"].'" style="display:none;">';
			$outputlist.= '<input name="Username" value="'.$username.'" style="display:none;">';
			$outputlist.= '<input name="Method" value="delete" style="display:none;">';
			$outputlist.= '<button class="btn btn-primary" style="margin-top:0px">delete</button> </form>';
			$outputlist.= '</td>';
			$outputlist.= '</tr>';
			
			print $outputlist;
		}
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

	function updateItem($CartID, $quantity){
		if(isset($CartID)){
			echo $CartID, $quantity;
			if($quantity == 0)
			{	
				$sql_update = 'delete from shopping_cart_info where Cart_ID ='.$CartID.';';
				echo $sql_update;
				mysql_query($sql_update);
				echo "delete successful";
				
			}else{
				$sql_update = 'update shopping_cart_info set Quantity ='.$quantity.' where Cart_ID ='.$CartID.';';
				mysql_query($sql_update);
				echo $sql_update;
				echo "update successful";
			}
		}else{
			
		}

	}


?>























