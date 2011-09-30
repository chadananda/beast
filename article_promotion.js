(function ($) {
   
  $(document).ready(function() {  // call again after typing stops  
    $('#edit-spoindis-title, textarea, input').focus(function() {
       this.select(); 
    });  
    
    
    
  }); 
  
 function copy_to_clipboard() { 
 /*
   var text = $('#edit-beast-add-content-body').val();  
   var kw = $('#edit-beast-add-content div.keywords').text();  
   //document.title = kw; 
   $.post("/admin/live_text_info", {text: text, keywords: kw}, function(data){ 
     if(data.length > 0) {
       $('#live_text_info').html(data);  
     } 
   });  
  */
 }  

})(jQuery);
