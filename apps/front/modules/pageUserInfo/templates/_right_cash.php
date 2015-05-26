<div class="right-user">
    <h3>Hướng dẫn nạp Mi</h3>
    <p>
        <img alt="" src="http://migamevn.com/manager_event/upload/plugins/images/sms.png" style="width: 148px; height: 30px;"></p>
    <p>
        <span style="color: rgb(255, 240, 245);">Bạn có thể dễ dàng nạp Mi cho tài khoản của mình với cú pháp như sau:</span></p>
    <p>
        <span style="color: rgb(255, 240, 245);">Soạn&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>"MI tàikhoản"</strong></span>&nbsp;<span style="color: rgb(255, 240, 245);">gửi</span><strong><span style="color: rgb(255, 240, 245);">&nbsp;</span><span style="color: rgb(255, 165, 0);">8791</span></strong>&nbsp;<span style="color: rgb(255, 240, 245);">(Phí dịch vụ 15.000 VNĐ/sms)</span></p>
    <p>
        <span style="color: rgb(255, 240, 245);">Hoặc soạn:</span>&nbsp;<span style="color: rgb(255, 165, 0);"><strong>"MI tàikhoản"</strong></span>&nbsp;<span style="color: rgb(255, 240, 245);">gửi&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>8691</strong></span><span style="color: rgb(255, 240, 245);">&nbsp;(Phí dịch vụ 10.000 VNĐ/sms)</span></p>
    <p>
        <span style="color:#fff0f5;">Ví dụ: tài khoản (username) của bạn là:&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>kitty_dethuong</strong></span>&nbsp;<span style="color:#fff0f5;">soạn&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>MI kitty_dethuong</strong></span>&nbsp;<span style="color:#fff0f5;">gửi&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>8791</strong></span>&nbsp;<span style="color:#fff0f5;">hoặc gửi&nbsp;</span><span style="color: rgb(255, 165, 0);"><strong>8691</strong></span></p>
    <p>
        <span style="color: rgb(255, 240, 245);">- Bạn chỉ có thể gửi tối đa 09 tin nhắn/ngày</span></p>
    <p>
        <span style="color: rgb(255, 240, 245);">- Hai tin liên tiếp cách nhau 01 phút.</span></p>
    <p>
        <span style="color: rgb(255, 240, 245);">Hệ thống Migame sẽ gửi tin nhắn xác nhận việc nạp tài khoản của bạn.</span></p>
    <p style="text-align: center;">
        <span style="color: rgb(255, 165, 0);"><strong>NẠP MI BẰNG THẺ CÀO (SỐ Mi NHẬN ĐƯỢC GẤP 1,7 - 3 LẦN SO VỚI NẠP Mi BẰNG SMS)</strong></span></p>
    <p style="text-align: center;">
        <img alt="" src="http://migamevn.com/media/plugins/images/list-new%281%29.png" style="width: 500px; height: 260px;"></p>
    <h3>Nạp Mi</h3>
    <form action="" method="post" id="frm-register" accept-charset="utf-8" class="user-form">
        <input type="hidden" name="tab" value="cash">

        <label class="mess">
            <?php if ($sf_user->hasFlash('notice')): ?>
                <p class="err_mess"><?php echo __($sf_user->getFlash('notice'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('success')): ?>
                <p class="err_mess"><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
        </label>
        <div class="line">
            <span>Loại thẻ:</span>

            <?php echo $form['cash_type']?>
            <?php if ($form['cash_type']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['cash_type']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>

        <div class="line">
            <span>Serial thẻ:</span>
<!--            <input type="text" name="epay_serial" class="validate[required]" value="" placeholder="Nhập phần không cào...">-->
            <?php echo $form['epay_serial']?>
            <?php if ($form['epay_serial']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['epay_serial']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>

        <div class="line">
            <span>Mã thẻ:</span>
            <?php echo $form['epay_cardnumber']?>
            <?php if ($form['epay_cardnumber']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['epay_cardnumber']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
<!--            <input type="text" name="epay_cardnumber" class="validate[required]" value="" placeholder="Nhập phần cào trên thẻ...">-->
        </div>

        <div class="line">
            <?php echo $form['_csrf_token']?>
            <?php if ($form['_csrf_token']->hasError()): ?>
            <span class='error'><?php echo __('Token không hợp lệ.') ?></span>
            <?php endif; ?>
            <center><button type="submit">Cập nhật</button></center>
        </div>
    </form>				</div>





