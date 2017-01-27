$(window).scroll(function() {
 			 if ($(document).scrollTop() > 50) {
   				 $('.nav-wrapper').addClass('shrink');
   				 $('.title').addClass('shrink');
   				 $('.icon-responsive').addClass('shrink');
   				 $('.icon').addClass('shrink');
  				} else {
    			$('.nav-wrapper').removeClass('shrink');
    			$('.title').removeClass('shrink');
    			$('.icon-responsive').removeClass('shrink');
    			$('.icon').removeClass('shrink');
 				 }
			});