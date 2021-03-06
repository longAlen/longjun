<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//print_r(dirname(__FILE__)); echo "<hr/>";
//print_r(__DIR__.'/../vendor/yiisoft/yii2/Yii.php');echo "<hr/>";
//print_r(__DIR__ . '/../config/web.php');
//die;

require dirname(__DIR__). '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$config = require dirname(__DIR__). '/config/web.php';

(new yii\web\Application($config))->run();
