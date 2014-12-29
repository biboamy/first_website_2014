$(document).ready(function(){

	$(".more_homework1").click(function(){
        var src = $('.img1').attr('src');
        if(src == 'images/more1.png') {
            $(".img1").attr("src","images/more2.png");
        } 
		else {
            $(".img1").attr("src","images/more1.png");
        }
    $("#lista1").slideToggle();

  });
});

$(document).ready(function(){

	$(".more_homework2").click(function(){
        var src = $('.img2').attr('src');
        if(src == 'images/more1.png') {
            $(".img2").attr("src","images/more2.png");
        } 
		else {
            $(".img2").attr("src","images/more1.png");
        }
    $("#content2").slideToggle();
  });
});

$(document).ready(function(){

	$(".more_homework3").click(function(){
        var src = $('.img3').attr('src');
        if(src == 'images/more1.png') {
            $(".img3").attr("src","images/more2.png");
        } 
		else {
            $(".img3").attr("src","images/more1.png");
        }
    $("#lista3").slideToggle();
  });
});





$(document).ready(function(){

	$(".more_homework4").click(function(){
        var src = $('.img4').attr('src');
        if(src == 'images/more1.png') {
            $(".img4").attr("src","images/more2.png");
        } 
		else {
            $(".img4").attr("src","images/more1.png");
        }
    $("#content4").slideToggle();
  });
});
$(document).ready(function() 
			{
				$("#lista4").als({
					visible_items: 3,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "no",
					autoscroll: "no",
					interval: 5000,
					speed: 500,
					easing: "linear",
					direction: "right",
					start_from: 0
				});
			});
$(document).ready(function() 
			{
				$("#lista3").als({
					visible_items: 3,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "no",
					autoscroll: "no",
					interval: 5000,
					speed: 500,
					easing: "linear",
					direction: "right",
					start_from: 0
				});
			});
$(document).ready(function() 
			{
				$("#lista2").als({
					visible_items: 3,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "no",
					autoscroll: "no",
					interval: 5000,
					speed: 500,
					easing: "linear",
					direction: "right",
					start_from: 0
				});
			});
$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 3,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "no",
					autoscroll: "no",
					interval: 5000,
					speed: 500,
					easing: "linear",
					direction: "right",
					start_from: 0
				});
			});