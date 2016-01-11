<extend name="Layout/base" />
<block name="header-title">
    <h1>添加商品</h1>
</block>
<block name="css">
    <link href="__CSS__/metroStyle/metroStyle.css" rel="stylesheet" >
</block>
<block name="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header widget-fruiter">
                    <a class="btn btn-success" id="goods_save" href="javascript:void(0);">发布商品</a>
                </div><!--Widget Header-->
                <div class="widget-body plugins_goods-">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="tabbable">
                                <ul id="myTab" class="nav nav-tabs tabs-flat">
                                    <li class="active">
                                        <a href="#tab-basic" data-toggle="tab">
                                            商品信息
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-detail" data-toggle="tab">
                                            商品描述
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-seo" data-toggle="tab">
                                            商品SEO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-flat">
                                    <div class="tab-pane active" id="tab-basic">
                                        <include file="Default/Goods/Add/base"/>
                                    </div>

                                    <div class="tab-pane" id="tab-detail">
                                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                    </div>

                                    <div class="tab-pane" id="tab-seo">
                                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="horizontal-space"></div>

                        </div>
                    </div>
                </div><!--Widget Body-->
            </div><!--Widget-->
        </div>
    </div>
    <div id="menuContent" class="menuContent" style="display: none;position: absolute;z-index: 1051;">
        <ul id="tree_category" class="ztree" style="padding-top:10px;min-height: 200px;background-color: #eee;"></ul>
    </div>
</block>
<block name="js">
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

        var zNodes = {$categories},
            zTree = null;

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

            $("#product_category").attr("value", name);
            $("#product_category_id").attr("value", id);

        }
        $('#product_category').click(function(){
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
            if (!(event.target.id == "menuBtn" || event.target.id == "product_category" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
                hideMenu();
            }
        }

        $(document).ready(function(){
            zTree = $.fn.zTree.init($("#tree_category"), setting, zNodes);
        });
    </script>
</block>