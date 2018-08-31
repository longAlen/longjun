<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 15:22
 */
namespace  app\modules\models;
use Symfony\Component\DomCrawler\Tests\Field\InputFormFieldTest;
use yii\db\ActiveRecord;
use yii;

class  Admin extends ActiveRecord{
    public  $rememberMe = true;
    public $newPassword ;
    public $newPassword_2 ;

    public  static  function  tableName()
    {
        return '{{%admin}}'; // TODO: Change the autogenerated stub
    }


    public  function  rules()
    {
        return [
            ['adminuser','required','message'=>'管理员账号不能为空','on'=>['login','forget','change','add']],
            ['adminuser','unique','message'=>'管理员账号已存在','on'=>'add'],
            ['adminpass','required','message'=>'管理员密码不能为空','on'=>['login','add']],
            ['rememberMe','boolean','on'=>'login'],
            ['adminpass','validatePass','on'=>'login'],
            ['adminemail','required','message'=>'电子有邮箱不能为空','on'=>['forget','add']],
            ['adminemail','email','message'=>'电子邮箱格式不正确','on'=>['forget','add']],
            ['adminemail','validateEmail','on'=>'forget'],
            [['newPassword','newPassword_2'],'required','message'=>'请填写密码','on'=>'change'],
            ['newPassword_2','compare','compareAttribute'=>'newPassword','message'=>'新密码两次填写不一致','on'=>'change'],
            ['newPassword_2','compare','compareAttribute'=>'adminpass','message'=>'密码两次填写不一致','on'=>'add'],
            ['createtime','default','value'=>time()],
        ];
    }
    public  function  validatePass(){

        if (!$this->hasErrors()){
            $data = self::find()->where(['adminuser'=>$this->adminuser,'adminpass'=>md5($this->adminpass)])->one();
            if (is_null($data)){
                $this->addError('adminpass','用户名或密码不正确');
            }
        }

    }
    //验证找回密码邮箱
    public function  validateEmail(){
        if (!$this->hasErrors()){
            $data = self::find()->where(['adminuser'=>$this->adminuser,'adminemail'=>$this->adminemail])->one();
            if (is_null($data)){
                $this->addErrors(['adminuser'=>'管理员账户邮箱不匹配']);
            }
        }
    }

    //验证密码
    public  function  validatePassword(){
        if (!$this->hasErrors()){
            if(trim($this->newPassword) !== trim($this->newPassword_2)){
                $this->addErrors(['newPassword_2'=>'输入新密码两次填写不一致!']);
            }
        }

    }

    public function  login($data){
        $this->scenario = 'login';
        if ($this->load($data) && $this->validate()){
            $lifeTime = $this->rememberMe ? 24*3600 : 0;//记录session有效时间
            session_set_cookie_params($lifeTime);
            $session = Yii::$app->session;
            $session['admin']=['adminuser'=>$this->adminuser, 'isLogin'=>1];
            $this->updateAll(['logintime'=>time(),'loginip'=>ip2long(Yii::$app->request->userIP)],['adminuser'=>$this->adminuser]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }


    public  function  forgetPassword($data){
        $this->scenario ='forget';
        if ($this->load($data) && $this->validate()){
            //发送邮件信息
            $token = $this->createToken($data['Admin']['adminuser'],time());
            $lifeTime = 300 ;//记录session有效时间
            session_set_cookie_params($lifeTime);
            $session = Yii::$app->session;
            $session['manager'] = ['token'=>$token];
            $mailer = yii::$app->mailer->compose('forgetpassword',['name'=>$data['Admin']['adminuser'],'time'=>time(),'token'=>$token,]);
            $mailer->setFrom(['15705962480@163.com'=>'神通科技']);
            $mailer->setTo($data['Admin']['adminemail']);
            $mailer->setSubject('系统邮件-找回密码');
            if ($mailer->send()){
                return true;
            }
        }
        return false;
    }

    /*
    *
     * 生成临时token信息-修改密码
     */
    public  function  createToken($name,$time){
        return md5(md5($name).base64_encode(Yii::$app->request->userIP).md5($time));
    }

    //修改的登录密码
    public  function changePass($data){
        $this->scenario='change';
        if ($this->load($data) && $this->validate()){
            $res = $this->updateAll(['adminpass'=>md5($this->newPassword)],['adminuser'=>$this->adminuser]);
            return $res;
        }
        return false;

    }

    /***
     * @param $data 二位数组
     * return true or false;
     */
    public  function  addManager($data)
    {
        $this->scenario ='add';
        if (isset($data['Admin']['newPassword_2'])) unset($data['Admin']['newPassword_2']);
        $data['Admin']['adminpass'] = md5($this->adminpass);
        if ($this->load($data) && $this->validate()){
            $res = $this->insert();
            return (bool)$res;
        }
        return false;
    }

}