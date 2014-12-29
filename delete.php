<?php
session_start();
if($_POST[friend])
{
	include "config.inc.php";
	$result= mysql_query("DELETE FROM 6_friendlist WHERE user='$_SESSION[id_for]' AND friend='$_POST[friend]';",$link);
	$result= mysql_query("DELETE FROM 6_friendlist WHERE user='$_POST[friend]' AND friend='$_SESSION[id_for]';",$link);
}
?>