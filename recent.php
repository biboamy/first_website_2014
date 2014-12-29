<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	if (!IsSet($_SESSION['id_for'])) 
	{
		header('Location: index.php');
 		  exit;
	}
	$result=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
	$row = mysql_fetch_array($result);
?>
<html>
<head>
	<title>Homework</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<link href="recent.css" rel="stylesheet" />
	<script src="homework.js"></script>
	<script src="points.js"></script>
	<script type="text/javascript" src="jquery-2.1.0.js"></script>
	<script type="text/javascript" src="jRating-master/jquery/jRating.jquery.js"></script>
	<script type="text/javascript" src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="jRating-master/jquery/jRating.jquery.css" type="text/css" />
	<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css" type="text/css" />
	<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />
<script type="text/javascript">
		$(document).ready(function(){
			$('.rating').jRating({
				rateMax:10,
			});
		});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
			$('.work_script').popover('hide');
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

	<!--Recent-->
	<center>
		<!--<div class="datasSent">
	Datas sent to the server :
	<p></p>
</div>
<div class="serverResponse">
	Server response :
	<p></p>
</div>-->
		<?php
			//select friend work
			$friend_work=mysql_query("SELECT * from 6_work WHERE author IN (select friend from 6_friendlist WHERE user='".$name."') ORDER BY time desc",$link);
			while (list($friend_author,$friend_work_num,$friend_time,$friend_name,$friend_description,$friend_need,$friend_address)= mysql_fetch_row($friend_work))
			{
				//select work ranking array
				$rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$friend_work_num."'",$link);
				$you_rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$friend_work_num."' AND work_num='".$friend_work_num."'",$link);
				list($you_rank)=mysql_fetch_row($you_rank_result);
				$rank_l=mysql_num_rows($rank_result);
				$savedArray = array();
				while($savedResult = mysql_fetch_assoc($rank_result)) {
					$savedArray[] = $savedResult['rank'];
				}
				//culculate average of ranking
				if($rank_l==0)
				{
					$avg=5;
				}
				else
				{
					$avg=array_sum($savedArray)/$rank_l;
				}
				$avg=round($avg,1);//display 1bit of decimal
				//parse friend info

				?>
				
				<?php
				
				$friend_info=mysql_query("SELECT name,major,face from 6_user WHERE uid='".$friend_author."'",$link);
				list($friend_user_name,$friend_major,$friend_user_face)=mysql_fetch_row($friend_info);
				echo "	<div class='recent_update'>
							<div class='update_img'><center><img src='".$friend_address."' style='max-height:100%'/></center></div>
							<div class='update_info'>
								<table class='work_table'>
									<tr><td class='work_info'>
										<div class='release_person'><img src='".$friend_user_face."' style='max-height:100%'/>
										</div>
										<table class='release_info'>
										<tr><td class='name'>".$friend_user_name."</td></tr><tr><td class='school'>".$friend_major."</td></tr><tr><td class='self'>原創</td></tr>
										</table>
									</td></tr>
									<tr><td class='work_info'>簡要介紹</br><div  id='w_script'>&nbsp;&nbsp;&nbsp;&nbsp;<p class='work_script' data-toggle='popover' data-trigger='click' data-placement='left' data-content='".$friend_description."' title='".$friend_name."'>".$friend_description."</p></div></td></tr>
									<tr><td class='work_info'>當前評分<p class='work_need'>".$you_rank." / Avg ".$avg."</p></br>
										<div class='exemple'>
	<div class='rating' id='rating".$friend_work_num."' data-average='".$avg."' data-id='".$friend_work_num."'></div>
</div>
										<!--<div class='score'><img src='images/green.png' style='max-width:100%'></div>
										--></td></tr>
									<tr><td class='work_info'>所需積分<p class='work_need'>".$friend_need."</p></td></tr>
									<tr><td><a class='download_button' href=javascript:download_confirm('".$name."','".$friend_work_num."',".$friend_need.")>下載</a>
									&emsp;<a class='download_button' href=javascript:forward()>檢舉</a></td></tr>
								</table>
							</div>
							<div class='work_comment'>
								<div class='comment_line' id='comment_line_".$friend_work_num."'>
									<span id='work_num_".$friend_work_num."'><script>recent_comment_display('".$friend_work_num."');</script></span>
									<div class='comment_input'>
										<textarea placeholder='評論...' id='words_".$friend_work_num."' class='words' name='words'  autocomplete='off' onkeydown=javascript:recent_comment_key('".$friend_work_num."')></textarea>
									</div>
								</div>
							</div>
						</div>";
			}
		?>
		<div id="more_homework"><center><img src="images/more.png" style="max-height:100%"></center></div>
	</center>
</body>
</html>