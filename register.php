<?php
	session_start();
?>
<html>
<head>
	<script src="jquery-2.1.0.js"></script>
	<title>Homwwork - Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="register.css">
		<link rel="Shortcut Icon" type="image/x-icon" href="images/homework.ico" />

<script>
$(document).ready(function(){
    $(".upload").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
 
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 
 
            reader.onloadend = function(){ 
                $("#user_photo img").attr('src', this.result);
                $("#user_photo").css("height","100px").css("width","100px");
            }
        }
    });
});
</script>
</head>
	<body>
		<center>
		<div id="titleblock"><div id="title_img"><img style="max-width:100%;" src="images/title.png"></div></div>
		<div id="message_block"></div>
		<div id="login_block">
			<p style="font-size:26px;display:inline;">註冊</p></br>
			<p style="font-size:18px;display:inline;">已有帳戶? 立即<a href="index.php">登入</a></p></br></br>
			<form action="reg.php" id="reg_form" enctype="multipart/form-data" method="post">		
			郵箱</br><input class='reg_input' id='raccount' type=text placeholder='E-mail' name='account' maxlength='25'></br>
			密碼</br><input class='reg_input' id='rpw' type=text name='pw' placeholder='Password' maxlength='20'></br>
			姓名</br><input class='reg_input' id='rname' type=text name='name' maxlength='15'></br>
			性別</br><input type=radio name='sex' id="male"value='male' checked>男
			<input type=radio name='sex' id="female" value='female'>女</br>
			生日</br><select name='year'>
				<option value="1983">1983</option>
				<option value="1984">1984</option>
				<option value="1985">1985</option>
				<option value="1986">1986</option>
				<option value="1987">1987</option>
				<option value="1988">1988</option>
				<option value="1989">1989</option>
				<option value="1990">1990</option>
				<option value="1991">1991</option>
				<option value="1992">1992</option>
				<option value="1993">1993</option>
				<option value="1994">1994</option>
				<option value="1995">1995</option>
				<option value="1996">1996</option>
				<option value="1997">1997</option>
				<option value="1998">1998</option>
				<option value="1999">1999</option>
				<option value="2000">2000</option>
			</select>年
			<select name='month'>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>月
			<select name='day'>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>日</br>
			學校</br><select name='school'>
				<option value="國立成功大學">國立成功大學</option>
			</select></br>
			科系/專業</br><select name='major'>
				<option  value="電機工程學系">電機工程學系</option>
				<option  value="資訊工程學系">資訊工程學系</option>
				<option  value="企業管理學系">企業管理學系</option>
				<option  value="工業設計學系">工業設計學系</option>
				<option  value="都市計畫學系">都市計畫學系</option>
				<option  value="建築學系">建築學系</option>
				<option  value="創意產業設計研究所">創意產業設計研究所</option>
			</select></br>
			照片</br><div id='user_photo'><center><img id='cropbox'style='max-width:100%' src='images/default_face.png'></center></div>
			<div class='fileUpload'><input type='file' class='upload' name='file'/></div></br>
			</form>
		</div>
		<input id="work_submit" name="submit" type="submit" value="註冊" form="reg_form">
		<div id="footer"></div>
</body>
</html>
