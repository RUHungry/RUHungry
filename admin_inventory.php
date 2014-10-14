<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/jquery_popup.css" />
    <script src="jquery_popup.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
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

<?php
	// Create connection
	$con=mysqli_connect("Localhost","root","","ruhungry");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();	
	}
	
?>

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">								
								<li><a href=""><i class="fa fa-envelope"></i> RUHungry@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/mylogo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">								
								<li><a href="#" class="active">Inventory</a>                                   
                                </li>  
							</ul>
						</div>
					</div>
					
                    <div class="col-sm-4">
						<div class="search_box pull-right">
							<button type="search" id="add" align= 'center'>Add</button>
							<button type="search" id="edit" align= 'center'>Edit</button>
							<button type="search" id="delete" align= 'center'>Delete</button>
						</div>
					</div>					
				</div>
			</div>
		</div>
</header>
					<div id="adddiv">
						<form class="form" action="#" id="add_form" method="POST">
							<img src="images/button_cancel.png" class="img" id="cancel"/>	
							<h3>Restaurant Info</h3>
							<hr/><br/>
							<label>Restaurant ID: <span>*</span></label>
							<br/>
							<input type="text" id="add_ID" name="restaurant_id" placeholder=""/><br/>
							<br/>
							<label>Name: <span>*</span></label>
							<br/>
							<input type="text" id="add_name" name="restaurant_name" placeholder=""/><br/>
							<br/>
							<label>Area: </label>
							<br/>
							<input type="text" id="add_area" name="restaurant_area" placeholder=""/><br/>
							<br/>
							<label>Ship Hours:</label>
							<br/>
							<input type="text" id="add_Ship_Hours" name="restaurant_ship_hours" placeholder=""/><br/>
							<br/>
							<label>Address:</label>
							<br/>
							<input type="text" id="add_Address" name="restaurant_address" placeholder=""/><br/> 
							<br/>
							<label>Type:</label>
							<br/>
							<input type="text" id="add_Type" name="restaurant_type" placeholder=""/><br/>
							<br/>
							<label>Image:</label>
							<br/>
							<input type="text" id="add_Image" name="restaurant_image" placeholder=""/><br/>
							<br/>	
							<label>Description:</label>
							<br/>				
							<textarea id="add_Description" name="restaurant_description" placeholder=""></textarea><br/>
							<br/>
							<input type="submit" id="add_submit" name="submit" value="Add"/>
							<input type="button" id="cancel" value="Cancel"/>
							<br/>
						</form>
					</div>
					<div id="deletediv">
						<form class="form" action="#" id="delete_form" method="POST">
							<img src="images/button_cancel.png" class="img" id="cancel"/>	
							<h3>Delete Restaurant</h3>
							<hr/><br/>
							<label>Restaurant ID: <span>*</span></label>
							<br/>
							<input type="text" id="delete_ID" name="restaurant_id" placeholder=""/><br/>
							<br/>
							<input type="submit" id="delete_submit" name="submit" value="Delete"/>
							<input type="button" id="cancel" value="Cancel"/>
							<br/>
						</form>
					</div>
					<div id="editdiv">
						<form class="form" action="#" id="edit_form" method="POST">
							<img src="images/button_cancel.png" class="img" id="cancel"/>	
							<h3>Edit Restaurant</h3>
							<hr/><br/>
							<label>Restaurant ID: <span>*</span></label>
							<br/>
							<input type="text" id="edit_ID" name="restaurant_id" placeholder=""/><br/>
							<br/>
							<li>Update Information:</li>
							<br/>
							<label>Name:</label>
							<br/>
							<input type="text" id="edit_name" name="restaurant_name" placeholder=""/><br/>
							<br/>
							<label>Area: </label>
							<br/>
							<input type="text" id="edit_area" name="restaurant_area" placeholder=""/><br/>
							<br/>
							<label>Ship Hours:</label>
							<br/>
							<input type="text" id="edit_Ship_Hours" name="restaurant_ship_hours" placeholder=""/><br/>
							<br/>
							<label>Address:</label>
							<br/>
							<input type="text" id="edit_Address" name="restaurant_address" placeholder=""/><br/> 
							<br/>
							<label>Type:</label>
							<br/>
							<input type="text" id="edit_Type" name="restaurant_type" placeholder=""/><br/>
							<br/>
							<label>Image:</label>
							<br/>
							<input type="text" id="edit_Image" name="restaurant_image" placeholder=""/><br/>
							<br/>	
							<label>Description:</label>
							<br/>				
							<textarea id="edit_Description" name="restaurant_description" placeholder=""></textarea><br/>
							<br/>
							<input type="submit" id="edit_submit" name="submit" value="Edit"/>
							<input type="button" id="cancel" value="Cancel"/>
							<br/>
						</form>
					</div>
<?php
	if(isset($_POST['submit'])){
		if($_POST["submit"]=='Add'){
			$ID=$_POST["restaurant_id"];
			$Name=$_POST["restaurant_name"];
			$Area=$_POST["restaurant_area"];
			$Ship_Hours=$_POST["restaurant_ship_hours"];
			$Address=$_POST["restaurant_address"];
			$Type=$_POST["restaurant_type"];
			$Description=$_POST["restaurant_description"];
			$Image=$_POST["restaurant_image"];
			$insert_restrt = "INSERT INTO restaurant_info (Restrt_ID, Restrt_Name, Area, Ship_Hours, Address, Restrt_Type, Description,Img) VALUES ('$ID', '$Name', '$Area', '$Ship_Hours', '$Address', '$Type', '$Description', '$Image');";
			if(!mysqli_query($con, $insert_restrt)){
				 echo "<script>alert('Failed!')</script>";
			}
			else{
				 echo "<script>alert('Success!')</script>";
			}
		}
		if($_POST["submit"]=='Delete'){
			$ID=$_POST["restaurant_id"];
			$delete_restrt = "DELETE FROM restaurant_info where Restrt_ID='$ID'";
			if(!mysqli_query($con, $delete_restrt)){
				 echo "<script>alert('Failed!')</script>";
			}
			else{
				 echo "<script>alert('Success!')</script>";
			}
		}
		if($_POST["submit"]=='Edit'){
			$ID=$_POST["restaurant_id"];
			$Name=$_POST["restaurant_name"];
			$Area=$_POST["restaurant_area"];
			$Ship_Hours=$_POST["restaurant_ship_hours"];
			$Address=$_POST["restaurant_address"];
			$Type=$_POST["restaurant_type"];
			$Description=$_POST["restaurant_description"];
			$Image=$_POST["restaurant_image"];
			$edit_restrt = "UPDATE restaurant_info SET Restrt_Name='$Name', Area='$Area', Ship_Hours='$Ship_Hours', Address='$Address', Restrt_Type='$Type', Description='$Description', Img='$Image' where Restrt_ID='$ID';";
			if(!mysqli_query($con, $edit_restrt)){
				 echo "<script>alert('Failed!')</script>";
			}
			else{
				 echo "<script>alert('Success!')</script>";
			}
		}
	}
?>
	<div class="container">	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th align= 'center' >Restaurant ID</th>
					<th align= 'center' >Name</th>
					<th align= 'center' >Area</th>
					<th align= 'center' >Address</th>
					<th align= 'center' >Type</th>
					<th align= 'center' >Ship Hours</th>
					<th align= 'center' >Description</th>
					<th align= 'center' >Image</th>
				</tr>
			</thead>
			<?php
				echo "<tbody>";
				$restaurant_check_query = mysqli_query($con,"select * from restaurant_info");
				while($row = mysqli_fetch_array($restaurant_check_query)) 
				{
				echo "<tr>";				
				echo "<td>" . $row['Restrt_ID'] . "</td>";
				echo "<td>" . $row['Restrt_Name'] . "</td>";
				echo "<td>" . $row['Area'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['Restrt_Type'] . "</td>";
				echo "<td>" . $row['Ship_Hours'] . "</td>";
				echo "<td>" . $row['Description'] . "</td>";
				echo "<td>" . $row['Image'] . "</td>";
				echo "</tr>";
				}
		
				echo "</tbody>";
			?>
		
		</table>    
		     
	</div>

</body>
</html>