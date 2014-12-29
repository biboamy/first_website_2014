<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	if (!IsSet($_SESSION['id_for'])) 
	{
		header('Location: index.php');
 		  exit;
	}
	$result_rr=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
	$row_rr = mysql_fetch_array($result_rr);
?>
<html>
<head>
	<title>Homework</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<script src="jquery-2.1.0.js"></script>
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/ajaxupload.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="friend.css" rel="stylesheet" />
	<script src="homework.js"></script>
	<script  src="friend.js"></script>
	<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />
</head>
<body>
	<!--HEADER-->
	<div id="header">
		<div id="logo_img"><a href="index.php"><img style="max-height:100%;"src="images/logo.png"></a></div>
		<div id="search_block">
			<div id="search_select"><img style="max-width:100%;"src="images/select_se.png"></div>
			<div id="search_col"><input size="40"id="search_text" type="text" name="search_space" placeholder="作業、專業、學校及更多內容"></div>
			<div id="deliver_search" onclick='forward()'><img style="max-width:100%;"src="images/search.png"></div>
			<div id="se_text">精選搜索</div>
		</div>
		<div id="button_block">
		<div id="friend_button" onclick='forward()'><img style="max-width:100%;"src="images/friend.png"></div>
		<div id="flag_button" onclick='forward()'><img style="max-width:100%;"src="images/flag.png"></div>
		<div id="mail_button" onclick='forward()'><img style="max-width:100%;"src="images/mail.png"></div>
		</div>
	</div>
	<div id="function_bar">
		&nbsp;&nbsp;
		<a href="recent.php"><div class="function_button">首頁</div></a>
		<a href="profile.php"><div class="function_button">個人</div></a>
		<a href="friend.php"><div class="function_button">朋友</div></a>
		<a href="introduce.php"><div class="function_button">推薦</div></a>
		<a href="logout.php"><div class="other_button">登出</div></a>
		<div class="other_button">積分 : <?php echo $row_rr['points']; ?></div>
	</div>
			
	<div id="main">
	
		<div id="left_bar">
		<center>
			<div class="left_word1">------關係中心-----</div>
			<div class="left_word"><p id="1">全部好友</p></div>
			<div class="left_word"><p id="2">同校</p></div>
			<div class="left_word"><p id="3">同科系</p></div>
			<div class="left_word"><p id="4">其他</p></div>
		</center>
		</div>

		<div id="friend_list">
		<center>
			<div id="search_friend">
				<div id="select">
					<select>
					<option value="volvo">依時間排序</option>
					</select>
				</div>
				<div id="friend_name">
					<input size="20"id="input_text" type="text" name="input_space" placeholder="輸入姓名尋找朋友">
				</div>
			</div>
		</center>
<!--total_friend-->			
		
		<?php
	$result=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$name."'",$link);
	$row=mysql_num_rows($result); //取得查詢結果的記錄筆數
		for ($i=1;$i<=$row;$i++) {
			list($user,$friend,$time)=mysql_fetch_row($result);
			$result1=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$friend."'",$link);
			$row1=mysql_num_rows($result1); //取得查詢朋友好友結果的記錄筆數
			$result2=mysql_query("SELECT * FROM `6_work` WHERE author='".$friend."'",$link);
			$row2=mysql_num_rows($result2); //取得查詢作業結果的記錄筆數
			$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$friend."'",$link);
			list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face,$points)=mysql_fetch_row($result3);
			echo "<div class='your_friend' id='friend_".$friend."'>
					<div id='face_img'><center><img class='picture' src='".$face."'/></center></div>
					<div style='display:inline-block '>
					
					<table class='picture_text'>
					<tr><td><div id='name'>".$suggest_name."</div>
							<div id='sex'>&nbsp;&nbsp;&nbsp;". ( ($sex == 'male') ? "<img  class='sex_img'  src='images/male.png'>" : "<img class='sex_img' src='images/female.png'>" ) ."</div>
							<div id='small_button' ><button onclick=deletefriend('".$friend."') id='not_friend' >//|解除關係</button>&nbsp;&nbsp;|&nbsp;&nbsp;
							<button id='talk'>私信</button></div></td></tr>
					<tr><td id='line2'><div id='friend'>好友&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row1."</span>&nbsp;&nbsp;|</div><div id='work'>&nbsp;&nbsp;作品&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row2."</span>&nbsp;&nbsp;|</div><div id='money'>&nbsp;&nbsp;財富&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$points."</span></div></td></tr>
					<tr><td>結識於&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$time."</span></td></tr>
					<tr><td>".$school."&nbsp;&nbsp;&nbsp;".$major."</td></tr>
					</table></div></div>";
		}
	?>
		<!--same_school-->	
	

<?php
	$result=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$name."'",$link);
	$row=mysql_num_rows($result); //取得查詢結果的記錄筆數
		for ($i=1;$i<=$row;$i++) {
			list($user,$friend,$time)=mysql_fetch_row($result);
			$result4=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
			list($b,$aaa,$c,$d,$aaaaa,$school_fri,$major_fri,$e)=mysql_fetch_row($result4);
			
			$result1=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$friend."'",$link);
			$row1=mysql_num_rows($result1); //取得查詢朋友好友結果的記錄筆數
			$result2=mysql_query("SELECT * FROM `6_work` WHERE author='".$friend."'",$link);
			$row2=mysql_num_rows($result2); //取得查詢作業結果的記錄筆數
			$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$friend."'",$link);
			list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face,$points)=mysql_fetch_row($result3);
			if($school_fri==$school){
			echo "<div class='your_friend1'>
					<div id='face_img'><center><img class='picture' src='".$face."'/></center></div>
					<div style='display:inline-block '>
					
					<table class='picture_text'>
					<tr><td><div id='name'>".$suggest_name."</div>
							<div id='sex'>&nbsp;&nbsp;&nbsp;". ( ($sex == 'male') ? "<img  class='sex_img'  src='images/male.png'>" : "<img class='sex_img' src='images/female.png'>" ) ."</div>
							<div id='small_button' ><button onclick=deletefriend('".$friend."') id='not_friend' >//|解除關係</button>&nbsp;&nbsp;|&nbsp;&nbsp;
							<button id='talk'>私信</button></div></td></tr>
					<tr><td id='line2'><div id='friend'>好友&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row1."</span>&nbsp;&nbsp;|</div><div id='work'>&nbsp;&nbsp;作品&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row2."</span>&nbsp;&nbsp;|</div><div id='money'>&nbsp;&nbsp;財富&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$points."</span></div></td></tr>
					<tr><td>結識於&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$time."</span></td></tr>
					<tr><td>".$school."&nbsp;&nbsp;&nbsp;".$major."</td></tr>
					</table></div></div>";
		}
		}
	?>
			<!--same_major-->	

<?php
	$result=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$name."'",$link);
	$row=mysql_num_rows($result); //取得查詢結果的記錄筆數
		for ($i=1;$i<=$row;$i++) {
			list($user,$friend,$time)=mysql_fetch_row($result);
			$result4=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
			list($b,$aaa,$c,$d,$aaaaa,$school_fri,$major_fri,$e)=mysql_fetch_row($result4);
			
			$result1=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$friend."'",$link);
			$row1=mysql_num_rows($result1); //取得查詢朋友好友結果的記錄筆數
			$result2=mysql_query("SELECT * FROM `6_work` WHERE author='".$friend."'",$link);
			$row2=mysql_num_rows($result2); //取得查詢作業結果的記錄筆數
			$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$friend."'",$link);
			list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face,$points)=mysql_fetch_row($result3);
			if($major_fri==$major){
			echo "<div class='your_friend2'>
					<div id='face_img'><center><img class='picture' src='".$face."'/></center></div>
					<div style='display:inline-block '>
					
					<table class='picture_text'>
					<tr><td><div id='name'>".$suggest_name."</div>
							<div id='sex'>&nbsp;&nbsp;&nbsp;". ( ($sex == 'male') ? "<img  class='sex_img'  src='images/male.png'>" : "<img class='sex_img' src='images/female.png'>" ) ."</div>
							<div id='small_button' ><button onclick=deletefriend('".$friend."') id='not_friend' >//|解除關係</button>&nbsp;&nbsp;|&nbsp;&nbsp;
							<button id='talk'>私信</button></div></td></tr>
					<tr><td id='line2'><div id='friend'>好友&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row1."</span>&nbsp;&nbsp;|</div><div id='work'>&nbsp;&nbsp;作品&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$row2."</span>&nbsp;&nbsp;|</div><div id='money'>&nbsp;&nbsp;財富&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$points."</span></div></td></tr>
					<tr><td>結識於&nbsp;&nbsp;&nbsp;<span style='color: #35A71A;'>".$time."</span></td></tr>
					<tr><td>".$school."&nbsp;&nbsp;&nbsp;".$major."</td></tr>
					</table></div></div>";
		}
		}
	?>
		</div>	
	
		
	</div>

	<div id="footer">
		<div id="logo_img"><img style="max-width:80%;"src="images/logo.png"></div>
	</div>
</body>
</html>