
  $(document).ready(function(){
    $("#show1").click(function(){
        $(".onama-window1").toggle(40);
    });
    $("#show2").click(function(){
        $(".onama-window2").toggle(40);
    });
    $("#show3").click(function(){
        $(".onama-window3").toggle(40);
    });
     $("#show4").click(function(){
        $(".onama-window4").toggle(40);
    });
});

  $('#show1, #show2, #show3, #show4').click(function() {
    $('#show1').css({
        'animation-play-state': 'paused'
    });
});