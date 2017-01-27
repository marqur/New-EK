$( document ).ready(function() {
  var icon = $('#icon-toggle');
  var nav = $('nav');
  icon.click(function() {
    nav.toggleClass('shown');
     icon.toggleClass('active');
     $('body, html').toggleClass('noScroll');
     return false;
  });
});