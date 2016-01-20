<div class="widget flat no-margin">
    <div class="widget-header padding-top-5 padding-right-10">
        <h7 class="pull-left margin-top-4">1、增加规格项或选择规格标签 >> 2、添加需要的规格值 >> 保存 </h7>
        <a class="btn btn-default btn-sm pull-right btn-spec"><i class="fa fa-plus"></i>增加规格项</a>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <div class="tabbable clear">
                <ul class="nav nav-tabs tabs-flat">
                    <li class="active">
                        <a href="#spec1" class="no-padding-right" data-toggle="tab">
                            内存<button class="close pull-right" style="margin: -3px 6px 0;"> × </button>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tabs-flat">
                    <div class="tab-pane active" id="spec1">
                        <p class="text-success"><span class="text-danger">点击选择</span>下列《内存》：如果没有您需要的《内存》？请到规格列表中编辑内存</p>
                        <a class="btn btn-default" href="javascript:void(0);">16G</a>
                        <a class="btn btn-default" href="javascript:void(0);">32G</a>
                        <a class="btn btn-default" href="javascript:void(0);">64G</a>
                        <table class="table table-bordered table-center margin-top-10">
                            <thead>
                            <tr>
                                <th>
                                    规格值
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        16G
                                    </td>
                                    <td>
                                        <a data-action="up" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-up"></i></a>
                                        <a data-action="down" href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success btn-move"><i class="fa fa-arrow-down"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs shiny icon-only white btn-del"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                }
            });
        });
    });
</script>