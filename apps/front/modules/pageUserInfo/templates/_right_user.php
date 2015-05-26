<div class="right-user">
    <h3>Thay đổi hồ sơ</h3>
    <form action="" method="post" id="frm-register" accept-charset="utf-8" class="user-form">
        <input type="hidden" name="tab" value="edit">

        <label class="mess">
            <?php if ($sf_user->hasFlash('notice')): ?>
                <p class="err_mess"><?php echo __($sf_user->getFlash('notice'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('success')): ?>
                <p class="err_mess"><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></p>
            <?php endif; ?>
        </label>
        <strong>Thông tin cá nhân <img src="/skin/images/infoline.png" alt=""></strong>
        <div class="line">
            <span>Tên hiển thị</span>
            <?php echo $form['fullname']?>
            <?php if ($form['fullname']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['fullname']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>
        <div class="line">
            <span>Năm sinh</span>
            <?php echo $form['birth']?>
            <?php if ($form['birth']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['birth']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>

        <div class="line">
            <span>Giới tính</span>
<!--            <label><input type="radio" name="sex" id="1" value="1" class="validate[required] radio"> Nam</label>-->
<!--            <label><input type="radio" name="sex" id="2" value="0" class="validate[required] radio" checked=""> Nữ</label>-->
            <label><?php echo $form['sex']?>
                <?php if ($form['sex']->hasError()): ?>
                    <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['sex']->getError(); ?></li>
                            </ul>
                        </span>
                <?php endif; ?>
            </label>
        </div>
        <label class="mess">
            <font size="3">Bạn chưa có số CMND?</font>
            <p>Nếu bạn chưa có số CMND thì bạn sẽ không có cơ hội tham gia các sự kiện thi đấu hoặc không được nhận những món quà hiện vật từ ban tổ chức</p>
        </label>
        <div class="line">
            <span>Số CMND</span>
            <?php echo $form['identity']?>
            <?php if ($form['identity']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['identity']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>

        <div class="line">
            <span>Email <b>(*)</b></span>
            <?php echo $form['email']?>
            <?php if ($form['email']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['email']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>
        </div>

        <div class="line">
            <span>Số điện thoại <b>(*)</b></span>
            <?php echo $form['mobile']?>
            <?php if ($form['mobile']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['mobile']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>

        </div>

        <div class="line">
            <span>Địa chỉ</span>
            <?php echo $form['address']?>
            <?php if ($form['address']->hasError()): ?>
                <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['address']->getError(); ?></li>
                            </ul>
                        </span>
            <?php endif; ?>

        </div>
            <?php echo $form['_csrf_token'] ?>
            <?php if ($form['_csrf_token']->hasError()): ?>
                <span class='error_list'><?php echo __('Token không hợp lệ.') ?></span>
            <?php endif; ?>
        <div class="line">
            <center><button type="submit">Cập nhật</button></center>
        </div>
    </form>				
</div>

<script type="text/javascript">
    $("#user_register_fullname").val('<?php echo $user_details->fullname ?>');
    $("#user_register_email").val('<?php echo $user_details->email ?>');
    $("#user_register_address").val('<?php echo $user_details->address ?>');
    $("#user_register_birth").val('<?php echo $user_details->birth ?>');
    $("#user_register_identity").val('<?php echo $user_details->identity ?>');
    $("#user_register_mobile").val('<?php echo $user_details->mobile ?>');

</script>