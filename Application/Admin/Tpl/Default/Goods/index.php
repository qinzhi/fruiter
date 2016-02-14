<extend name="Layout/base" />
<block name="content">
    <div class="row no-margin">
        <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
            <div class="widget flat no-margin plugins_goods-">
                <div class="widget-header widget-fruiter">
                    <div class="pull-left goods_list_top">
                        <select class="input-sm Lwidth120" name="search[status]">
                            <option value="">选择上下架</option>
                            <option value="1">上架</option>
                            <option value="0">下架</option>
                        </select>
                        <select class="input-sm Lwidth120" name="search[store_nums]">
                            <option>选择库存</option>
                            <option value="go.store_nums < 1">无货</option>
                            <option value="go.store_nums >= 1 and go.store_nums < 10">低于10</option>
                            <option value="go.store_nums <= 100 and go.store_nums >= 10">10-100</option>
                            <option value="go.store_nums >= 100">100以上</option>
                        </select>
                        <select class="input-sm Lwidth120" name="search[commend_id]">
                            <option>选择商品类型</option>
                            <option value="1">最新商品</option>
                            <option value="2">特价商品</option>
                            <option value="3">热卖商品</option>
                            <option value="4">推荐商品</option>
                        </select>
                        <input type="text" class="input-sm Lwidth200" placeholder="选择商品分类" readonly>
                        <input type="text" class="input-sm" placeholder="商品名或商品货号"/>
                        <button class="btn btn-success" id="search">搜索</button>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{:U('Goods/add')}">添加商品</a>
                    </div>
                </div><!--Widget Header-->
                <div class="widget-body no-padding">
                    <table class="table table-hover table-middle">
                        <colgroup>
                            <col width="60px">
                            <col width="360px">
                            <col width="180px">
                            <col width="80px">
                            <col width="80px">
                            <col width="120px">
                            <col width="70px">
                            <col>
                        </colgroup>
                        <thead class="bordered-success">
                            <tr role="row">
                                <th class="padding-left-16">选择</th>
                                <th>商品名称</th>
                                <th>分类</th>
                                <th>销售价</th>
                                <th>库存</th>
                                <th>状态</th>
                                <th>排序</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <volist name="goods" id="vo">
                                <tr>
                                    <td class="padding-left-16">
                                        <div class="checkbox checkbox-inline no-margin no-padding">
                                            <label class="no-padding">
                                                <input type="checkbox" class="goods_id" name="id[]" value="{$vo.id}" autocomplete="off">
                                                <span class="text"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="input-edit" data-field="name" title="点击更新商品名称">{$vo.name}</td>
                                    <td title="点击设置分类">手机</td>
                                    <td><a href="javascript:;" class="goods-price" title="点击更新价格">{$vo.sell_price}</a></td>
                                    <td><a href="javascript:;" class="goods-sku" title="点击更新库存">{$vo.store_nums}</a></td>
                                    <td>
                                        <label class="goods-status">
                                            <input class="checkbox-slider toggle colored-success" type="checkbox" autocomplete="off" {$vo['status']?'checked':''}>
                                            <span class="text" title="设置商品上下架"></span>
                                        </label>
                                    </td>
                                    <td class="input-edit" data-field="sort" title="点击更新商品排序">{$vo.sort}</td>
                                    <td>
                                        <a class="btn btn-default btn-sm purple btn-edit" href="{:U('Goods/edit',array('id'=>$vo['id']))}" title="编辑">
                                            <i class="fa fa-edit"></i> 编辑</a>
                                        <a class="btn btn-default btn-sm danger btn-del" href="javascript:void(0);" title="删除">
                                            <i class="fa fa-times"></i> 删除</a>
                                    </td>
                                </tr>
                            </volist>
                        </tbody>
                    </table>
                    <div class="row DTTTFooter padding-left-16">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="searchable_info" role="alert" aria-live="polite"
                                 aria-relevant="all">当前第1页/共1页
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_bootstrap" id="searchable_paginate">
                                <ul class="pagination">
                                    <li class="prev disabled"><a href="#">上一页</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li class="next disabled"><a href="#">下一页</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--Widget Body-->
            </div><!--Widget-->
        </div>
    </div>
</block>
<block name="js">
    <script type="application/javascript">
        $(function(){
           var _goods = {
               update : function(params){
                   $.fruiter.post('{:U("Goods/update")}',params,function(data){
                       if(data.code == 1){
                           Notify(data.msg, 'bottom-right', '5000', 'success', 'fa-check', true);
                       }else{
                           Notify(data.msg, 'bottom-right', '5000', 'danger', 'fa-bolt', true);
                       }
                   });
               }
           }
           $('.input-edit').click(function(){
               if($(this).find('input').length <= 0){
                   var obj = $(this);
                   var input = $('<input type="text" class="input-xs form-control"/>');
                   var val = $(this).text();
                   input.val(val).data('value',val);
                   $(this).html(input);
                   var field = $(this).data('field');
                   input.focus().select();
                   input.bind('blur',function(){
                       var cur_val = $(this).val();
                       var val = $(this).data('value');
                       if(!!cur_val && cur_val != val){
                           var params = {};
                           params.id = $(this).closest('tr').find('.goods_id').val();
                           params[field] = cur_val;
                           _goods.update(params);
                           obj.text(cur_val);
                       }else{
                           obj.text(val);
                       }
                   });
               }
           });
           $('.goods-status input[type=checkbox]').change(function(){
               var params = {};
               params.id = $(this).closest('tr').find('.goods_id').val();
               params.status = this.checked ? 1 : 0;
               _goods.update(params);
           });
        });
    </script>
</block>