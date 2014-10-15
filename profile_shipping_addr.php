<?php

//Connect to Database
require('./mysql.php');

session_start();

//check admission
if($_SESSION["islogin"] != true)
	header("Location: login.php");

if (isset($_POST['submit']))
{
	if($info['shipping_address'] != NULL)
	{
		$update = "update shipping_address set shipping_address = '".$_POST['address']."'";
		$update_check = mysql_query($update) or die("Shipping address update failed.");
		header("Location: profile_shipping_addr.php");
	}
	else
	{
		$insert = "insert into shipping_address set Username = '".$_SESSION["username"]."', shipping_address = '".$_POST['address']."'";
		$insert_check = mysql_query($insert) or die("Shipping address update failed.");
		header("Location: profile_shipping_addr.php");
	}
}
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
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if($_SESSION["islogin"] == true) echo('<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>');
									  else echo('<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>');
								?>								
							</ul>
						</div>
					</div>
				</div>
			</div>
	</header>
	
	<section>
		<div class="container" style="padding-top:50px;">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>My Account</h2>					
							<div class="panel panel-default">
								<div class="panel-heading">									
								</div>
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="#"><i class="fa fa-credit-card"></i> Shipping Address</a></li>
											<li><a href="profile_credit_card_info.php"><i class="fa fa-credit-card"></i> Credit Card Information</a></li>
										</ul>
									</div>
							</div>												
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="shipping_address">				
						<div class="shipping_address">
							<h2 class="title text-center">Shipping Address Information</h2>
							<table class="table table-bordered">
							   <thead>
								  <tr>
									 <th>Name</th>
									 <th>Shipping Address</th>
									 <th>Operation</th>
								  </tr>
							   </thead>
							   <tbody>
								  <tr>
									 <?php
										$select = mysql_query("select * from customer_info where Username = '".$_SESSION["username"]."'") or die(mysql_error());
										$info = mysql_fetch_array($select);
										$fullname = $info['First_Name'].' '.$info['Last_Name'];
										echo('<td>'.$fullname.'</td>');
										$select = mysql_query("select * from shipping_address where Username = '".$_SESSION["username"]."'") or die(mysql_error());
										$info = mysql_fetch_array($select);										
										echo('<td>'.$info['shipping_address'].'</td>');
									 ?>
									 <td><a href="javascript:add_edit()">Edit</a></td>
								  </tr>
							   </tbody>
							</table>
							<div class="container" style="padding-top:50px; display:none;" id="div_edit">
								<div class="row">
									<div class="col-sm-8">
										<div class="login-form"><!--login form-->
											<h2>Input your new shipping address</h2>
											<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
												<input type="text" name="address" placeholder="Shipping Address" required="required">
												<button type="submit" value="submit" name="submit" class="btn btn-default">Submit</button>
											</form>
										</div><!--/login form-->
									</div>							
<!-- 							<div class="form-one" style="display:none" id="div_edit">
								<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
									<input type="text" name="address" placeholder="Shipping Address" required="required">
									<button type="submit" value="submit" name="submit" class="btn btn-default">Submit</button>
								</form>
							</div> -->
							</div>
						</div>
						</div>
				</div>
			</div><!--/recommended_items-->					
		</div>
		</div>
	</section>
	<script>
		function add_edit()
		{
			document.getElementById("div_edit").style.display = "block";
		}
	</script>
</body>
</html>