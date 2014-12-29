<?php
session_start();
include "config.inc.php";
$name=$_SESSION['id_for'];
if($_POST[uid]&$_POST[need])
{
	$result=mysql_query("SELECT points FROM `6_user` WHERE uid='".$_POST[uid]."'",$link);
	list($points) = mysql_fetch_row($result);
	if($points>$_POST[need])
	{
		$sql = "UPDATE 6_user SET points=points-'$_POST[need]' WHERE uid='$_POST[uid]'";
		mysql_query($sql,$link);
		echo "已扣除積分".$_POST[need]."點";
	}
	else
	{
		echo "積分不足";
	}
}



?>