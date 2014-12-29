<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	if (IsSet($_SESSION['id_for'])) 
			{
				//echo   "<meta http-equiv='refresh' content='0;url=profile.php' />" ;
			header('Location: recent.php');
 		   exit;
			}
?>

<html>
<head>
	<title>Homework</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<link href="index.css" rel="stylesheet" />
		<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />

</head>
<body>
	<div id="header">
		<div id="logo_img"><img style="max-height:100%;" src="images/logo.png"></div>
		<?php
			
				echo "<form action='login.php' id='loginform' method='post'>
				郵箱<input size='30' id='uaccount' type='text' name='account' placeholder='E-mail'>
				密碼<input size='30' id='upw' type='password' name='pw' placeholder='Password'>
				<input type='submit' class='i3Style' ></input></form>
				<div id='se_text'><a href='register.php'>沒有帳號?立即註冊</a></div>
				";
		
		?>

	</div>
	<div id="function_bar">
		&nbsp;&nbsp;
		<a href="index.php"><div class="function_button">簡介</div></a>
		
	</div>

	<div id="intro_block">
	<center>
		<div id="intro" style="font-weight: 900"></br>我們是
			<div id="logoh"><img style="max-width:100%;"src="images/logoH.png"></div>
		</div>
		<p class="hello">大學生發佈、分享、交流作業的平台</p>
		<a href="register.php"><button class="i2Style">立刻註冊</button></a></br></br>
		<p class="hello">HOW IT WORKS?</p>
	</center>
	</div>
	<div id="intro_block2">
		<center>
		<div id="triangle"><img style="max-width:100%;"src="images/triangle_green.png"></div>
		<p id="subscript" style="font-weight: 900">We post our homework to make aquintance with others, to share what</br>we like, to show us, to improve ourselves</p>
		<div id="intro_block2_intro">
			<div class="img_button"style="font-weight:900;"><table class="img_button_table"><tr><td><img style="max-width:100%;"src="images/upload.png"></td></tr><tr><td><strong>UPLOAD</strong></td></tr><tr><td>上傳自己的作業</td></tr><tr><td>獲取相應積分</td></tr></table></div>
			<div class="img_button"style="font-weight:900;"><table class="img_button_table"><tr><td><img style="max-width:100%;"src="images/share.png"></td></tr><tr><td><strong>SHARE</strong></td></tr><tr><td>作業被他人分享</td></tr><tr><td>也會獲得積分</td></tr></table></div>
			<div class="img_button"style="font-weight:900;"><table class="img_button_table"><tr><td><img style="max-width:100%;"src="images/download.png"></td></tr><tr><td><strong>DOWNLOAD</strong></td></tr><tr><td>使用積分下載別人</td></tr><tr><td>可供下載的作業</td></tr></table></div>
			<div class="img_button"style="font-weight:900;"><table class="img_button_table"><tr><td><img style="max-width:100%;"src="images/use.png"></td></tr><tr><td><strong>USE</strong></td></tr><tr><td>運用下載的資源</td></tr><tr><td>提高學業水平</td></tr></table></div>
		</center>
		</div>
	</div>
	<div id="social_block">
	<center>
		<p id="social_text"style="font-size:40px;font-weight:900;color:#36a71b;">建立社交關係</br>Establish your social bonds</p>
		<div id="social_block_intro">
			<div class="img_button"style="font-weight:900;font-family:Arial Black;"><table class="s_image"><tr><td><img style="max-width:100%;"src="images/idea.png"></td></tr><tr><td><strong>Similar Idea</strong></td></tr><tr><td>類似想法</td></tr></table></div>
			&emsp;&emsp;<div class="img_button"style="font-weight:900;font-family:Arial Black;"><table class="s_image"><tr><td><img style="max-width:100%;"src="images/major.png"></td></tr><tr><td><strong>Same Major</strong></td></tr><tr><td>相同專業</td></tr></table></div>
			&emsp;&emsp;<div class="img_button"style="font-weight:900;font-family:Arial Black;"><table class="s_image"><tr><td><img style="max-width:100%;"src="images/school.png"></td></tr><tr><td><strong>Same School</strong></td></tr><tr><td>相同學校</td></tr></table></div>
		</div>
	</center>
	</div>

	<div id="bar"><div id="logo_img"><img style="max-width:80%;"src="images/logo.png"></div></div>
</body>
</html>