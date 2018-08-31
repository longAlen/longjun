

    <!-- ============================================================= HEADER : END ============================================================= -->		<div id="single-product">
        <div class="container">

            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="owl-single-product">
                        <?php foreach ((array)json_decode($pro->pics,true) as $k=>$pic):?>
                        <div class="single-product-gallery-item" id="slide<?=$k+1?>">
                            <a data-rel="prettyphoto" href="http://<?=$pic?>">
                                <img class="img-responsive" alt="" src="http://<?=$pic?>" data-echo="http://<?=$pic?>" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->
                        <?php endforeach;?>

                    </div><!-- /.single-product-slider -->


                    <div class="single-product-gallery-thumbs gallery-thumbs">

                        <div id="owl-single-product-thumbnails">
                            <?php foreach ((array)json_decode($pro->pics,true) as $k=>$pic):?>
                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?=$k?>" href="#slide<?=$k+1?>">
                                <img width="67" alt="" src="http://<?=$pic?>" data-echo="http://<?=$pic?>" />
                            </a>
                           <?php endforeach;?>
                        </div><!-- /#owl-single-product-thumbnails -->

                        <div class="nav-holder left hidden-xs">
                            <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                        </div><!-- /.nav-holder -->

                        <div class="nav-holder right hidden-xs">
                            <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                        </div><!-- /.nav-holder -->

                    </div><!-- /.gallery-thumbs -->

                </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->
            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">
                    <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                    <div class="availability"><label>存货:</label><span class="available">  现货</span></div>

                    <div class="title"><a href="#"><?=$pro->title?></a></div>
<!--                    <div class="brand">sony</div>-->

                    <div class="excerpt">
                        <p><?=$pro->descr?></p>
                    </div>

                    <div class="prices">
                        <?php if ($pro->issale):?>
                        <div class="price-current">￥<?=$pro->saleprice?></div>
                        <div class="price-prev">￥<?=$pro->price?></div>
                        <?php else:?>
                            <div class="price-current">￥<?=$pro->price?></div>
                        <?php endif;?>
                    </div>

                    <div class="qnt-holder">

                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="quantity" readonly="readonly" type="text" value="1" />
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                        <div class="buy-cart">
                            <?=\yii\bootstrap\Html::a('立即购买',['cart/add','productid'=>$pro->productid],['class'=>'le-button huge buy','id'=>'addto-buy'])?>

                            <?=\yii\bootstrap\Html::a('加入购物车',['cart/add','productid'=>$pro->productid],['class'=>'le-button huge cart','id'=>'addto-cart'])?>
                        </div>

<!--                        <a id="addto-cart" href="cart.html" class="le-button huge">加入购物车</a>-->
                    </div>

                    <!-- /.qnt-holder -->
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div><!-- /.container -->
    </div><!-- /.single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple" >
                    <li class="active"><a href="#description" data-toggle="tab">商品详情</a></li>
                    <li><a href="#additional-info" data-toggle="tab">商品属性</a></li>
                    <li><a href="#reviews" data-toggle="tab">商品评价 (3)</a></li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p><?=$pro->descr?></p>


                        <div class="meta-row">
                            <div class="inline">
                                <label>SKU:</label>
                                <span>54687621</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">-50% sale</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">desktop PC</a></span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                <span><a href="#">fast</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">strong</a></span>
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #description -->

                    <div class="tab-pane" id="additional-info">
                        <ul class="tabled-data">
                            <li>
                                <label>重量</label>
                                <div class="value">0.25 kg</div>
                            </li>
                            <li>
                                <label>尺寸</label>
                                <div class="value">90x60x90 cm</div>
                            </li>
                            <li>
                                <label>大小</label>
                                <div class="value">one size fits all</div>
                            </li>
                            <li>
                                <label>颜色</label>
                                <div class="value">white</div>
                            </li>
                            <li>
                                <label>质保期</label>
                                <div class="value">5 年</div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <div class="meta-row">
                            <div class="inline">
                                <label>SKU:</label>
                                <span>54687621</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">-50% sale</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">desktop PC</a></span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                <span><a href="#">fast</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">strong</a></span>
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #additional-info -->


                    <div class="tab-pane" id="reviews">
                        <div class="comments">
                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="4"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">Jane Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="5"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Doe</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="3"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->
                        </div><!-- /.comments -->

                        <div class="add-review row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="new-review-form">
                                    <h2>Add review</h2>
                                    <form id="contact-form" class="contact-form" method="post" >
                                        <div class="row field-row">
                                            <div class="col-xs-12 col-sm-6">
                                                <label>name*</label>
                                                <input class="le-input" >
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label>email*</label>
                                                <input class="le-input" >
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row star-row">
                                            <label>your rating</label>
                                            <div class="star-holder">
                                                <div class="star big" data-score="0"></div>
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row">
                                            <label>your review</label>
                                            <textarea rows="8" class="le-input"></textarea>
                                        </div><!-- /.field-row -->

                                        <div class="buttons-holder">
                                            <button type="submit" class="le-button huge">submit</button>
                                        </div><!-- /.buttons-holder -->
                                    </form><!-- /.contact-form -->
                                </div><!-- /.new-review-form -->
                            </div><!-- /.col -->
                        </div><!-- /.add-review -->

                    </div><!-- /.tab-pane #reviews -->
                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">

                <div class="title-nav">
                    <h2 class="h1">全部商品</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    <?php foreach ($data['all'] as $pro):?>
                    <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <?php if ($pro->issale):?>
                            <div class="ribbon green"><span>促销</span></div>
                            <?php endif;?>
                            <?php if ($pro->ishot):?>
                                <div class="ribbon red"><span>热卖</span></div>
                            <?php endif;?>
                            <?php if ($pro->istui):?>
                                <div class="ribbon blue"><span>推荐</span></div>
                            <?php endif;?>
                            <div class="image">
                                <img alt="" src="assets/images/blank.gif" data-echo="http://<?=$pro->cover?>" />
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
                                    <a href="<?=\yii\helpers\Url::to(['cart/add','productid'=>$pro->productid])?>" class="le-button">加入购物车</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div>
                    <?php endforeach;?>

                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
