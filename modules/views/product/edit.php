
<style>.span8 div{ display:inline; } .help-block-error { color:red; display:inline; }</style>
<link rel="stylesheet" href="assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加商品</h3></div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <?php if (Yii::$app->session->hasFlash('info')){
                        echo Yii::$app->session->getFlash('info');
                    }?>
                    <div class="container">
                        <?php $form =  \yii\bootstrap\ActiveForm::begin([
                                'options'=>[
                                        'id'=>'w0',
                                        'class'=>'new_user_form inline-input',
                                        'enctype'=>'multipart/form-data',
                                ],
                                'fieldConfig'=>[
                                    'template'=>'<div class="span12 field-box">{label}{input}</div>{error}',
                                ],
                        ]);
                            echo $form->field($model,'cateid')->dropDownList($options);
                            echo $form->field($model,'title')->textInput(['class'=>'span9','id'=>'product-title']);
                            echo $form->field($model,'descr')->textarea(['id'=>'wysi','class'=>'span9 wysihtml5','style'=>'margin-left:120px']);
                            echo $form->field($model,'price')->textInput(['class'=>'span9','id'=>'product-price']);
                            echo $form->field($model,'ishot')->radioList([0=>'不热卖',1=>'热卖'],['class'=>'span8']);
                            echo $form->field($model,'issale')->radioList([0=>'不促销',1=>'促销'],['class'=>'span8']);
                            echo $form->field($model,'saleprice')->textInput(['class'=>'span9','id'=>'product-saleprice']);
                            echo $form->field($model,'num')->textInput(['class'=>'span9','id'=>'product-num']);
                            echo $form->field($model,'ison')->radioList([0=>'下架',1=>'上架'],['class'=>'span8']);
                            echo $form->field($model,'istui')->radioList([0=>'不推荐',1=>'推荐'],['class'=>'span8']);    ?>


                        <div class="spc-table" style="display: none;">
                            <table width="100%" border="none" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <th width="20%">规格名称</th>
                                    <th width="20%">规格属性</th>
                                    <th width="20%">库存</th>
                                    <th width="20%">售价</th>
                                    <th width="20%">促销价</th>
                                    <th width="20%">操作</th>
                                </tr>
                                </tbody>
                                <tbody class="spc-tbody">
                                <tr class="spc-tr">
                                    <td >
                                        <div >
                                            <input type="text" class="spc-input" name="Product[spc][name][]" placeholder="规格名称，如：颜色">
                                        </div>
                                    </td>
                                    <td >
                                        <div >
                                            <input  type="text" class="spc-input"  name="Product[spc][value][]" placeholder="输入规格值，如：黑色">
                                        </div>
                                    </td>
                                    <td >
                                        <div >
                                            <input  type="text" class="spc-input" name="Product[spc][stock][]" placeholder="库存数量">
                                        </div>
                                    </td>

                                    <td >
                                        <div >
                                            <input  type="text" class="spc-input" name="Product[spc][price][]" placeholder="商品售价">
                                        </div>
                                    </td>
                                    <td >
                                        <div >
                                            <input  type="text" class="spc-input" name="Product[spc][sale_price][]" placeholder="商品促销价"
                                        </div>
                                    </td>
                                    <td> <input type="button"  value="删除" class=" spc-remove btn-glow "></td>
                                </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type='button' class="btn-glow " id="spc-add" value='添加规格'>
                            </div>

                            <div class="button_bq_meg" style="float: left; font-weight:bold;height: 35px; margin-top:  40px;line-height: 35px; margin-left: 10px; color: red; width: 500px;overflow:hidden;"></div>
                        </div>

                           <?php echo $form->field($model,'cover')->fileInput(['class'=>'span9']);

                            if (!empty($model->cover)):
                        ?>

                            <img src="http://<?php echo $model->cover;?>" style="width: 15%">
                            <hr>

                           <?php
                                endif;
                                echo $form->field($model, 'pics[]')->fileInput(['class' => 'span9', 'multiple' => true,]);
                           ?>
                        <?php foreach ((array)json_decode($model->pics,true) as $k=>$pic){
                            $key = substr($pic,(strlen(\app\models\Product::DOMAIN)+1));
                            ?>
                            <img src="http://<?php echo $pic ?>" style="width: 15%">
                            <a href="<?php echo \yii\helpers\Url::to(['product/removepic','key'=>$key,'id' => $model->productid,'num'=>$k])?>">删除</a>

                        <?php }?>

                            <hr>

<!--                            <input type='button' id="addpic" value='增加一个'>-->
                            <div class="span11 field-box actions">
                                <?php echo \yii\helpers\Html::submitButton('提交',['class'=>'btn-glow primary']);?>
                                <span>OR</span>
                                <a  class="btn-glow primary reset" onclick="window.history.back()">取消</a>
                            </div>
                        <?php \yii\bootstrap\ActiveForm::end();?>
                    </div>
                </div>
                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>请在左侧表单当中填入要添加的商品信息,包括商品名称,描述,图片等</div>
                    <h6>商城用户说明</h6>
                    <p>可以在前台进行购物</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->
