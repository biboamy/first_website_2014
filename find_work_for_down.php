<?php
session_start();
include "config.inc.php";
$name=$_SESSION['id_for'];
if($_POST[work_num])
{
    $work=mysql_query("SELECT address from 6_work WHERE work_num='".$_POST[work_num]."'",$link);
	list($work_address)=mysql_fetch_row($work);
	echo $work_address;
}
?>