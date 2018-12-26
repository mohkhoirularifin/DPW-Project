// CSS Styling by me

// Dropdown menu code from:
// http://www.gethifi.com/blog/nicer-navigation-with-css-transitions


//Allow clicking instead of hover for the dropdown menu
$(document).ready( function(){

    $('#submenu').click( function(event){
        event.stopPropagation();
        $('#drop').toggle();
    });
    
    $(document).click( function(){
        $('#drop').hide();
    });
  
});