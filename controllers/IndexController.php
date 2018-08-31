<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 12:50
 */
namespace  app\controllers;
use app\models\Product;
use yii\web\Controller;

class  IndexController extends CommonController {

    //商城首页
    public function  actionIndex()
    {
        $this->layout = 'layout1';
        $data['tui'] = Product::find()->where('istui = "1" and ison = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['new'] = Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['hot'] = Product::find()->where('ison = "1" and ishot = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['all'] = Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(7)->all();

        return $this->render('index',['data'=>$data]);
    }
}