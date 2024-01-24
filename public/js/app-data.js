$(function(){
     $.ajaxSetup(
          {
               headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
          }
     })
     if ($(window).width() <= 991) {
          $('nav#sidebar').removeClass('collapsed')
     }
})