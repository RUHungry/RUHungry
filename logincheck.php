<?php
require('./mysql.php');
$username=$_REQUEST['uname'];
$password=$_REQUEST['pword'];
session_start();
$_SESSION['s_username']=$username;
$query_user="select * from customer_info where Username = '$username' and Customer_Password = '$password'";
/* $db=new mysql();//initialize mysql */
$result = $db->mysql_query($query_user);// user validation
$num_results=$result->num_rows;//取得数据库中的记录行

if($num_results==0)
{
    echo 'Login failed. Please try again.';
?>
<p><a href="./login.php">返回登陆</a></p>
<?php
}else{
header("Location: ./index.html");
}
?>

/*

templates/login.tpl

*/

<html>
<head>
<meta http-equiv="text/html;charset='utf-8'">
<link  rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="js/face.js"></script>
</head>
<body>
<table width="400px" height="208" border="0" cellpadding="0" cellspacing="0" >
<form id="login" name="login" method="post" action="a.php" onSubmit="">
  <tr>
    <td height="25"  align="right">用户名：</td>
    <td><input name="name" type="text" onmouseover="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">密码：</td>
    <td><input name="password" type="password" id="password"  onmouseover="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" size="15" /></td>
  </tr>
  <tr>
    <td height="25"align="right">验证码：</td>
    <td><input name="check" type="text" id="check"  onmouseover="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" size="10" /><img src="code.php" id="code" /></td>
  </tr>

