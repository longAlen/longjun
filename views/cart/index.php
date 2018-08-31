
    <!-- ============================================================= HEADER : END ============================================================= -->		<section id="cart-page">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <div class="col-xs-12 col-md-9 items-holder no-margin">
                <?php foreach ($carts as $cart):?>
                <div class="row no-margin cart-item">
                    <div class="col-xs-12 col-sm-2 no-margin">
                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$cart['productid']])?>" class="thumb-holder">
                            <img class="lazy" alt="" src="http://<?=$cart['cover']?>" />
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-5 ">
                        <div class="title">
                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$cart['productid']])?>"><?=$cart['title']?></a>
                        </div>
<!--                        <div class="brand">sony</div>-->
                    </div>

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <div class="quantity">
                            <div class="le-quantity">
                                <form>
                                    <a class="minus" href="#reduce" data-url="<?=\yii\helpers\Url::to(['cart/reduce'])?>" data-token = "<?=Yii::$app->request->getCsrfToken()?>"></a>
                                    <input name="quantity" readonly="readonly" type="text" value="<?=$cart['productnum']?>" data-value="<?=$cart['cartid']?>" />
                                    <a class="plus" href="#add" data-url="<?= \yii\helpers\Url::to(['cart/plus'])?>" data-token="<?=Yii::$app->request->getCsrfToken()?>"</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="price">
                            ￥<?=$cart['price']?>
                        </div>
                        <a class="close-btn" href="JavaScript:delCart('<?=\yii\helpers\Url::to(['cart/del'])?>','<?=$cart['cartid']?>','<?=Yii::$app->request->getCsrfToken()?>')" title="删除"></a>
                    </div>
                </div><!-- /.cart-item -->
                <?php endforeach;?>
                <div class="pagination pull-right">
                    <?=\yii\widgets\LinkPager::widget([
                        'pagination'=>$pages,
                       // 'firstPageLabel'=>'首页',
                        //'lastPageLabel'=>'尾页',
                        'prevPageLabel'=>'上一页',
                        'nextPageLabel'=>'下一页',
                        'hideOnSinglePage'=>true,
                    ])?>
                </div>
                <style>
                    .pagination li.prev span{
                        font-size: 12px;
                        margin-right: 5px;
                    }
                    .pagination li.active a{
                        background-color: #dae0e6;
                        border-color: #dae0e6;
                        font-size: 12px;
                        padding: 6px 17px!important;
                    }
                    .pagination li>a{
                        font-size: 12px;
                        padding: 6px 17px!important;
                    }
                    .pagination li.next a{
                        font-size: 12px;
                        padding: 6px 16px!important;
                    }
                </style>
            </div>
            <!-- ========================================= CONTENT : END ========================================= -->

            <!-- ========================================= SIDEBAR ========================================= -->

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">商品购物车</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>购物车总价</label>
                            <!--    <?php /*$totalprice = array_sum(array_column($carts,'totalprice'));*/?>
                                <div class="value pull-right">￥<?/*=number_format($totalprice,2)*/?></div>-->
                                <div class="value pull-right">￥<?=number_format($totalprice,2)?></div>
                            </li>
                            <li>
                                <label>运费</label>
                                <div class="value pull-right">￥<?=number_format($fee,2)?></div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>订单总价</label>
                                <div class="value pull-right">￥<?=number_format($totalprice+$fee,2)?></div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big" href="<?=\yii\helpers\Url::to(['order/check'])?>" >去结算</a>
                            <a class="simple-link block" href="<?=Yii::$app->homeUrl?>" >继续购物</a>
                        </div>
                    </div>
                </div><!-- /.widget -->

                <div id="cupon-widget" class="widget">
                    <h1 class="border">使用优惠券</h1>
                    <div class="body">
                        <form>
                            <div class="inline-input">
                                <input data-placeholder="请输入优惠券码" type="text" />
                                <button class="le-button" type="submit">使用</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.widget -->
            </div><!-- /.sidebar -->

            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
    </section>		<!-- ============================================================= FOOTER ============================================================= -->
