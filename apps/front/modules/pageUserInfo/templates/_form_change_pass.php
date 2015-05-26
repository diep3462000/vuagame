<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 vtt-center">
                <h3 class="vtt-title-black"><?php echo __('Thay đổi mật khẩu') ?></h3>
            </div>
        </div>
        <div class="form-group vtt-center">
            <?php if ($sf_user->hasFlash('error')): ?>
                <p style="color: #bf0000; font-weight: bold;"><?php echo __($sf_user->getFlash('error'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('success')): ?>
                <p style="color: #009591; font-weight: bold;"><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="" method="post">
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Mật khẩu cũ') ?> <span class="required">(*)<span></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php echo $form['password']; ?>
                            <?php if ($form['password']->hasError()): ?>
                                <span class='help-inline'>
                                    <ul class="error_list">
                                        <li><?php echo $form['password']->getError(); ?></li>
                                    </ul>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Mật khẩu mới (8-32 ký tự)') ?> <span class="required">(*)<span></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php echo $form['new_password']; ?>
                            <?php if ($form['new_password']->hasError()): ?>
                                <span class='help-inline'>
                                    <ul class="error_list">
                                        <li><?php echo $form['new_password']->getError(); ?></li>
                                    </ul>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Nhập lại mật khẩu mới') ?> <span class="required">(*)<span></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php echo $form['repeat_password']; ?>
                            <?php if ($form['repeat_password']->hasError()): ?>
                                <span class='help-inline'>
                                    <ul class="error_list">
                                        <li><?php echo $form['repeat_password']->getError(); ?></li>
                                    </ul>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Mã xác nhận') ?> <span class="required">(*)<span></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php echo $form['captcha']; ?>
                            <?php if ($form['captcha']->hasError()): ?>
                                <span class='help-inline'>
                                    <ul class="error_list">
                                        <li><?php echo $form['captcha']->getError(); ?></li>
                                    </ul>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php echo $form['_csrf_token']?>
                            <?php if ($form['_csrf_token']->hasError()): ?>
                                <span class='error'><?php echo __('Token không hợp lệ.') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row vtt-form-space">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="submit" name="" id="" class="btn btn-primary" value="<?php echo __('Cập nhật') ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
        </div>
    </div>
</div>