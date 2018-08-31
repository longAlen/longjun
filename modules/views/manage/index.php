<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>管理员列表</h3>
                <div class="span10 pull-right">
                    <a href="<?php echo \yii\helpers\Url::to(['manage/add']);?>" class="btn-flat success pull-right">
                        <span>&#43;</span>添加新管理员</a></div>
            </div>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2">管理员ID</th>
                        <th class="span2">
                            <span class="line"></span>管理员账号</th>
                        <th class="span2">
                            <span class="line"></span>管理员邮箱</th>
                        <th class="span3">
                            <span class="line"></span>最后登录时间</th>
                        <th class="span3">
                            <span class="line"></span>最后登录IP</th>
                        <th class="span2">
                            <span class="line"></span>添加时间</th>
                        <th class="span2">
                            <span class="line"></span>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataList as $data){?>
                    <!-- row -->
                    <tr>
                        <td><?php echo $data->adminid;?></td>
                        <td><?php echo $data->adminuser;?></td>
                        <td><?php echo $data->adminemail;?></td>
                        <td><?php if($data->logintime){
                                echo date('Y-m-d H:i:s',$data->logintime);
                            }else{
                                echo '无';
                            } ?></td>
                        <td><?php if($data->loginip){echo  long2ip($data->loginip);}else{
                                echo '无';
                            }?></td>
                        <td><?php echo date('Y-m-d H:i:s',$data->createtime);?></td>
                        <td class="align-right">

                            <a href="#" onclick="Del('<?php echo Yii::$app->urlManager->createUrl(['admin/manage/delete'])?>', '<?php echo $data->adminid;?>','<?php echo Yii::$app->request->getCsrfToken();?>')">删除</a>
                        </td>
                    </tr>
                    <!-- row -->
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
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->