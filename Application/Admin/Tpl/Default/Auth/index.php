<extend name="Layout/base" />
<block name="header-title">
    <h1>权限管理</h1>
</block>
<block name="css">
    <link href="__CSS__/metroStyle/metroStyle.css" rel="stylesheet" >
</block>
<block name="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header widget-fruiter">
                    <a class="btn btn-success" id="add" href="javascript:void(0);">添加</a>
                    <a id="save" class="btn btn-success" href="javascript:void(0);">保存</a>
                    <span> | </span>
                    <a id="delete" class="btn btn-danger" href="javascript:void(0);">删除</a>
                </div><!--Widget Header-->
                <div class="widget-body plugins_auth-">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <table class="table table-bordered table-condensed table-middle flip-content dataTable">
                                    <thead class="flip-content bordered-palegreen">
                                    <tr>
                                        <th width="10%">排序</th>
                                        <th width="40%">模块名称</th>
                                        <th width="36%">地址</th>
                                        <th width="14%">状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <volist name="auth" id="vo">
                                            <tr data-id="{$vo.id}">
                                                <td>
                                                    <input class="form-control input-sm" type="text" name="sort[]" value="{$vo.sort}">
                                                </td>
                                                <td>
                                                    <i class="fa row-details fa-minus-square-o"></i>
                                                    {$vo.name}
                                                </td>
                                                <td>
                                                    {$vo.site}
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        </volist>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <input id="id" type="hidden"/>
                                <form action="{:U('Auth/edit')}" id="form-edit" class="form-horizontal bv-form form-auth" data-action="edit" onsubmit="return false;" autocomplete="off">
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">模块名称
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="name" value="" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">父节点
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="p_name" id="p_name" class="form-control p_name" type="text">
                                            <input name="p_id" type="hidden"/>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">地址
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="site" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">排序：</label>
                                        <div class="col-lg-8">
                                            <input name="sort" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">类型：</label>
                                        <div class="col-lg-8">
                                            <select name="type" class="form-control">
                                                <option value="1">URL</option>
                                                <option value="2">菜单</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">状态：</label>
                                        <div class="col-lg-8">
                                            <select name="status" class="form-control">
                                                <option value="1">启用</option>
                                                <option value="0">禁用</option>
                                            </select>
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
                <form class="form-horizontal bv-form form-auth" method="post" data-action="add" action="{:U('Auth/add')}" autocomplete="off"></form>
            </div>
        </div>
    </div>
    <div id="menuContent" class="menuContent" style="display: none;position: absolute;z-index: 1051;">
        <ul id="tree_auth" class="ztree" style="padding-top:10px;min-height: 200px;max-height: 400px;background-color: #eee;"></ul>
    </div>
</block>
<block name="js">
    <script>
        $(function(){
           $('#add').click(function(){
               bootbox.dialog({
                   message: function(){
                       var form = $('#addModal .col-md-12 .form-auth');
                       if(form.html() == ''){
                           form.append($('form.form-auth').html());
                       }
                       else{form[0].reset();}
                       form.find('.position-root').hide();
                       return $("#addModal").html();
                   },
                   title: "添加权限",
                   className: "modal-darkorange",
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
                               $('.modal-dialog form.form-auth').submit();
                           }
                       }
                   }
               });
           });
        });
    </script>
    <script src="__JS__/jquery.ztree.all-3.5.min.js"></script>
    <?php
        array_unshift($auth,array('id'=>0,'pid'=>0,'name'=>'跟节点'));
        $auth = json_encode($auth);
    ?>
    <script>
        //商品分类操作事件
        var setting = {
            check: {
                enable: true,
                chkStyle: "radio",
                radioType: 'all'
            },
            view: {
                dblClickExpand: false
            },
            data: {
                simpleData: {
                    enable: true
                }
            },
            callback: {
                beforeClick: beforeClick,
                onCheck: onCheck
            }
        };

        var zNodes = {$auth},zTree = null;

        function beforeClick(treeId, treeNode) {
            zTree.checkNode(treeNode, !treeNode.checked, null, true);
            return false;
        }

        function onCheck(e, treeId, treeNode) {
            var nodes = zTree.getCheckedNodes(true),
                name = [],id=[];
            for (var i in nodes) {
                name.push(nodes[i].name);
                id.push(nodes[i].id);
            }

            if (name.length > 0 ) name = name.join();
            if (id.length > 0 ) id = id.join();

            zTree.formOjb.find('.p_name').val(name);
        }

        function hideMenu() {
            $("#menuContent").slideUp("fast");
            $("body").unbind("mousedown", onBodyDown);
        }

        function onBodyDown(event) {
            if (!(event.target.id == "p_name" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
                hideMenu();
            }
        }

        $(document).ready(function(){

            zTree = $.fn.zTree.init($("#tree_auth"), setting, zNodes);

            $(this).on('click','.p_name',function(){
                var form = $(this).parents('form');
                var type = form.data('action');
                zTree.formOjb = form;
                $("#menuContent").css({
                    left:$(this).offset().left + "px",
                    top:$(this).offset().top + $(this).outerHeight() - $('.navbar-inner').height() + "px",
                    width: $(this).outerWidth() + "px"
                }).slideDown("fast");

                $("body").bind("mousedown", onBodyDown);
            });

            $('.plugins_auth- table').find('tbody tr').click(function(){
                if(!$(this).hasClass('tr-focus')){
                    $(this).parent().find('tr-focus').removeClass('tr-focus');
                    $(this).addClass('tr-focus');
                }
                var form = document.getElementById('form-edit');
                $.fruiter.post("{:U('Auth/getAuth')}",{id:$(this).data('id')},function(data){
                    if(data){
                        form.name.value = data.name;
                        form.site.value = data.site;
                        form.sort.value = data.sort;
                        for(var i in form.type.options){
                            if(form.type.options[i].value == data.type){
                                form.type.options[i].selected = true;
                                break;
                            }
                        }
                        for(var i in form.status.options){
                            if(form.type.options[i].value == data.status){
                                form.type.options[i].selected = true;
                                break;
                            }
                        }
                    }
                });
            });
        });
    </script>
</block>