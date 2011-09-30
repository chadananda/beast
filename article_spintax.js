(function ($) {
   
  $(document).ready(function() {  // call again after typing stops  
    $('a.toggle').click(function() { 
       $(this).parent('div.original_text').toggleClass('shown', 'hidden'); 
    });  
  }); 
     
  

})(jQuery);
