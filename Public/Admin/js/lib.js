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
    dialog : function(id){

        id = this.prefix ? this.prefix + id : id;

        if($('#' + id).length > 0){
            return;
        }

        var dialog = $('<div class="own_dialog" id="' + id + '"></div>');
        dialog.append('<div class="dialog_title"><h6>设置商品规格</h6><a class="dialog_close"><i class="fa fa-times"></i></a></div>');
        dialog.append('<div class="dialog_content"></div>');
        dialog.append('<div class="dialog_footer"><a class="btn btn-success btn-sm shiny">保存</a></div>');
        $('body').append(dialog);

        $(dialog).bind({
            mousedown: function(event){
                if($(event.target).hasClass('dialog_content') || $(event.target).parents('dialog_content').length){
                    return;
                }

                window.isMove = true;

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

                    if(window.isMove === true /* && mX > 0 && mY > 0 && mX < (pw-w) && mY < (ph-h)*/){
                        obj.css({'left':event.pageX - abs_x, 'top':event.pageY - abs_y});
                    }
                });

            },
            mouseup: function(event){
                window.isMove = false;
                $('body').removeAttr('style').removeAttr('unselectable').removeAttr('onselectstart');
            }
        }).find('.dialog_close').click(function(){
            $(dialog).remove();
        });
    }
});