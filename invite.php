<?php
session_start();
if($_POST[account])
{
	include "config.inc.php";
	$time= date("Y.m.d");
	$result= mysql_query("INSERT INTO 6_friendlist (user,friend,time) VALUES('$_SESSION[id_for]','$_POST[account]','$time')",$link);
	$result= mysql_query("INSERT INTO 6_friendlist (user,friend,time) VALUES('$_POST[account]','$_SESSION[id_for]','$time')",$link);
}
?>