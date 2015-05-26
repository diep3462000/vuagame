<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtManageSerialCode/assets') ?>
<?php include_partial('vtManageSerialCode/header') ?>



<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtManageSerialCode/list_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>
                <div class="span12">

<!--             <div class="span6">
                <div id="piechart_revenue" style="width: 600px; height: 280px; text-align: center;"></div>
            </div>
            <div class="span6">
                <div id="piechart_request" style="width: 600px; height: 280px; top: -240px; left: 700px;right: 20px;"></div>
            </div> -->
        </div>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            
            <div class="span12">
            <h1 style="display: inline"><?php echo __('VtManageSerialCode List', array(), 'messages') ?></h1>
            </div>
            <div class="row-fluid">
                <div class="span6">
                                  <?php include_partial('vtManageSerialCode/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
                                </div>
                <div class="span6">
                    <div id="piechart_3d1" style="width: 600px; height: 280px; top: -240px;"></div>
                </div>
                <div class="span3">
                    <div class="pull-right"><?php include_partial('vtManageSerialCode/list_actions', array('helper' => $helper)) ?></div>
                </div>
            </div>
            

            <?php include_partial('vtManageSerialCode/flashes') ?>
            
            <div id="sf_admin_header">
                <?php include_partial('vtManageSerialCode/list_header', array('pager' => $pager)) ?>
            </div>

            <div id="sf_admin_content">
                                    <form class="form-inline" id="list-form" action="<?php echo url_for('vt_serial_code_collection', array('action' => 'batch')) ?>" method="post">
                
                <?php include_partial('vtManageSerialCode/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

                <div>
                    <?php include_partial('vtManageSerialCode/list_batch_actions', array('helper' => $helper)) ?>
                </div>
                                    </form>
                
                <form class="form-inline" method="get" action="<?php echo url_for('vt_serial_code') ?>">
                    <div class="well pull-right">
                      <?php echo __('Số bản ghi/trang: ')?>
                        <?php $select = new sfWidgetFormChoice(array(
                                        'multiple' => false,
                                        'expanded' => false,
                                        'choices' => array('10' => __('10', null, 'tmcTwitterBootstrapPlugin'), 20 => 20, 30 => 30, 50 => 50, 100 => 100)
                                    ),
                                    array('class' => 'input-medium')); echo $select->render('max_per_page', $sf_user->getAttribute('vtManageSerialCode.max_per_page', null, 'admin_module')) ?>
                        <input type="submit" class="btn btn-inverse btn-small" value="<?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?>" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>

            <?php include_partial('vtManageSerialCode/list_footer', array('pager' => $pager)) ?>
        </div>
    </div>
</div>

<?php include_partial('vtManageSerialCode/footer') ?>
<script type="text/javascript" src="/css/jsapi.css"></script>
<!--<script type="text/javascript" >-->
<!--    google.load("visualization", "1", {packages:["corechart"]});-->
<!--    google.setOnLoadCallback(drawChart);-->
<!--    function drawChart() {-->
<!--        //Hình 2: Thông tin về developer-->
<!--        var formatter = new google.visualization.NumberFormat({-->
<!--            pattern: '###,###'-->
<!--        });-->
<!--        var array_developer = new Array(['Task', 'Tiền thẻ nạp']);-->
<!--        --><?php //if($money_user) {?>
//        array_developer.push(['Sử dụng', <?php //echo $money_user['1']['sum_money'];?>//]);
//        array_developer.push(['Chưa sử dụng', <?php //echo $money_user['0']['sum_money'];;?>//]);
//        <?php //}?>
//        var data_developer = google.visualization.arrayToDataTable(array_developer);
//        formatter.format(data_developer, 1);
//        var options_developer = {
//            title: 'Tiền thẻ nạp',
//            is3D: true
//        };
//        var chart_developer = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
//        chart_developer.draw(data_developer, options_developer);
//
//    }
//</script>