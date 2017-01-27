$('.carousel-tables').slick({
  arrows: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  fade: false,
  dots: true,
  cssEase: 'linear',
  prevArrow: $('.t-prev'),
  nextArrow: $('.t-next')
});

$('.t-prev').click(function(){
  $('.carousel-tables').slick('slickPrev');
})

$('.t-next').click(function(){
  $('.carousel-tables').slick('slickNext');
})