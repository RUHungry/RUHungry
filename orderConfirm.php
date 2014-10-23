<?php
include "mysql.php";
// include "cart_add.php";
session_start();

$con = mysql_connect("localhost","root","toor");
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
mysql_select_db("ruhungry", $con);
$username=$_SESSION["username"];
date_default_timezone_set('America/New_York');


		if(isset($_POST['op_Bill_Number']))
		{
			$sql_select = 'select inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
			$result = mysql_query($sql_select) or die("sql error!");
			$time = date('ymdhis',time());
			$txt = "Order Information\n";
			while($row = mysql_fetch_array($result))
			{
				$total=($row[Price]*$row[Quantity]);
				$sql_insert="INSERT INTO checkout_info (OrderNO,Username,Item_ID,Restrt_ID,Card_Account,Shipping_Address,Checkout_Date,Price)
					VALUES
				('$time$username','$username','$row[Item_ID]','$row[Item_ID]','$_POST[op_Bill_Number]','$_POST[op_Ship_First_Name]| |$_POST[op_Ship_Last_Name]| |$_POST[op_Ship_Address1]| |$_POST[op_Ship_Address2]| |$_POST[op_Ship_City]| |$_POST[op_Ship_State]| |$_POST[op_Ship_Zip]','$time','$total')";
			if (!mysql_query($sql_insert,$con))
					die('Error: ' . mysql_error());
				$txt.=$sql_insert;
				$txt.="\n\n";
			}
			$myfile = fopen("orders/".$time.$username.".php", "w")or die("Unable to create file!");

			fwrite($myfile, $txt);
			$txt = "Order Ends\n";
			fwrite($myfile, $txt);
			fclose($myfile);
			echo "<script> alert('Success!');   window.location.href('index.php');</script>";

		}






	function cartReview($username){
		if(isset($username)){
			//echo "worked!";
			$sql_select = 'select inventory_info.Item_Name, inventory_info.Item_ID, restaurant_info.Restrt_Name, shopping_cart_info.Quantity, inventory_info.Price from shopping_cart_info 
			left join inventory_info on shopping_cart_info.Item_ID = inventory_info.Item_ID left join restaurant_info on shopping_cart_info.Restrt_ID = restaurant_info.Restrt_ID where Username ="'.$username.'"';
		}
		else{ echo "No user!";}
		$result = mysql_query($sql_select) or die("sql error!");
		$TT=0;
		while($row = mysql_fetch_array($result)){
			//print html form of the shopping cart
			$outputlist = "";
			$outputlist.= '<tr>';
			$outputlist.= '<td >';
			$outputlist.= '<h4>'.$row["Restrt_Name"].'</h4>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<p>'.$row["Item_Name"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_price">';
			$outputlist.= '<p>'.$row["Price"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_price">';
			$outputlist.= '<p>'.$row["Quantity"].'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td class="cart_total">';
			$outputlist.= '<p class="cart_total_price">'.($row["Price"]*$row["Quantity"]).'</p>';
			$outputlist.= '</td>';
			$outputlist.= '<td>';
			$outputlist.= '<form action="cart_delete.php" method="post">  <input name="Item_Name" value="'.$row["Item_ID"].'" style="display:none;">';
			$outputlist.= '<input name="Username" value="'.$username.'" style="display:none;">';
			$outputlist.= '</form>';
			$outputlist.= '</td>';
			$outputlist.= '</tr>';
			$TT+=$row["Price"]*$row["Quantity"];
			print $outputlist;
		}
		echo '<p class="cart_total_price">Total Price:  '.$TT.'</p>';
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
	<script type="text/javascript">
	function pay()
	{
		document.getElementById("op_Ship_First_Name").value=document.getElementById("Ship_First_Name").value;
		document.getElementById("op_Ship_Last_Name").value=document.getElementById("Ship_Last_Name").value;
		document.getElementById("op_Ship_Address1").value=document.getElementById("Ship_Address1").value;
		document.getElementById("op_Ship_Address2").value=document.getElementById("Ship_Address2").value;
		document.getElementById("op_Ship_City").value=document.getElementById("Ship_City").value;
		document.getElementById("op_Ship_State").value=document.getElementById("Ship_State").value;
		document.getElementById("op_Ship_Zip").value=document.getElementById("Ship_Zip").value;
		document.getElementById("op_Bill_First_Name").value=document.getElementById("Bill_First_Name").value;
		document.getElementById("op_Bill_Last_Name").value=document.getElementById("Bill_Last_Name").value;
		document.getElementById("op_Bill_Address1").value=document.getElementById("Bill_Address1").value;
		document.getElementById("op_Bill_Address2").value=document.getElementById("Bill_Address2").value;
		document.getElementById("op_Bill_City").value=document.getElementById("Bill_City").value;
		document.getElementById("op_Bill_State").value=document.getElementById("Bill_State").value;
		document.getElementById("op_Bill_Zip").value=document.getElementById("Bill_Zip").value;
		document.getElementById("op_Bill_Type").value=document.getElementById("Bill_Type").value;
		document.getElementById("op_Bill_Number").value=document.getElementById("Bill_Number").value;
		document.getElementById("op_Bill_Holder").value=document.getElementById("Bill_Holder").value;
		document.getElementById("op_Bill_Expire").value=document.getElementById("Bill_Expire").value;
		document.getElementById("Ship_Info").submit();

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
							<form id="Ship_Info">
								<input  readonly＝"readonly" id="Ship_First_Name" name="Ship_First_Name" type="text" placehold="First Name" value="<?php echo $_POST['fr_Ship_First_Name'] ?>">
								<input  readonly＝"readonly" id="Ship_Last_Name" name="Ship_Last_Name" type="text" placehold="Last Name" value="<?php echo $_POST['fr_Ship_Last_Name'] ?>">
								<input  readonly＝"readonly" id="Ship_Address1" name="Ship_Address1" type="text" placehold="Address1" value="<?php echo $_POST['fr_Ship_Address1'] ?>">
								<input  readonly＝"readonly" id="Ship_Address2" name="Ship_Address2" type="text" placehold="Address2" value="<?php echo $_POST['fr_Ship_Address2'] ?>">
								<input  readonly＝"readonly" id="Ship_City" name="Ship_City" type="text" placehold="City" value="<?php echo $_POST['fr_Ship_City'] ?>">
								<input  readonly＝"readonly" id="Ship_State" name="Ship_State" type="text" placehold="State" value="<?php echo $_POST['fr_Ship_State'] ?>">
								<input  readonly＝"readonly" id="Ship_Zip" name="Ship_Zip" type="text" placehold="Zip" value="<?php echo $_POST['fr_Ship_Zip'] ?>">
							</form>
						</div>
					</div>
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
						<p>Bill Information</p>
							<div class="form-one">
								<form id="Bill_Info">
									<input  readonly＝"readonly" id="Bill_First_Name" name="Bill_First_Name" type="text" placehold="First Name" value="<?php echo $_POST['fr_Bill_First_Name'] ?>">
									<input  readonly＝"readonly" id="Bill_Last_Name" name="Bill_Last_Name" type="text" placehold="Last Name" value="<?php echo $_POST['fr_Bill_Last_Name'] ?>">
									<input  readonly＝"readonly" id="Bill_Address1" name="Bill_Address1" type="text" placehold="Address1" value="<?php echo $_POST['fr_Bill_Address1'] ?>">
									<input  readonly＝"readonly" id="Bill_Address2" name="Bill_Address2" type="text" placehold="Address2" value="<?php echo $_POST['fr_Bill_Address2'] ?>">
									<input  readonly＝"readonly" id="Bill_City" name="Bill_City" type="text" placehold="City" value="<?php echo $_POST['fr_Bill_City'] ?>">
									<input  readonly＝"readonly" id="Bill_State" name="Bill_State" type="text" placehold="State" value="<?php echo $_POST['fr_Bill_State'] ?>">
									<input  readonly＝"readonly" id="Bill_Zip" name="Bill_Zip" type="text" placehold="Zip" value="<?php echo $_POST['fr_Bill_Zip'] ?>">
									<input  readonly＝"readonly" id="Bill_Type" name="Bill_Type" type="text" placehold="Card Type" value="<?php echo $_POST['fr_Bill_Type'] ?>">
									<input  readonly＝"readonly" id="Bill_Number" name="Bill_Number" type="text" placehold="Card Number" value="<?php echo $_POST['fr_Bill_Number'] ?>">
									<input  readonly＝"readonly" id="Bill_Holder" name="Bill_Holder" type="text" placehold="Card Holder" value="<?php echo $_POST['fr_Bill_Holder'] ?>">
									<input  readonly＝"readonly" id="Bill_Expire" name="Bill_Expire" type="text" placehold="Expire Date" value="<?php echo $_POST['fr_Bill_Expire'] ?>">
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
							cartReview($username);
					?>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
				<form id="op_Info" action="orderConfirm.php" method="POST">
					<button id="btn_pay" name="btn_pay" onclick="pay()" >PAY</button>
					<input id="op_Ship_First_Name" name="op_Ship_First_Name" type="hidden">
					<input id="op_Ship_Last_Name" name="op_Ship_Last_Name" type="hidden">
					<input id="op_Ship_Address1" name="op_Ship_Address1" type="hidden">
					<input id="op_Ship_Address2" name="op_Ship_Address2" type="hidden">
					<input id="op_Ship_City" name="op_Ship_City" type="hidden">
					<input id="op_Ship_State" name="op_Ship_State" type="hidden">
					<input id="op_Ship_Zip" name="op_Ship_Zip" type="hidden">
					<input id="op_Bill_First_Name" name="op_Bill_First_Name" type="hidden">
					<input id="op_Bill_Last_Name" name="op_Bill_Last_Name" type="hidden">
					<input id="op_Bill_Address1" name="op_Bill_Address1" type="hidden">
					<input id="op_Bill_Address2" name="op_Bill_Address2" type="hidden">
					<input id="op_Bill_City" name="op_Bill_City" type="hidden">
					<input id="op_Bill_State" name="op_Bill_State" type="hidden">
					<input id="op_Bill_Zip" name="op_Bill_Zip" type="hidden">
					<input id="op_Bill_Type" name="op_Bill_Type" type="hidden">
					<input id="op_Bill_Number" name="op_Bill_Number" type="hidden">
					<input id="op_Bill_Holder" name="op_Bill_Holder" type="hidden">
					<input id="op_Bill_Expire" name="op_Bill_Expire" type="hidden">
				</form>
					<button id="btn_back" name="btn_back" onclick="history.go(-1);" >Back</button>
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