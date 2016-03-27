<extend name="Layout/base" />
<block name="quote-css">
    <link href="__CSS__/category.css?v={$version}" rel="stylesheet" type="text/css">
</block>
<block name="header">
    <header class="header clearfix">
        <div class="row-category flex">
            <div class="menu"><i class="icon icon-fenlei"></i></div>
            <div class="search flex-1 padding-right-10"><input class="searchInput" id="filtrate" placeholder="检索分类名称" autocomplete="off"/></div>
            <!--<div class="action"><i class="icon icon-fangdajing"></i></div>-->
        </div>
    </header>
</block>
<block name="content">
    <section class="category-area">
        <ul class="category-box"></ul>
    </section>
    <script id="categoryTpl" type="text/html">
        {{each data as value}}
        <li class="box box-1">
            <a class="category-list" href="javascript:;">
                <div class="category-img"><img src="{{value.img}}"/></div>
                <p class="category-name">{{value.name}}</p>
            </a>
        </li>
        {{/each}}
    </script>
    <script>
        $(function(){
            var data = [
                {id:1,img:'__IMG__/pitaya.png','name':'火龙果'},
                {id:2,img:'__IMG__/apple.png','name':'苹果'},
                {id:3,img:'__IMG__/inmato.png','name':'小番茄'},
                {id:4,img:'__IMG__/reddates.png','name':'红枣'}
            ];
            var category_box = $('ul.category-box');
            if(data.length > 0){
                render(data);
            }
            function render(data){
                var tpl = template('categoryTpl',{data:data});
                category_box.html(tpl);
            }
            $('#filtrate').bind('keyup',function(){
                var val = $(this).val().trim();
                if(val.length > 0){
                    var tmpData = [];
                    $.each(data,function(){
                        if(this.name.indexOf(val) !== -1){
                            tmpData.push(this);
                        }
                    });
                    render(tmpData);
                }else{
                    render(data);
                }
            });
        });
    </script>
</block>
<block name="quote-js">
</block>