<div class="left-user">
    <span class="title-user"><?php echo $g_user->getUsername();?></span>
    <img src="/media/newAvatars/f/avatar_1.png" width="100" height="100" class="large-img" alt="">
    <span class="over-info"><?php echo $g_user->getNameLevel()?></span>
    <span class="over-info"><?php echo $g_user->getGameCash()?> Mi</span>
    <ul class="user-menu">
        <li><a href="<?php echo url_for("user_info")?>" class="bck-1">Thông tin cá nhân</a></li>
        <li><a href="<?php echo url_for("user_cash")?>" class="bck-2">Nạp Mi</a></li>
        <li><a href="<?php echo url_for("user_change_avatar")?>" class="bck-3">Thay avatar</a></li>
        <li><a href="<?php echo url_for("user_shop")?>"" class="bck-4">Cửa hàng</a></li>
        <li><a href="<?php echo url_for("user_friends")?>"" class="bck-5">Quản lý bạn bè</a></li>
        <li><a href="<?php echo url_for("user_transaction")?>" class="bck-6">Thông tin giao dịch</a></li>
        <!--<li><a href="http://vuabai888.com/user/info/gift" class="bck-7">Quà tặng</a></li>-->
        <li><a href="http://vuabai888.com/user/detail" class="bck-7">Thành tích</a></li>
        <li><a href="<?php echo url_for("user_invite")?>"" class="bck-8">Link giới thiệu</a></li>
        <li><a href="<?php echo url_for("user_change_pass")?>"" class="bck-9">Thay đổi mật khẩu</a></li>
        <li><a href="http://vuabai888.com/user/logout" class="bck-10">Thoát</a></li>
    </ul>				</div>