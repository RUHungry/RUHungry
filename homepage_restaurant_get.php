
<?php
#this funciton is for getting from DB
include "mysql.php"

function homepageRestaurantInfo(){
	$sql_select = "select * from restaurant_info;";
	$result = mysqli_query($con,$sql_select);
	while($row = mysqli_fetch_array($result)) {
		$output .= '';
		$output .= '<div class="col-sm-4">';
		$output .= '<div class="product-image-wrapper">';
		$output .= '<div class="single-products">'
		$output .= '<div class="productinfo text-center">';
		$output .= '<img src="'+$row['Img']+'" alt="" />';
		$output .= '<h2>'+$row['Restrt_Name']+'</h2>';
		$output .= '<p>'+$row['Description']+'</p>';
		$output .= '<a action="inventory.php" class="btn btn-default" value="'+$row['Restrt_ID']+'" >More Detail</a>';
		$output .= '</div>';
		$output .= '</div>';
		print $output;
	}
?>
