<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 13:15
 */
namespace  app\controllers;
use app\models\Address;
use app\models\User;
use Symfony\Component\DomCrawler\Tests\Field\InputFormFieldTest;
use yii\base\Controller;
use Yii;

class  OrderController extends  CommonController{

    //用户订单中心
    public  function  actionIndex(){
        $this->layout ='layout2';
        return $this->render('index');
    }


    //订单结算页--收银台
    public function  actionCheck(){
        $this->layout ='layout1';
        $model = new Address();
        //用户信息

        $user = User::find()->where(['username'=>Yii::$app->session['user']['username'],'is_enable'=>1])->one();

        $address = Address::find()->where(['userid'=>$user->userid])->select(['firstname','lastname','address','address_detail','telephone','is_default'])->limit(7)->orderBy('createtime desc')->all();

        return $this->render('check',['model'=>$model,'address'=>$address]);
    }

    public function  actionAddress(){
        if (\Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            unset($data['_csrf']);
            //获取用户id
            $user = User::find()->where(['username'=>Yii::$app->session['user']['username'],'is_enable'=>1])->select('userid')->one();
            $data['Address']['userid'] = $user->userid;
            $model = new Address();
            if ($model->add($data))return $this->response(['status'=>1,'msg'=>'地址添加成功!']);
            return $this->response(['status'=>0,'msg'=>'地址添加失败！']);
        }
        return $this->response(['status'=>0,'msg'=>'网络错误或参数错误！']);
    }

    private  function  response($data){
        return json_encode($data,true);
    }
}