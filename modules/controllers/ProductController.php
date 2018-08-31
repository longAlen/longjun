<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/8/3
 * Time: 11:32
 */
namespace  app\modules\controllers;
use app\models\Category;
use app\models\Product;
use app\models\ProductSpc;
use crazyfd\qiniu\Qiniu;
use Symfony\Component\DomCrawler\Tests\Field\InputFormFieldTest;
use Yii;
use yii\data\Pagination;

class  ProductController extends CommonController{

    public  function  actionIndex(){
        $this->layout = 'layout1';
        $model = Product::find();
        $product = clone $model;
        $pages = new Pagination([
           'totalCount'=>$product->count(),
           'pageSize'=>Yii::$app->params['pageSize'],
            'pageParam'=>'p'
        ]);
        $products = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',['list'=>$products,'pages'=>$pages]);
    }

    /***
     * @return string
     */
    public  function  actionAdd(){
        $this->layout = 'layout1';
        $cateModel = new Category();
        $model = new Product();
        //热卖/促销 推荐 上架 默认显示
        $model->ishot = 1;
        $model->issale = 1;
        $model->ison = 1;
        $model->istui = 1;
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            //图片单独处理
            $pics = $this->upload();

            if (!$pics){
                $model->addError('pics','封面不能为空');
            }else{
                $post['Product']['cover'] = $pics['cover'];
                $post['Product']['pics'] = $pics['pics'];
            }
            if ($pics && $model->add($post)){
                $this->redirect(['product/index']);
                Yii::$app->end();

            }else{
                Yii::$app->session->setFlash('info','添加失败');
            }
        }
        $list = $cateModel->getProCateOptions();
        return $this->render('edit',['model'=>$model,'options'=>$list]);
    }

    /***
     *删除
     */
    public  function actionDel(){
        $id = Yii::$app->request->post('id');
        if (empty($id)){
            return $this->response(['status'=>1,'msg'=>'删除失败，参数错误!']);
        }
        if (Product::deleteAll('productid =:id',[':id'=>$id])){
            $link = Yii::$app->urlManager->createAbsoluteUrl(['admin/product/index']);
            return $this->response(['status'=>1,'msg'=>'删除成功','linkUrl'=>$link]);
        }
        return $this->response(['status'=>0,'msg'=>'删除失败']);
    }
    /***
     * 编辑
     */
    public  function  actionEdit(){
        $this->layout = 'layout1';
        $id = Yii::$app->request->get('id');
        $cateModel = new Category();
        $model = Product::find()->where('productid =:id',[':id'=>$id])->one();

        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $qiNiu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);

            if($_FILES['Product']['error']['cover']==0){
                //$hasIsset = !empty($model->cover) ? $qiNiu->stat($model->cover) ? 1 :0 : 0;
                //print_r($hasIsset);die;
                $qiNiu->delete(basename($model->cover));
                $key = uniqid();
                $qiNiu->uploadFile($_FILES['Product']['tmp_name']['cover'],$key);
                $cover = $qiNiu->getLink($key);
            }
            $post['Product']['cover'] = !empty($cover) ? $cover : $model->cover;
            $pics =[];
            foreach ($_FILES['Product']['tmp_name']['pics'] as $k=>$file){
                if ($_FILES['Product']['error']['pics'][$k]>0){
                    continue;
                }
                $key = uniqid();
                $qiNiu->uploadFile($file,$key);
                $pics[$k] = $qiNiu->getLink($key);
            }
            $post['Product']['pics'] = json_encode(array_merge((array)json_decode($model->pics, true), $pics));
            if ($model->edit($id,$post)){
                $this->redirect(['product/index']);
                Yii::$app->end();
            }else{
                Yii::$app->session->setFlash('info','修改失败!');
            }
        }
        $options = $cateModel->getProCateOptions();
        return $this->render('edit',['model'=>$model,'options'=>$options]);
    }

    public  function  actionRemovepic(){
        $id = Yii::$app->request->get('id');
        $key = Yii::$app->request->get('key');
        $num = Yii::$app->request->get('num');
        $model = Product::find()->where('productid =:id',[':id'=>$id])->one();
        $qiNiu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
        $qiNiu->delete($key);
        $pics = json_decode($model->pics,true);
        unset($pics[$num]);
        Product::updateAll(['pics' => json_encode($pics)], 'productid = :id', [':id' => $id]);
        return $this->redirect(['product/edit','id'=>$id]);

    }

    /***
     * @return string 上架
     */
    public function  actionOn(){
        $id = Yii::$app->request->post('id');
        if (empty($id)){
            return $this->response(['status'=>0,'msg'=>'操作失败，参数错误！']);
        }
        $res = Product::updateAll(['ison'=>1],['productid'=>$id]);
        if ($res){
            return $this->response(['status'=>1,'msg'=>'商品上架成功!']);
        }
        return $this->response(['status'=>0,'msg'=>'操作失败！商品已上架']);
    }

    /***
     * @return 下架
     */

    public function  actionOff(){
        $id = Yii::$app->request->post('id');
        if (empty($id)){
            return $this->response(['status'=>0,'msg'=>'操作失败，参数错误！']);
        }
        $res = Product::updateAll(['ison'=>0],['productid'=>$id]);
        if ($res){
            return $this->response(['status'=>1,'msg'=>'商品下架成功!']);
        }
        return $this->response(['status'=>0,'msg'=>'操作失败！商品已下架']);
    }

    /***
     *上传图片
     */
    private  function  upload(){
        if ($_FILES['Product']['error']['cover']>0){
            return false;
        }
        $qiNiu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
        $key = uniqid();
        $qiNiu->uploadFile($_FILES['Product']['tmp_name']['cover'],$key);
        $cover = $qiNiu->getLink($key);
        $pics = [];
        foreach ($_FILES['Product']['tmp_name']['pics'] as $k=>$file){
            if ($_FILES['Product']['error']['pics'][$k]){
                continue;
            }
            $key = uniqid();
            $qiNiu->uploadFile($file,$key);
            $pics[]=$qiNiu->getLink($key);
        }
        return ['cover'=>$cover,'pics'=>json_encode($pics)];
    }

    private  function  response($data){
        return json_encode($data,true);
    }

}