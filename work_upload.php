<?php
session_start();
$name=$_SESSION['id_for'];
include "./config.inc.php";
date_default_timezone_set("Asia/Taipei");
echo "<meta http-equiv='content-type' content='text/html; charset=UTF-8'>";
if($_FILES['file']['error']>0){
	$message="檔案上傳失敗！";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
	exit;
}
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 500000))
{

if($_POST[name]&$_POST[description]&$_POST[need])
{
	if(is_numeric($_POST[need]))
	{
		$need=(int)$_POST[need];
		$path_parts = pathinfo($_FILES[file][name]);
		$filename=rand(0,9999).'_'.rand(0,9999).'_'.date(h).date(i).date(s).date(y).date(m).date(d).'.'.$path_parts['extension'];
		$time=date(y).date(m).date(d).date(h).date(i).date(s);
		$filepath='file/f'.$filename;
		$result=mysql_query("INSERT INTO 6_work (author,work_num,time,name ,description ,need,address) VALUES ( '$name','$filename','$time','$_POST[name]','$_POST[description]','$need' ,'$filepath')",$link);
		move_uploaded_file($_FILES['file']['tmp_name'],$filepath);
		//move_uploaded_file($_FILES['file']['tmp_name'], iconv("utf-8", "big5", 'file/'.$_FILES['file']['name']));//複製檔案
		//echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';//顯示檔案路徑
		$sql = "UPDATE 6_user SET points=points+10 WHERE uid='$name'";
		mysql_query($sql,$link);
		$message="檔案上傳成功!! 獲得10點積分!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
		
	}
	else
	{
		$message="請輸入所需積分!!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
	
	}
	
}
else
{
	$message="作品資料不齊全!!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
}

}
else
{
	$message="目前只提供圖檔作業上傳，檔案必須小於500KB";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=profile.php'></head></html>";
}
?>