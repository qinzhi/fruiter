<table class="table-form" width="100%">
    <colgroup>
        <col width="150px">
        <col>
    </colgroup>
    <tbody>
        <tr>
            <th>商品模型：</th>
            <td>
                <select class="input-sm no-radius Lwidth300" id="selectModel" name="model_id">
                    <option value="">选择模型...</option>
                </select>
                <span class="note margin-left-10">可以加入商品扩展属性，比如：型号，年代，款式...</span>
            </td>
        </tr>
    </tbody>
</table>
<script type="text/html" id="propertiesTemplate">
    {{each items as item index}}
        {{value = item.value.split(',')}}
        <tr data-attr_id="{{item.id}}" data-model_id="{{item.model_id}}" data-type="{{item.type}}">
            <th>{{item.name}}</th>
            <td>
                {{if (item.type == 1)}}
                    <input type="text" class="input-sm Lwidth300" name="attr_id_{{item.id}}"/>
                {{else if (item.type == 2)}}
                    <select class="input-sm no-radius Lwidth300" name="attr_id_{{item.id}}">
                        {{each value as val}}
                            <option value="{{val}}">{{val}}</option>
                        {{/each}}
                    </select>
                {{else if (item.type == 3)}}
                    <span class="control-group">
                        {{each value as val i}}
                            <div class="radio line-radio margin-right-10">
                                <label class="no-padding">
                                    <input type="radio" name="attr_id_{{item.id}}[]" value="{{val}}" {{if (i== 0)}}checked{{/if}}>
                                    <span class="text">{{val}}</span>
                                </label>
                            </div>
                        {{/each}}
                    </span>
                {{else if (item.type == 4)}}
                    {{each value as val}}
                        <div class="checkbox checkbox-inline no-margin">
                            <label class="no-padding margin-right-10">
                                <input type="checkbox" value="2" name="attr_id_{{item.id}}[]" value="{{val}}">
                                <span class="text">{{val}}</span>
                            </label>
                        </div>
                    {{/each}}
                {{/if}}
            </td>
        </tr>
    {{/each}}
</script>
<script>
    function init_attr(a){
        var status = $(a).data('status');
        if(!status){
            $.post('{:U("GoodsAttr/getModels")}',function(data){
                $.each(data,function(){
                    $('#selectModel').append('<option value="'+this.id+'">'+this.name+'</option>');
                });
            });
            $(a).data('status',!status);
        }
    }
    $(function(){
        $('#selectModel').change(function(){
            var id = $(this).val();
            var tbody = $(this).closest('tbody');
            if(!!id){
                $.post('{:U("GoodsAttr/gets")}',{id:id},function(attrs){
                    if(attrs){
                        tbody.append(template('propertiesTemplate',{items:attrs}));
                    }
                });
            }
        });
    });
</script>