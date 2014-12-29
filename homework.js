var autoHeight=[];
$(document).ready(function()
	{
	$(".btn1").click(function(){
		$('#work_num_'+this.id).animate({"height":autoHeight[this.id]+'px',opacity: 0.5,},1000);
		$('#work_num_'+this.id).animate({opacity: 1,},1000);
		$('#first_comment_'+this.id).css({
			"margin-top":"0px",
		});
		$(".btn1#"+this.id).css({display:"none",});
		$(".btn2#"+this.id).css({display:"block",});
	});
	$(".btn2").click(function(){
		$('#work_num_'+this.id).animate({"height":"210px",opacity: 0.5},1000);
		$('#work_num_'+this.id).animate({opacity: 1},1000);
		$('#first_comment_'+this.id).css({
			"margin-top":210-autoHeight[this.id],
		});
		$(".btn1#"+this.id).css({display:"block",});
		$(".btn2#"+this.id).css({display:"none",});
	});
});
function comment_key(work_num)
{

if(event.keyCode==13)
	{
	var words=document.getElementById('words_'+work_num).value;
	document.getElementById('words_'+work_num).value="";
	var oXHR=new XMLHttpRequest();
	para="words="+words+"&work_num="+work_num;
	oXHR.open("POST","comment.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4){
			comment_display(work_num);
		}
	}
	oXHR.send(para);	
	}
}
function comment_display(work_num)
{
	var oXHR=new XMLHttpRequest();
	para="work_num="+work_num;
	oXHR.open("POST","comment_display.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
	if(oXHR.readyState==4){
		var comment_block=document.getElementById('work_num_'+work_num);
		comment_block.innerHTML=oXHR.responseText;
		getAutoHeight(work_num);
		}
	}
	oXHR.send(para);	
}
function readmore_display(work_num)
{
	var oXHR=new XMLHttpRequest();
	para="work_num="+work_num;
	oXHR.open("POST","readmore_display.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
	if(oXHR.readyState==4){
		var more_block=document.getElementById('readmore_'+work_num);
		more_block.innerHTML=oXHR.responseText;
		alert(oXHR.responseText);
		}
	}
	oXHR.send(para);	
}
function getAutoHeight(work_num)
{
	var el = $('#work_num_'+work_num),
	curHeight = el.css({"max-height":"210px","height":"auto",}).height();
	autoHeight[work_num] = el.css({"max-height":"auto","height":"auto",}).height();
	el.css({
		'height': curHeight,
	});
	var first = $('#first_comment_'+work_num);
	first.css({
		"margin-top":curHeight-autoHeight[work_num],
	});
}

function recent_comment_key(work_num)
{

if(event.keyCode==13)
	{
	var words=document.getElementById('words_'+work_num).value;
	document.getElementById('words_'+work_num).value="";
	var oXHR=new XMLHttpRequest();
	para="words="+words+"&work_num="+work_num;
	oXHR.open("POST","comment.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4){
			recent_comment_display(work_num);
		}
	}
	oXHR.send(para);	
	}
}
function recent_comment_display(work_num)
{
	var oXHR=new XMLHttpRequest();
	para="work_num="+work_num;
	oXHR.open("POST","recent_comment_display.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
    if(oXHR.readyState==4){
    	var comment_block=document.getElementById('work_num_'+work_num);
    	comment_block.innerHTML=oXHR.responseText;
    	var objDiv = document.getElementById("comment_line_"+work_num);
		objDiv.scrollTop = objDiv.scrollHeight;
    	}
  	}
	oXHR.send(para);
	
}
function invitefriend(fid)
{
	$.ajax({
	type: "POST",
	url: "invite.php",
	data: { account: fid},
	success: function(){
    $('#friend_'+fid).slideUp('slow', function() {$(this).remove();});
  }
 
 });


}

function forward()
{
	alert('敬請期待!!');
}
function deletefriend(fid)
{
	$.ajax({
	type: "POST",
	url: "delete.php",
	data: { friend: fid},
	success: function(){
    $('#friend_'+fid).slideUp('slow', function() {$(this).remove();});
  }
 });
}
