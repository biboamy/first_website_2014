<?php
	session_start();
	include "config.inc.php";
	$name=$_SESSION['id_for'];
	header("Content-Type:text/html; charset=utf-8");
?>
<html>
<head>
<link rel="stylesheet" href="userstyle.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">	</script>
<title>user info</title>
<script>
$(document).ready(function(){
	$("#user_form").submit(function(){
    parent.$.fancybox.close();});
    });
	
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
                $("#user_photo").css("height","150px").css("width","150px");
				
            }
        }
    });
	
    });
function select(se)
{
	$("#major").val(se);
}
</script>
</head>
<body>
<div>
	<form action="user.php" id="user_form" enctype="multipart/form-data" method="post">
	<?php
	$result=mysql_query("SELECT * FROM `6_user` WHERE uid='".$name."'",$link);
	$row = mysql_fetch_array($result);
	echo "姓名</br><input class='reg_input' id='change_name' type=text name='name' maxlength='15' value='".$row[name]."'></br>
	手機</br><input class='reg_input' id='change_phone' type=text name='phone' maxlength='25' value='".$row[phone]."'></br>
	信箱</br><input class='reg_input' id='change_mail' type=text name='mail' maxlength='50' value='".$row[mail]."'></br>
	臉書</br><input class='reg_input' id='change_fb' type=text name='facebook' maxlength='80' value='".$row[facebook]."'></br>
	學校</br><select name='school' selected='".$row[school]."'>
				<option value='國立成功大學'>國立成功大學</option>
			</select></br>
			科系/專業</br><select id='major' name='major'>
				<option  value='電機工程學系'>電機工程學系</option>
				<option  value='資訊工程學系'>資訊工程學系</option>
				<option  value='企業管理學系'>企業管理學系</option>
				<option  value='工業設計學系'>工業設計學系</option>
				<option  value='都市計畫學系'>都市計畫學系</option>
				<option  value='建築學系'>建築學系</option>
				<option  value='創意產業設計研究所'>創意產業設計研究所</option>
			</select></br>
			<script>select('".$row[major]."');</script>
	照片</br><div id='user_photo'><center><img id='cropbox' src='images/default_face.png'/></center></div>
			<div class='fileUpload'><input type='file' class='upload' name='file'/></div></br>";
	?>

	<input id="work_submit" name="submit" type="submit" value="save">
	</form>
</div>
</body>
</html>