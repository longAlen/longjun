<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_spc}}".
 *
 * @property int $id id
 * @property string $name 商品属性名称
 * @property string $sku_code 商品sku编码
 * @property string $price 商品原价
 * @property int $product_id 商品id
 * @property int $stock 商品库存
 * @property string $sale_price 商品促销价
 */
class Sku extends \yii\db\ActiveRecord
{
    public  static  $Code = "T000000000";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sku}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'sale_price'], 'number'],
            [['product_id', 'stock'], 'integer'],
            [['name', 'sku_code'], 'string', 'max' => 25],
            ['name','required','message'=>'规格商品参数名称不能为空'],
            ['value','required','message'=>'规格商品参数值不能为空'],
            ['stock','required','message'=>'规格商品库存不能为空'],
            ['price','required','message'=>'规格商品售价不能为空'],
            ['price','number','min'=>0.01,'message'=>'价格必须是数字'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '规格名称',
            'sku_code' => '商品编码',
            'price' => '商品售价',
            'product_id' => '商品id',
            'stock' => '商品库存',
            'sale_price' => '商品促销价',
        ];
    }
    //生成sku编码
    public static function  createSkuCode(){
        $last = self::find()->where(['is_del'=>0])->orderBy('createtime desc')->one();
        $lastCode = !is_null($last) ? $last->sku_code : self::$Code;
        if (substr($lastCode,0,1)){
            
        }
    }

}
