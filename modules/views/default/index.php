
<!-- main container -->
<div class="content">

    <div class="container-fluid">

        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">2457</span>
                        个访客
                    </div>
                    <span class="date">今天</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">3240</span>
                        个用户
                    </div>
                    <span class="date">2016年3月</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">322</span>
                        个订单
                    </div>
                    <span class="date">本周</span>
                </div>
                <div class="span3 stat last">
                    <div class="data">
                        <span class="number">$2,340</span>
                        成交金额
                    </div>
                    <span class="date">最近30天</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->

        <div id="pad-wrapper">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row-fluid chart">
                <h4>
                    统计
                    <div class="btn-group pull-right">
                        <button class="glow left">天</button>
                        <button class="glow middle active">月</button>
                        <button class="glow right">年</button>
                    </div>
                </h4>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div>
            <!-- end statistics chart -->

            <!-- table sample -->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-products section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>商品列表</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select>
                                <option />过滤用户
                                <option />最近30天注册的
                                <option />已激活的用户
                            </select>
                        </div>
                        <input type="text" class="search" />
                        <a class="btn-flat new-product" href="<?php echo \yii\helpers\Url::to(['product/add'])?>">+ 添加商品</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                商品名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品描述
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品状态
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?foreach($models as $pro){?>
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="http://<?=$pro->cover;?>" />
                                </div>
                                <a href="#"><?=$pro->title ?> </a>
                            </td>
                            <td class="description">
                               <?=$pro->descr?>
                            </td>
                            <td>
                                <span class="label label-success"><?=($pro->ison==1) ? '已上架': '下架'?></span>
                                <ul class="actions">
                                    <li>
                                         <a href="<?=\yii\helpers\Url::to(['product/edit','id'=>$pro->productid])?>" title="编辑"><i class="table-edit"></i></a>
                                    </li>

<!--                                    <li>-->
<!--                                        <a href="--><?//=\yii\helpers\Url::to(['product/on','id'=>$pro->productid])?><!--"><i class="table-settings"></i></a>-->
<!--                                    </li>-->
                                    <li>
                                        <a href="<?=\yii\helpers\Url::to(['product/del','id'=>$pro->productid])?>" title="删除"><i class="table-delete"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                 <?=\yii\widgets\LinkPager::widget([
                                'pagination'=>$pages,
                             'nextPageLabel' => '下一页',
                              'prevPageLabel' => '上一页',
                                'firstPageLabel' => '首页',
                                'lastPageLabel' => '尾页',
                                'hideOnSinglePage'=>false,


                        ])?>

                </div>

            </div>
            <!-- end table sample -->
        </div>
    </div>
</div>







