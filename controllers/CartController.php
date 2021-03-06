<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 13:11
 */
namespace  app\controllers;
use app\models\Cart;
use app\models\Product;
use app\models\User;
use yii\web\Controller;
use yii;

class  CartController extends  CommonController
{

//    public function  init()
//    {
//        parent::init(); // TODO: Change the autogenerated stub
//        $link = Yii::$app->urlManager->createUrl(['member/login']);
//        if (!isset(Yii::$app->session['user']['isLogin']))
//            return $this->response(['status'=>1,'msg'=>'账户未登录，请登录账户','link'=>$link]);
//
//    }

    public function  actionIndex(){
        $carts = [];
        $this->layout = 'layout1';
        $user = User::find()->where(['username'=>Yii::$app->session['user']['username'],'is_enable'=>1])->select('userid')->one();
        if (!empty($user) && !empty($user->userid)){
            $carts = Cart::getCartProData($user->userid);
        }
        return $this->render('index',['carts'=>$carts['cart'],'totalprice'=>$carts['totalprice'],'count'=>$carts['count'],'fee'=>0,'pages'=>$carts['pages']]);
    }


    public function  actionAdd(){
        $good_id = \Yii::$app->request->post('id');
        $good_num = \Yii::$app->request->post('num');
        $link = \Yii::$app->urlManager->createUrl(['member/login']);
        if (!isset(\Yii::$app->session['user']['isLogin'])){
            return $this->response(['status'=>1,'msg'=>'账户未登录，请登录账户','link'=>$link]);
        }

        if (empty($good_id) || $good_num<1){
            return $this->response(['status'=>0,'msg'=>'商品参数错误']);
        }
        $model =  new Cart();
        //商品信息
        $product = Product::find()->where(['productid'=>$good_id,'ison'=>1])->select(['issale','ison','saleprice','price'])->one();
        //用户信息
        $user = User::find()->where(['username'=>\Yii::$app->session['user']['username'],'is_enable'=>1])->select('userid')->one();

        if (is_null($product) || $product->ison==0 ){
            return $this->response(['status'=>0,'msg'=>'商品不存在或已下架']);
        }
        $price = $product->issale==1 ? $product->saleprice : $product->price;
        $data['Cart']['productid'] = $good_id;
        $data['Cart']['productnum'] = $good_num;
        $data['Cart']['price'] =$price;
        $data['Cart']['userid'] = $user->userid;
        $data['Cart']['totalprice'] = $good_num * $price  ;
        if($model->add($data,$user->userid,$price)){
            $link = \Yii::$app->urlManager->createUrl(['cart/index']);
            return $this->response(['status'=>1,'msg'=>'成功加入购物车','link'=>$link]);
        }else{
            return $this->response(['status'=>0,'msg'=>'加入购物车失败!']);
        }
    }

    public function  actionDel(){
        if (Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $userModel = User::find()->where(['username'=>Yii::$app->session['user']['username'],'is_enable'=>1])->one();
            if (!empty($userModel) && !empty($userModel->userid)){
                if (Cart::deleteAll(['cartid'=>$id,'userid'=>$userModel->userid])){
                    return $this->response(['status'=>1,'msg'=>'删除成功!']);
                }
                return $this->response(['status'=>0,'msg'=>'删除失败!']);
            }
        }
        return $this->response(['status'=>0,'msg'=>'网络错误，请稍后重试!']);
    }

    /***
     * 购物车减少购买商品数量productnum
     */
    public  function actionReduce(){
        if (Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            if (!$id) $this->response(['status'=>0,'msg'=>'网络或参数错误！']);
            $cart = Cart::find()->where(['cartid'=>$id])->select(['productid','productnum','price'])->one();
            if ($cart->productnum<=1) return $this->response(['status'=>0,'msg'=>'商品购买数量不能少于1!']);
            $pro = Product::find()->where(['productid'=>$cart->productid])->select('ison')->one();
            if (is_null($pro) || !$pro->ison) return $this->response(['status'=>0,'msg'=>'上平已下架或已删除']);
            $data['productnum'] = $cart->productnum -1;
            $data['totalprice'] = $data['productnum'] * $cart->price;
            $data['updatetime'] = time();
            $res = Cart::updateAll($data,['cartid'=>$id]);
            if ($res) return $this->response(['status'=>1]);
            return $this->response(['status'=>0,'msg'=>'网络或参数错误！']);
        }
        return $this->response(['status'=>0,'msg'=>'网络或参数错误！']);

    }

    /***
     * 购物车增加购买商品数量productnum
     */
    public  function actionPlus(){
        if ( Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            if (!$id) $this->response(['status'=>0,'msg'=>'网络或参数错误！']);
            $cart = Cart::find()->where(['cartid'=>$id])->select(['productid','productnum','price'])->one();
            if (is_null($cart))  return $this->response(['status'=>0,'msg'=>'网络或参数错误！']);
            $pro = Product::find()->where(['productid'=>$cart->productid,'ison'=>1])->select(['num'])->one();
            if (is_null($pro)) return $this->response(['status'=>0,'msg'=>'商品已下架或以删除！']);

            if ($cart->productnum > $pro->num) return $this->response(['status'=>0,'msg'=>'商品购买数量已超库存!']);
            $data['productnum'] = $cart->productnum + 1;
            $data['totalprice'] = $cart->price * ($cart->productnum +1);
            $data['updatetime'] = time();
            $res = Cart::updateAll($data,['cartid'=>$id]);
            if ($res) return $this->response(['status'=>1]);
            return $this->response(['status'=>0,'msg'=>'网络或参数错误！']);
        }
        return $this->response(['status'=>0,'msg'=>'网络或参数错误！']);

    }

    private function response($data)
    {
        return json_encode($data,true);
    }


}