<?PHP
use yii\bootstrap\ActiveForm;
?>
<!-- end sidebar -->
<link rel="stylesheet" href="assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新管理员</h3></div>
            <?php if (Yii::$app->session->hasFlash('info')){
                echo Yii::$app->session->getFlash('info');
            }?>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form =ActiveForm::begin([
                            'id'=>'w0',
                            'class'=>'new_user_form inline-input',
                            'fieldConfig'=>[
                                'template'=>'{error}{input}'
                            ]
                        ]);?>
                            <div class="form-group field-admin-adminuser">
                                <div class="span12 field-box">
                                    <label class="control-label" for="admin-adminuser">管理员账号</label>
                                    <?php echo $form->field($model,'adminuser')->textInput([
                                        'class'=>'span9',
                                        'id'=>'admin-adminuser',
                                        ]);?>
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-admin-adminemail">
                                <div class="span12 field-box">
                                    <label class="control-label" for="admin-adminemail">管理员邮箱</label>
                                    <?php echo $form->field($model,'adminemail')->textInput([
                                            'id'=>'admin-adminemail',
                                            'class'=>'span9',
                                            ])?>
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-admin-adminpass">
                                <div class="span12 field-box">
                                    <label class="control-label" for="admin-adminpass">管理员密码</label>

                                    <?php echo $form->field($model,'adminpass')->passwordInput([
                                            'id'=>'admin-adminpass',
                                        'class'=>'span9',
                                    ])?>
                                   </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-admin-repass">
                                <div class="span12 field-box">

                                    <label class="control-label" for="admin-repass">确认密码</label>

                                    <?php echo $form->field($model,'newPassword_2')->passwordInput([
                                            'id'=>'admin-repass',
                                        'class'=>'span9'
                                    ]);?>
                                   </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="span11 field-box actions">
                                <?php echo  \yii\helpers\Html::submitButton('创建',['class'=>'btn-glow primary']);?>
                                <span>或者</span>
                                <?php echo \yii\helpers\Html::a('取消',['manage/index'],['class'=>'btn-glow reset','type'=>'reset'])?>
                            </div>
                        <?php ActiveForm::end();?>
                    </div>
                </div>
                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>请在左侧填写管理员相关信息，包括管理员账号，电子邮箱，以及密码</div>
                    <h6>重要提示：</h6>
                    <p>管理员可以管理后台功能模块</p>
                    <p>请谨慎添加</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end main container -->