<?php

namespace  app\modules\controllers;
use yii\web\Controller;

class  CommonController extends  Controller{
    public  function  init()
    {

        if (!isset(\Yii::$app->session['admin']['isLogin']) ||  \Yii::$app->session['admin']['isLogin']!=1)
        {
            $this->redirect(['/admin/public/login']);
        }

    }
}