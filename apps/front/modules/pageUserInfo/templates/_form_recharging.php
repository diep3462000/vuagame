<div class="content-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                        <h3 class="vtt-title-black"><?php echo __('Nạp tiền vào tài khoản') ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo __('Số dư tài khoản') ?></div>
                            <div class="panel-body vtt-center">
                                <?php echo __('Số dư tài khoản: ')?> <h4><?php echo __(number_format($money, 0, '.', ',')) . 'VNĐ'?></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo __('Nạp thêm tiền') ?></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p><?php echo __('Bạn vui lòng nhập seri và mã thẻ dưới lớp tráng bạc trên thẻ cào Viettel.')?></p>
                                        <p><?php echo __('Nếu là thuê bao BankPlus, bạn có thể mua thẻ cào qua hệ thống BankPlus. (Xem hướng dẫn tại đây).') ?></p>
                                        <p></p>
                                        <p><?php echo __('Vui lòng nhập chính xác mã số in trên thẻ. Hệ thống chỉ cho phép nhập sai không quá 3 lần.') ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <div class="form-group vtt-center">
                                            <?php if ($sf_user->hasFlash('notice')): ?>
                                                <p style="color: red; font-weight: bold"><?php echo __($sf_user->getFlash('notice'), null, 'tmcTwitterBootstrapPlugin') ?></p>
                                            <?php endif; ?>
                                            <?php if ($sf_user->hasFlash('success')): ?>
                                                <p style="color: #009591; font-weight: bold;"><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <form action="" method="post">
                                            <div class="row vtt-form-space">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <?php echo __('Số Seri') ?>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <?php echo $form['seria']?>
                                                    <?php if ($form['seria']->hasError()): ?>
                                                        <span class='help-inline'>
                                                            <ul class="error_list">
                                                            <li><?php echo $form['seria']->getError(); ?></li>
                                                        </ul>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row vtt-form-space">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <?php echo __('Mã thẻ Viettel') ?>

                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <?php echo $form['card_code']?>
                                                    <?php if ($form['card_code']->hasError()): ?>
                                                        <span class='help-inline'>
                                                            <ul class="error_list">
                                                                <li><?php echo $form['card_code']->getError(); ?></li>
                                                            </ul>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row vtt-form-space">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <?php echo __('Mã kiểm tra') ?>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <?php echo $form['captcha']?>
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
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <input type="submit" name="" id="" class="btn btn-primary" value="<?php echo __('Xác nhận nạp') ?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>