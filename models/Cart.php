<?php

namespace app\models;

use Symfony\Component\DomCrawler\Tests\Field\InputFormFieldTest;
use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property string $cartid
 * @property string $productid 商品id
 * @property string $productnum 商品数量
 * @property string $price 购买价格
 * @property string $userid 用户id
 * @property string $createtime 添加时间
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productid', 'productnum', 'userid', 'createtime'], 'integer'],
            [['price','totalprice'], 'number'],
            ['createtime','default','value'=>time()],
            ['updatetime','default','value'=>time()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartid' => 'Cartid',
            'productid' => 'Productid',
            'productnum' => 'Productnum',
            'price' => 'Price',
            'userid' => 'Userid',
            'createtime' => 'Createtime',
            'updatetime'=>'Updatetime',
            'totalprice'=>'Totalprice',
        ];
    }

    /****
     * @param $data 商品信息
     * @param $userID  用户ID
     * @return bool true or false
     */
    public  function  add($data,$userID,$price){

        $cart = self::find()->where(['userid'=>$userID,'productid'=>$data['Cart']['productid']])->asArray()->one();

        if (!empty($cart)){//更新
            $data['Cart']['productnum'] = $data['Cart']['productnum']+$cart['productnum'];
            $data['Cart']['totalprice'] = $data['Cart']['productnum']*$price;
            if ($this->validate()){
               return (bool)self::updateAll(['productnum'=>$data['Cart']['productnum'],'totalprice'=>$data['Cart']['totalprice'],'updatetime'=>time()],['userid'=>$data['Cart']['userid'],'productid'=>$data['Cart']['productid']]);
            }

        }else{
            //var_dump($this->load($data));die;
            if($this->validate() && $this->load($data)){
              return (bool)$this->save();
            }
        }
    }

    /***
     * @param $user_id 用户id
     * 根据用户Id获取购物车内商品
     */
    public static function  getCartData($userId)
    {
        $data = self::find()->where('userid =:userid',[':userid'=>$userId])->asArray()->all();
        return $data;
    }


    public  static  function getCartProData($userId){
        /*$data = self::find()->leftJoin('shop_product','shop_product.productid=shop_cart.productid')->select(['shop_cart.*','shop_product.title','shop_product.cover'])->where(['shop_cart.userid'=>$userId])->orderBy('shop_cart.updatetime desc')->asArray()->all();
        return $data;*/
        $cart = self::find()->leftJoin('shop_product','shop_product.productid=shop_cart.productid')->select(['shop_cart.*','shop_product.title','shop_product.cover'])->where(['shop_cart.userid'=>$userId]);
        $model = clone $cart;
        $pages = new Pagination([
            'totalCount'=>$model->count(),
            'pageSize' =>4,
            'pageParam' =>'p'
        ]);
        $data = $model->offset($pages->offset)->orderBy('shop_cart.updatetime desc')->limit($pages->limit)->asArray()->all();
        $totalprice = $model->sum('totalprice');
        $count = $model->count('cartid');
        return ['cart'=>$data,'totalprice'=>$totalprice,'count'=>$count,'pages'=>$pages];
    }


}
