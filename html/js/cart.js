$(function(){
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
            purchasing.css('display','none');
        },200);
    });
});
