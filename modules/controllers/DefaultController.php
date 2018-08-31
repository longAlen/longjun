<?php

namespace app\modules\controllers;

use app\models\Product;
use Yii;
use yii\data\Pagination;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout1';
        $model = Product::find();
        $productCount = clone  $model;
        $pages = new Pagination([
           'totalCount'=>$productCount->count(),
            'pageSize'=>Yii::$app->params['pageSize'],
            'pageParam' => 'p',
        ]);
        $models = $model->offset($pages->offset)->select(['productid','cover','descr','ison','title'])->limit($pages->limit)->all();

        return $this->render('index',['models'=>$models,'pages'=>$pages]);
    }
}
