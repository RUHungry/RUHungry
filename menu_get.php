<?php
#this funciton is for getting from DB
include "mysql.php";


function checkMenu($restrt_id){
	$sql_select = 'select inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, inventory_info.Price from inventory_info left join restaurant_info on inventory_info.Restrt_ID = restaurant_info.Restrt_ID where restaurant_info.Restrt_ID = '.$restrt_id;
	
	$result = mysql_query($sql_select);
	while($row = mysql_fetch_array($result)) {
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
			$outputlist.= '<input class="cart_quantity_input" type="text" name="quantity" value="0" autocomplete="off" size="2" kl_vkbd_parsed="true">';
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
	
?>
