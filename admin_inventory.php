<?php
	include "mysql.php";
	include "get_user_alerts.php";
	session_start();
	
	if($_SESSION["admin"] != true)
	header("Location: admin_login.php");
?>
<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.5.2
 * @license: see license.txt included in package
 */

// PHP Grid database connection settings
//define("PHPGRID_DBTYPE","Mysql"); // or mysqli
//define("PHPGRID_DBHOST","localhost");
//define("PHPGRID_DBUSER","root");
//define("PHPGRID_DBPASS","");
//define("PHPGRID_DBNAME","ruhungry");

// Automatically make db connection inside lib
define("PHPGRID_AUTOCONNECT",0);

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);

// set up DB
//mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
//mysql_select_db(PHPGRID_DBNAME);

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

	//$g = new jqgrid();
	// set few params
   // $grid["caption"] = ""; 
	//$grid["autowidth"] = true; 
	//$g->set_options($grid);
	// set database table for CRUD operations
	//$g->table = "restaurant_info"; 
	//$out = $g->render("list1");
	
// preserve selection for ajax call
if (!empty($_POST["tables"]))
{
	$_SESSION["tab"] = $_POST["tables"];
	$tab = $_SESSION["tab"];
}

// update on ajax call
if (!empty($_GET["grid_id"]))
	$tab = $_SESSION["tab"];

if (!empty($tab))
{
	$g = new jqgrid();
	$grid["caption"] = "'$tab'";
	// set few params
	
	$grid["autowidth"] = true;
	$g->set_options($grid);

	// set database table for CRUD operations
	$g->table = $tab;

	// render grid
	$out = $g->render("list1");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>		
	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head><!--/head-->


<body>
	<header id="header"><!--header-->
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
								<?php 
									echo('<li><a href="alerts_page.php">'.get_alert_numbers());
								?>	
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom">		
			<div class="container">	
				<div class="row">			
				<form method="post">
					<div class="col-sm-9">
						<h2 class="nav navbar-nav collapse navbar-collapse">Database Management</h2>
					</div>
					<div class="col-sm-2">
						<select name="tables">
		<?php
			$q = mysql_query('SHOW TABLES');
			while($rs = mysql_fetch_array($q))
			{ 
				$sel = (($rs[0] == $_POST["tables"])?"selected":"");
				if($rs[0]=="restaurant_info"){
			?>
				<option <?php echo $sel?>><?php echo $rs[0]?></option>
			<?php
				}
				if($rs[0]=="credit_card_hotlist"){
			?>
				<option <?php echo $sel?>><?php echo $rs[0]?></option>
			<?php
				}
			}
		?>
						</select>
					</div>
					<div class="col-sm-1">
						<input type="submit" class="btn btn-warning" value="Load" >
					</div>
				</form>
				</div>
			</div>
		</div>

	</header>

	<div class="container">
	<?php if (!empty($out)) { ?>
		<div class="col-sm-12">				
			<fieldset>
			<?php echo $out?>
			</fieldset>	
		</div>
	<?php } ?>
	</div>
	<br>
	<br>
	<br>
	<br>
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
</body>

</html>