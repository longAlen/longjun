<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $productid
 * @property string $cateid
 * @property string $title
 * @property string $descr
 * @property string $num
 * @property string $price
 * @property string $cover
 * @property string $pics
 * @property string $issale
 * @property string $ishot
 * @property string $istui
 * @property string $saleprice
 * @property string $ison
 * @property string $createtime
 */
class Product extends ActiveRecord
{

    const AK = 'gawZjtk00TrJ9Di6AkTOSQluYytRdPgW-y8F1T5L';
    const SK = 'wpA9kYSwIU3aTWABLXRQ3rAaK3vTTYTcz8uzFn7b';
    //const DOMAIN = 'pc00pfbgt.bkt.clouddn.com';//私有空间
    //const BUCKET = 'bids';
    const DOMAIN = 'pbzyb3t6c.bkt.clouddn.com';//私有空间
    const BUCKET = 'tdsc360';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title','required','message'=>'商品名称不能为空'],
            ['descr','required','message'=>'商品描述不能为空'],
            ['cateid','required','message'=>'商品分类不能为空'],
            ['cateid', 'integer','min'=>1,'message'=>'请选择商品分类'],
            ['price', 'required', 'message'=>'商品价格不能为空'],
            [['price', 'saleprice'], 'number','min'=>0.01,'message'=>'价格必须是数字'],
            ['num','integer','min'=>0,'message'=>'库存必须是数字'],
            ['num','required','message'=>'商品库存不能为空'],
            [['issale','ishot', 'pics', 'istui','cover','promote_price'],'safe'],
            ['title', 'string', 'max' =>100,'message'=>'商品名称已超出最大输入字符'],
            ['createtime','default','value'=>time()],
           // ['cover','required','商品封面不能为空'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => '商品id',
            'cateid' => '分类id',
            'title' => '商品名称',
            'descr' => '商品描述',
            'num' => '库存',
            'price' => '商品价格',
            'cover' => '图片封面',
            'pics' => '商品图片',
            'issale' => '是否促销',
            'ishot' => '是否热卖',
            'istui' => '是否推荐',
            'saleprice' => '促销价格',
            'ison' => '是否上架',
            'createtime' => '创建时间',
        ];
    }
    public  function  add($data){
//        print_r($data);die;
      /*
        //处理规格参数
        $spcModel =  new Sku();
        $spc = $data['Product']['spc'];
        */
        $data['Product']['promote_price'] = $this->promotePrice($data['Product']['price'],$data['Product']['saleprice']);
        if ($this->load($data) &&  $this->validate()){

            return  (bool)$this->save();
        }
        return false;
    }

    /***
     * @param $id
     * @param $data
     * @return mixed
     */
    public function  edit($id,$data){
        //print_r($data);die;
        $data['Product']['promote_price'] = $this->promotePrice($data['Product']['price'],$data['Product']['saleprice']);
        if ($this->load($data) && $this->validate()){
            return (bool)$this->save();
        }
        return false;
    }

    /***
     * @param $price 原价
     * @param $saleprice 促销价
     */
    private  function promotePrice($price,$saleprice){
        $promote_price = number_format($price - $saleprice,2);
        return $promote_price;
    }
}
