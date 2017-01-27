 var showContent = function(what){
        $('body').css('overflow', 'hidden');
        $('.'+what+'-overlay').css({
            'opacity': 1,
            'visibility': 'visible',
        }).addClass('component-visible');
    }
    var hideContent = function(){
        $('.component-visible').removeClass('component-visible').delay(500).queue(function ()
            {
                $(this).css({'opacity': 0,'visibility': 'hidden'})
                $('body').css('overflow', 'visible');
                $(this).dequeue();
                $('body').dequeue();
            });
    }

    $('.contact-trigger').on('click', function(){
        showContent('contact');
    })
    $('.contact-overlay_close').on('click', function(){
        hideContent();
    })