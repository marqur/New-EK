$(window).scroll(function() {
 			 if ($(document).scrollTop() > 100) {
           $('.side-filter').addClass('shrink');
  				} else {
          $('.side-filter').removeClass('shrink');
 				 }	 
			});
