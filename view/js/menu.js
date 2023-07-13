$(document).ready(function(){
    $(window).scroll(function() {
      if ($(document).scrollTop() >40 ) { 
        $(".row top").css("background-color", "#0a0a12");
        

      }else {
        $(". row top").css("background-color", "transparent"); 
      }
    });
  });