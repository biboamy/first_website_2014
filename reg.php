<?php
session_start();
$message="hello";
echo "<meta http-equiv='content-type' content='text/html; charset=UTF-8'>";
if($_FILES['file']['error']>0){
  $message ="";
}
if($_POST[account]&$_POST[pw]&$_POST[name]&$_POST[sex]&$_POST[year]&$_POST[month]&$_POST[day]&$_POST[school]&$_POST[major])
{
	include "config.inc.php";
	date_default_timezone_set("Asia/Taipei");
	$birthday=$_POST[year]."/".$_POST[month]."/".$_POST[day];
	$result= mysql_query("SELECT * FROM 6_user WHERE account='$_POST[account]'",$link);
	if($rows=mysql_fetch_array($result,MYSQL_ASSOC))
	{
		$message = "ID have been used!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<html><head><meta http-equiv='refresh' content='0;url=register.php'></head></html>";
	}
	else
	{
		$message = "Successful Register!";
		$r='face/'.$_FILES[file][name];
		$path_parts = pathinfo($_FILES[file][name]);
		$face_path='face/n'.rand(0,10000).'_'.date(y).date(m).date(d).date(h).date(i).date(s).'.'.$path_parts['extension'];
		move_uploaded_file($_FILES['file']['tmp_name'],$face_path);//複製檔案
		$uid=rand(0,100).'_'.rand(0,10000).'_'.date(m).date(d).date(h).date(i).date(s);
		$result= mysql_query("INSERT INTO 6_user (account,pw,name,sex,birthday,school,major,uid) VALUES('$_POST[account]','$_POST[pw]',
			'$_POST[name]','$_POST[sex]','$birthday','$_POST[school]','$_POST[major]','$uid')",$link);
		if($_FILES[file][name]!="")
		{

			$result= mysql_query("UPDATE 6_user SET face='$face_path' WHERE uid='$uid'",$link);
		}
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<html><head><meta http-equiv='refresh' content='0;url=index.php'></head></html>";
	}
}
else
{
	$message = "User info is not complete!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=register.php'></head></html>";
}

?>