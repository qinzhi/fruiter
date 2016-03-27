<extend name="Layout/base" />
<block name="quote-css">
    <link href="__CSS__/index.css?v={$version}" rel="stylesheet" type="text/css">
    <link href="__PLUGINS__/swiper/css/swiper.min.css?v={$version}" rel="stylesheet" type="text/css">
</block>
<block name="content">

<!-- 首页轮播图 开始 -->
<section class="swiper-container" id="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="javascript:;">
                <img src="http://image.joyvioshop.com/img_upload/160302/0_1456904438_80341976.jpg"/>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="javascript:;">
                <img src="http://image.joyvioshop.com/img_upload/160302/0_1456904344_933058433.jpg"/>
            </a>
        </div>
    </div>
    <ul class="swiper-pagination"></ul>
</section>
<script>
    $(function(){
        var mySwiper = new Swiper('#swiper', {
            autoplay : 3000,
            loop: true,
            pagination : '.swiper-pagination',
            paginationType : 'bullets',
            paginationClickable :true,
            paginationElement : 'li'
        })
    });
</script>
<!-- 首页轮播图 结束 -->

<section class="fast-entrance">

</section>

<section class="product-area">
    <div class="product-title clearfix">
        <h3 class="pull-left">农庄直供</h3>
        <i class="pull-right icon icon-right"></i>
    </div>
    <div class="product-content">
        <ul class="product-list clearfix">
            <li class="product-list-item">
                <div class="product-img">
                    <img src="http://cbu01.alicdn.com/img/ibank/2016/135/583/2788385531_1905778333.jpg_270x270xzq60.jpg">
                </div>
                <div class="product-info">
                    <h3 class="product_name">烟台栖霞苹果新鲜水果产地直供</h3>
                    <p class="product_intro">每箱约30个</p>
                    <div class="product-cost widthScale80">
                        <div class="pull-left">
                            <p class="product_price">
                                <sup>￥</sup>
                                <em>26.</em>
                                <i>00</i>
                                <unit>/箱</unit>
                            </p>
                        </div>
                        <div class="pull-right">
                            <p class="product-sell_num">已售200箱</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product-cart_add clear">
                        <i class="icon icon-add cart_add"></i>
                    </div>
                </div>
            </li>
            <li class="product-list-item">
                <div class="product-img">
                    <img src="http://cbu01.alicdn.com/img/ibank/2015/193/945/2501549391_958845113.jpg_270x270xzq60.jpg">
                </div>
                <div class="product-info">
                    <h3 class="product_name">江西特产腊月红蜜桔子</h3>
                    <p class="product_intro">每箱约45个</p>
                    <div class="product-cost widthScale80">
                        <div class="pull-left">
                            <p class="product_price">
                                <sup>￥</sup>
                                <em>20.</em>
                                <i>00</i>
                                <unit>/箱</unit>
                            </p>
                        </div>
                        <div class="pull-right">
                            <p class="product-sell_num">已售100箱</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product-cart_add clear">
                        <i class="icon icon-add cart_add"></i>
                    </div>
                </div>
            </li>
            <li class="product-list-item">
                <div class="product-img">
                    <img src="http://cbu01.alicdn.com/img/ibank/2016/317/472/2771274713_1072337026.jpg_270x270xzq60.jpg">
                </div>
                <div class="product-info">
                    <h3 class="product_name">高州新鲜桂味荔枝</h3>
                    <p class="product_intro">每盒约5斤</p>
                    <div class="product-cost widthScale80">
                        <div class="pull-left">
                            <p class="product_price">
                                <sup>￥</sup>
                                <em>95.</em>
                                <i>00</i>
                                <unit>/盒</unit>
                            </p>
                        </div>
                        <div class="pull-right">
                            <p class="product-sell_num">已售50盒</p>
                        </div>
                        <div class="clear"></div>
                        <div class="product-cart_add clear">
                            <i class="icon icon-add cart_add"></i>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <p class="text-center" style="line-height: 2.5rem;background-color: #f0f4f0">~没有更多商品了~</p>
    </div>
</section>

<section class="product-purchasing">
    <div class="product-panel">
        <div class="product-view">
            <div class="product-img">
                <img src="http://cbu01.alicdn.com/img/ibank/2016/317/472/2771274713_1072337026.jpg_270x270xzq60.jpg">
            </div>
            <div class="product-info">
                <h3 class="product_name">高州新鲜桂味荔枝</h3>
                <div class="flex widthScale00">
                    <div class="flex-1">
                        <p class="product_price"><sup>￥</sup><em>95.</em><i>00</i></p>
                        <p class="product-purchase_num">1-2<unit>箱</unit></p>
                    </div>
                    <div class="flex-1">
                        <p class="product_price"><sup>￥</sup><em>93.</em><i>00</i></p>
                        <p class="product-purchase_num">2-5<unit>箱</unit></p>
                    </div>
                    <div class="flex-1">
                        <p class="product_price"><sup>￥</sup><em>90.</em><i>00</i></p>
                        <p class="product-purchase_num">≥5<unit>箱</unit></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-order">
            <div class="order-header">
                <span class="order-title">购买数量：</span>
                <span class="order-stock">库存<span class="value">20000</span><span class="unit">箱</span></span>
            </div>
            <div class="order-action">
                <div class="amount-control">
                    <a class="amount-down pull-left"><i class="icon icon-jianhao"></i></a>
                    <input class="amount-input pull-left" type="number" pattern="\d*" maxlength="8" value="0"/>
                    <a class="amount-up pull-left"><i class="icon icon-jiahao"></i></a>
                </div>
            </div>
            <div class="clear" style="height: 4.5rem"></div>
        </div>
        <div class="product-action">
            <div class="flex">
                <div class="flex-1">
                    <a class="btn btn-primary no-radius btn-block product-ok">确定</a>
                </div>
            </div>
        </div>
        <div class="panel-close">
            <i class="icon icon-cha action-close"></i>
        </div>
    </div>
</section>
<div class="all-shade opacity5"></div>

</block>

<block name="quote-js">
    <script src="__JS__/cart.js"></script>
    <script src="__PLUGINS__/swiper/js/swiper.min.js?v={$version}"></script>
</block>