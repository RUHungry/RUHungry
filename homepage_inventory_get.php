
<?php
#this funciton is for getting from DB
include "db_connection.php"
if(isset($_POST['value'])){
$restaurantNum = $_GET['value'];
function homepageRestaurantInfo(){
	$sql_select = "select * from inventory_info where Restrt_ID="+$restaurantNum=";";
	$result = mysqli_query($con,$sql_select);
	while($row = mysqli_fetch_array($result)) {
		$output .= '';
		$output .= '<tr>';
		$output .= '<td><p>'+$row['Item_Name']+'</p></td>';
		$output .= '<td><p>'+$row['Item_Description']+'</p></td>'
		$output .= '<div class="productinfo text-center">';
		$output .= '<td><p>'+$row['Price_FLOAT']+'</p></td>';
		$output .= '<td><input name="number_realnum" vlaue="0"></td>';
		$output .= '</td>';
		$output .= '</tr>';
		print $output;
	}
}
	
?>
