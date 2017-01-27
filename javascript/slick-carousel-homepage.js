
$('.carousel-homepage').slick({
  autoplay:true,
  autoplaySpeed:3500,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  prevArrow: $('.prev1'),
  nextArrow: $('.next1')
});

$('.prev1').click(function(){
  $('.carousel-homepage').slick('slickPrev');
})

$('.next1').click(function(){
  $('.carousel-homepage').slick('slickNext');
})