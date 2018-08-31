<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/28
 * Time: 17:31
 */
namespace  app\modules\controllers;
use app\modules\models\Admin;
use yii\web\Controller;
use yii;

class ManageController extends  CommonController {


    //管理员列表
    public function  actionIndex()
    {
        $this->layout ='layout1';
        $model = Admin::find();
        $models = clone $model;
        $pages = new yii\data\Pagination([
           'totalCount' => $models->count(),
           'pageSize'=>Yii::$app->params['pageSize'],
           'pageParam'=>'p',
        ]);
        $data = $model->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['dataList'=>$data,'pages'=>$pages]);
    }


    //修改登录密码
    public  function  actionMailchangepass(){
        $this->layout=false;
        $model = new Admin();
        //提交修改数据
        if (Yii::$app->request->isPost){
            $post =yii::$app->request->post();
            if ($model->changePass($post)){
                Yii::$app->session->setFlash('info','修改密码成功');
            }

        }

        $param['time'] = Yii::$app->request->get('timestamp');
        $param['username'] = Yii::$app->request->get('username');
        $param['token'] = Yii::$app->request->get('token');

        $selfToken = $model->createToken($param['username'],$param['time']);
        if ($selfToken != $param['token']){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        //链接失效
        if (time()-$param['time']>300){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        $model->adminuser = $param['username'];
        return $this->render('mailchangepass',['model'=>$model]);
    }

    //添加管理员
    public function actionAdd(){

        $this->layout ='layout1';
        $model = new Admin();

        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->addManager($post)){
                //添加成功
               $this->redirect(['manage/index']);
               Yii::$app->end();
            }else{
                Yii::$app->session->setFlash('indo','添加失败');
            }
           //$this->goBack();
        }
        return $this->render('edit',['model'=>$model]);
    }

    public function  actionDelete(){
        $model = new Admin();
        $id =  Yii::$app->request->post('id');
        $res = $model->deleteAll('adminid =:id',[':id'=>$id]);
        if ($res){
           $link = Yii::$app->urlManager->createAbsoluteUrl(['admin/manage/index']);
           return $this->response(['status'=>1,'linkUrl'=>$link,'msg'=>'删除成功']);
        }else{
            return $this->response(['status'=>0,'msg'=>'删除失败']);
        }
    }

    /***
     * @param $data array()
     * return json
     */
    private  function  response($data){
        return json_encode($data,true);
    }
}