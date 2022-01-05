
 /*Login*/
 
 $(".logModal").click(function(){
     $("#myModal").show();
     }); 
 
     $(".thankModel").click(function(){
     $("#thankModel").show();
     }); 
     
      $(".fa-info-circle").mouseover(function(){
     $(".tooltip_content").show();
     });     
     
     $(".fa-info-circle").mouseout(function(){
     $(".tooltip_content").hide();
     });
     
     $(".close").click(function(){
     $("#myModal").hide();
     }); 
     $(".close").click(function(){
     $("#thankModel").hide();
     }); 
     
/*Login*/

/*register*/
 
         $(".regModel").click(function(){
          $("#regModal").show();
          }); 
          
           $(".info1").mouseover(function(){
          $(".tp1").show();
          });     
          
          $(".info1").mouseout(function(){
          $(".tp1").hide();
          });
          
          
         $(".info2").mouseover(function(){
          $(".tp2").show();
          });     
          
          $(".info2").mouseout(function(){
          $(".tp2").hide();
          });
          
          $(".close").click(function(){
          $("#regModal").hide();
          });       
          
          
          $(".navbar-toggle").click(function(){
          $("#myNavbar").slideToggle();
          });         
          
          $(document).ready(function() {
              $(".toggle-password").click(function() {
                  $(this).toggleClass("fa-eye fa-eye-slash");
                  var input = $($(this).attr("toggle"));
                  if (input.attr("type") == "password") {
                      input.attr("type", "text");
                  } else {
                      input.attr("type", "password");
                  }
              });
          
          });
 /* register*/

 /* search*/
 $(document).ready(function() {
   var submitIcon = $('.searchbox-icon');
   var inputBox = $('.searchbox-input');
   var searchBox = $('.searchbox');
   var isOpen = false;
   submitIcon.click(function() {
       if (isOpen == false) {
           searchBox.addClass('searchbox-open');
           inputBox.focus();
           isOpen = true;
       } else {
           searchBox.removeClass('searchbox-open');
           inputBox.focusout();
           isOpen = false;
       }
   });
 });




$(document).ready(function() {

 /*heartin*/
     $('.wishlisticon').click(function(){
    $(".heartin",this).toggleClass("fa-heart");
    $(".heartin",this).toggleClass("fa-heart-o");
    });

// $('.heartin').mouseover(function(){
//     $(this).toggleClass("fa-heart");
//     $(this).removeClass("fa-heart-o");
//     });
//     $('.heartin').mouseleave(function(){
    
//     $(this).addClass("fa-heart-o");
//     });
    

/*navbar toggle*/
    // $(".navbar-toggle").click(function(){
    //     $("#myNavbar").slideToggle();
    // }); 

/*profile dropdown*/
    // $(".mrs_hinch button").click(function(){
    //     $(".dropdown-menu").slideToggle();
    // }); 

});


