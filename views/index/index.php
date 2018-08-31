
    <!-- ============================================================= HEADER : END ============================================================= -->		<div id="top-banner-and-menu">
        <div class="container">

            <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown">
                    <div class="head"><i class="fa fa-list"></i> 所有分类 </div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            <?php foreach ($this->params['menu'] as $menu):?>
                            <li class="dropdown menu-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$menu['title']?></a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                        <div class="row">
                                            <div class="col-xs-12 col-lg-4">
                                                <ul>
                                                    <?php foreach ($menu['child'] as $child):?>
                                                    <li><a href="<?=\yii\helpers\Url::to(['product/index','id'=>$child['id']])?>" target="_blank"><?=$child['title']?></a></li>
                                                    <?php endforeach;?>

                                                </ul>
                                            </div>

<!--                                            <div class="col-xs-12 col-lg-4">-->
<!--                                                <ul>-->
<!--                                                    <li><a href="#">Power Supplies Power</a></li>-->
<!--                                                    <li><a href="#">Power Supply Testers Sound</a></li>-->
<!--                                                    <li><a href="#">Sound Cards (Internal)</a></li>-->
<!--                                                    <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>-->
<!--                                                    <li><a href="#">Other</a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->

                                            <div class="dropdown-banner-holder">
                                                <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a>
                                            </div>
                                        </div>
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                    </li>
                                </ul>
                            </li><!-- /.menu-item -->
                            <?php endforeach;?>
                            <!--<li><a href="http://themeforest.net/item/media-center-electronic-ecommerce-html-template/8178892?ref=shaikrilwan">Buy this Theme</a></li>-->
                        </ul><!-- /.nav -->
                    </nav><!-- /.megamenu-horizontal -->
                </div><!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->		</div><!-- /.sidemenu-holder -->

            <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <div class="item" style="background-image: url('http://<?=$this->params['top'][0]['cover']?>');">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left" style=" color: red;">
                                    <div class="big-text fadeInDown-1" >
                                        最低价格<span class="big"><span class="sign">￥</span><?=$this->params['top'][0]['saleprice']?></span>
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                        潮玩生活<br>
                                        享受生活<br>
                                        引领时尚
                                    </div>
<!--                                    <div class="small fadeInDown-2">-->
<!--                                        最后 5 天限时抢购-->
<!--                                    </div>-->
                                    <div class="button-holder fadeInDown-3">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$this->params['top'][0]['productid']])?>" class="big le-button ">去购买</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                        <div class="item" style="background-image: url('http://<?=$this->params['top'][1]['cover']?>');">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left" style=" color: red;">
                                    <div class="big-text fadeInDown-1">
                                        想获得<span class="big"><span class="sign">￥</span><?=$this->params['top'][0]['promote_price']?></span>的优惠？
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                        速速前来 <br>快速抢购<br>
                                    </div>
                                    <div class="small fadeInDown-2">
                                        优惠等你拿
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$this->params['top'][0]['productid']])?>" class="big le-button ">去购买</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                    </div><!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->
            </div><!-- /.homebanner-holder -->

        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->

    <!-- ========================================= HOME BANNERS ========================================= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="category-grid.html">
                    <div class="banner-text theblue">
                        <h1 style="font-family:'Microsoft Yahei';">尝尝鲜</h1>
                        <span class="tagline">查看最新分类</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-01.jpg" />
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="category-grid.html">
                    <div class="banner-text right">
                        <h1 style="font-family:'Microsoft Yahei';">时尚流行</h1>
                        <span class="tagline">查看最新上架</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-02.jpg" />
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========================================= HOME BANNERS : END ========================================= -->
    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">推荐商品</a></li>
                    <li><a href="#new-arrivals" data-toggle="tab">最新上架</a></li>
                    <li><a href="#top-sales" data-toggle="tab">最佳热卖</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <!--推荐商品-->
                    <div class="tab-pane active" id="featured">
                        <div class="product-grid-holder">
                            <?php foreach ($data['tui'] as $pro):?>
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">
                                    <?php if ($pro->ishot):?>
                                    <div class="ribbon red"><span>热卖</span></div>
                                    <?php endif;?>

                                    <?php if ($pro->issale):?>
                                        <div class="ribbon green"><span>促销</span></div>
                                    <?php endif;?>

                                    <div class="image">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" /></a>
                                    </div>

                                    <div class="body">
<!--                                        <div class="label-discount green">-50% sale</div>-->
                                        <div class="title">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                        </div>
<!--                                        <div class="brand">sony</div>-->
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?=$pro->price?></div>
                                        <div class="price-current pull-right">￥<?=$pro->saleprice?></div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="javaScript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$pro->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                查看更多</a>
                        </div>
                    </div>

                    <!--最新上架-->
                    <div class="tab-pane" id="new-arrivals">
                        <div class="product-grid-holder">
                            <?php foreach ($data['new'] as $pro):?>
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <?php if ($pro->ishot):?>
                                        <div class="ribbon blue"><span>热卖</span></div>
                                    <?php endif;?>
                                    <?php if ($pro->issale):?>
                                        <div class="ribbon green"><span>促销</span></div>
                                    <?php endif;?>

                                    <div class="image">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" /></a>
                                    </div>

                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                        </div>
<!--                                        <div class="brand">nokia</div>-->
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?=$pro->price?></div>
                                        <div class="price-current pull-right">￥<?=$pro->saleprice?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="JavaScript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$pro->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                            <a class="btn-add-to-compare" href="#">相似</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>

                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                查看更多</a>
                        </div>

                    </div>
<!--                    最佳热卖-->
                    <div class="tab-pane" id="top-sales">
                        <div class="product-grid-holder">
                            <?php foreach ($data['hot'] as $pro):?>
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <?php if ($pro->issale):?>
                                    <div class="ribbon red"><span>促销</span></div>
                                    <?php endif;?>
                                    <?php if ($pro->ishot):?>
                                    <div class="ribbon green"><span>最佳热卖</span></div>
                                    <?php endif;?>
                                    <div class="image">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" /></a>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                        </div>
<!--                                        <div class="brand">acer</div>-->
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?=$pro->price?></div>
                                        <div class="price-current pull-right">￥<?=$pro->saleprice?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="javascript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$pro->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                            <a class="btn-add-to-compare" href="#">相似</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach;?>
                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                查看更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= BEST SELLERS ========================================= -->
    <section id="bestsellers" class="color-bg wow fadeInUp">
        <div class="container">
            <h1 class="section-title">最新商品</h1>

            <div class="product-grid-holder medium">
                <div class="col-xs-12 col-md-7 no-margin">

                    <div class="row no-margin">
                        <?php for ($i=0;$i<3 ;$i++):?>
                        <?php if (empty($data['all'][$i])) continue;?>
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class="product-item">
                                <div class="image">
                                    <img alt="<?=$data['all'][$i]->title?>" src="http://<?=$data['all'][$i]->cover?>" data-echo="http://<?=$data['all'][$i]->cover?>" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$data['all'][$i]->productid])?>"><?=$data['all'][$i]->title?></a>
                                    </div>
                                    <?php if ($data['all'][$i]->ishot):?>
<!--                                    <div class="brand">热卖</div>-->
                                    <?php endif;?>
                                </div>
                                <div class="prices">
<!--                                    <div class="price-prev">￥--><?//=$data['all'][$i]->price?><!--</div>-->
<!--                                    <div class="price-current text-right">-->
<!--                                        ￥--><?//=$data['all'][$i]->saleprice?>
<!--                                    </div>-->
                                    <div class="price-current text-right">
                                        ￥<?php if ($data['all'][$i]->issale):?><?=$data['all'][$i]->saleprice?><?php else:?><?=$data['all'][$i]->price?><?php endif;?>
                                    </div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="javascript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$data['all'][$i]->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                        <a class="btn-add-to-compare" href="#">相似</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                        <?php endfor;?>
                    </div><!-- /.row -->

                    <div class="row no-margin">
                        <?php for ($i=3;$i<6;$i++):?>
                            <?php if (empty($data['all'][$i])) continue;?>
                            <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                                <div class="product-item">
                                    <div class="image">
                                        <img alt="<?=$data['all'][$i]->title?>" src="http://<?=$data['all'][$i]->cover?>" data-echo="http://<?=$data['all'][$i]->cover?>" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$data['all'][$i]->productid])?>"><?=$data['all'][$i]->title?></a>
                                        </div>
                                        <?php if ($data['all'][$i]->ishot):?>
                                            <!--                                    <div class="brand">热卖</div>-->
                                        <?php endif;?>
                                    </div>
                                    <div class="prices">

                                        <div class="price-current text-right">
                                            ￥<?php if ($data['all'][$i]->issale):?><?=$data['all'][$i]->saleprice?><?php else:?><?=$data['all'][$i]->price?><?php endif;?>
                                        </div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="javascript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$data['all'][$i]->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                            <a class="btn-add-to-compare" href="#">相似</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.product-item-holder -->
                        <?php endfor;?>
                    </div><!-- /.row -->
                </div><!-- /.col -->


                <div class="col-xs-12 col-md-5 no-margin">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <?php $last = $data['all'][count($data['all'])-1];?>
                        <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$last->productid])?>">
                                    <img alt="" src="<?=$last->cover?>" data-echo="http://<?=$last->cover?>" style="width: 433px;height: 325px;"/>
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <?php foreach ((array)json_decode($last->pics,true) as $k=>$pic):?>
                            <?php  if ($k<=1):?>
                            <div class="single-product-gallery-item" id="slide<?=$k+2?>">
                                <a data-rel="prettyphoto" href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$last->productid])?>">
                                    <img alt="" src="http://<?=$pic?>" data-echo="http://<?=$pic?>" style="width: 433px;height: 325px;"/>
                                </a>
                            </div>
                            <?php endif;?>
                            <?php endforeach;?>
                            <!-- /.single-product-gallery-item -->

                        </div>
                        <!-- /.single-product-slider -->

                        <div class="gallery-thumbs clearfix">
                            <ul>

                                <li><a class="horizontal-thumb active" data-target="#best-seller-single-product-slider" data-slide="0" href="#slide1"><img alt="<?=$last->title?>" src="http://<?=$last->cover?>" data-echo="http://<?=$last->cover?>" width="67px;" /></a></li>
                                <?php foreach ((array)json_decode($last->pics,true) as $k=>$pic):?>
                                <?php if ($k<=1):?>
                                <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="<?=$k+1?>" href="#slide<?=$k+2?>"><img alt="<?=$last->title?>" src="http://<?=$pic?>" data-echo="http://<?=$pic?>" width="67px;" height="60px"/></a></li>
                                <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- /.gallery-thumbs -->

                        <div class="body">
                            <div class="label-discount clear"></div>
                            <div class="title">
                                <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$last->productid])?>"><?=$last->title?></a>
                            </div>
                            <div class="brand"><?=substr($last->title,0,6)?></div>
                        </div>
                        <div class="prices text-right">
<!--                            <div class="price-prev">￥--><?//=$last->saleprice?><!--</div>-->
                            <div class="price-current inline">￥<?php if($last->issale):?><?=$last->saleprice?><?php else:?><?=$last->price?><?php endif;?></div>
                            <a href="javascript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$last->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button big inline">加入购物车</a>
                        </div>
                    </div><!-- /.product-item-holder -->
                </div><!-- /.col -->

            </div><!-- /.product-grid-holder -->
        </div><!-- /.container -->
    </section><!-- /#bestsellers -->
    <!-- ========================================= BEST SELLERS : END ========================================= -->
    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">

                <div class="title-nav">
                    <h2 class="h1">所有商品</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    <?php foreach ($data['all'] as $pro):?>
                    <div class="no-margin carousel-item product-item-holder size-small hover">

                        <div class="product-item">
                            <?php if ($pro->ishot):?>
                                <div class="ribbon red"><span>热卖</span></div>
                            <?php endif;?>
                            <?php if ($pro->issale):?>
                            <div class="ribbon green"><span>促销</span></div>
                            <?php endif;?>
                            <div class="image">
                                <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" />
                                </a>>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                </div>
<!--                                <div class="brand">Sharp</div>-->
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">￥<?php if ($pro->issale):?><?=$pro->saleprice?><?php else:?><?=$pro->price?><?php endif;?></div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="javascript:addCart('<?=\yii\helpers\Url::to(['cart/add'])?>','<?=$pro->productid?>','<?=Yii::$app->request->getCsrfToken()?>')" class="le-button">加入购物车</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                    <a class="btn-add-to-compare" href="#">相似</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->
                    <?php endforeach;?>

                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
    <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >

                <div class="title-nav">
                    <h1>热门品牌</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-brands" class="owl-carousel brands-carousel">

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-01.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-02.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-03.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-04.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-01.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-02.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-03.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-04.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
