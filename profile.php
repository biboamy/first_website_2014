<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	$result=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
	$row = mysql_fetch_array($result);
	$result2=mysql_query("SELECT * FROM `6_work` WHERE author='".$name."' ORDER BY time desc",$link);
	$row2=mysql_num_rows($result2); //取得查詢結果的記錄筆數
	$friend_r=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$name."' ",$link);
	$friend_num=mysql_num_rows($friend_r); //取得查詢結果的記錄筆數
	if (!IsSet($_SESSION['id_for'])) 
	{
		header('Location: index.php');
 		  exit;
	}
?>
<html>
<head>
	<title>Homework</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<link href="profile.css" rel="stylesheet" />
	<script src="jquery-2.1.0.js"></script>
	<link rel="stylesheet" href="fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="fancyBox/source/jquery.fancybox.pack.js"></script>
	<script src="profile.js"></script>
	<script src="homework.js"></script>
	<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />
<script>
$(document).ready(function() { 
$("a#checkuserinfo").fancybox({
'transitionIn' : 'elastic',
'transitionOut' : 'elastic',
'overlayOpacity': 0.9,
'overlayColor' : '#000',
'autoSize':false,
'width':'300px',
'afterClose': function() { window.location='profile.php' },
});

});
</script>
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
		<div class="other_button">積分 : <?php echo $row['points']; ?></div>
	</div>


<div id="main">
<div id="left_block">
	<!--PROFILE-->
	<div id="profile">
		<div id="profile_info"><div id="face_img"><?php echo "<center><img id='profile_img' src='".$row['face']."'></center>";?></div>
			<div style="display:inline-block ;">
				<table id="profile_text">
					<tr><td id='name'><?php echo $row['name'];?></td></tr>
					<tr><td id='school'><?php echo $row['school'];?></td></tr>
					<tr><td id='major'><?php echo $row['major'];?></td></tr>
					<tr><td>積分&emsp;<p id='money'><?php echo $row['points'];?></p></td></tr>
					<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
					<tr><td><a  class="fancybox fancybox.iframe" href="userinfo.php" id="checkuserinfo"><img style="max-width:100px;float:left;" src="images/complete_info.png"></a></td>
						<td id='friendd'><p id='friend_num'>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $friend_num;?></p>&nbsp;位好友</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="contact">
			<div class="contact_line"><div class="contact_button"><img style="max-width: 20px;" src="images/mail_s.png"></div>&nbsp;&nbsp;郵箱&emsp;<p class="contact_info"><?php echo $row['mail'];?></p></div>
			<div class="contact_line"><div class="contact_button"><img style="max-width: 20px;" src="images/phone_s.png"></div>&nbsp;&nbsp;手機&emsp;<p class="contact_info"><?php echo $row['phone'];?></p></div>
			<div id="contact_line_bottom"><div class="contact_button"><img style="max-width: 20px;" src="images/facebook_s.png"></div>&nbsp;&nbsp;臉書&emsp;<p class="contact_info">
			<?php
				$file_headers = @get_headers($row['facebook']);
				if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    				echo "<a id='facebook'>".$row['facebook']."</a>";
				}
				else {
    				echo "<a id='facebook' href='".$row['facebook']."'>".$row['facebook']."</a>";
				}
			?></p></div>
		</div>
			<div id="contact_line_h"><div class="contact_button"><img style="max-width: 20px;" src="images/gray.png"></div>&nbsp;&nbsp;佳作&emsp;</div>
			<div id="contact_me"><center><div class="contact_button"><img style="max-width: 20px;" src="images/top_triangle.png"></div>&nbsp;&nbsp;聯繫方式</center></div>	
	</div>

	
	
	<!--UPLOAD-->
	<div id="upload_bg">
		<center><div id="upload"><img src="images/release.png" style="max-height:100%;"></div></center>
	</div>
	<div id="answer">
		<form action="work_upload.php" id="work_form"enctype="multipart/form-data" method="post">
		<div id="release_info">
			作品名稱</br>
			<input size="40" class="work_" type="text" name="name" maxlength="14"></br>
			簡要介紹</br>
			<textarea id="work_description" name="description" maxlength="50" form="work_form"></textarea></br>
			所需積分</br>
			<input class="work_" type="text" name="need" maxlength="3">
		</div>
		<div id="preview_block">
		作業預覽</br>
			<div id="work_preview"><img src="images/default_work.png" style="max-height:100%;"></div>
			<input id="work_file" name="file" type="file"/>
			<input id="work_submit" name="submit" type="submit" value="開始上傳">
		</div>
		
		</form>
	</div>

	

	<!--YOUR HOMEWORK-->
	<?php
		for ($i=1;$i<=$row2;$i++) {
			list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
			list($time,$zzzzzz)=split(" ",$time);
			echo "<div id='your_work'>
				<div id='work_title'><img src='images/goodwork.png' style='max-height:100%;'></div>
				<div id='work_content'>
					<table id='work_table'>
					<tr><td class='work_info' style='height:80px'>作業名稱</td><td class='work_info2'>".$work_name."</td></tr>
					<tr><td class='work_info' style='height:40px'>發佈時間</td><td class='work_info2'>".$time."</td></tr>
					<tr><td class='work_info' style='height:40px'>所需積分</td><td class='work_info2'>".$need."</td></tr>
					<tr><td colspan='2' style='height:40px'>簡要介紹</td></tr>
					<tr><td colspan='2' class='work_info' style='height:100px;overflow:hidden;'><p id='work_intro'>".$description."</p></td></tr>
					</table>
					<div id='work_photo'><img src='".$address."' style='max-height:100%'></div>
				</div>
				</div>";
		echo "<div class='comment_display' id='work_num_".$work_num."'><script>comment_display('".$work_num."');</script></div>";
		//echo "<span id='readmore_".$work_num."'></span>";
		echo "<div class='readmore' ><center><a class='btn1' id='".$work_num."'>查看更多</a>
			<a class='btn2' id='".$work_num."'>關閉</a></center></div>";
		echo "<input type='text' height='30px' id='words_".$work_num."' name='words'  autocomplete='off' size='80' onkeydown=javascript:comment_key('".$work_num."')>";
	}
	?>
	<div id="more_homework"><center><img src="images/more.png" style="max-height:100%"></center></div>


</div><!--left block end-->
<div id="right_block">	
	<!--RIGHT BAR-->
	<div id="right_bar">
		<p style="margin-left:10%;padding-top:20px;">你可能認識的人</p>
		<?php
			$max_suggest=0;
			$ary=array();
			$suggest=mysql_query("SELECT * FROM `6_user` ",$link);
			
			$suggest_row=mysql_num_rows($suggest); //取得查詢結果的記錄筆數
			
			for ($i=1;$i<=$suggest_row;$i++) {
				$fri_ok=0;
				list($account,$aaa,$suggest_name,$aaaa,$aaaaa,$school,$aaaaaa,$face,$zz,$zzz,$zzzz,$zzzzz,$uid)=mysql_fetch_row($suggest);
				if($uid!=$name){
				$result=mysql_query("SELECT * FROM `6_friendlist` WHERE user='".$name."'",$link);
				$row=mysql_num_rows($result);
					for($j=1;$j<=$row;$j++){
						list($user,$friend)=mysql_fetch_row($result);
						$ary[j-1]=$friend;
						if($uid==$friend){
						
						$fri_ok=1;
						
						}
					}
					if($fri_ok==0){
					$max_suggest++;
					echo "<div class='friend' id='friend_".$uid."'>
					<img class='picture'src='".$face."'>
					<table class='picture_text'><tr><td>".$suggest_name."</td></tr>
					<tr><td>".$school."</td></tr>
					<tr><td><img onclick=invitefriend('".$uid."') style='max-width:70px;float:left;cursor:pointer' src='images/plus_friend.png'/></td></tr>
					</table></div>";
					}					
				}
				if($max_suggest==3) {break;}
			}
		?>
		<div id="maybelike">
		<p>你可能喜歡的作業</p>
		<center><div id="like_img"><img style="max-width:100%;" src="images/17.png"></div></center>
		</div>
	</div>
	<!--TIME BAR-->
	<div id="time_bar">
		<p style="margin-left:20px;margin-top:20px;">時間軸</p>
		<center>
			<p>2014年3月</p><p>2014年2月</p><p>2014年1月</p><p>2013年12月</p><p>更早以前</p>
	</div>

</div><!--right block end-->
</div><!--main end-->
	<div id="footer">
		<div id="logo_img"><img style="max-width:80%;"src="images/logo.png"></div>
	</div>
</body>
</html>