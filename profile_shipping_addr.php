<?php

//Connect to Database
require('./mysql.php');

session_start();

//check admission
if($_SESSION["islogin"] != true)
	header("Location: login.php");

/*if (isset($_POST['submit']))
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
}*/
else
{

	if(isset($_POST['Ship_Last_Name']))
	{
		$sql="INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username)
			VALUES
			('$_POST[Ship_First_Name]', '$_POST[Ship_Last_Name]','$_POST[Ship_Address1]','$_POST[Ship_Address2]','$_POST[Ship_City]','$_POST[Ship_State]','$_POST[Ship_Zip]','$_SESSION[username]')";
		if (!mysql_query($sql))
			die('Error: ' . mysql_error());
		else 
		header("Location: profile_shipping_addr.php");
	}


	if($_POST["submit2"]=='Delete'){
				$ID = $_POST["shipping_id"];
				$delete_addr = "DELETE FROM  shipping_address where shipping_ID = '$ID'";
				if(!mysql_query($delete_addr)){
					 echo "<script>alert('Failed!')</script>";
				}
				else{
					 header("Location: profile_shipping_addr.php");
				}

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
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> RUHungry@domain.com</a></li>
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
									 <th>Shipping_ID</th>
									 <th>First Name</th>
									 <th>Last Name</th>
									 <th>Address1</th>
									 <th>Address2</th>
									 <th>City</th>									 
									 <th>State</th>
									 <th>Zip Code</th>
									 <th>Operation</th>
								  </tr>
							   </thead>
							   <tbody>

									 <?php
										$select = mysql_query("select * from shipping_address where Username = '".$_SESSION["username"]."'") or die(mysql_error());
										while ($info = mysql_fetch_array($select))
										{

										echo('<tr><td>'.$info['shipping_ID'].'</td>');
										echo('<td>'.$info['First_Name'].'</td>');
										echo('<td>'.$info['Last_Name'].'</td>');
										echo('<td>'.$info['Address1'].'</td>');
										echo('<td>'.$info['Address2'].'</td>');
										echo('<td>'.$info['City'].'</td>');
										echo('<td>'.$info['State_USA'].'</td>');
										echo('<td>'.$info['Zip'].'</td>');
										echo('<td><a href="javascript:add_edit()">Add</a> | <a href="javascript:delete_addr()">Delete</a></td></tr>');
										}
									 ?>


							   </tbody>
							</table>
							<div class="container" style="padding-top:50px; padding-bottom:270px;" id="div_blank">
							
							</div>
							<div class="container" style="padding-top:50px; padding-bottom:100px; display:none;" id="div_edit">
								<div class="row">
									<div class="col-sm-4">
										<div class="login-form"><!--login form-->
											<h2>Input your new shipping address</h2>
							<form id="Ship_Info" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
								<input id="Ship_First_Name" name="Ship_First_Name" type="text" placeholder="First Name">
								<input id="Ship_Last_Name" name="Ship_Last_Name" type="text" placeholder="Last Name">
								<input id="Ship_Address1" name="Ship_Address1" type="text" placeholder="Address1">
								<input id="Ship_Address2" name="Ship_Address2" type="text" placeholder="Address2">
								<input id="Ship_City" name="Ship_City" type="text" placeholder="City">
								<input id="Ship_State" name="Ship_State" type="text" placeholder="State">
								<input id="Ship_Zip" name="Ship_Zip" type="text" placeholder="Zip">
								<!-- <input id="Ship_Submit" name="Ship_Submit" type="text" placeholder=""style="display:none;"> -->
								<button id="btn_Ship_Submit" name="btn_Ship_Submit" type="button" onclick="saveAddress()" >Submit</button>
						    	<p><?php
						    	if(isset($_POST['Ship_Last_Name']))
								{
									$sql="INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username)
								VALUES
								('$_POST[Ship_First_Name]', '$_POST[Ship_Last_Name]','$_POST[Ship_Address1]','$_POST[Ship_Address2]','$_POST[Ship_City]','$_POST[Ship_State]','$_POST[Ship_Zip]','$_SESSION[username]')";
									if (!mysql_query($sql,$con))
											die('Error: ' . mysql_error());
									else echo "<script>alert('Success!')</script>";
									header("Location: profile_shipping_addr.php");
								}
						    	?></p>
						    	
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
						<div class="container" style="padding-top:50px; padding-bottom:100px; display:none;" id="div_delete">
							<div class="row">
								<div class="col-sm-2">
									<div class="login-form"><!--login form-->
										<h2>Delete Shipping Address</h2>									
							<form action="<?php echo $_SERVER['PHP_SELF']?>" id="delete_form" method="POST">
							<input type="text" id="delete_ID" name="shipping_id" placeholder="delete_ID"/>
							<button id="delete_submit" name="submit2" type="submit" value="Delete">Submit</button>							
						</form>
							</div>
						</div>
							</div>
						</div>
						</div>
				</div>
			</div><!--/recommended_items-->					
		</div>
		</div>
	</section>
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
	<script>
		function add_edit()
		{
			document.getElementById("div_edit").style.display = "block";
			document.getElementById("div_blank").style.display = "none";
			document.getElementById("div_delete").style.display = "none";			
		}
		function delete_addr()
		{
			document.getElementById("div_delete").style.display = "block";
			document.getElementById("div_blank").style.display = "none";
			document.getElementById("div_edit").style.display = "none";			
		}

	function saveAddress()
	{
		var alertMessage ="";
    	if (document.getElementById("Ship_First_Name").value.length<1)
    		alertMessage+="First Name cannot be empty!\n\n";
    	if (document.getElementById("Ship_Address1").value.length<1)
    		alertMessage+="Address1 cannot be empty!\n\n";
    	if (document.getElementById("Ship_City").value.length<1)
    		alertMessage+="City cannot be empty!\n\n";
    	if (document.getElementById("Ship_State").value.length<1)
    		alertMessage+="State cannot be empty!\n\n";
    	if (document.getElementById("Ship_Zip").value.length!=5 || isNaN(document.getElementById("Ship_Zip").value))
    		alertMessage+="Zip must be 5 digits!\n\n";
    	// if (!(/\S+@\S+\.\S+/.test(uname)))
    	// 	alertMessage+="Username should be a valid email.\n(i.e. <text>@<text>.<text>)\n\n";
    	// if (pword.length<1)
    	// 	alertMessage+="Password cannot be blank.\n\n";
    	if (alertMessage.length>1)
    		alert(alertMessage);
    	else
    	{
			document.getElementById("Ship_Info").submit();
		}
	}
	</script>
</body>
</html>