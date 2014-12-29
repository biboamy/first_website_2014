<?php
session_start();
include "config.inc.php";
$name=$_SESSION['id_for'];
date_default_timezone_set("Asia/Taipei");
$sql = "UPDATE 6_user SET name='$_POST[name]',phone='$_POST[phone]',mail='$_POST[mail]',facebook='$_POST[facebook]',school='$_POST[school]',major='$_POST[major]' WHERE uid='$name'";
mysql_query($sql,$link);


		
		if($_FILES[file][name]!="")
		{
			$path_parts = pathinfo($_FILES[file][name]);
		$face_path='face/n'.rand(0,10000).'_'.date(y).date(m).date(d).date(h).date(i).date(s).'.'.$path_parts['extension'];
		move_uploaded_file($_FILES['file']['tmp_name'],$face_path);//複製檔案
			$result= mysql_query("UPDATE 6_user SET face='$face_path' WHERE uid='$name'",$link);
		}
?>