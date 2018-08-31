<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/8/6
 * Time: 17:26
 */
namespace  app\controllers;
use app\models\Cart;
use app\models\Category;
use app\models\Product;
use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;

class CommonController extends  Controller{
    public  function  init()
    {
        $menu = Category::getMenu();
        $this->view->params['menu']= $menu;
        $data = [];
        $data['products'] = [];
        $total = 0;
        $carts['cart'] = [];
        //$carts['cart'] = [];
        if (Yii::$app->session['user']['isLogin']){
            $user =User::find()->where(['username'=>Yii::$app->session['user']['username']])->select('userid')->one();
            //print_r($user->userid);die;
            if (!empty($user) && !empty($user->userid)){
                //购物车数据
                $carts= Cart::getCartProData($user->userid);

            }
        }
        //print_r($carts);die;
        //公用部分-购物车
        $this->view->params['cart'] = !empty($carts['cart']) ? $carts['cart'] : $carts['cart'];
        $this->view->params['pages'] = !empty($carts['pages']) ?  $carts['pages'] : '';//购物车分页显示
        $this->view->params['totalprice'] = !empty($carts['totalprice']) ? $carts['totalprice'] : 0;//购物车总金额
        $this->view->params['count'] = !empty($carts['count']) ? $carts['count'] : 0;//购物车总商品数量
        $tui = Product::find()->where(['ison' =>1 ,'istui'=>1])->orderBy('createtime desc')->limit(3)->all();
        $sale = Product::find()->where(['ison'=>1,'issale'=>1])->orderBy('createtime desc')->limit(3)->all();
        $new = Product::find()->where(['ison'=>1])->orderBy('createtime desc')->limit(3)->all();
        $hot = Product::find()->where(['ison'=>1,'ishot'=>1])->orderBy('createtime desc')->limit(3)->all();
        //最高优惠商品
        $top = Product::find()->where(['ison'=>1,'issale'=>1])->limit(2)->orderBy('saleprice desc')->select(['productid','pics','promote_price','saleprice','cover'])->asArray()->all();
        $this->view->params['tui'] = (array)$tui;
        $this->view->params['sale'] = (array)$sale;
        $this->view->params['new'] = (array)$new;
        $this->view->params['hot'] = (array)$hot;
        $this->view->params['top'] =$top;

    }
}