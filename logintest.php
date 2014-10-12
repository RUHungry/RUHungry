<?php
$login=$_POST["login"];
$userid=$_POST["userid"];
if($login=="login")
{
    $pwd=$_POST["pwd"];
    $link=mysql_connect("localhost","root","toor");
    if(!$link) echo "没有连接成功!";
    else echo "连接成功!";

    mysql_select_db("ruhungry", $link); //选择数据库
    $q = "select * from customer_info where Username = '$userid' and Customer_Password = '$pwd'"; //SQL查询语句
    mysql_query("SET NAMES UTF-8");
    $rs = mysql_query($q); //获取数据集
    if(!$rs){die("Valid result!");}
    while($row = mysql_fetch_row($rs)) 
	echo $row;
	echo "<table><tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>"; //显示数据
	echo "</table>";
}
?> 