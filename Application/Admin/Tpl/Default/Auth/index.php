<extend name="Layout/base" />
<block name="header-title">
    <h1>权限管理</h1>
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
                <div class="widget-body plugins_goods-">
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
                                    <tr>
                                        <td>
                                            <input class="form-control input-sm" type="text" name="sort[]">
                                        </td>
                                        <td>
                                            <i class="fa row-details fa-minus-square-o"></i>
                                            AUSTRALIAN
                                        </td>
                                        <td class="numeric">
                                            $1.38
                                        </td>
                                        <td class="numeric">
                                            -0.01
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control input-sm" type="text" name="sort[]">
                                        </td>
                                        <td>
                                            <i class="fa row-details fa-plus-square-o margin-left-20"></i>
                                            AUSTRALIAN
                                        </td>
                                        <td class="numeric">
                                            $1.38
                                        </td>
                                        <td class="numeric">
                                            -0.01
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <input id="id" type="hidden"/>
                                <form class="form-horizontal bv-form form-position" onsubmit="return false;" autocomplete="off">
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">模块名称
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="name" value="" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">父节点
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="p_name" id="p_name" value="" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">地址
                                            <span class="red">*</span>：
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="site" value="" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">排序：</label>
                                        <div class="col-lg-8">
                                            <input name="sort" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">类型：</label>
                                        <div class="col-lg-8">
                                            <select name="status" class="form-control" autocomplete="off">
                                                <option value="1">菜单</option>
                                                <option value="0">URL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">状态：</label>
                                        <div class="col-lg-8">
                                            <select name="status" class="form-control" autocomplete="off">
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
                <form class="form-horizontal bv-form form-position" method="post"></form>
            </div>
        </div>
    </div>
    <div id="menuContent" class="menuContent" style="display: none;position: absolute;">
        <ul id="tree_auth" class="ztree" style="padding-top:10px;min-height: 200px;background-color: #fff;"></ul>
    </div>
</block>
<block name="js">
    <script>
        $(function(){
           $('#add').click(function(){
               bootbox.dialog({
                   message: function(){
                       var form = $('#addModal .col-md-12 .form-position');
                       if(form.html() == ''){
                           form.append($('form.form-position').html());
                           form.append('<input name="type" value="add" type="hidden"/>');
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
                               //$('.modal-dialog form.form-position').submit();
                           }
                       }
                   }
               });
           });
        });
    </script>
    <script src="__JS__/jquery.ztree.all-3.5.min.js"></script>
    <script>
        //商品分类操作事件
        var setting = {
            check: {
                enable: true,
                chkboxType: {"Y":"p", "N":"p"},
                nocheckInherit: true
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

        var zNodes = {$auth_list|json_encode};

        function beforeClick(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_auth");
            zTree.checkNode(treeNode, !treeNode.checked, null, true);
            return false;
        }

        function onCheck(e, treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree_auth"),
                nodes = zTree.getCheckedNodes(true),
                v = "",id="";
            for (var i=0, l=nodes.length; i<l; i++) {
                v += nodes[i].name + ",";
                id += nodes[i].id + ",";
            }
            if (v.length > 0 ) v = v.substring(0, v.length-1);
            if (id.length > 0 ) id = id.substring(0, id.length-1);
            $("#p_name").attr("value", v);
            $("#p_id").attr("value", id);

        }
        $('#p_name').click(function(){
            $("#menuContent").css({
                left:$(this).offset().left + "px",
                top:$(this).offset().top + $(this).outerHeight() - $('.navbar-inner').height() + "px",
                width: $(this).outerWidth() + "px"
            }).slideDown("fast");

            $("body").bind("mousedown", onBodyDown);
        }) ;

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
            $.fn.zTree.init($("#tree_auth"), setting, zNodes);
        });
    </script>
</block>