<?php

//Connect to Database
require('./mysql.php');

session_start();

//Check if there is a login seesion
/*if($_SESSION["admin"] == true)

//if there is, login and direct to the inventory page
{
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	
	$check = mysql_query("select * from administrator_users where Username = '".$username."' and Password = '".$password."'") or die(mysql_error());
	
	while($info = mysql_fetch_array($check))
	{
		if($password != $info['Password'])
		{
		
		}
		else
		{
			header("Location: admin_inventory.php");
		}
	}
} */

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
	$check = mysql_query("select * from administrator_users where Username = '".$_POST['username']."'")or die(mysql_error());
	
	//give error if user does not exist
	$check2 = mysql_num_rows($check);
	
	if($check2 == 0)
	{
		die("This user does not exist. <a href=admin_login.php>Click here to try again</a>");
	}
	while($info = mysql_fetch_array($check))
	{
/* 		$_POST['password'] = stripslashes($_POST['password']);
		$info['password'] = stripslashes($info['password']);
		$_POST['password'] = md5($_POST['password']); */
		
		//gives error if the password is wrong
		if ($_POST['password'] != $info['Password']) 
		{
			die('Incorrect password, please try again.<a href=admin_login.php>Click Here to Login</a>');
		}
		else
		{
			// if login is ok then give the user a session

			$_SESSION["username"] = $_POST['username'];
			$_SESSION["password"] = $_POST['password'];
			$_SESSION["admin"] = true;
			
			header("Location: admin_inventory.php");
		}
	}
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
				</div>
			</div>

	</header><!--/header-->
	
		<div class="container" style="padding-top:50px;">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-3">
					<div class="login-form"><!--login form-->
						<h2>Administrator Login</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="LoginForm">
							<input type="text" id="txtUsername" name="username" required="required" placeholder="User Name" />
							<input type="password" name="password" placeholder="Password" required="required" />
							<button type="submit" value="login" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
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