<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 13:22
 */
namespace  app\controllers;
use app\models\User;
use yii\web\Controller;
use Yii;
class  MemberController extends  CommonController {



    /***
     * 前台用户登录
     * */
    public  function  actionLogin(){
        $this->layout ='layout2';
        if (Yii::$app->request->isGet){
            $url = Yii::$app->request->referrer;
            if (empty($url)) $url ='/';
            Yii::$app->session->setFlash('referrer',$url);
        }
        $model = new User();
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->login($post)){
                $url = Yii::$app->session->getFlash('referrer');
                return  $this->redirect($url);
            }
        }
        return $this->render('login',['model'=>$model]);
    }

    public  function  actionLogout(){
        Yii::$app->session->remove('user');
        if (!isset(Yii::$app->session['user']['isLogin'])){
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    /***
     * 用户在注册
     */
    public  function  actionRegister(){
        $this->layout = 'layout2';
        $model = new User();
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($model->register($post)){
                Yii::$app->session->setFlash('info','账户注册成功，请到注册邮箱激活账户');
                sleep(3);
                $this->redirect(['index/index']);
            }else{
                Yii::$app->session->setFlash('info','注册失败!');
            }
        }
        return $this->render('register',['model'=>$model]);
    }

    /***
     * 邮件激活注册账户
     */
    public  function  actionActive(){
        $this->layout =false;
        $model = new User();
        $username = Yii::$app->request->get('username');
        $token = Yii::$app->request->get('token');
        $timestamp = Yii::$app->request->get('timestamp');

        if (Yii::$app->request->isPost){//确认激活
            $username = Yii::$app->request->post('info');
            $link = Yii::$app->urlManager->createAbsoluteUrl(['index/index']);
            if (empty($username)){
                return $this->response(['status'=>0,'msg'=>'参数错误']);
            }
            $user = $model::find()->where('username =:name',[':name'=>$username])->one();
            if ($user && $user->is_enable){
                return $this->response(['status'=>1,'msg'=>'账户已激活，激活链接已失效!','link'=>$link]);
            }
            $res = $model::updateAll(['is_enable'=>1],'username=:user',[':user'=>$username]);
            if ($res){
                return $this->response(['status'=>1,'msg'=>'注册账户已成功激活','link'=>$link]);
            }else{
                return $this->response(['status'=>0,'msg'=>'注册账户激活失败']);
            }

        }
        $outToken = $model->checkToken($username,$timestamp,$token);
        return $this->render('active',['outToken'=>$outToken,'username'=>$username]);

    }

    /***
     * 再次生成激活链接
     */
    public function  actionRepeat(){
        $username = Yii::$app->request->post('info');
        $model = new User();
        $user = $model::find()->where(['username'=>$username])->one();
        if (is_null($user)){
            return $this->response(['status'=>0,'msg'=>'参数错误']);
        }
        if ($user->is_enable){//账户已激活
            $link = Yii::$app->urlManager->createAbsoluteUrl(['index/index']);
            return $this->response(['status'=>1,'msg'=>'账户已激活，激活链接已失效!','link'=>$link]);
        }
        $res = $model->sendEmail($username,$user->useremail);
        if ($res){
            $emailType = $this->getEmailType($user->useremail);
            $link = "http://www.mail.".$emailType.'.com';
            return $this-> response(['status'=>1,'msg'=>'账户激活邮件已发送至注册邮箱，请注意查收!','link'=>$link]);
        }
        return $this->response(['status'=>0,'msg'=>'网络繁忙或数据错误，请稍后重试！']);

    }

    /***
     * @param $data array()
     * @return string json
     */
    private  function response($data){
        return json_encode($data,true);
    }

    /***
     * @param $email 邮箱
     */
    private  function  getEmailType($email){
        $startOffset = strpos($email,'@')+1;
        $endOffset = strpos($email,'.');
        $length = $endOffset-$startOffset;
        $emailType = substr($email,$startOffset,$length);
        return $emailType;

    }



}