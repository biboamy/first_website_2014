<?php
session_start();
$name=$_SESSION['id_for'];

if($_POST[work_num])
{
	include "./config.inc.php";

	$result_c=mysql_query("SELECT * FROM `6_work_comment` WHERE work_num='".$_POST[work_num]."'",$link);
		$comment_num=mysql_num_rows($result_c); //取得查詢結果的記錄筆數
		for ($j=1;$j<=$comment_num;$j++) {
			list($worknn,$writer_account,$comment,$writer_time)=mysql_fetch_row($result_c);
			$result_writer=mysql_query("SELECT * FROM `6_user` WHERE uid='".$writer_account."'",$link);
			$writer_array = mysql_fetch_array($result_writer);
			echo "<div class='comment_block'><div class='comment'>
					<img class='comment_face' src='".$writer_array['face']."'/>
					<table class='comment_text'><tr><td class='name'>".$writer_array['name']."&nbsp;<span class='comments'>:&nbsp;".$comment."</td></tr>
					<tr><td class='time'>".$writer_time."</td></tr>
					</table></div></div>
				</div>";
			}
}	



?>