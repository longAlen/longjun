<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $userid 主键ID
 * @property string $username
 * @property string $userpass
 * @property string $useremail
 * @property string $createtime
 */
class User extends \yii\db\ActiveRecord
{

    public $outTime = 300;//激活账户链接有效时间秒
    public $rememberMe = true;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username','required','message'=>'登录用户名不能为空!','on'=>['register','login']],
            ['username','unique','message'=>'输入账户已被注册，请重新输入!','on'=>'register'],
            ['userpass','required','message'=>'登录密码不能为空!','on'=>['register','login']],
            ['userpass','validatePass','message'=>'登录密码不正确!','on'=>'login'],
            ['useremail','required','message'=>'注册邮箱不能为空!','on'=>'register'],
            ['useremail','unique','message'=>'邮箱已被注册!','on'=>'register'],
            ['useremail','email','message'=>'注册邮箱格式不正确!','on'=>'register'],
            ['createtime','default','value'=>time(),'on'=>'register'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => '用户id',
            'username' => '登录用户名',
            'userpass' => '登录密码',
            'useremail' => '注册邮箱',
            'createtime' => '注册时间',
            'rememberMe'=>'记住我'
        ];
    }
    public  function  register($data){

        $this->scenario = 'register';
        $data['User']['userpass'] = !empty($data['User']['userpass']) ? md5($data['User']['userpass']): '';
        if ($this->load($data) && $this->validate() && $this->save()){
            $res = $this->sendEmail($data['User']['username'],$data['User']['useremail']);
            return (bool)$res;
        }
        return false;

    }

    public function  login($data){
        $this->scenario = 'login';
        if ($this->load($data) && $this->validate() ){
            $lifeTime = $this->rememberMe ? 3*3600 : 0;//记录session有效时间
            session_set_cookie_params($lifeTime);
            $session = Yii::$app->session;
            $session['user']=['username'=>$this->username, 'isLogin'=>1];
            return (bool)$session['user']['isLogin'];
        }
        return false;
    }

    /***
     * @param $user 注册用户名
     * @param $rec  接收邮件
     * @return bool 邮件发送成功true | false
     */
    public function  sendEmail($name,$accepte){

        //发送电子邮件
        $mailer = Yii::$app->mailer->compose('register',['name'=>$name,'time'=>time(),'token'=>$this->createToken($name,time())]);
        $mailer->setFrom(['15705962480@163.com'=>'神通科技']);
        $mailer->setTo($accepte);
        $mailer->setSubject('系统邮件-激活账户');
        if ($mailer->send()){
            return true;
        }
        return false;
    }

    /***
     * @param $name 用户名
     * @param $time 时间
     * @return string token值
     */
    public function createToken($name,$time){
        return md5(md5($name).base64_encode(Yii::$app->request->userIP).md5($time));
    }

    public function  checkToken($username,$timestamp,$token){

        $selfToken = $this->createToken($username,$timestamp);
        if ((time()-$timestamp) > $this->outTime || ($selfToken !=$token)){
           return true;
        }
        return false;
    }

    /***
     * 验证登录密码
     */
    public  function  validatePass(){
        if (!$this->hasErrors()){
            $user = self::find()->where(['username'=>$this->username,'userpass'=>md5($this->userpass)])->one();
            if (is_null($user)){
                $this->addError('userpass','用户名或密码不正确');
            }
        }
    }
}
