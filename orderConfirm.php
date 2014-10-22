<?php
include "mysql.php";
include "cart_add.php";
session_start();

$con = mysql_connect("localhost","root","toor");
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
mysql_select_db("ruhungry", $con);
$tempname=$_SESSION["username"];
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
	<script type="text/javascript">
	function pay()
	{

	}

    </script>
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
<!--
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<!-- <div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shipping Information</p>
							<form id="Ship_Info" disabled＝"true" readonly＝"true">
								<input disabled＝"true" readonly＝"true" id="Ship_First_Name" name="Ship_First_Name" type="text" value="First Name: <?php echo $_POST['fr_Ship_First_Name'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_Last_Name" name="Ship_Last_Name" type="text" value="Last Name: <?php echo $_POST['fr_Ship_Last_Name'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_Address1" name="Ship_Address1" type="text" value="Address1: <?php echo $_POST['fr_Ship_Address1'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_Address2" name="Ship_Address2" type="text" value="Address2: <?php echo $_POST['fr_Ship_Address2'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_City" name="Ship_City" type="text" value="City: <?php echo $_POST['fr_Ship_City'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_State" name="Ship_State" type="text" value="State: <?php echo $_POST['fr_Ship_State'] ?>">
								<input disabled＝"true" readonly＝"true" id="Ship_Zip" name="Ship_Zip" type="text" value="Zip: <?php echo $_POST['fr_Ship_Zip'] ?>">
							</form>
						</div>
					</div>
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
						<p>Bill Information</p>
							<div class="form-one">
								<form id="Bill_Info" disabled＝"true" readonly＝"true">
									<input disabled＝"true" readonly＝"true" id="Bill_First_Name" name="Bill_First_Name" type="text" value="First Name: <?php echo $_POST['fr_Bill_First_Name'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Last_Name" name="Bill_Last_Name" type="text" value="Last Name: <?php echo $_POST['fr_Bill_Last_Name'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Address1" name="Bill_Address1" type="text" value="Address1: <?php echo $_POST['fr_Bill_Address1'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Address2" name="Bill_Address2" type="text" value="Address2: <?php echo $_POST['fr_Bill_Address2'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_City" name="Bill_City" type="text" value="City: <?php echo $_POST['fr_Bill_City'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_State" name="Bill_State" type="text" value="State: <?php echo $_POST['fr_Bill_State'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Zip" name="Bill_Zip" type="text" value="Zip: <?php echo $_POST['fr_Bill_Zip'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Type" name="Bill_Type" type="text" value="Card Type: <?php echo $_POST['fr_Bill_Type'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Number" name="Bill_Number" type="text" value="Card Number: <?php echo $_POST['fr_Bill_Number'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Holder" name="Bill_Holder" type="text" value="Card Holder: <?php echo $_POST['fr_Bill_Holder'] ?>">
									<input disabled＝"true" readonly＝"true" id="Bill_Expire" name="Bill_Expire" type="text" value="Expire Date: <?php echo $_POST['fr_Bill_Expire'] ?>">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
							$username = $_SESSION['username'];
							checkCart($username);
					?>
						<!-- <tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/two.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/three.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
							</td>
						</tr> -->
					</tbody>
				</table>
			</div>
			<div class="payment-options">
				<button id="btn_pay" name="btn_pay" onclick="pay()" >PAY</button>
					<!-- <span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span> -->
			</div>
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
<?php mysql_close($con) ?>