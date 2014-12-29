<?php
session_start();
$name=$_SESSION['id_for'];

if($_POST[work_num])
{
	include "./config.inc.php";
	$cms_result=mysql_query("SELECT * FROM `work_comment` WHERE work_num='".$_POST[work_num]."' ",$link);
	if(mysql_num_rows($cms_result)>3)
	{
		echo "<div class='readmore' ><center><a class='btn1' id='".$_POST[work_num]."'>查看更多</a>
			<a class='btn2' id='".$_POST[work_num]."'>關閉</a></center></div>";
	}
}	



?>
			