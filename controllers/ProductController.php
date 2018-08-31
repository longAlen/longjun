<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 13:01
 */
namespace  app\controllers;
use app\models\Product;
use yii\web\Controller;
use Yii;

class  ProductController extends  CommonController{

    public  $layout ='layout2';
    //商品列表页
    public function  actionIndex()
    {
        return $this->render('index');
    }

    //商品详情页
    public  function  actionDetail(){
        $id = Yii::$app->request->get('productid');
        $pro = Product::find()->where(['productid'=>$id,'ison'=>1])->one();
        $data['all'] = Product::find()->where(['ison'=>1])->orderBy('createtime desc')->all();

        //商品评价(获取最新三条)

        return $this->render('detail',['data'=>$data,'pro'=>$pro]);
    }
}