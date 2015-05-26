<div class="content-2">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
        <h3 class="vtt-title-black"><?php echo __('Thông tin tài khoản') ?></h3>
    </div>
</div>
<div class="form-group vtt-center">
    <?php if ($sf_user->hasFlash('notice')): ?>
        <p style="color: red; font-weight: bold"><?php echo __($sf_user->getFlash('notice'), null, 'tmcTwitterBootstrapPlugin') ?></p>
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Tên đăng nhập') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['username']; ?>
                    <?php if ($form['username']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['username']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Ảnh đại diện') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['avatar']; ?>
                    <?php if ($form['avatar']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['avatar']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Email') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['email']; ?>
                    <!--                                    <input type="text" name="" id="" class="form-control vtt-100-percent">-->
                    <?php if ($form['email']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['email']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Giới tính') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['sex']; ?>
                    <?php if ($form['gender']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['sex']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Ngày sinh (ngày-tháng-năm)') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php
                    echo $form['date_birthday'];
                    echo $form['month_birthday'];
                    echo $form['year_birthday'];
                    if ($form['date_birthday']->hasError()) {
                        echo '<span class="help-inline">' . $form['date_birthday']->renderError() . '</span>';
                    }
                    if ($form['month_birthday']->hasError()) {
                        echo '<span class="help-inline">' . $form['month_birthday']->renderError() . '</span>';
                    }
                    if ($form['year_birthday']->hasError()) {
                        echo '<span class="help-inline">' . $form['year_birthday']->renderError() . '</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Địa chỉ') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['address']; ?>
                    <?php if ($form['address']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['address']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Số điện thoại') ?> <span class="required">(*)<span></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php echo $form['mobile']; ?>
                    <?php if ($form['mobile']->hasError()): ?>
                        <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['mobile']->getError(); ?></li>
                            </ul>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row vtt-form-space">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"><?php echo __('Mã xác nhận'); ?> <span class="required">(*)<span></div>
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
                <div class="row vtt-form-space">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vtt-form-title"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <?php echo $form['_csrf_token'] ?>
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
<script type="text/javascript">
    $("#vtp_complaints_gender").val('<?php echo (int)($publisher->gender) ?>');
</script>
</div>
</div>