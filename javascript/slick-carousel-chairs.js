$('.carousel-chairs').slick({
  arrows: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  fade: false,
  dots: true,
  cssEase: 'linear',
  prevArrow: $('.prev'),
  nextArrow: $('.next')
});

$('.prev').click(function(){
  $('.carousel-chairs').slick('slickPrev');
})

$('.next').click(function(){
  $('.carousel-chairs').slick('slickNext');
})