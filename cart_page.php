<!--this is page for loading all the items in one restaurant -->

<?php	
	include "cart_add.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
				    <meta charset="utf-8">
				    <meta name="viewport" content="width=device-width, initial-scale=1.0">
				    <meta name="description" content="">
				    <meta name="author" content="">
				    <title>RUHungry</title>
				    <link href="css/bootstrap.min.css" rel="stylesheet">
				    <link href="css/font-awesome.min.css" rel="stylesheet">
				    <link href="css/prettyPhoto.css" rel="stylesheet">
				    <link href="css/price-range.css" rel="stylesheet">
				    <link href="css/animate.css" rel="stylesheet">
					<link href="css/main.css" rel="stylesheet">
					<link href="css/responsive.css" rel="stylesheet">
				    <!--[if lt IE 9]>
				    <script src="js/html5shiv.js"></script>
				    <script src="js/respond.min.js"></script>
				    <![endif]-->       
				    <link rel="shortcut icon" href="images/ico/favicon.ico">
				    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
				    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
				    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
				    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">

			<div class="container" >
				<div class="row" >
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/mylogo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="profile_shipping_addr.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart_page.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if($_SESSION["islogin"] == true) echo('<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>');
									  else echo('<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>');
								?>								
							</ul>
						</div>
					</div>
				</div>
			</div>
	</header>

	<section id="cart_items" style="padding-top:30px">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>Restaurant</td>
							<td>Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							//$username ="chenlongjiu";
							//echo "hello";
							$username = $_SESSION['username'];
							checkCart($username);
							//$db_host    = "localhost:8889"; #change your port the mysql running port. 
						    //$db_username= "root";# change the user name 
						    //$db_password= "root";# change the user password
						    //$db_database= "ruhungry";
						 
						    //$db = mysql_connect($db_host, $db_username, $db_password, $db_database);
							//$sql_select = "select username, shopping_cart_info.item_id, shopping_cart_info.restrt_id, shopping_cart_info.quantity, inventory_info.price from shopping_cart_info left join inventory_info on shopping_cart_info.item_id = inventory_info.item_id where username =\"chenlongjiu\";";
							

							/*while($row = mysqli_fetch_array($result)){
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
							}*/
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>