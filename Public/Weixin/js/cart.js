$(function(){
    var win_height = $(window).height();
    var purchasing = $('.product-purchasing');
    $(window).resize(function(e){
        var cur_win_height = $(this).height();
        if(purchasing.length >= 1 && win_height > cur_win_height){
            $('.product-purchasing').css('height','100%');
        }else{
            $('.product-purchasing').css('height','80%');
        }
    });
    $('.cart_add').click(function(){
        var purchasing = $('.product-purchasing');
        var shade = $('.all-shade');
        shade.show();
        //purchasing.css('display','none');
        purchasing.removeClass('hidden').addClass('active');
        setInterval(function(){
            //purchasing.css('display','block');
        },200);
    });
    var close = $('.action-close');
    close.click(function(){
        var purchasing = $('.product-purchasing');
        var shade = $('.all-shade');
        shade.hide();
        //purchasing.css('display','block');
        purchasing.removeClass('active').addClass('hidden');
        setInterval(function(){
            //purchasing.css('display','none');
        },200);
    });
    $('.amount-input').on({
        focus: function(){
            purchasing.css('height','100%');
        },
        blur: function(){
            purchasing.css('height','80%');
        }
    });
});
