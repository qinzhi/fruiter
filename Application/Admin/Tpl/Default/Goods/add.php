<extend name="Layout/base" />
<block name="header-title">
    <h1>添加商品</h1>
</block>
<block name="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-sky widget-fruiter">
                    <a class="btn btn-success" id="goods_save" href="javascript:void(0);">保存</a>
                </div><!--Widget Header-->
                <div class="widget-body plugins_goods-">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="tabbable">
                                <ul id="myTab" class="nav nav-tabs">
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

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-basic">
                                        <div class="filed-box">
                                            <label class="form-label" for="name">商品名称：</label>
                                            <input id="name" name="name" class="input-sm Lwidth400" type="text">
                                        </div>
                                        <div class="filed-box">
                                            <label class="form-label" for="name">关键字：</label>
                                            <input id="keyword" name="keyword"  type="text" class="input-sm Lwidth300"/>
                                            <span class="note">每个关键词最长为15个字符，必须以","(逗号)分隔符</span>
                                        </div>
                                        <div class="filed-box">
                                            <label class="form-label" for="name">所属分类：</label>
                                            <input id="name" name="name" class="input-sm Lwidth400" type="text">
                                        </div>
                                        <div class="clear"></div>
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
</block>