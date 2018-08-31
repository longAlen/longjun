<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 14:35
 */
namespace app\modules\controllers;
use app\modules\models\Admin;
use yii\web\Controller;
use yii;

class  PublicController extends Controller {

    public  function  actionLogin()
    {
        $this->layout = false;
        $model =new Admin();

        //验证登录标识是否存在
        if (Yii::$app->session['admin']['isLogin']){
            $this->redirect(['default/index']);
        }
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($model->login($post)){
                $this->redirect(['default/index']);
                Yii::$app->end();
            }
        }
        return $this->render('login',['model'=>$model]);
    }

    public function  actionLogout(){
       Yii::$app->session->removeAll();
       if (!isset(Yii::$app->session['admin']['isLogin'])){
           $this->redirect(['public/login']);
           Yii::$app->end();
       }
       $this->goBack();
    }

    public  function  actionForget(){
        $this->layout =false;
        $model = new Admin();
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->forgetPassword($post)){
                Yii::$app->session->setFlash('info','电子邮件已经发送成功，请查收!');
            }
        }
        return  $this->render('forget',['model'=>$model]);
    }

}