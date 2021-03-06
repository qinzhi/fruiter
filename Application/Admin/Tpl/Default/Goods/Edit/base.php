<table class="table-form">
    <colgroup>
        <col width="150px"><col>
    </colgroup>
    <tbody>
        <tr>
            <th>商品名称：</th>
            <td>
                <div class="form-group has-feedback no-margin">
                    <input id="name" name="name" class="input-sm Lwidth400" value="{$goods.name}" type="text" pattern="required" maxlength="50">
                    <span class="note control-label margin-left-10">*</span>
                </div>
            </td>
        </tr>
        <tr>
            <th>关键字：</th>
            <td>
                <div class="form-group has-feedback no-margin">
                    <input id="search_words" name="search_words" value="{$goods.search_words}" type="text" class="input-sm Lwidth300" maxlength="50"/>
                    <span class="note control-label margin-left-10">每个关键词最长为15个字符，必须以","(逗号)分隔符</span>
                </div>
            </td>
        </tr>
        <tr>
            <th>所属分类：</th>
            <td>
                <div class="form-group has-feedback no-margin">
                    <input id="category" class="input-sm Lwidth400" type="text">
                    <input id="category_id" name="category_id" data-value='{$categories_id}' type="hidden">
                </div>
            </td>
        </tr>
        <tr>
            <th>是否上架：</th>
            <td>
                <span class="control-group">
                    <div class="radio line-radio">
                        <label class="no-padding">
                            <input name="status" type="radio" value="0" {$goods['status'] == 0 ? 'checked' : ''}>
                            <span class="text">下架</span>
                        </label>
                    </div>
                    <div class="radio line-radio">
                        <label>
                            <input name="status" type="radio" value="1" {$goods['status'] == 1 ? 'checked' : ''}>
                            <span class="text">上架</span>
                        </label>
                    </div>
                </span>
            </td>
        </tr>
        <tr>
            <th>基本数据：</th>
            <td>
                <table class="table table-bordered table-hover table-border">
                    <thead>
                        <tr>
                            <th class="base">商品货号</th>
                            <th class="base">库存</th>
                            <th class="base">市场价格</th>
                            <th class="base">销售价格</th>
                            <th class="base">成本价格</th>
                            <th class="base">重量(克)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="base">
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth150 goods_no" type="text" name="_goods_no[]" value="{$goods.goods_no}" pattern="required" maxlength="20">
                                </div>
                            </td>
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth80 store_nums" type="text" name="_store_nums[]" value="{$goods.store_nums}" pattern="int" maxlength="10">
                                </div>
                            </td>
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth80 market_price" type="text" name="_market_price[]" value="{$goods.market_price}" pattern="float" maxlength="10">
                                </div>
                            </td>
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth80 sell_price" type="text" name="_sell_price[]" value="{$goods.sell_price}" pattern="float" maxlength="10">
                                </div>
                            </td>
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth80 cost_price" type="text" name="_cost_price[]" value="{$goods.cost_price}" pattern="float" maxlength="10">
                                </div>
                            </td>
                            <td class="base">
                                <div class="form-group has-feedback no-margin">
                                    <input class="input-xs Lwidth80 weight" type="text" name="_weight[]" value="{$goods.weight}" pattern="float" maxlength="10">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <th>商品规格：</th>
            <td>
                <a class="btn btn-success btn-sm pull-left no-radius" href="javascript:void(0);" id="addSpec" data-status="{$no_spec}">
                    <i class="fa fa-plus"></i>
                    添加规格
                </a>
                <span class="note margin-left-10 pull-left margin-top-4">可以生成不同组合参数的货品，比如：尺码xxl+红色+长袖 衣服</span>
            </td>
        </tr>
        <tr>
            <th>商品类型：</th>
            <td>
                <div class="checkbox checkbox-inline no-margin no-padding">
                    <label class="no-padding">
                        <input type="checkbox" name="commend_type[]" value="1" <?php if(in_array(1,$commend_id))echo 'checked';?>>
                        <span class="text">最新商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" name="commend_type[]" value="2" <?php if(in_array(2,$commend_id))echo 'checked';?>>
                        <span class="text">特价商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" name="commend_type[]" value="3" <?php if(in_array(3,$commend_id))echo 'checked';?>>
                        <span class="text">热卖商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" name="commend_type[]" value="4" <?php if(in_array(4,$commend_id))echo 'checked';?>>
                        <span class="text">推荐商品</span>
                    </label>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<script>
    $(function(){
        var goods_base = $('.table-border').find('tbody tr.base');
        (function init(products){
            var head = products[0];
            if(head.spec_array != ''){
                for(var i in products)
                    products[i].spec_array = JSON.parse(products[i].spec_array);
                var table = $('.table-border');
                var thead = table.find('thead');
                var tbody = table.find('tbody');
                thead.find('tr').append('<th class="spec">默认</th>');
                thead.find('tr').append('<th class="spec">操作</th>');
                tbody.find('tr.base').remove();

                for(var i in head.spec_array){
                    var tmp = $('<th class="spec">' + head.spec_array[i].name + '</th>');
                    tmp.data('id',head.spec_array[i].id)
                        .data('name',head.spec_array[i].name)
                        .data('type',head.spec_array[i].type);
                    thead.find('tr').prepend(tmp);
                }

                $.each(products,function(index){
                    var spec = this.spec_array;
                    var base_tr = goods_base.find('td').clone().removeAttr('class');

                    var td = $('<td></td>');
                    td.append('<div class="checkbox no-margin"></div>');
                    td.find('div').append('<label class="no-padding-left"></label>');
                    var _checkbox = $('<input type="checkbox" name="_default[]" value="' + index + '" class="inverted" />');
                    td.find('div > label').append(_checkbox);
                    td.find('div > label').append('<span class="text margin-left-4"></span>');

                    base_tr.after(td);
                    base_tr.after('<td><a href="javascript:void(0);" class="btn btn-danger btn-xs shiny icon-only white btn-del"><i class="fa fa-times"></i></a></td>');
                    var tr = $('<tr class="spec" data-id="' + this.id + '"></tr>');
                    tr.append('<input type="hidden" name="_product_id[]" value="' + this.id + '"/>');
                    tr.append(base_tr);

                    for(var i=0;i<spec.length;i++){
                        tr.prepend('<td></td>');
                    }
                    for(var i in spec){
                        tr.find('td:eq('+i+')')
                            .html("<input type='hidden' value='" + JSON.stringify(spec[i]) + "' name='_spec_list[" + index + "][]'/>" + spec[i].value);
                    }
                    if(this.is_default == 1){
                        tr.find('input[type=checkbox]').attr('checked','checked');
                    }

                    tbody.append(tr);
                });
            }
        })({$products});
        $('#addSpec').click(function(){
            if($(this).data('status') == false){
                Notify('重新设置规格需删除当前规格列表', 'bottom-right', '5000', 'warning', 'fa-warning', true);
                return;
            }
            $.dialog({
                id : 'setSpec',
                title : '设置商品规格',
                async : false,
                min_width: 600,
                min_height: 350,
                content : function(){
                    var content;
                    $.post("{:U('Goods/spec')}",{tpl:'set'},function(data){
                        content = data;
                    });
                    return content;
                },
                ok : function(target){
                    var spec = [];
                    var table = $('.table-border');
                    var thead = table.find('thead');
                    var tbody = table.find('tbody');
                    var tabs_spec = $(target).find('.tabs-spec-name li');
                    if(tabs_spec.length){
                        tabs_spec.each(function(index){
                            var id = $(this).data('id');
                            var name = $(this).data('name');
                            var type = $(this).data('type');
                            spec[index] = [];
                            var tr = $(target).find('div[data-id='+id+']').find('table > tbody > tr');
                            if(tr.length > 0){
                                tr.each(function(i){
                                    spec[index][i] = $(this).data('value');
                                });
                                spec[index]['name'] = name;
                                spec[index]['type'] = type;
                                spec[index]['id'] = id;
                            }else{
                                spec.pop();
                            }
                        });

                        var spec_depth = spec.length;
                        if(spec_depth > 0){

                            if(goods_base == ''){
                                goods_base = tbody.find('tr.base');
                                tbody.find('tr.base').remove();
                            }

                            var th = table.find('thead > tr');
                            var _spec = [];
                            $.each(spec,function(i){
                                var tmp = $('<th class="spec">' + this.name + '</th>');
                                tmp.data('id',this.id)
                                    .data('name',this.name)
                                    .data('type',this.type);
                                _spec[i] = {};
                                _spec[i].id = this.id;
                                _spec[i].name = this.name;
                                _spec[i].type = this.type;
                                th.prepend(tmp);
                                delete this.type;
                                delete this.name;
                                delete this.id;
                            });

                            th.append('<th class="spec">默认</th>');
                            th.append('<th class="spec">操作</th>');

                            var spec_list = Zuhe(spec);

                            for(var i in spec_list){

                                var tr = $('<tr class="spec"></tr>');
                                var list = spec_list[i].split(',');
                                for(var l in list){
                                    var td = $('<td data-value="' + list[l] + '">' + list[l] + '</td>');
                                    tr.append(td);
                                    var index = td.index();
                                    var _input = _spec[index];
                                    _input.value = list[l];
                                    td.append("<input type='hidden' value='" + JSON.stringify(_input) + "' name='_spec_list[" + i + "][]'/>");
                                }

                                var base_tr = goods_base.find('td').clone().removeAttr('class');
                                base_tr.find('.has-error').removeClass('has-error');
                                tr.append(base_tr);

                                var td = $('<td></td>');
                                td.append('<div class="checkbox no-margin"></div>');
                                td.find('div').append('<label class="no-padding-left"></label>');

                                var _checkbox = $('<input type="checkbox" name="_default[]" value="' + i + '" class="inverted" />');
                                if(i == 0) _checkbox.attr('checked',true);
                                td.find('div > label').append(_checkbox);

                                td.find('div > label').append('<span class="text margin-left-4"></span>');

                                tr.append(td);

                                tr.append('<td><a href="javascript:void(0);" class="btn btn-danger btn-xs shiny icon-only white btn-del"><i class="fa fa-times"></i></a></td>');
                                tbody.append(tr);
                            }

                            $('#addSpec').data('status',false);
                        }
                    }
                }
            });
        });
        $(document).on('click','.table-border input[name="_default[]"]',function(){
            var tbody = $('.table-border').find('tbody');
            if(this.checked === false){
                if(tbody.find('input[name="_default[]"]:checked').length <= 0){
                    this.checked = true;
                }
            }else{
                var checkbox = tbody.find('input[name="_default[]"]:checked');
                if(checkbox.length > 0){
                    checkbox.attr('checked',false);
                }
                this.checked = true;
            }
        });
        $(document).on('click','.table-border .btn-del',function(){
            var obj = this;
            bootbox.confirm("确定要删除么?", function (result) {
                if(result){
                    var spec_td = $(obj).closest('tbody').find('tr.spec');
                    var table = $('.table-border');
                    var thead = table.find('thead');
                    var tbody = table.find('tbody');
                    var tr = $(obj).closest('tr');
                    var id = tr.data('id');
                    if(id != ''){
                        $('#goodsForm').append('<input type="hidden" name="delProduct[]" value="' + id + '">');
                    }
                    if(spec_td.length == 1){
                        thead.find('th.spec').remove();
                        tbody.html(goods_base);
                        $('#addSpec').data('status',true);
                    }else{
                        tr.remove();
                        tbody.find('tr:first-child').find('input[type="checkbox"]').attr('checked',true);
                    }
                }
            });
        });
    });
    //接受可变长数组参数，具体看下面的测试代码
    function Zuhe(spec){
        var heads=spec[0];
        for(var i=1,len=spec.length;i<len;i++){
            heads=addNewType(heads,spec[i]);
        }
        return heads;
    }

    //在原有组合结果的基础上添加一种新的规格
    function addNewType(heads,choices){
        var result=[];
        for(var i=0,len=heads.length;i<len;i++){
            for(var j=0,lenj=choices.length;j<lenj;j++){
                result.push(heads[i]+','+choices[j]);
            }
        }
        return result;
    }

</script>