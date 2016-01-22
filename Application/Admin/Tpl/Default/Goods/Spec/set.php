<div class="widget flat no-margin">
    <div class="widget-header padding-top-5 padding-right-10">
        <h7 class="pull-left margin-top-4">1、增加规格项或选择规格标签 >> 2、添加需要的规格值 >> 保存 </h7>
        <a class="btn btn-default btn-sm pull-right btn-spec"><i class="fa fa-plus"></i>增加规格项</a>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <div class="tabbable clear">
                <ul class="nav nav-tabs tabs-flat tabs-spec-name">
                    <li data-id="1" data-name="内存" class="active"><a data-toggle="tab" class="no-padding-right" href="#spec1">内存<button class="close pull-right tabs-del"> × </button> </a></li>
                    <li data-id="2" data-name="颜色"><a data-toggle="tab" class="no-padding-right" href="#spec2">颜色<button class="close pull-right tabs-del"> × </button> </a></li>
                </ul>
                <div class="tab-content tabs-flat tabs-spec-list">
                    <div data-id="1" id="spec1" class="tab-pane active"><p class="text-success"><span class="text-danger">点击选择</span>下列《内存》：如果没有您需要的《内存》？请到规格列表中编辑内存</p><a href="javascript:void(0);" data-value="16G" class="btn btn-default btn-spec_value" disabled="disabled">16G</a>&nbsp;<a href="javascript:void(0);" data-value="32G" class="btn btn-default btn-spec_value" disabled="disabled">32G</a>&nbsp;<table class="table table-bordered table-center margin-top-10"><thead><tr><th>规格值</th><th>操作</th></tr></thead><tbody><tr data-value="16G"><td>16G</td><td><a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="up"><i class="fa fa-arrow-up"></i></a>&nbsp;<a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="down"><i class="fa fa-arrow-down"></i></a>&nbsp;<a class="btn btn-danger btn-xs shiny icon-only white btn-del" href="javascript:void(0);"><i class="fa fa-times"></i></a></td></tr><tr data-value="32G"><td>32G</td><td><a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="up"><i class="fa fa-arrow-up"></i></a>&nbsp;<a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="down"><i class="fa fa-arrow-down"></i></a>&nbsp;<a class="btn btn-danger btn-xs shiny icon-only white btn-del" href="javascript:void(0);"><i class="fa fa-times"></i></a></td></tr></tbody></table></div>
                    <div data-id="2" id="spec2" class="tab-pane"><p class="text-success"><span class="text-danger">点击选择</span>下列《颜色》：如果没有您需要的《颜色》？请到规格列表中编辑颜色</p><a href="javascript:void(0);" data-value="红色" class="btn btn-default btn-spec_value" disabled="disabled">红色</a>&nbsp;<a href="javascript:void(0);" data-value="白色" class="btn btn-default btn-spec_value" disabled="disabled">白色</a>&nbsp;<table class="table table-bordered table-center margin-top-10"><thead><tr><th>规格值</th><th>操作</th></tr></thead><tbody><tr data-value="红色"><td>红色</td><td><a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="up"><i class="fa fa-arrow-up"></i></a>&nbsp;<a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="down"><i class="fa fa-arrow-down"></i></a>&nbsp;<a class="btn btn-danger btn-xs shiny icon-only white btn-del" href="javascript:void(0);"><i class="fa fa-times"></i></a></td></tr><tr data-value="白色"><td>白色</td><td><a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="up"><i class="fa fa-arrow-up"></i></a>&nbsp;<a class="btn btn-default btn-xs shiny icon-only success btn-move" href="javascript:void(0);" data-action="down"><i class="fa fa-arrow-down"></i></a>&nbsp;<a class="btn btn-danger btn-xs shiny icon-only white btn-del" href="javascript:void(0);"><i class="fa fa-times"></i></a></td></tr></tbody></table></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.btn-spec').click(function(){
            $.dialog({
                id : 'selectSpec',
                title : '选择规格',
                async : false,
                min_width: 600,
                min_height: 350,
                content : function(){
                    var content;
                    $.post("{:U('Goods/spec')}",{tpl:'select'},function(data){
                        content = data;
                    });
                    return content;
                },
                ok : function(target){
                    var _prefix = 'spec';
                    var spec_list = $(target).find('.well-spec-list');
                    var spec_name = spec_list.data('name');
                    var spec_value = spec_list.data('value');
                    var spec_id = spec_list.data('id');
                    if(spec_id && spec_name && spec_value){
                        var tabs_spec_name = $('.tabs-spec-name');
                        var has_li = tabs_spec_name.find('li');
                        if(has_li.length > 0)
                            for(var i in has_li){
                                if($(has_li[i]).data('id') == spec_id){
                                    Notify('该规格已经添加，不能重复添加', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                                    return false;
                                }
                            }
                        tabs_spec_name.find('.active').removeClass('active');

                        var anchor = _prefix + spec_id;

                        var li = $('<li class="active" data-id="'+spec_id+'" data-name="'+spec_name+'"></li>');
                        li.append('<a href="#' + anchor + '" class="no-padding-right" data-toggle="tab">' + spec_name + '' +
                                    '<button class="close pull-right tabs-del"> × </button> </a>');
                        tabs_spec_name.append(li);

                        li.find('.tabs-del').bind('click',function(){
                            var obj = $(this);
                            bootbox.confirm("确定要删除么?", function (result) {
                                if(result){
                                    var id = obj.parents('li').data('id');
                                    obj.parents('li').remove();
                                    $('#' + _prefix + id).remove();
                                }
                            });
                        });

                        var tabs_spec_list = $('.tabs-spec-list');
                        tabs_spec_list.find('.active').removeClass('active');
                        var list = $('<div class="tab-pane active" id="'+anchor+'" data-id="'+spec_id+'"></div>');
                        list.append('<p class="text-success"><span class="text-danger">点击选择</span>下列《'+spec_name+'》：如果没有您需要的《'+spec_name+'》？请到规格列表中编辑'+spec_name+'</p>');
                        for(var i in spec_value){
                            list.append('<a class="btn btn-default btn-spec_value" data-value="' + spec_value[i] + '" href="javascript:void(0);">' + spec_value[i] + '</a>&nbsp;');
                        }
                        list.append('<table class="table table-bordered table-center margin-top-10"><thead><tr><th>规格值</th><th>操作</th></tr></thead><tbody></tbody></table>');
                        tabs_spec_list.append(list);

                        list.find('.btn-spec_value').bind('click',function(){
                            $(this).attr('disabled','disabled');
                            var tr = $('<tr data-value="' + $(this).data('value') + '"></tr>');
                            tr.append('<td>' + $(this).data('value') + '</td>');
                            var td = $('<td></td>');
                            td.append('<a data-action="up" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-up"></i></a>&nbsp;');
                            td.append('<a data-action="down" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-down"></i></a>&nbsp;');
                            td.append('<a href="javascript:void(0);" class="btn btn-danger btn-xs shiny icon-only white btn-del"><i class="fa fa-times"></i></a>');
                            tr.append(td);
                            $(this).parent().find('table tbody').append(tr);

                            tr.find('.btn-del').bind('click',function(){
                                bootbox.confirm("确定要删除么?", function (result) {
                                    if(result){
                                        var spec_value = $(tr).data('value');
                                        $(tr.parents('table')).parent()
                                            .find('.btn-spec_value[data-value="'+spec_value+'"]').removeAttr('disabled');
                                        tr.remove();
                                    }
                                });
                            });
                            tr.find('.btn-move').bind('click',function(){
                                var action = $(this).data('action');
                                var tr = $(this).parents('tr');
                                var index = tr.index();
                                var trs = $(tr).parents('tbody').find('tr');
                                if(index == 0 && action == 'up' ){
                                    Notify('无法上移', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                                }else if(index == (trs.length-1) && action == 'down' ){
                                    Notify('无法下移', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                                }else{
                                    if (action == 'up') {
                                        $(tr).insertBefore($(trs[index - 1]));
                                    } else if (action == 'down') {
                                        $(tr).insertAfter($(trs[index + 1]));
                                    }
                                }
                            });
                        });
                    }
                }
            });
        });
    });
</script>