<?php

//Connect to Database
require('./mysql.php');

session_start();

//Check if there is a login seesion
if($_SESSION["islogin"] == true)

//if there is, login and direct to the inventory page
{
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	
	$check = mysql_query("select * from customer_info where Username = '".$username."' and Password = '".$password."'") or die(mysql_error());
	
	while($info = mysql_fetch_array($check))
	{
		if($password != $info['Password'])
		{
		
		}
		else
		{
			header("Location: index.php");
		}
	}
}

// if the login form is submitted
if (isset($_POST['login']))
{
	if(!$_POST['username'] | !$_POST['password'])
	{
		die("You did not fill in a required field.");
	}
	
	//check the database
/* 	if(!get_magic_quotes_gpc())
	{
		$_POST['email'] = addslashes($_POST['email']);
	} */
	$check = mysql_query("select * from customer_info where Username = '".$_POST['username']."'")or die(mysql_error());
	
	//give error if user does not exist
	$check2 = mysql_num_rows($check);
	
	if($check2 == 0)
	{
		die("This user does not exist. <a href=login.php>Click here to register</a>");
	}
	while($info = mysql_fetch_array($check))
	{
/* 		$_POST['password'] = stripslashes($_POST['password']);
		$info['password'] = stripslashes($info['password']);
		$_POST['password'] = md5($_POST['password']); */
		
		//gives error if the password is wrong
		if ($_POST['password'] != $info['Password']) 
		{
			die('Incorrect password, please try again.<a href=login.php>Click Here to Login</a>');
		}
		else
		{
			// if login is ok then give the user a session

			$_SESSION["username"] = $_POST['username'];
			$_SESSION["password"] = $_POST['password'];
			$_SESSION["islogin"] = true;
			
			header("Location: index.php");
		}
	}
}
else if(isset($_POST['register']))
{ //This code runs if the user fills the register form
	
	//check if the username exists
/* 	if(!get_magic_quotes_gpc())
	{
		$_POST['r_username'] = addslashes($_POST['r_username']);
	} */
	$usercheck = $_POST['r_username'];
	$check = mysql_query("select Username from customer_info where Username = '$usercheck'") or die(mysql_error());
	$check2 = mysql_num_rows($check);
	
	if($check2 != 0)
	{
		die("Sorry, the username is already in use.<a href=login.php>Click Here to Return</a>");
	}
	if ($_POST['r_password'] != $_POST['r_password2'])
	{
		die("Your passwords did not match.<a href=login.php>Click Here to Return</a>");
	}
	if ($_POST['email'] != $_POST['email2'])
	{
		die("Your Email Address did not match.<a href=login.php>Click Here to Return</a>");
	}
	
	// encrypt the password and add slashes
/* 	$_POST['r_password'] = md5($_POST['r_password']);
	if(!get_magic_quotes_gpc())
	{
		$_POST['r_password'] = addslashes($_POST['r_password']);
		$_POST['r_username'] = addslashes($_POST['r_username']);
		$_POST['firstname'] = addslashes($_POST['firstname']);
		$_POST['lastname'] = addslashes($_POST['lastname']);
		$_POST['email'] = addslashes($_POST['email']);
	} */
	
	//insert data into database
	$insert = "insert into customer_info (Username, First_Name, Last_Name, Email, Password) 
	values ('".$_POST['r_username']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '"
	.$_POST['email']."', '".$_POST['r_password']."')";
	$add_member = mysql_query($insert);
/* 	if($add_member == 0)
	{
		die("Registration failed!");
	} */
	header("Location: registration.php");
}
else
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | RUHungry</title>
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
	<div> 
	<header id="header"><!--header-->
		
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
								<?php if($_SESSION["islogin"] == true) echo('<li><a href="profile_shipping_addr.php"><i class="fa fa-user"></i> Account</a></li>');
								?>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if($_SESSION["islogin"] == true) echo('<li>Welcome,'.$_SESSION["name"].'<a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>');
									  else echo('<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>');
								?>	
							</ul>
						</div>
					</div>
				</div>
			</div>

	</header><!--/header-->
	
		<div class="container" style="padding-top:50px;">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="LoginForm">
							<input type="text" id="txtUsername" name="username" required="required" placeholder="User Name" />
							<input type="password" name="password" placeholder="Password" required="required" />
							<button type="submit" value="login" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Registration</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="RegForm">
							<input type="text" name="r_username" placeholder="Username" required="required" />
							<input type="text" name="firstname" placeholder="Firstname"required="required" />
							<input type="text" name="lastname" placeholder="Lastname" required="required" />
							<input type="email" name="email" id="txtEmail" placeholder="Email Address" required="required" />
							<input type="email" name="email2" id="txtEmail2" placeholder="Repeat Email Address" required="required" />
							<input type="password" id="txtPassword" name="r_password" pattern="[0-9a-zA-Z]{6,16}" title="Password should be at least 6 characters." placeholder="Password" required="required" />
							<input type="password" id="txtPassword2" name="r_password2" pattern="[0-9a-zA-Z]{6,16}" title="Password should be at least 6 characters." placeholder="Repeat Password" required="required" />
							<button type="submit" value="register" name="register" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>

	
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	
</body>
</html>

<?php
}
?>