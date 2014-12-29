function download_confirm(uid,work_num,work_need)
{
	var oXHR=new XMLHttpRequest();
	para="work_num="+work_num;
	oXHR.open("POST","find_work_for_down.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4){
			if(confirm('download need '+work_need+' points\nyes/no?'))
			{
				decreasePoints(uid,work_need,'download.php?file='+oXHR.responseText);
			}
		}
	}
	oXHR.send(para);
	
	
}
function decreasePoints(uid,work_need,workpath)
{
	$.ajax({
		type: "POST",
		url: "point_decrease.php",
		data: { uid: uid,
				need:work_need}
	})
  	.done(function( msg ) {
  		alert(msg);
  		if(msg!='積分不足')
  		{
  			location.href=workpath;
  		}
    	
  	});
}