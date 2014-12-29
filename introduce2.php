<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
?>
<html>
<head>
	<title>Homework</title>
	<meta charset="utf-8">
	<link href="intro.css" rel="stylesheet" />
	<script src="jquery-2.1.0.js"></script>
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script src="homework.js"></script>
<script>
$(document).ready(function(){
	$(".more_homework").click(function(){
        var src = $('#img1').attr('src');
        if(src == 'images/more1.png') {
            $("#img1").attr("src","images/more2.png");
        } 
		else {
            $("#img1").attr("src","images/more1.png");
        }
    $("#ps_slider").slideToggle();
  });
});
$(document).ready(function(){
	$( "#right" ).click(function() {
		$( "#block_1" ).animate({
      left:'250px',
      opacity:'0.5',
      height:'150px',
      width:'150px'
    });
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
		<div class="other_button">聯絡我們</div>
		<a href="logout.php"><div class="other_button">登出</div></a>
	</div>

<!--intro-->
<div class="main">
	<div class='work_title'><img src='images/design.png' style='max-height:100%;'></div>
	<div id='ps_slider' class='ps_slider'>
	<div id='ps_albums'>
	<?php
		$i=1;
		$result2=mysql_query("SELECT * FROM `work` ",$link);
		$row2=mysql_num_rows($result2);
		for (;$i<=$row2;) {
			list($author,$work_num,$time,$work_name,$description,$need,$address)=mysql_fetch_row($result2);
			if($author!=$name){
		
			echo "<div class='work_content' id='block_$i'>
					<div id='work_photo'><img src='".$address."' style='max-height:100%'></div>
					<table id='work_table'>
						<tr><td id='work_name'>".$work_name."</td></tr>
						<tr><td id='score_row'>
							<div class='score' style='margin-left:0px;'><img src='images/green.png' style='max-width:100%'></div>
							<div class='score'><img src='images/green.png' style='max-width:100%'></div>
							<div class='score'><img src='images/green.png' style='max-width:100%'></div>
							<div class='score'><img src='images/gray.png' style='max-width:100%'></div>
							<div class='score'><img src='images/gray.png' style='max-width:100%'></div>
						</td></tr>
						<tr><td>上傳者:&nbsp;&nbsp;".$author."</td></tr>
						<tr><td id='need_money'>所需財富:&nbsp;&nbsp;<span style='color: #35A71A;'>".$need."</span></td></tr>
						<tr><td id='work_time'>".$time."</td></tr>
					</table>
				</div>";
		$i=$i+1;
		}
	}
	?>
	</div>
	</div>
	<center>
	<button id="left">左邊</button>
	<button id="right">右邊</button>
	<div class="more_homework"><img id="img1" src="images/more1.png" style="max-height:100%"></div>
	</center>
</div>	
<div class="main">
	<div class='work_title'><img src='images/manage.png' style='max-height:100%;'></div>
	<center><div class="more_homework"><img src="images/more1.png" style="max-height:100%"></div></center>
</div>	
<div class="main">
	<div class='work_title'><img src='images/computer.png' style='max-height:100%;'></div>
	<center><div class="more_homework"><img src="images/more1.png" style="max-height:100%"></div></center>
</div>
<div class="main">
	<div class='work_title'><img src='images/ee.png' style='max-height:100%;'></div>
	<center><div class="more_homework"><img src="images/more1.png" style="max-height:100%"></div></center>
</div>

	<div id="footer">
		<div id="logo_img"><img style="max-width:80%;"src="images/logo.png"></div>
	</div>
	
</body>
</html>