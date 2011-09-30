(function ($) {
  
  $(document).ready(fetch_text_info); // call once on page load 
  $(document).ready(function() {  // call again after typing stops
    $('#edit-beast-add-content-body').keyup(function() {
      clearTimeout($.data(this, 'timer'));
      var wait = setTimeout(fetch_text_info, 500);
      $(this).data('timer', wait); 
    });  
  }); 
  
 function fetch_text_info() { 
   var text = $('#edit-beast-add-content-body').val();  
   var kw = $('#edit-beast-add-content div.keywords').text();  
   //document.title = kw; 
   $.post("/admin/live_text_info", {text: text, keywords: kw}, function(data){ 
     if(data.length > 0) {
       $('#live_text_info').html(data);  
     } 
   });  
  
 }  

})(jQuery);
