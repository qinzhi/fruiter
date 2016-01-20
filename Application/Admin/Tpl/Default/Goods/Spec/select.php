<div class="widget">
    <div class="row padding-10">
        <div class="col-md-5">
            <h7>请选择规格</h7>
            <div class="well well-sm bg-white well-select-spec">
                <ul class="ul-spec-list">
                    <li><label>颜色</label></li>
                    <li><label>内存</label></li>
                    <li><label>网络类型</label></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <h7>规格预览区</h7>
            <div class="well well-sm bg-white well-pvw-spec">
                <p class="text-success">请在左侧列表选择规格！</p>
            </div>
        </div>
    </div>
    <div class="row padding-left-10 padding-bottom-10">
        <div class="col-md-12">
            <h7 class="help-block">没有找到需要的规格？</h7>
            <a class="btn btn-default btn-sm btn-add_spec"><i class="fa fa-plus"></i>添加新规格</a>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.ul-spec-list li').click(function(){
            if(!$(this).hasClass('active')){
                $(this).parent().find('li.active').removeClass('active').find('i.spec-status').remove();
                $(this).addClass('active').append('<i class="fa fa-check spec-status"></i>');
            }
        });
        $('.btn-add_spec').click(function(){
            $.dialog({
                id : 'addSpec',
                title : '添加新规格',
                async : false,
                min_width: 600,
                min_height: 350,
                content : function(){
                    var content;
                    $.post("{:U('Goods/spec')}",{tpl:'add'},function(data){
                        content = data;
                    });
                    return content;
                },
                ok : function(){
                    
                }
            });
        });
    });
</script>