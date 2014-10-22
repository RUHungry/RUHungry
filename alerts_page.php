<?php

include "mysql.php";

// include and create object
include "jqgrid_dist.php";

session_start();

if($_SESSION["islogin"] != true)
	header("Location: login.php");

// update on ajax call

	$g = new jqgrid();

	// set few params
/*	$grid["caption"] = "Grid for '$tab'"; */
	$grid["autowidth"] = true;
	$grid["sortname"] = 'Alert_Time'; 
	$grid["sortorder"] = "desc"; 
	$g->set_options($grid);
	$ops["edit"] = false;
	$g->set_actions($ops);
	// set database table for CRUD operations
	$g->table = "purchase_alerts"; /*
	$g->select_command = "select Alert_ID, purchase_alerts.Username, First_Name, Last_Name, Email, shipping_address, IP_Record, Card_Holder, Card_Account, Alert_Info, Alert_Time, display_flag
						  from purchase_alerts left join customer_info on purchase_alerts.Username = customer_info.Username 
						  left join shipping_address on purchase_alerts.Username = shipping_address.Username
						  left join credit_card_info on purchase_alerts.Username = credit_card_info.Username where display_flag = 1"; */
						  					  
	// render grid
	$out = $g->render("list1");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
	<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css"></link>		
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/grid.locale-en.js" type="text/javascript"></script>
	<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="js/jquery-ui.custom.min.js" type="text/javascript"></script>
	
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

	<section>
	<div class="container" style="padding-top:50px;">
		<div class="row">
			
			<?php if (!empty($out)) { ?>
			<br>
			<fieldset>
				<?php echo $out?>
			</fieldset>	
			<?php } ?>
		</div>
	</div>
	</section>
	
</body>
</html>