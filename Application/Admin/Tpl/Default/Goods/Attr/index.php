<extend name="Layout/base" />
<block name="content">
    <div class="row no-margin">
        <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
            <div class="widget flat no-margin">
                <div class="widget-header widget-fruiter">
                    <a class="btn btn-success" id="add" href="javascript:void(0);">添加</a>
                    <a id="save" class="btn btn-success" href="javascript:void(0);">保存</a>
                    <span> | </span>
                    <a id="delete" class="btn btn-danger" href="javascript:void(0);">删除</a>
                </div><!--Widget Header-->
                <div class="widget-body plugins_attr-">
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <div class="well">
                                <ul class="tree_menu">
                                    <li>
                                        <a data-node="1">
                                            <i class="fa fa-angle-right level1"></i>
                                            <span>系统设置</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="well">
                                <form action="{:U('GoodsAttr/edit')}" id="form-edit" class="form-horizontal bv-form form-attr" data-action="edit" onsubmit="return false;" autocomplete="off">
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-2 control-label">模型名称
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-10">
                                            <input name="name" class="form-control Lwidth400" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-2 control-label">添加扩展属性：</label>
                                        <div class="col-lg-10">
                                            <a class="btn btn-success btn-sm pull-left no-radius" href="javascript:void(0);" id="addAttr" data-status="true">
                                                <i class="fa fa-plus"></i>
                                                添加扩展属性
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <table class="table table-bordered table-condensed table-middle flip-content dataTable table-center">
                                                <thead class="flip-content bordered-palegreen">
                                                    <tr>
                                                        <th width="15%">属性名</th>
                                                        <th width="20%">操作样式</th>
                                                        <th width="45%">选择项数据【每项数据之间用逗号','做分割】</th>
                                                        <th width="20%">操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody-attr_list"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--Widget Body-->
            </div><!--Widget-->
        </div>
    </div>
    <div id="addModal" style="display:none;">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal bv-form form-attr" method="post" data-action="add" action="{:U('GoodsAttr/add')}" autocomplete="off"></form>
            </div>
        </div>
    </div>
</block>
<block name="js">
    <script>
        var attr_id = 0;
        $(function(){
            $('#add').click(function(){
                bootbox.dialog({
                    message: function(){
                        var form = $('#addModal .col-md-12 .form-attr');
                        if(form.html() == ''){
                            form.append($('form.form-attr').html());
                        }
                        else{form[0].reset();}
                        form.find('.position-root').hide();
                        return $("#addModal").html();
                    },
                    title: "添加权限",
                    className: "modal-sky",
                    buttons: {
                        "cancel": {
                            label: "取消",
                            className: "btn-default",
                            callback: function () { }
                        },
                        "confirm": {
                            label: "确定",
                            className: "btn-success",
                            callback: function () {
                                $('.modal-dialog form.form-attr').submit();
                            }
                        }
                    }
                });
            });
            $('#save').click(function(){
                if(attr_id > 0){
                    var query = $('.plugins_attr- form').serialize();
                    query += '&id=' + attr_id;
                    $.fruiter.post('{:U("GoodsAttr/edit")}',{params:encodeURIComponent(query)},function(data){
                        if(data.code == 1){
                            Notify(data.msg, 'bottom-right', '5000', 'success', 'fa-check', true);
                        }else{
                            Notify(data.msg, 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                        }
                    });
                }else{
                    Notify('请先选择权限', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                }
            });
            $('#delete').click(function(){
                if(attr_id > 0){
                    $.fruiter.post('{:U("GoodsAttr/del")}',{id:attr_id},function(data){
                        if(data.code == 1){
                            $('.plugins_attr- table').find('tr[data-id='+attr_id+']').remove();
                            attr_id = null;
                            document.getElementById('form-edit').reset();
                            Notify(data.msg, 'bottom-right', '5000', 'success', 'fa-check', true);
                        }else{
                            Notify(data.msg, 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                        }
                    });
                }else{
                    Notify('请先选择权限', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.plugins_attr- table').find('.btn-get').click(function(){
                var tr = $(this).parents('tr');
                if(!$(tr).hasClass('tr-focus')){
                    $(tr).parent().find('.tr-focus').removeClass('tr-focus');
                    $(tr).addClass('tr-focus');
                }
                var form = document.getElementById('form-edit');
                $.fruiter.post("{:U('GoodsAttr/getAttr')}",{id:$(tr).data('id')},function(data){
                    if(data){
                        attr_id = data.id;
                        form.name.value = data.name;
                        form.site.value = data.site;
                        $(form.type).find('option[value='+data.type+']').attr('selected',true);
                        form.p_id.value = data.pid;
                        var nodes = zTree.getNodes();
                        for(var i in nodes){
                            if(data.pid == 0 || nodes[i].id == data.pid){
                                nodes[i].checked = 'checked';
                                form.p_name.value = nodes[i].name;
                                break;
                            }
                        }
                    }
                });
            });

            $('#addAttr').click(function(){
                var tr = $('<tr></tr>');
                tr.append('<td class="padding-left-20 padding-right-20"><input class="input-xs form-control" type="text" name="attr_name[]"></td>');
                tr.append('<td class="padding-left-20 padding-right-20">' +
                                '<select class="input-xs form-control">' +
                                '<option value="1">输入框</option>' +
                                '<option value="2">下拉</option>' +
                                '<option value="3">单选</option>' +
                                '<option value="4">复选</option>' +
                                '</select>' +
                            '</td>');
                tr.append('<td class="padding-left-20 padding-right-20"><input type="text" class="input-xs form-control"/></td>');
                tr.append('<td>' +
                                '<a data-action="up" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-up"></i></a>&nbsp;' +
                                '<a data-action="down" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-down"></i></a>&nbsp;' +
                                '<a href="javascript:void(0);" class="btn btn-danger btn-xs shiny icon-only white btn-del"><i class="fa fa-times"></i></a></td>');

                $('.tbody-attr_list').append(tr);

                tr.find('.btn-move').bind('click',function(){
                    var action = $(this).data('action');
                    var tr = $(this).closest('tr');
                    var index = tr.index();
                    var trs = $(tr).closest('tbody').find('tr');
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
                tr.find('.btn-del').bind('click',function(){
                    bootbox.confirm("确定要删除么?", function (result) {
                        if(result){
                            tr.remove();
                        }
                    });
                });
            });
        });
    </script>
</block>