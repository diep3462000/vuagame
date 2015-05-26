<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 6/17/14
 * Time: 10:18 AM
 * To change this template use File | Settings | File Templates.
 */
$user = sfContext::getInstance()->getUser();

$mobileType = ($user->isPrePaid());
?>
<div class='mod-item'>
    <h3 class="mod-h3-header bg-black"> <a href="javascript:void(0)" class="header-title"><?php echo __('tra cứu cước') ?></a></h3>
    <ul>
        <?php if (!$mobileType) { ?>
            <li><a href="<?php echo url_for1('page_sc_pos_mobile') ?>"><?php echo __('Tra cước Di động') ?></a></li>
            <?php
        } else {
            ?>
            <li><a href="<?php echo url_for1('page_sc_pre_mobile') ?>"><?php echo __('Tra cước Di động') ?></a></li>
        <?php } ?>
        <li><a href="<?php echo url_for1('page_sc_tra_cuoc_dcom') ?>"><?php echo __('Tra cước D-com trả sau') ?></a>
        </li>
        <?php if (!$mobileType) { ?>
            <li><a
                    href="<?php echo url_for1('page_sc_tra_cuoc_homephone') ?>"><?php echo __('Tra cước Homephone') ?></a>
            </li>
        <?php } else { ?>
            <li><a
                    href="<?php echo url_for1('page_sc_tra_cuoc_homephone') ?>"><?php echo __('Tra cước Homephone') ?></a>
            </li>
        <?php } ?>
        <li><a
                href="<?php echo url_for1('page_sc_tra_cuoc_adsl') ?>"><?php echo __('Tra cước ADSL/FTTH/NextTV') ?></a>
        </li>
        <li><a href="<?php echo url_for1('page_sc_tra_cuoc_pstn') ?>"><?php echo __('Tra cước PSTN') ?></a></li>
    </ul>
</div>


<div class='mod-item'>
    <h3 class="mod-h3-header bg-brown"> <a href="" class="header-title"><?php echo __('thanh toán cước') ?></a></h3>
    <ul>
        <li><a
                href="<?php echo url_for1('page_sc_nap_tien') ?>"><?php echo __('Thanh toán cước bằng thẻ cào') ?></a>
        </li>
        <li><a
                href="<?php echo url_for1('page_sc_nap_tien_online') ?>"><?php echo __('Thanh toán cước trực tuyến') ?></a>
        </li>
        <li><a href="<?php echo url_for1('page_tbc') ?>"><?php echo __('Đăng ký nhận thông báo cước') ?></a></li>
        <!--            <li><a href="--><?php //echo url_for1('page_tbc')           ?><!--">-->
        <?php //echo __('Thay đổi thông báo cước') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Hướng dẫn thanh toán cước trả sau') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Thay đổi hạn mức sử dụng') ?><!--</a></li>-->
        <li><a
                href="<?php echo url_for1('page_sc_nap_tien') . '?act=list' ?>"><?php echo __('Lịch sử nạp thẻ') ?></a>
        </li>

        <li><a
                href="<?php echo url_for1('page_sc_selfcareQuotaMax') . '?act=list' ?>"><?php echo __('Thay đổi hạn mức sử dụng') ?></a>
        </li>
    </ul>
</div>


<div class='mod-item'>
    <h3 class="mod-h3-header bg-brown"> <a href="javascript:void(0)" class="header-title"><?php echo __('thông tin thuê bao') ?></a></h3>
    <ul>
        <li><a
                href="<?php echo url_for1('page_sc_tttaikhoan_tra_truoc') ?>"><?php echo __('Thông tin Thuê bao trả trước') ?></a>
        </li>
        <li><a
                href="<?php echo url_for1('page_sc_tttaikhoan') ?>"><?php echo __('Thông tin Tài khoản trả trước') ?></a>
        </li>

        <li><a
                href="<?php echo url_for1('page_sc_tra_cuu_thong_tin_pin_puk') ?>"><?php echo __('Tra cứu thông tin PIN,  PUK của SIM') ?></a>
        </li>
    </ul>
</div>

<div class='mod-item'>
    <h3 class="mod-h3-header bg-brown"> <a href="" class="header-title"><?php echo __('đăng ký dịch vụ') ?></a></h3>
    <ul>
        <li><a href="<?php echo url_for1('page_sc_dang_ky_truc_tuyen_dich_vu_gtgt') ?>"><?php echo __('Đăng ký trực tuyến dịch vụ GTGT') ?></a></li>




        <li><a href="<?php echo url_for1('page_sc_roaming') ?>"><?php echo __('Đăng ký Roaming') ?></a></li>
        <li><a href="<?php echo url_for1('page_sc_thoai_quoc_te') ?>"><?php echo __('Thoại quốc tế') ?></a></li>
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Đăng ký thoại Quốc tế') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Đăng ký dịch vụ Mobile Internet') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Đăng ký dịch vụ GTGT') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Đăng ký lắp đặt dịch vụ cố định') ?><!--</a></li>-->
        <li><a
                href="<?php echo url_for1('page_sc_dich_vu_allblocking') ?>"><?php echo __('Đăng ký All blocking') ?></a>
        </li>
        <li><a href="<?php echo url_for1('page_sc_dich_vu_whitelist') ?>"><?php echo __('Đăng ký White list') ?></a>
        </li>
        <li><a href="<?php echo url_for1('page_sc_homenumber') ?>"><?php echo __('Đăng ký số Home number') ?></a>
        </li>
        <li><a
                href="<?php echo url_for1('page_sc_dang_ki_goi_nhom_sea') ?>"><?php echo __('Đăng ký gọi nhóm Sea+') ?></a>
        </li>
        <li><a
                href="<?php echo url_for1('page_sc_dang_ki_goi_nhom_student') ?>"><?php echo __('Đăng ký gọi nhóm Student') ?></a>
        </li>
        <li><a href="<?php echo url_for1('page_sc_ishare') ?>"><?php echo __('Đăng ký I-share') ?></a></li>
        <li><a href="<?php echo url_for1('page_sc_nhap_nhom_family') ?>"><?php echo __('Đăng ký nhóm Family') ?></a>
        </li>
    </ul>
</div>

<div class='mod-item'>
    <h3 class="mod-h3-header bg-brown"> <a href="" class="header-title"><?php echo __('tiện ích') ?></a></h3>
    <ul>
        <li><a href="<?php echo url_for1('page_sc_sendsms') ?>"><?php echo __('Gửi tin nhắn SMS') ?></a></li>
        <li><a
                href="<?php echo url_for1('page_sc_danh_sach_dich_vu_vas') ?>"><?php echo __('Tra cứu dịch vụ GTGT') ?></a>
        </li>
        <li><a
                href="<?php echo url_for1('page_sc_tra_cuu_diem_tich_luy') ?>"><?php echo __('Tra cứu điểm tích lũy') ?></a>
        </li>

        <li><a href="<?php echo url_for1('page_sc_reset_zone_hp_index') ?>"><?php echo __('Reset zone Homephone') ?></a></li>

        <li><a
                href="<?php echo url_for1('page_sc_chuyen_doi_goi_cuoc_tra_truoc') ?>"><?php echo __('Chuyển đổi gói cước trả trước') ?></a>
        </li>
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Chuyển đổi gói cước cố định') ?><!--</a></li>-->
        <li><a
                href="<?php echo url_for1('page_sc_tra_cuu_han_su_dung_kit') ?>"><?php echo __('Tra cứu hạn sử dụng bộ Kit') ?></a>
        </li>
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Chuyển đổi khuyến mại') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Reset zone Homephone') ?><!--</a></li>-->
        <!--            <li><a href="--><?php //echo url_for1('page_sc_danh_sach_dich_vu_vas')           ?><!--">-->
        <?php //echo __('Tra cứu số chọn') ?><!--</a></li>-->
        <li><a href="<?php echo url_for1('page_sc_CSKH') ?>"><?php echo __('Hướng dẫn xử lý sự cố') ?></a></li>
        <li><a
                href="<?php echo url_for1('page_sc_guide_setup_data') ?>"><?php echo __('Hướng dẫn cài đặt DATA') ?></a>
        </li>
    </ul>
</div>

