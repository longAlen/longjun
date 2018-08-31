<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/31
 * Time: 14:29
 */
namespace  app\modules\controllers;
use app\models\Category;
use Yii;
use yii\data\Pagination;

class CategoryController extends  CommonController {
    public function actionIndex(){
        $this->layout ='layout1';
        $model = Category::find();
        $cateId = Yii::$app->request->get('cateid')>0 ? Yii::$app->request->get('cateid') :0;
        $model = $model->andWhere(['parent_id'=>$cateId]);
        $models = clone $model;
        $pages = new Pagination([
            'totalCount'=>$models->count(),
            'pageSize'=>Yii::$app->params['pageSize'],
            'pageParam'=>'p'
        ]);
        $cateList = $model->offset($pages->offset)->limit($model->limit)->all();

        //$cateList = $model->andWhere(['parent_id'=>$cateId])->all();

        return $this->render('index',['cateList'=>$cateList,'pages'=>$pages]);
    }

    /***
     * @return view
     */
    public  function  actionAdd(){
        $this->layout='layout1';
        $model = new Category();
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($model->add($post)){
                $this->redirect(['category/index']);
                Yii::$app->end();
            }else{
                Yii::$app->session->setFlash('infp','添加失败');
            }
        }
        $cateList = $model->getCateOptions();
        return $this->render('edit',['cateList'=>$cateList,'model'=>$model]);


    }
    public  function  actionEdit(){
        $this->layout = 'layout1';
        $id = Yii::$app->request->get('id');
        $model =Category::find()->where(['id'=>$id])->one();
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($model->edit($post)){
                $this->redirect(['category/index']);
                Yii::$app->end();
            }else{
                Yii::$app->session->setFlash('info','修改失败');
            }
        }
        $info =$model::find()->where(['id'=>$id])->asArray()->one();
        $cateList = $model->getCateOptions();
        return $this->render('edit',['model'=>$model,'info'=>$info,'cateList'=>$cateList]);
    }

    public  function actionDel(){
        $id = Yii::$app->request->post('id');
        if (empty($id)){
            return $this->response(['status'=>0,'msg'=>'参数错误!']);
        }
        $child = Category::find()->where('parent_id = :id',[':id'=>$id])->one();
        if ($child){
            return $this->response(['status'=>0,'msg'=>'该分类下有子分类，不允许删除!']);
        }
        if (!Category::deleteAll(['id'=>$id])){
            return $this->response(['status'=>0,'msg'=>'删除失败!']);
        }
        $linkUrl = Yii::$app->urlManager->createAbsoluteUrl(['admin/category/index']);
        return $this->response(['status'=>1,'linkUrl'=>$linkUrl,'msg'=>'删除成功!']);
    }

    /***
     * @param $data array()
     * return json
     */
    private  function  response($data){
        return json_encode($data,true);
    }

}