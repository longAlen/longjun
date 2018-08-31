
<link rel="stylesheet" href="assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h4><i class="icon-home"></i>分类管理 > 分类列表</h4>
                <div class="span10 pull-right">

                    <?php echo  \yii\helpers\Html::a('添加新分类',['category/add'],[
                            'class'=>'btn-flat success pull-right',
                        'template'=>'<span>&#43;</span>添加新分类',
                    ])?>
                </div>
            </div>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th class="span3 sortable">
                            <span class="line"></span>分类ID
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>分类名称
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>创建时间
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($cateList){?>
                    <!-- row -->
                        <?php foreach ($cateList as $cate){?>
                        <tr class="first">
                            <td><?php echo $cate->id; ?></td>
                            <td><a href="<?php echo Yii::$app->urlManager->createUrl(['admin/category/index','cateid'=>$cate->id])?>" title="查看子分类"><?php echo $cate->title; ?></a></td>
                            <td><?php echo date('Y-m-d H:i:s',$cate->createtime);?></td>
                            <td class="align-right">
<!--                                --><?php //echo  \yii\helpers\Html::a('编辑',['category/edit','id'=>$cate->id])?>
                                <a href=" <?php echo \yii\helpers\Url::to(['category/edit','id'=>$cate->id])?>">编辑</a>
                                <a href="#" onclick="Del('<?php echo Yii::$app->urlManager->createUrl(['admin/category/del'])?>','<?php echo $cate->id;?>','<?php echo Yii::$app->request->getCsrfToken()?>')">删除</a>
<!--                                --><?php //echo  \yii\helpers\Html::a('删除',['category/delete','id'=>$cate->id])?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php }else{?>

                            <tr class="first">
                                <td colspan="4" style="text-align: center;color: red">暂无数据</td>
                            </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <?=\yii\widgets\LinkPager::widget([
                        'pagination'=>$pages,
                    'firstPageLabel'=>'首页',
                    'lastPageLabel'=>'尾页',
                    'prevPageLabel'=>'上一页',
                    'nextPageLabel'=>'下一页',
                    'hideOnSinglePage'=>false,
                ])?>
            </div>
            <!-- end users table --></div>
    </div>
</div>
<!-- end main container -->