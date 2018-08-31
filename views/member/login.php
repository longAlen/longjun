

    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-6" style="margin-left: 30%">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">登录</h2>
                        <p>欢迎您回来，请您输入您的账户名密码</p>

                        <div class="social-auth-buttons">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-qq"></i> 使用QQ账号登录</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-weibo"></i> 使用新浪微博账号登录</button>
                                </div>
                            </div>
                        </div>
                        <?php $form = \yii\widgets\ActiveForm::begin([
                                'fieldConfig'=>[
                                        'template'=>'<div class="field-row">{label}{input}</div>{error}',
                                ],
                            'options'=>[
                                    'class'=>'login-form cf-style-1',
                                'role'=>'form',
                            ]
                        ]);
                            echo $form->field($model,'username')->textInput(['class'=>'le-input']);
                            echo $form->field($model,'userpass')->passwordInput(['class'=>'le-input']);
                            echo $form->field($model,'rememberMe')->checkbox([
                                    'class'=>'le-checbox auto-width inline',
                                'template'=>' <div class="field-row clearfix"><span class="pull-left">{label}{input}<span class="bold">记住我</span></span> </div>'
                            ]);

                        ?>
                        <?=\yii\helpers\Html::a('忘记密码？',['index/index'],['class'=>'field-row clearfix pull-right content-color bold','style'=>'margin-top: -45px;'])?>

                        <div class="buttons-holder">
                            <?=\yii\helpers\Html::submitButton('安全登录',['class'=>'le-button huge'])?>
                        </div>
                     <?php \yii\widgets\ActiveForm::end();?>

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
