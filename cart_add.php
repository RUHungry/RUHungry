<?php
	//this function will handle the post method and store the form into cart database
	include "db_connection.php";

	function addCart(){
		if(isset($_POST)){
			$username = $_POST["username"];
			$itemid = $_POST["itemid"];
			$restrtname = $_POST["restrtname"];
			$quality = $_POST["quality"];
		}

		$sql_insert = "insert into shopping_cart_info values(".$username.",".$itemid.",".$restrtname.",".$quality.");";
		mysqli_query($db, $sql_isnert);
		
		print "index.php";
	}


	function checkCart($username){
		if(isset($username)){
			echo "worked!";
			$sql_select = 'select username, shopping_cart_info.item_id, shopping_cart_info.restrt_id, shopping_cart_info.quantity, inventory_info.price from shopping_cart_info left join inventory_info on shopping_cart_info.item_id = inventory_info.item_id where username ="chenlongjiu";';
		}
		else{ echo "not work!";}
		$result = mysqli_query($db, $sql_select);
		

		while($row = mysqli_fetch_array($result)){
			//print html form of the shopping cart
			$outputlist = "";
			$outputlist.= '<tr>';
			$outputlist.= '<td class="cart_product">';
			$outputlist.= '<h4><a href="">'.$row["restrt_id"].'</a></h4>'
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_description">';
			$outputlist.= '<p>'.$row["item_id"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_price">';
			$outputlist.= '<p>'.$row["price"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_quantity">';
			$outputlist.= '<div class="cart_quantity_button">';
			$outputlist.= '<a class="cart_quantity_up" href=""> . </a>';
			$outputlist.= '<input class="cart_quantity_input" type="text" name="quantity" value="'.$row["quality"].'" autocomplete="off" size="2" kl_vkbd_parsed="true">';
			$outputlist.= '<a class="cart_quantity_down" href=""> - </a>';
			$outputlist.= '</div>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_total">';
			$outputlist.= '<p class="cart_total_price">'.$row["price"]*$row["quality"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_delete">';
			$outputlist.= '<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>';
			$outputlist.= '</td>';
			$outputlist.= '</tr>';
			
			print $outputlist;
		}
	}


?>























