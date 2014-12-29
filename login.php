<?php
session_start();
echo "<meta http-equiv='content-type' content='text/html; charset=UTF-8'>";
if($_POST[account]&$_POST[pw])
{
	include "config.inc.php";
	$result=mysql_query("SELECT * FROM `6_user` WHERE account='$_POST[account]'",$link);
	if($rows=mysql_fetch_array($result,MYSQL_ASSOC))
	{
		if($rows[pw]==$_POST[pw])
		{
			echo "<script type='text/javascript'>alert('歡迎!!');</script>";
			echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
			$_SESSION['id_for']=$rows[uid];
		}
		else
		{
			echo "<script type='text/javascript'>alert('密碼錯誤!!');</script>";
			echo "<html><head><meta http-equiv='refresh' content='0;url=index.php'></head></html>";

		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('此帳號不存在!!');</script>";
		echo "<html><head><meta http-equiv='refresh' content='0;url=index.php'></head></html>";
	}
}
else
{
	echo "<script type='text/javascript'>alert('請輸入帳號與密碼!!');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=index.php'></head></html>";
}

?>

