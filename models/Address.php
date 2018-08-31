<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property string $addressid
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $address
 * @property string $postcode
 * @property string $email
 * @property string $telephone
 * @property string $userid
 * @property string $createtime
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname','lastname'],'required','message'=>'姓名不能为空'],
            [['firstname','lastname'],'string','max'=>32,'message'=>'输入姓名过长!'],
            ['address','required','message'=>'收货地址不能为空!'],
            [['address','address_detail'], 'string','max'=>255,'message'=>'地址信息最多输入255个字符!'],
            [['company'], 'string', 'max' => 100],
            ['email', 'email', 'message' => '电子邮箱格式不正确!'],
            [['postcode'], 'string', 'max' => 6],
            ['telephone', 'required', 'message' => '收货人电话不能为空'],
            ['telephone', 'validateTelephone', 'message' => '收货人电话格式不正确'],
            ['telephone', 'string', 'max' => 12,'message'=>'收货人电话不正确'],
            ['createtime','default','value'=>time()],
            ['userid','integer','message'=>'用户编号必须为整数!'],
            ['is_default','default','value'=>0],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'addressid' => 'id',
            'firstname' => '姓',
            'lastname' => '名',
            'company' => '公司名称',
            'address' => '地址',
            'address_detail' => '详细地址',
            'postcode' => '邮编',
            'email' => '电子邮箱地址',
            'telephone' => '联系电话',
            'userid' => '用户id',
            'createtime' => '创建时间',
            'is_default'=>'默认地址'
        ];
    }

    public  function validateTelephone(){
        if (!$this->hasErrors()){
            $res = preg_match('/^1[34578][0-9]{9}$/',$this->telephone);
            if ($res) return true ;
            return false;
        }
    }

    public  function  add($data){
        if ($this->load($data) && $this->validate()){
            $res = $this->insert();
            return (bool)$res;
        }
        return false;
    }
}
