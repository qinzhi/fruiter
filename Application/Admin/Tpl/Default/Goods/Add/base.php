<table class="table-form">
    <colgroup>
        <col width="150px"><col>
    </colgroup>
    <tbody>
        <tr>
            <th>商品名称：</th>
            <td><input id="name" name="name" class="input-sm Lwidth400" type="text"></td>
        </tr>
        <tr>
            <th>关键字：</th>
            <td>
                <input id="keyword" name="keyword"  type="text" class="input-sm Lwidth300"/>
                <span class="note margin-left-10">每个关键词最长为15个字符，必须以","(逗号)分隔符</span>
            </td>
        </tr>
        <tr>
            <th>所属分类：</th>
            <td>
                <input id="product_category" name="product_category" class="input-sm Lwidth400" type="text">
                <input id="product_category_id" name="product_category_id" class="hidden" type="text">
            </td>
        </tr>
        <tr>
            <th>是否上架：</th>
            <td>
                <span class="control-group">
                    <div class="radio line-radio">
                        <label class="no-padding">
                            <input name="form-field-radio" type="radio" checked="checked">
                            <span class="text">下架</span>
                        </label>
                    </div>
                    <div class="radio line-radio">
                        <label>
                            <input name="form-field-radio" type="radio">
                            <span class="text">上架</span>
                        </label>
                    </div>
                </span>
            </td>
        </tr>
        <tr>
            <th>基本数据：</th>
            <td>
                <table class="table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>商品货号</th>
                            <th>库存</th>
                            <th>市场价格</th>
                            <th>销售价格</th>
                            <th>成本价格</th>
                            <th>重量(克)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="input-xs Lwidth150" type="text" name="search_engine">
                            </td>
                            <td>
                                <input class="input-xs Lwidth80" type="text" name="search_engine">
                            </td>
                            <td>
                                <input class="input-xs Lwidth80" type="text" name="search_engine">
                            </td>
                            <td>
                                <input class="input-xs Lwidth80" type="text" name="search_engine">
                            </td>
                            <td>
                                <input class="input-xs Lwidth80" type="text" name="search_engine">
                            </td>
                            <td>
                                <input class="input-xs Lwidth80" type="text" name="search_engine">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <th>商品规格：</th>
            <td>
                <a class="btn btn-success btn-sm pull-left no-radius" href="javascript:void(0);" id="addAttr">
                    <i class="fa fa-plus"></i>
                    添加规格
                </a>
                <span class="note margin-left-10 pull-left margin-top-4">可以生成不同组合参数的货品，比如：尺码xxl+红色+长袖 衣服</span>
            </td>
        </tr>
        <tr>
            <th>商品模型：</th>
            <td>
                <select class="input-sm no-radius">
                    <option>选择模型...</option>
                </select>
                <span class="note margin-left-10">可以加入商品扩展属性，比如：型号，年代，款式...</span>
            </td>
        </tr>
        <tr>
            <th>商品类型：</th>
            <td>
                <div class="checkbox checkbox-inline no-margin no-padding">
                    <label class="no-padding">
                        <input type="checkbox" checked="checked">
                        <span class="text">最新商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">特价商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">热卖商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">推荐商品</span>
                    </label>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="widget no-margin">
    <div class="widget-header padding-top-5">
        <h7 class="pull-left margin-top-4">1、增加规格项或选择规格标签 >> 2、添加需要的规格值 >> 保存 </h7>
        <a class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i>增加规格项</a>
    </div>

    <div class="widget-body">
        <div class="widget-main ">
            <div class="tabbable clear">
                <ul id="myTab11" class="nav nav-tabs tabs-flat">
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
                        <table class="table table-bordered">
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
                                        1
                                    </td>
                                    <td>
                                        active
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
        $('#addAttr').click(function(){
            $.dialog({
                id : 'addAttr',
                title : '设置商品规格',
                async : false,
                content : function(){
                    var content;
                    $.post("{:U('Goods/setSpec')}",function(data){
                        content = data;
                    });
                    return content;
                }
            });
        });
    });
</script>