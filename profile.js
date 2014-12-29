$(document).ready(function(){
  $("#upload").click(function(){
    $("#answer").slideToggle();
  });
});
$(document).ready(function(){
    $("#work_file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
 
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 
 
            reader.onloadend = function(){ 
                $("#work_preview img").attr('src', this.result);
				
            }
        }
    });
});