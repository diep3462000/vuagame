<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/30/14
 * Time: 11:30 AM
 * To change this template use File | Settings | File Templates.
 */
$urlImage='/img/slide/slide-2.jpg';
if(count($advertise)>0){
    $type=$advertise[0]['view_type'];
    if($type== 0 || $type = 1){
        $advertiseImage=$advertise[0]['AdvertiseImage'];
        if($advertiseImage[0]['file_path']!=''){
            $urlImage= sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[0]['file_path'];
        }
    }
}

?>
<div id="slide-2">
    <div style="background: url(<?php echo $urlImage ?>) center top no-repeat; height: 380px;">
        <div class="container">
            <img id="mobile-2" src="/img/mobile-2.png" alt="mobile" height="380">
            <div id="viettel-account">
                <p class="title"><?php echo __('TÀI KHOẢN VIETTEL') ?> </p>
                <p class="description"><?php echo __('Viettel sẽ dừng gửi Bảng kê chi tiết các cuộc gọi, cước sử dụng dịch vụ trong tháng (Bảng kê chi tiết cước)') ?>.</p>
                <?php if ($isAuth): ?>
                    <a id="logout-viettel" href="javascript:submitLogout()" class="btn" style="width: 155px; text-align: center;"><?php echo __('Thoát' )?></a>
                    <a id="account-viettel" href="<?php echo url_for('update_user') ?>" class="btn" style="width: 155px; text-align: center; margin-left: 42px;"><?php echo __('Tài khoản') ?></a>
                <?php else: ?>
                    <a id="login-viettel" href="#" class="btn"><?php echo __('Đăng nhập tài khoản' )?></a>
                    <a id="register-viettel" href="#" class="btn"><?php echo __('Đăng kí tài khoản') ?></a>
                <?php endif; ?>
                <?php
                    foreach ($account as $item) {
                        $url='#';
                        if($item->getLink()!=''){
                            if(VtHelper::startsWith($item->getLink(),'@')){
                                $url="'http://". $_SERVER['HTTP_HOST']. url_for($item->getLink()) . "'";
                            }else{
                                $url="'".$item->getLink()."'";
                            }
                        }
                        echo '<button type="button" onclick="openLink('.$url.')" class="btn">';
//                        echo '  <a href="' . $url .'">';
                        echo VtHelper::truncate(htmlspecialchars($item->getName()),40);
//                        echo '  </a>';
                        echo '</button>';
                    }
                ?>

            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var urlLogout='<?php echo url_for1('submit_logout'); ?>';
</script>