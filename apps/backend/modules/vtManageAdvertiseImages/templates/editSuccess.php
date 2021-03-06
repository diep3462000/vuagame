<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtManageAdvertiseImages/assets') ?>
<?php include_partial('vtManageAdvertiseImages/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtManageAdvertiseImages/edit_sidebar', array('configuration' => $configuration, 'vtp_advertise_image' => $vtp_advertise_image)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            <h1><?php echo __('Chỉnh sửa hình ảnh', array(), 'messages') ?></h1>

            <?php include_partial('vtManageAdvertiseImages/flashes') ?>

            <div id="sf_admin_header">
                <?php include_partial('vtManageAdvertiseImages/form_header', array('vtp_advertise_image' => $vtp_advertise_image, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>

            <div id="sf_admin_content">
                <?php include_partial('vtManageAdvertiseImages/form', array('vtp_advertise_image' => $vtp_advertise_image, 'advertise'=>$advertise, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

                <?php if (in_array('version', $fields->getRawValue())): ?>
                    <?php include_partial('versions', array('vtp_advertise_image' => $vtp_advertise_image->getRawValue(), 'fields' => $fields)); ?>
                <?php endif; ?>
            </div>

            <div id="sf_admin_footer">
                <?php include_partial('vtManageAdvertiseImages/form_footer', array('vtp_advertise_image' => $vtp_advertise_image, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>

<?php include_partial('vtManageAdvertiseImages/footer') ?>