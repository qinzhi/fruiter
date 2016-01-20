function BrowseServer(input_image,fun )
{
    var finder = new CKFinder();
    finder.basePath = '../';
    finder.selectActionFunction = SetFileField;

    finder.selectActionData = input_image;
    if($.isFunction(fun)){
        window.fun = fun;
    }
    finder.popup();
}
function getCKeditorValue(id){
    return CKEDITOR.instances[id].getData();
}
function SetFileField( fileUrl , data )
{
    split = '\/Attachments\/';
    pic = fileUrl.split(split);
    if(!!pic[1]){
        document.getElementById( (data["selectActionData"] )).value = pic[1];
    }
    if($.isFunction(window.fun)){
        window.fun(fileUrl);
    }
}

$.extend({
    prefix : 'ext_',
    dialogBox : [],
    panel : {
        overlay : function(){

        }
    },
    fruiter : {
        post : function(url,data,func){
            set_loading('show');
            $.post(url,data,function(result){
                set_loading('hide');
                func(result);
            });
        }
    },
    dialog : function(config){

        var id = config.id ? this.prefix + config.id : config.id;
        if($('#' + id).length > 0){
            return;
        }

        var async = config.async === false ? false : true;
        var title = config.title || '新窗口';
        var btnLable = config.btnLable || '保存';
        var content = '';

        var dialog = $('<div class="own_dialog"></div>');
        dialog.append('<div class="dialog_title"><h6></h6><a class="dialog_close"><i class="fa fa-times"></i></a></div>');
        dialog.append('<div class="dialog_content"><img class="dialog_loading" src="/Public/Admin/img/loading.gif"/></div>');
        dialog.append('<div class="dialog_footer"><a class="btn btn-success btn-sm shiny"></a></div>');

        if($.dialogBox.length > 1){
            var z_max_index = 0;
            $.each($.dialogBox,function(){
                var z_index = parseInt($(this).css('z-index'));
                if(z_index > z_max_index){z_max_index = z_index}
            });
            $(dialog).css('z-index',(z_max_index+1));
        }

        $('body').append(dialog);

        dialog.attr('id',id);
        dialog.find('.dialog_title h6').text(title);
        dialog.find('.dialog_footer .btn').text(btnLable);

        if($.isFunction(config.content)){
            if(async === false){
                $.ajaxSetup({
                    async : false
                });
            }
            content = config.content();
            if(async === false){
                $.ajaxSetup({
                    async : true
                });
            }
        }else{
            content = config.content;
        }

        var dialog_content = dialog.find('.dialog_content');
        if(config.min_width)
            dialog_content.css('min-width',config.min_width);
        if(config.min_height)
            dialog_content.css('min-height',config.min_height);



        dialog_content.html(content);

        dialog.set_location = function(obj){
            var h = $(obj).outerHeight();
            var w = $(obj).outerWidth();
            var dH = $(window).height();
            var dW = $(window).width();
            $(obj).css({
                left: (dW-w)/2 + 'px',
                top: ((dH-h)/2 -50) + 'px'
            });
        }(dialog);

        this.dialogBox.push(dialog);

        $(dialog).data('isMove',true);

        $(dialog).bind({
            mousedown: function(event){

                if($.dialogBox.length > 1){
                    var z_max_index = 0;
                    $.each($.dialogBox,function(){
                        var z_index = parseInt($(this).css('z-index'));
                        if(z_index > z_max_index){z_max_index = z_index}
                    });
                    $(this).css('z-index',(z_max_index+1));
                }

                if(!$(event.target).hasClass('own_dialog') && !$(event.target).hasClass('dialog_title')){
                    return;
                }

                $(dialog).data('isMove',true);

                var abs_x = event.pageX - $(this).offset().left;
                var abs_y = event.pageY - $(this).offset().top;
                var obj = $(this);

                $('body').attr({
                    'style' : '-moz-user-select:none',
                    'unselectable' : 'on',
                    'onselectstart' : 'return false'
                });
                /*var w = $(this).width();
                 var h = $(this).height();

                 var pw = $(document).width();
                 var ph = $(document).height();*/


                $(document).mousemove(function(event){

                    var mX = event.pageX - abs_x;
                    var mY = event.pageY - abs_y;

                    if($(obj).data('isMove') == true /* && mX > 0 && mY > 0 && mX < (pw-w) && mY < (ph-h)*/){
                        obj.css({'left':event.pageX - abs_x, 'top':event.pageY - abs_y});
                    }
                });
            },
            mouseup: function(event){
                $(dialog).data('isMove',false);
                $('body').removeAttr('style').removeAttr('unselectable').removeAttr('onselectstart');
            }
        }).find('.dialog_close').click(function(){
            var dialog_id = $(this).parents('.own_dialog').attr('id'),id='';
            for(var i= ($.dialogBox.length-1);i>=0;i--){
                id = $.dialogBox[i].attr('id');
                $.dialogBox[i].remove();
                $.dialogBox.pop();
                if(id == dialog_id){
                    break;
                }
            }
        });
        $(dialog).find('.dialog_footer a').click(function(){
            if($.isFunction(config.ok)){
                if(async === false){
                    $.ajaxSetup({
                        async : false
                    });
                }
                config.ok(dialog);
                if(async === false){
                    $.ajaxSetup({
                        async : true
                    });
                }
            }
            $(this).parents('.own_dialog').find('.dialog_close').trigger('click');
        });
    },
    get_dialog_max_index: function(){

    }
});