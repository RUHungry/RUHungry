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
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> URHungry@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle">
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
		</div>
	</header>

	<section id="cart_items" style="padding-top:30px; padding-bottom:100px;">
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
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<div class="companyinfo">
							<h2><span>RUH</span>ungry</h2>
							<p>CS6548 E-Commerce</p>
						</div>
					</div>					
					<div class="col-sm-2">
						<div class="address">
							<img src="images/home/map.png" alt="" />							
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>