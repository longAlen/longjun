<?php use yii\helpers\Html;?>
<link rel="stylesheet" href="assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>商品列表</h3>
                <div class="span10 pull-right">
                    <?php echo Html::a('添加商品',['product/add'],['class'=>'btn-flat success pull-right'])?>
                </div>
            </div>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2 sortable">
                            <span class="line"></span>商品ID</th>
                        <th class="span6 sortable">
                            <span class="line"></span>商品名称</th>
                        <th class="span2 sortable">
                            <span class="line"></span>商品库存</th>
                        <th class="span2 sortable">
                            <span class="line"></span>商品单价</th>
                        <th class="span2 sortable">
                            <span class="line"></span>是否热卖</th>
                        <th class="span2 sortable">
                            <span class="line"></span>是否促销</th>
                        <th class="span2 sortable">
                            <span class="line"></span>促销价</th>
                        <th class="span2 sortable">
                            <span class="line"></span>是否上架</th>
                        <th class="span2 sortable">
                            <span class="line"></span>是否推荐</th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $pro){?>
                    <!-- row -->
                    <tr class="first">
                        <td><?=$pro->productid;?></td>
                        <td>
                            <a href="http://<?php echo $pro->cover; ?>" target="_blank"><img src="http://<?php echo $pro->cover; ?>" class="img-circle avatar hidden-phone" /></a>
                            <a href="http://<?php echo $pro->cover; ?>" class="name" target="_blank"><?php echo $pro->title;?></a></td>
                        <td><?php echo $pro->num;?></td>
                        <td><?php echo number_format($pro->price,2)?></td>
                        <td><?php echo ($pro->ishot>0) ? '热卖':'不热卖';?></td>
                        <td><?php echo ($pro->issale>0) ? '促销':'不促销';?></td>
                        <td><?php echo number_format($pro->saleprice,2)?></td>
                        <td><?php echo ($pro->ison>0) ?'已上架':'下架';?></td>
                        <td><?php echo ($pro->istui>0) ? '推荐' :'不推荐';?></td>
                        <td class="align-right">
                            <a href="<?php echo \yii\helpers\Url::to(['product/edit','id'=>$pro->productid]);?>">编辑</a>
                            <a href="#" onclick="UpperOrSlower('<?php echo \yii\helpers\Url::to(['product/on']) ?>','<?php echo $pro->productid;?>','<?php echo Yii::$app->request->getCsrfToken()?>')">上架</a>
                            <a href="#" onclick="UpperOrSlower('<?php echo \yii\helpers\Url::to(['product/off']) ?>','<?php echo $pro->productid;?>','<?php echo Yii::$app->request->getCsrfToken()?>')">下架</a>
                            <a href="#" onclick="Del('<?php echo Yii::$app->urlManager->createAbsoluteUrl(['admin/product/del'])?>','<?php echo $pro->productid;?>','<?php echo Yii::$app->request->getCsrfToken()?>')">删除</a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination'=>$pages,
                    'nextPageLabel' => '下一页',
                    'prevPageLabel' => '上一页',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',
                    'hideOnSinglePage'=>false,
                ])?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->
