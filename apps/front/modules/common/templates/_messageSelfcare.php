<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 9/1/14
 * Time: 8:51 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript">
    var cs_check_mobile='<?php echo __('Bạn phải nhập vào số điện thoại!'); ?>';
    var cs_check_mobile_group='<?php echo __('Số này đã có trong danh sách nhóm!'); ?>';
    var cs_check_captcha='<?php echo __('Bạn phải nhập vào mã xác nhận'); ?>';
    var cs_check_otp='<?php echo __('Bạn phải nhập mã xác nhận qua tin nhắn!'); ?>';
    var cs_check_select_mobile='<?php echo __('Vui lòng chọn ít nhất một số để xóa.'); ?>';
    var cs_check_mobile_length_15='<?php echo __('Số điện thoại phải là số Viettel và không quá 15 kí tự.'); ?>';
    var cs_check_mobile_regex='<?php echo __('Số đăng ký phải không bao gồm chữ hoặc ký tự đặc biệt, Quý khách vui lòng nhập lại.'); ?>';
    var cs_check_hp='<?php echo __('Số đăng ký không phải là số cố định, Quý khách vui lòng nhập lại.'); ?>';
    var cs_check_remobile='<?php echo __('Bạn chưa nhập lại số điện thoại'); ?>';
    var cs_check_same_mobile='<?php echo __('Số điện thoại không giống nhau'); ?>';
    var enter_serial_sim='<?php echo __('Nhập serial sim'); ?>';
    var enter_mobile='<?php echo __('Nhập số điện thoại'); ?>';
    var enter_kind_mobile='<?php echo __('Bạn phải nhập loại điện thoại'); ?>';
    var check_mobile_new='<?php echo __('Bạn chưa nhập số điện thoại mới'); ?>';
    var check_remobile_new='<?php echo __('Bạn chưa nhập lại số điện thoại mới'); ?>';
    var check_mobile_isset_group='<?php echo __('Số đăng ký đã có trong danh sách hiện tại'); ?>';
    var check_enter_remobile='<?php echo __('Số điện thoại nhập lại không khớp'); ?>';
    var enter_password='<?php echo __('Bạn phải nhập vào mật khẩu'); ?>';
    var enter_password_old='<?php echo __('Bạn phải nhập vào mật khẩu cũ'); ?>';
    var enter_password_new='<?php echo __('Bạn phải nhập vào mật khẩu mới'); ?>';
    var is_check_password_regex='<?php echo __('Mật khẩu I- share phải đúng 8 ký tự số'); ?>';
    var is_enter_repassword='<?php echo __('Bạn chưa nhập lại mật khẩu'); ?>';
    var is_check_same_password='<?php echo __('Mật khẩu không giống nhau'); ?>';
    var is_check_mobile='<?php echo __('Số điện thoại không hợp lệ'); ?>';
    var pay199_check_pincode='<?php echo __('Mã thẻ cào không được để trống'); ?>';
    var pay199_check_pincode_regex='<?php echo __('Mã thẻ cào phải là xâu ký tự số'); ?>';
    var pay199_check_pincode_regex_13='<?php echo __('Mã thẻ cào phải là xâu 13 ký tự'); ?>';
    var pay199_enter_mobile_recieve='<?php echo __('Vui lòng nhập thuê bao nhận!'); ?>';
    var roaming_confirm='<?php echo __('Quý khách có đồng ý hủy dịch vụ Chuyển vùng Quốc tế hay không?'); ?>';
    var roaming_confirm_cancel='<?php echo __('Yêu cầu của quý khách đã được hủy bỏ. Xin cảm ơn!'); ?>';
    var sea_confirm_del='<?php echo __('Vui lòng chọn ít nhất một số để xóa.'); ?>';
    var sendsms_enter_msisdn_recieve='<?php echo __('Vui lòng nhập số người nhận!'); ?>';
    var sendsms_required_recieve='<?php echo __('Quý khách chỉ được nhập tối đa 1 số trong 1 lần gửi'); ?>';
    var sendsms_required_recieve_1='<?php echo __('Số người nhận không được vượt quá 1!'); ?>';
    var sendsms_regex_recieve='<?php echo __('Số điện thoại Quý khách nhập vào không đúng quy định.'); ?>';
    var sendsms_check_message='<?php echo __('Vui lòng nhập nội dung tin nhắn'); ?>';
    var tbc_required_email='<?php echo __('Địa chỉ mail không chính xác'); ?>';
    var tbc_invalid_email='<?php echo __('Bạn chưa nhập địa chỉ email'); ?>';
    var tbc_required_email_100='<?php echo __('Địa chỉ email không quá 100 kí tự'); ?>';
    var tbc_required_same_email_isset='<?php echo __('Địa chỉ mới không được trùng địa chỉ hiện tại. Vui lòng nhập lại'); ?>';
    var tbc_required_address='<?php echo __('Bạn chưa nhập địa chỉ nhà'); ?>';
    var tbc_invalid_address_100='<?php echo __('Địa chỉ nhà không được quá 200 kí tự'); ?>';
    var tbc_invalid_address_new='<?php echo __('Địa chỉ mới không được trùng địa chỉ hiện tại. Vui lòng nhập lại'); ?>';
    var tqt_confirm_reg='<?php echo __('Quý khách có chắc là muốn đăng ký dịch vụ Thoại Quốc tế không?'); ?>';
    var tqt_confirm_unreg='<?php echo __('Quý khách có đồng ý hủy dịch vụ Thoại Quốc tế hay không?'); ?>';
    var tttb_emter_mob1='<?php echo __('Bạn phải nhập vào số điện thoại liên lạc gần nhất 1'); ?>';
    var tttb_emter_mob2='<?php echo __('Bạn phải nhập vào số điện thoại liên lạc gần nhất 2'); ?>';
    var tttb_emter_mob3='<?php echo __('Bạn phải nhập vào số điện thoại liên lạc gần nhất 3'); ?>';
    var tttb_emter_mscn_code='<?php echo __('Bạn phải nhập vào mã số cá nhân'); ?>';
    var whitelist_emter_mob_add_min_1='<?php echo __('Vui lòng chọn ít nhất một số để thêm.'); ?>';
    var whitelist_emter_mob_add_max_10='<?php echo __('Vui lòng chọn nhiều nhất 10 số để thêm.'); ?>';
    var sendOTPSuccess='<?php echo __('Mã xác thực đã được gửi về số điện thoại. Quý khách vui lòng chờ tin nhắn thông báo từ hệ thống.'); ?>';
</script>