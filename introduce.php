<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	$result=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
	$row = mysql_fetch_array($result);
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
	<link href="intro.css" rel="stylesheet" />
	<script src="points.js"></script>
	<script type="text/javascript" src="jquery-2.1.0.js"></script>
	<script type="text/javascript" src="jRating-master/jquery/jRating.jquery.js"></script>
	<script src="jquery-2.1.0.js"></script>
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script src="homework.js"></script>
	<script src="intro.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/CSSreset.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/als_demo.css" />
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="jQuery plugin, jQuery scroller, list jQuery, jQuery lists, css3, html5, jQuery" />
    <meta name="description" content="any list scroller demo - jQuery scrolling plugin by musings.it to scroll any kind of list with any content - musings.it web design and development - Bergamo Italy" /> 	
	<meta name="author" content="Federica Sibella - musings.it" />
	<meta name="geo.placename" content="via Generale Alberico Albricci 1, 24128 Bergamo, Italy">
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.als-1.5.min.js"></script>
	<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />
	<script type="text/javascript" src="jRating-master/jquery/jRating.jquery.js"></script>
	<link rel="stylesheet" href="jRating-master/jquery/jRating.jquery.css" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function(){
			$('.rating').jRating({
				rateMax:10,
				isDisabled:true,
				bigStarsPath:'images/h_stars_grayback.png',
			});
		});
</script>
</head>
<body>
	<!--HEADER-->
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

<!--intro-->
<div class="main">

	<div class='work_title'><img src='images/design.png' style='max-height:100%;'></div>
<section id="content1">
			<div id="lista1" class="als-container" >
				<span class="als-prev"><img src="images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
				<div class="als-viewport" >					
					<ul class="als-wrapper">
					<center>
					<?php						
						$result2=mysql_query("SELECT * FROM `6_work` ",$link);
						$row2=mysql_num_rows($result2);
						for ($i=1;$i<=$row2;$i++) {
						list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
						if($author!=$name){
						
						$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$author."'",$link);
						list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face)=mysql_fetch_row($result3);

						if($major=='工業設計學系'){
						$rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
				$you_rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
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
						echo
						"<li class='als-item'><img class='work_img' src='".$address."' style='max-height:250px;max-width:298px;'/>
						<table class='work_table'>
						<tr><td class='work_name'>".$work_name."</td></tr>
						<tr><td class='score_row'>
							<div class='score'><div style='background-color:gray;' class='rating' id='rating".$work_num."' data-average='".$avg."' data-id='".$work_num."'></div></div>
						</td></tr>
						<tr><td>上傳者:&nbsp;&nbsp;".$suggest_name."</td></tr>
						<tr><td class='need_money'>所需財富:&nbsp;&nbsp;<span style='color: #35A71A;'>".$need."</span></td></tr>
						<tr><td class='work_time'>".$time."</td></tr>
					</table></li>
						";
						
						}
						}
						}
						?>
					</center></ul>
						
				</div>
				<span class="als-next"><img src="images/thin_right_arrow_333.png" alt="next" title="next" /></span>
			</div>
		</section>
	<center>
	<div class="more_homework1"><img class="img1" src="images/more1.png" style="max-height:100%"></div>
	</center>
</div>	

<!--manage-->
<div class="main">
	<div class='work_title'><img src='images/manage.png' style='max-height:100%;'></div>
	<section id="content2">
			<div id="lista2" class="als-container">
				<span class="als-prev"><img src="images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
				<div class="als-viewport">					
					<ul class="als-wrapper">
					<?php						
						$result2=mysql_query("SELECT * FROM `6_work` ",$link);
						$row2=mysql_num_rows($result2);
						for ($i=1;$i<=$row2;$i++) {
						list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
						if($author!=$name){
						
						$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$author."'",$link);
						list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face)=mysql_fetch_row($result3);
						
						if($major=='企業管理學系'){
						$rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
				$you_rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
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
						echo
						"<li class='als-item'><img class='work_img' src='".$address."' style='max-height:250px;max-width:298px;'/>
						<table class='work_table'>
						<tr><td class='work_name'>".$work_name."</td></tr>
						<tr><td class='score_row'>
							<div style='background-color:gray;' class='rating' id='rating".$work_num."' data-average='".$avg."' data-id='".$work_num."'></div>
						</td></tr>
						<tr><td>上傳者:&nbsp;&nbsp;".$suggest_name."</td></tr>
						<tr><td class='need_money'>所需財富:&nbsp;&nbsp;<span style='color: #35A71A;'>".$need."</span></td></tr>
						<tr><td class='work_time'>".$time."</td></tr>
					</table></li>
						";
						
						}
						}
						}
						?>
					</ul>
						
				</div>
				<span class="als-next"><img src="images/thin_right_arrow_333.png" alt="next" title="next" /></span>
			</div>
		</section>
	<center><div class="more_homework2"><img class="img2" src="images/more1.png" style="max-height:100%"></div></center>
</div>	

<!--computer-->
<div class="main">
	<div class='work_title'><img src='images/computer.png' style='max-height:100%;'></div>
	<section id="content3">
			<div id="lista3" class="als-container" >
				<span class="als-prev"><img src="images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
				<div class="als-viewport">					
					<ul class="als-wrapper">
					<?php						
						$result2=mysql_query("SELECT * FROM `6_work` ",$link);
						$row2=mysql_num_rows($result2);
						for ($i=1;$i<=$row2;$i++) {
						list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
						if($author!=$name){
						
						$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$author."'",$link);
						list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face)=mysql_fetch_row($result3);
						
						if($major=='資訊工程學系'){
						$rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
				$you_rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
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
						echo
						"<li class='als-item'><div class='work_img'><img src='".$address."' style='max-height:100%;max-width:298px;'/></div>
						<table class='work_table'>
						<tr><td class='work_name'>".$work_name."</td></tr>
						<tr><td class='score_row'>
							<div style='background-color:gray;' class='rating' id='rating".$work_num."' data-average='".$avg."' data-id='".$work_num."'></div>
						</td></tr>
						<tr><td>上傳者:&nbsp;&nbsp;".$suggest_name."</td></tr>
						<tr><td class='need_money'>所需財富:&nbsp;&nbsp;<span style='color: #35A71A;'>".$need."</span></td></tr>
						<tr><td class='work_time'>".$time."</td></tr>
					</table></li>
						";
						
						}
						}
						}
						?>
					</ul>
						
				</div>
				<span class="als-next"><img src="images/thin_right_arrow_333.png" alt="next" title="next" /></span>
			</div>
		</section>
	<center><div class="more_homework3"><img class="img3" src="images/more1.png" style="max-height:100%"></div></center>
</div>

<!--ee-->
<div class="main">
	<div class='work_title'><img src='images/ee.png' style='max-height:100%;'></div>
		<section id="content4">
			<div id="lista4" class="als-container">
				<span class="als-prev"><img src="images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
				<div class="als-viewport">					
					<ul class="als-wrapper">
					<?php						
						$result2=mysql_query("SELECT * FROM `6_work` ",$link);
						$row2=mysql_num_rows($result2);
						for ($i=1;$i<=$row2;$i++) {
						list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
						if($author!=$name){
						
						$result3=mysql_query("SELECT * FROM `6_user` WHERE uid='".$author."'",$link);
						list($account,$aaa,$suggest_name,$sex,$aaaaa,$school,$major,$face)=mysql_fetch_row($result3);

						if($major=='電機工程學系'){
						$rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
				$you_rank_result=mysql_query("SELECT rank FROM `6_rating` WHERE work_num='".$work_num."'",$link);
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
						echo
						"<li class='als-item'><img class='work_img' src='".$address."' style='max-height:250px;max-width:298px;'/>
						<table class='work_table'>
						<tr><td class='work_name'>".$work_name."</td></tr>
						<tr><td class='score_row'>
							<div style='background-color:gray;' class='rating' id='rating".$work_num."' data-average='".$avg."' data-id='".$work_num."'></div>
						</td></tr>
						<tr><td>上傳者:&nbsp;&nbsp;".$suggest_name."</td></tr>
						<tr><td class='need_money'>所需財富:&nbsp;&nbsp;<span style='color: #35A71A;'>".$need."</span></td></tr>
						<tr><td class='work_time'>".$time."</td></tr>
					</table></li>
						";
						
						}
						}
						}
						?>
					</ul>
						
				</div>
				<span class="als-next"><img src="images/thin_right_arrow_333.png" alt="next" title="next" /></span>
			</div>
		</section>
	<center><div class="more_homework4"><img class="img4" src="images/more1.png" style="max-height:100%"></div></center>
</div>
<!--footer-->
	<div id="footer">
		<div id="logo_img"><img style="max-width:80%;"src="images/logo.png"></div>
	</div>
	
</body>
</html>