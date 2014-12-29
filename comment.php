<?php
session_start();
$name=$_SESSION['id_for'];

if($_POST[words]&$_POST[work_num])
{
	include "./config.inc.php";
	date_default_timezone_set("Asia/Taipei");
	$time=date(y).date(m).date(d).date(h).date(i).date(s);
	$result=mysql_query("INSERT INTO 6_work_comment (work_num,account,comment ,time) VALUES ( '$_POST[work_num]','$name','$_POST[words]','$time')",$link);
	
}	



?>