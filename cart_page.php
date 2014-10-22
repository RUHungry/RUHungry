<!--this is page for loading all the items in one restaurant -->

<?php
	//this function will handle the post method and store the form into cart database
	include "cart_add.php";
	//bool setcookie ( string $name [, string $value [, int $expire = 0 [, string $path [, string $domain [, bool $secure = false [, bool $httponly = false ]]]]]] )

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
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$username = $_SESSION['username'];
							checkCart($username);
							
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