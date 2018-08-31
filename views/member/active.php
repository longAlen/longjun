<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html class="login-bg">

<head>
    <title>神通科技 - 激活账户</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link href="assets/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="assets/admin/css/icons.css" />
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/lib/font-awesome.css" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="assets/admin/css/compiled/signin.css" type="text/css" media="screen" />
    <!-- open sans font -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>

    <div class="span4 box">
        <div class="content-wrap">
            <h6>神通科技 - 激活账户</h6>
            <?php if (Yii::$app->session->hasFlash('info')){
                echo Yii::$app->session->getFlash('info');
            }?>
            <div>
                <span>账户名称:<input  type="text" class="span12" value="<?=$username?>" disabled/></span>
            </div>
            <?php if ($outToken):?>
            <a  href="#" onclick="operate('<?=Yii::$app->urlManager->createUrl(['member/repeat'])?>','<?=$username?>','<?=Yii::$app->request->getCsrfToken()?>')" class="btn-glow primary" style="font-size: 16px">激活链接失效，点击从新生成</a>
            <?php else:?>
            <a href="#" onclick="operate('<?=Yii::$app->urlManager->createUrl(['member/active'])?>','<?=$username?>','<?=Yii::$app->request->getCsrfToken()?>')" class="btn-glow primary" style="font-size: 16px">确认激活</a>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- scripts -->
<script src="assets/admin/js/jquery-latest.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>
<script src="assets/admin/js/theme.js"></script>
<script src="assets/admin/js/layer/layer.js"></script>
<!-- pre load bg imgs -->
<script type="text/javascript">
    $(function() {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function(e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");
            $("html").css("background-image", "url('img/bgs/" + bg + "')");
        });

    });
    function operate(target,data,token) {
        $.post(target,{info:data,_csrf:token},function (res) {
            if (res.status){
                layer.msg(res.msg,{time:3500},function () {
                    location.href = res.link;
                });
            }else{
                layer.msg(res.msg,{time:2500},function () {
                   location.reload();
                })
            }
        },'json')
    }
    </script>
</body>

</html>