<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>神通科技</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->


</head>
<body>

<div class="wrapper">
    <!-- ============================================================= TOP NAVIGATION ============================================================= -->
    <nav class="top-bar animate-dropdown">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <ul>
                    <li><a href="<?=Yii::$app->homeUrl;?>">首页</a></li>
<!--                    <li><a href="--><?//=\yii\helpers\Url::to(['product/index'])?><!--">所有分类</a></li>-->
                    <?php if (Yii::$app->session['user']['isLogin']==1):?>
                    <li><a href="<?=\yii\helpers\Url::to(['cart/index'])?>">我的购物车</a></li>
                    <li><a href="<?=\yii\helpers\Url::to(['order/index'])?>">我的订单</a></li>
                    <?php endif;?>
                </ul>
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-6 no-margin">
                <ul class="right">
                    <?php if (Yii::$app->session['user']['isLogin']==1):?>
                        <li>  您好，欢迎您回来 &nbsp;&nbsp;<?=Yii::$app->session['user']['username']?>，<a href="<?=\yii\helpers\Url::to(['member/logout'])?>" style="color: red;">退出</a>
                        </li>
                    <?php else:?>
                    <li>
                        <?php echo \yii\helpers\Html::a('登录',['member/login'])?>
                    </li>
                    <li> <?php  echo  \yii\helpers\Html::a('注册',['member/register'])?></li>
                    <?php endif;?>
                </ul>
            </div><!-- /.col -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->
    <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->		<!-- ============================================================= HEADER ============================================================= -->
    <header>
        <div class="container no-padding">

            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="<?=Yii::$app->homeUrl?>">
                        <img alt="logo" src="assets/images/logo.PNG" width="233" height="54"/>
                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
                <div class="contact-row">
                    <div class="phone inline">
                        <i class="fa fa-phone"></i> (+086) 15705962480
                    </div>
                    <div class="contact inline">
                        <i class="fa fa-envelope"></i> contact@<span class="le-color">www.st.com</span>
                    </div>
                </div><!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <form>
                        <div class="control-group">
                            <input class="search-field" placeholder="搜索商品" />

                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown">

                                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">所有分类</a>
                                    <ul class="dropdown-menu" role="menu" >
                                        <?php foreach ($this->params['menu'] as $menu):?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=\yii\helpers\Url::to(['product/index','id'=>$menu['id']])?>"><?=$menu['title']?></a></li>
                                        <?php endforeach;?>

                                    </ul>
                                </li>
                            </ul>

                            <a style="padding:15px 15px 13px 12px" class="search-button" href="#" ></a>

                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->		</div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
                <div class="top-cart-row-container">

                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <div class="top-cart-holder dropdown animate-dropdown">

                        <div class="basket">
<!--                            --><?php
//                                $totalprice = array_sum(array_column($this->params['cart'],'totalprice'));
//                                $total = count(array_column($this->params['cart'],'productid'));
//
//                            ?>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="basket-item-count">
<!--                                    <span class="count">--><?//=$total?><!--</span>-->
                                    <span class="count"><?=$this->params['count']?></span>
                                    <img src="assets/images/icon-cart.png" alt="" />
                                </div>

                                <div class="total-price-basket">
                                    <span class="lbl">您的购物车:</span>
                                    <span class="total-price">
                                        <span class="sign">￥</span>
                                        <span class="value"><?=number_format($this->params['totalprice'],2)?></span>
                                    </span>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <?php foreach ($this->params['cart'] as $k=>$cart):?>
                                <li class="cart-<?=$k?>">
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <img alt="" src="http://<?=$cart['cover']?>" />
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 no-margin">
                                                <div class="title"><?=$cart['title']?></div>
                                                <div class="price">￥<?=$cart['price']?></div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="JavaScript:delCart('<?=\yii\helpers\Url::to(['cart/del'])?>','<?=$cart['cartid']?>','<?=Yii::$app->request->getCsrfToken()?>','<?=$k?>')" title="删除"></a>
                                    </div>
                                </li>
                                <?php endforeach;?>

<!--                                <li class="checkout">-->
<!--                                    <div class="pagination pull-right">-->
<!--                                        --><?//=\yii\widgets\LinkPager::widget([
//                                            'pagination'=>$this->params['pages'],
//                                            // 'firstPageLabel'=>'首页',
//                                            //'lastPageLabel'=>'尾页',
//                                            'prevPageLabel'=>'上一页',
//                                            'nextPageLabel'=>'下一页',
//                                            'hideOnSinglePage'=>true,
//                                        ])?>
<!--                                    </div>-->
<!--                                </li>-->


                                <li class="checkout">
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <a href="<?php if($this->params['count']>0){ echo \yii\helpers\Url::to(['cart/index']);}else{ echo '#';}?>" class="le-button inverse">查看购物车</a>
                                            </div>

                                            <div class="col-xs-12 col-sm-6">
                                                <a  href="<?php if ($this->params['count']>0){ echo \yii\helpers\Url::to(['order/check']);}else{echo '#';}?>" class="le-button">去往收银台</a>
                                            </div>

                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.basket -->
                    </div><!-- /.top-cart-holder -->
                </div><!-- /.top-cart-row-container -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->		</div><!-- /.top-cart-row -->

        </div><!-- /.container -->
    </header>
<?php echo $content;?>
    <footer id="footer" class="color-bg">

        <div class="container">
            <div class="row no-margin widgets-row">
                <div class="col-xs-12  col-sm-4 no-margin-left">
                    <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>推荐商品</h2>
                        <div class="body">
                            <ul>
                                <?php foreach ($this->params['tui'] as $pro):?>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                            <div class="price">
                                                <div class="price-prev">￥<?=$pro->price?></div>
                                                <div class="price-current">￥<?=$pro->saleprice?></div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>" class="thumb-holder">
                                                <img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>

                            </ul>
                        </div><!-- /.body -->
                    </div> <!-- /.widget -->
                    <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 ">
                    <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>促销商品</h2>
                        <div class="body">
                            <ul>
                                <?php foreach ($this->params['sale'] as $pro):?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-9 no-margin">
                                                <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                                <div class="price">
                                                    <div class="price-prev">￥<?=$pro->price?></div>
                                                    <div class="price-current">￥<?=$pro->saleprice?></div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-3 no-margin">
                                                <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>" class="thumb-holder">
                                                    <img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach;?>

                            </ul>
                        </div><!-- /.body -->
                    </div> <!-- /.widget -->
                    <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 ">
                    <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>最新商品</h2>
                        <div class="body">
                            <ul>
                                <?php foreach ($this->params['new'] as $pro):?>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a>
                                            <div class="price">
                                                <div class="price-prev">￥<?=$pro->price?></div>
                                                <div class="price-current">￥<?=$pro->saleprice?></div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>" class="thumb-holder">
                                                <img alt="<?=$pro->title?>" src="http://<?=$pro->cover?>" data-echo="http://<?=$pro->cover?>" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- /.body -->
                    </div><!-- /.widget -->
                    <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

            </div><!-- /.widgets-row-->
        </div><!-- /.container -->

        <div class="sub-form-row">
            <!--<div class="container">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                    <form role="form">
                        <input placeholder="Subscribe to our newsletter">
                        <button class="le-button">Subscribe</button>
                    </form>
                </div>
            </div>--><!-- /.container -->
        </div><!-- /.sub-form-row -->

        <div class="link-list-row">
            <div class="container no-padding">
                <div class="col-xs-12 col-md-4 ">
                    <!-- ============================================================= CONTACT INFO ============================================================= -->
                    <div class="contact-info">
                        <div class="footer-logo">
                            <img alt="logo" src="assets/images/logo.PNG" width="233" height="54"/>
                        </div><!-- /.footer-logo -->

                        <p class="regular-bold"> 请通过电话，电子邮件随时联系我们</p>

                        <p>
                            金牛区抚琴路218号神通科技, 四川省成都市, 中国
                            <br>神通科技 (QQ群:2235921607@QQ.com)
                        </p>

                        <!--<div class="social-icons">
                            <h3>Get in touch</h3>
                            <ul>
                                <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-pinterest"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                <li><a href="#" class="fa fa-stumbleupon"></a></li>
                                <li><a href="#" class="fa fa-dribbble"></a></li>
                                <li><a href="#" class="fa fa-vk"></a></li>
                            </ul>
                        </div>--><!-- /.social-icons -->

                    </div>
                    <!-- ============================================================= CONTACT INFO : END ============================================================= -->            </div>

                <div class="col-xs-12 col-md-8 no-margin">
                    <!-- ============================================================= LINKS FOOTER ============================================================= -->
                    <div class="link-widget">
                        <div class="widget">
                            <h3>最新商品</h3>
                            <ul>
                                <?php foreach ($this->params['new'] as $pro):?>
                                <li><a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->

                    <div class="link-widget">
                        <div class="widget">
                            <h3>热门商品</h3>
                            <ul>
                                <?php foreach ($this->params['hot'] as $pro):?>
                                    <li><a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a></li>
                                <?php endforeach;?>

                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->

                    <div class="link-widget">
                        <div class="widget">
                            <h3>促销商品</h3>
                            <ul>
                                <?php foreach ($this->params['sale'] as $pro):?>
                                <li><a href="<?=\yii\helpers\Url::to(['product/detail','productid'=>$pro->productid])?>"><?=$pro->title?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->
                    <!-- ============================================================= LINKS FOOTER : END ============================================================= -->            </div>
            </div><!-- /.container -->
        </div><!-- /.link-list-row -->

        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="copyright">
                        &copy; <a href="<?=\yii\helpers\Url::to(['index/index'])?>">WWW.ST.COM</a> - all rights reserved
                    </div><!-- /.copyright -->
                </div>
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="payment-methods ">
                        <ul>
                            <li><img alt="" src="assets/images/payments/payment-online.png"></li>
                            <li><img alt="" src="assets/images/payments/payment-wx.png"></li>
                            <li><img alt="" src="assets/images/payments/payment-zfb.jpg"></li>

                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div><!-- /.container -->
        </div><!-- /.copyright-bar -->

    </footer><!-- /#footer -->
    <!-- ============================================================= FOOTER : END ============================================================= -->	</div><!-- /.wrapper -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/gmap3.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/css_browser_selector.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/jquery.raty.min.js"></script>
<script src="assets/js/jquery.prettyPhoto.min.js"></script>
<script src="assets/js/jquery.customSelect.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/admin/js/layer/layer.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
    $("#createlink").click(function(){
        $(".billing-address").slideDown();
    });
    $("#cancel-link").click(function () {
        $(".billing-address").slideUp();
    });

    /***
     *
     * @param targetUrl  目标地址
     * @param good_id 商品id
     */
    function  addCart(targetUrl,good_id,token,num=1) {
        $.post(targetUrl,{id:good_id,num:num,_csrf:token},function (res) {
            if (res.status){
                layer.msg(res.msg,{time:2000},function () {
                    location.href = res.link;
                })
            }else{
                layer.msg(res.msg);
                return false;
            }
        },'json');
    }

    function  delCart(targetUrl,cartid,token,k) {
        $.post(targetUrl,{id:cartid,_csrf:token},function (res) {
            if (res.status){
                layer.msg(res.msg,{time:1500},function () {
                    $(".cart-"+k).remove();
                    location.reload();
                });

            }else{
                layer.msg(res.msg);
                return false;
            }
        },'json');
    }

    //新增收货地址
    $("#create-address").click(function () {
        var input = $("#create-address-form").find('input.le-input');
        var form =  new FormData();
        input.each(function (k,v) {
            var value = $(v).val();
            var name = v.name;
          form.append(name,value);
        });
        var target = $(this).attr('data-url');
        var token = $(this).attr('data-token');
        form.append('_csrf',token);
       $.ajax({
           url:target,
           type:'post',
           data:form,
           processData:false,
           contentType:false,
           dataType:'json',
           success:function (res) {
                if (res.status==1){
                    layer.msg(res.msg,{time:1500},function () {
                        $(".billing-address").slideUp();
                        location.reload();
                        return false; 
                    })
                } else{
                    layer.msg(res.msg);
                    return false;
                }
           },
           error:function (res) {
               layer.msg(res.msg);
               return false;
           }
       });
    });

    //设置默认收货地址

</script>
</body>
</html>
