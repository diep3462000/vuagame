<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtManageSerialCode/assets') ?>
<?php include_partial('vtManageSerialCode/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtManageSerialCode/new_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            <h1><?php echo __('New VtManageSerialCode', array(), 'messages') ?></h1>

            <?php include_partial('vtManageSerialCode/flashes') ?>

            <div id="sf_admin_header">
                <?php include_partial('vtManageSerialCode/form_header', array('vt_serial_code' => $vt_serial_code, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>

            <div id="sf_admin_content">
                <?php include_partial('vtManageSerialCode/form', array('vt_serial_code' => $vt_serial_code, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            </div>

            <div id="sf_admin_footer">
                <?php include_partial('vtManageSerialCode/form_footer', array('vt_serial_code' => $vt_serial_code, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>

<?php include_partial('vtManageSerialCode/footer') ?>