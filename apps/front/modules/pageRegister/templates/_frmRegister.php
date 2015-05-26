<?php
/**
 * Created by JetBrains PhpStorm.
 * User: conghuyvn8x
 * Date: 2/8/15
 * Time: 10:03 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="gmdt-block border3d0300 bg12 round5 " style="width: 678px; margin-bottom: 0px;">
    <div class="clear ebody overflow" style="padding-top: 0px;">
        <div class="edetail clear left overflow" style="width: 640px;">

            <div class="about-content" style="width: auto;">

                <div class="econtent clear overflow pb30">

                    <div align="center">
                        <h2 style="color: #FF4E00; margin-left: 100px">Đăng kí tài khoản</h2>
                        <!--start signup_form -->
<!--                        <form action="" method="post" id="registerForm" onsubmit="return submitRegister()">-->
                            <?php echo $form->renderHiddenFields(); ?>
                            <span id="errmsg" style="color: red; margin-left: 64px;"></span>
                            <table width="55%" cellspacing="10">
                                <tbody>
                                <tr>
                                    <td>Tên đăng nhập <label style="color: red;">*</label></td>
                                    <td>
                                        <?php echo $form['username'];
                                        if ($form['username']->hasError()) {
                                            echo '<span class="help-inline">' . $form['username']->renderError() . '</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu <label style="color: red;">*</label></td>
                                    <td>
                                        <?php echo $form['password'];
                                        if ($form['password']->hasError()) {
                                            echo '<span class="help-inline">' . $form['password']->renderError() . '</span>';
                                        }
                                        ?>
                                </tr>
                                <tr>
                                    <td>Nhập lại mật khẩu <label style="color: red;">*</label></td>
                                    <td>
                                        <?php echo $form['password_again'];
                                        if ($form['password_again']->hasError()) {
                                            echo '<span class="help-inline">' . $form['password_again']->renderError() . '</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <!--  <tr>
                                                        <td>Họ và tên <label style="color: red;">*</label>
                                                        </td>
                                                        <td><input type="text" name="fullname" style="width: 200px"
                                                                   value="" id="fullname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email <label style="color: red;">*</label></td>
                                                        <td><input type="text" name="email" style="width: 200px"
                                                                   value="" id="email"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số CMT/Hộ chiếu</td>
                                                        <td><input type="text" name="identity" style="width: 200px"
                                                                   value="" id="cmnd"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Địa chỉ</td>
                                                        <td><input type="text" name="address" style="width: 200px"
                                                                   value="" id="adress"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại</td>
                                                        <td><input type="text" name="phone" style="width: 200px"
                                                                   value="" id="phone"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Năm sinh</td>
                                                        <td><input type="text" name="birthday" style="width: 200px"
                                                                   value="" id="birthday"></td>
                                                    </tr>
                                                    -->
                                <tr>
                                    <td colspan="2" align="center">
                                        <?php echo $form['agreeCheck'];
                                        if ($form['agreeCheck']->hasError()) {
                                            echo '<span class="help-inline">' . $form['agreeCheck']->renderError() . '</span>';
                                        }
                                        ?>Tôi đồng ý với các <a
                                        href="http://caygame.net/web/quydinh.html" target="_blank"
                                        style="text-decoration: underline;">điều
                                        khoản sử dụng dịch vụ.</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input id="dang-ky" type="image" src="/theme/images/btn_dangky.png">
                                    </td>
                                </tr>
                                </tbody>
                            </table>

<!--                        </form>-->
                        <script>
                            $("#dang-ky").click(function() {
                                $("#errmsg").text("");
                                var user = $.trim($("#userreg").val());
                                var pass = $.trim($("#passreg").val());
                                var repass = $.trim($("#repassword").val());
                                var fullname = $.trim($("#fullname").val());
                                var email = $.trim($("#email").val());
                                var check = $("#checkbox");
//                                alert(check);
                                var birthday = $.trim($("#birthday").val());
                                var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
                                var characterReg = /^[a-zA-Z0-9_]*$/;
                                var numberReg = /^[0-9]*$/;
                                //alert(check.attr("checked"));
                                var ok = true;
                                if (user == "" || user.length == 0) {
                                    $("#errmsg").text("Tên đăng nhập không được để trống!");
                                    ok = false;
                                }
                                else if (!characterReg.test(user)) {
                                    $("#errmsg").text("Tên đăng nhập không hợp lệ! ");
                                    ok = false;
                                }
                                else if (user == "" || user.length < 3) {
                                    $("#errmsg").text("Tên đăng nhập phải lớn hơn 3 kí tự!")
                                    ok = false;
                                }
                                else if (pass == "" || pass.length == 0) {
                                    $("#errmsg").text("Mật khẩu không được để trống!")
                                    ok = false;
                                }
                                else if (pass.length < 6) {
                                    $("#errmsg").text("Mật khẩu phải lớn hơn 6 kí tự!")
                                    ok = false;
                                }
                                else if (pass != repass) {
                                    $("#errmsg").text("Mật khẩu và mật khẩu nhập lại không giống nhau!");
                                    ok = false;
                                }
                                /* else if(fullname=="" ||fullname==0){
                                 $("#errmsg").text("Họ và tên không được để trống! ") ;
                                 ok=false;
                                 }else if (!emailFilter.test(email)) {
                                 $("#errmsg").text("Email không hợp lệ! ") ;
                                 ok=false;

                                 }else if (!numberReg.test(birthday)) {
                                 $("#errmsg").text("Năm sinh không hợp lệ! ") ;
                                 ok=false;
                                 } */

                                else if (check.attr("checked") != 'checked') {
                                    //else if (check.attr("checked") !="checked") {
                                    $("#errmsg").text("Bạn chưa đồng ý với các điều khoản sử dụng dịch vụ! ");
                                    ok = false;
                                }
                                if (!ok) {
                                    return false;
                                } else {
                                    callRegister(user, pass, repass);
                                }
                            });

                            function callRegister(username, password, repass) {
                                var token = $('#g_register__csrf_token').val();
                                var requestUrl = '<?php echo url_for('@ajax_register') ?>';
                                $.ajax({
                                    async:false,
                                    type:"POST",
                                    url:requestUrl,
                                    data:{username:username, password:password, repass:repass, token:token },
                                    timeout:(5000),
                                    success:function (data) {
                                        var obj = $.parseJSON(data);
                                        var message = obj.errMessage;
                                        if (obj.errCode == 0) {
                                            alert(message);
                                            $('.g_register').hide();
                                            $('.g_username').append(username);
                                            $(".xu-value").append(obj.cash);
                                            $('.g_id').append("ID: " + obj.user_id);
                                            $('.frm_login').hide();
                                            $("#loginHome").modal('hide');
                                            $('.frm_login_true').show();
                                        } else {
                                            alert(message);
                                        }
                                    },
                                    beforeSend:function () {
                                    },
//        complete:function () {},
                                    error:function (objAJAXRequest, strError) {
                                        alert('Có lỗi xẩy ra.');
                                    }
                                });
                                return false;
                            }
                        </script>
                    </div>
                    <!--end signup_form -->
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .input_large {
        width: 200px;
    }
</style>