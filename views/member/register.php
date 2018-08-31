

<!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-6" style="margin-left: 30%" >
                <section class="section register inner-left-xs">
                    <h2 class="bordered">新建账户</h2>
                    <p>创建一个属于你自己的账户</p>
                    <?php if (Yii::$app->session->hasFlash('info'))
                        echo Yii::$app->session->getFlash('info');
                    ?>
                    <?php $form =\yii\widgets\ActiveForm::begin([
                            'fieldConfig'=>[
                                'template' => '<div class="field-row">{label}{input}</div>{error}'
                            ],
                        'options'=>[
                                'class'=>'register-form cf-style-1',
                                'role'>'form'
                        ],
                        ]);
                        echo $form->field($model,'username')->textInput(['class'=>'le-input','placeholder'=>'登录账户名称']);
                        echo $form->field($model,'userpass')->passwordInput(['class'=>'le-input','placeholder'=>'账户登录密码']);
                        echo $form->field($model,'useremail')->textInput(['class'=>'le-input','placeholder'=>'注册邮箱，用于激活账户或找回登录密码']);

                    ?>
                    <div class="buttons-holder">
                        <?=\yii\helpers\Html::submitButton('注册',['class'=>'le-button huge'])?>
                    </div><!-- /.buttons-holder -->
                    <?php \yii\widgets\ActiveForm::end();?>



                    <h2 class="semi-bold">加入我们您将会享受到前所未有的购物体验 :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color" ></i> 快捷的购物体验</li>
                        <li><i class="fa fa-check primary-color"></i> 便捷的下单方式</li>
                        <li><i class="fa fa-check primary-color"></i> 更加低廉的商品</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
