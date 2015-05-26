<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 1/31/15
 * Time: 12:43 AM
 * To change this template use File | Settings | File Templates.
 */
//use_javascript('jquery.js');
//use_javascript('bootstrap-modal.js');

?>
<div id="loginHome" class="modal hide fade" style="display: none;">
    <?php include_component('pageRegister', 'frmRegister'); ?>
</div>

<!--  Begin -->
<div class="login_header">
    <div class="clear login_banner w970">
        <div class="left">
            <div class="g_register">
                <a data-toggle="loginHome" href="<?php echo url_for('@page_register') . '#loginHome' ?>">
                    <input id="btn_charge" type="submit" value="Đăng Ký" onclick="">
                </a>
            </div>
        </div>
        <div class="left">
            <a href="<?php echo url_for('@homepage') ?>" title="CAYGAME.NET" id="logo"></a>
        </div>

        <form method="post" name="migame_login_account" action="" onsubmit="return submitFormLogin()">
            <?php echo $form->renderHiddenFields() ?>
            <div class="login_log right">
                <div class="frm_login_true">
<!--                    <span class="g_username"></span>-->
<!--                    <span class="g_logout">Logout</span></br>-->
                    <div id="box-info">
                        <div class="ava-name-lvl col-xs-12">
                            <img src="/media/newAvatars/f/avatar_1.png" alt="avatar" class="avatar" style="width: 30px; height: 30px">
                            <label class="info-name">
                                <span class="g_username"></span>
                            </label>
                            <img class="level-icon" src="/pbdata/images/level/2_bich.png" alt="level">
                            <label class="icon-xu bg-asset"></label>
                            <label class="xu-value"></label>
                            <label class="icon-vang bg-asset"></label>
                            <label class="vang-value">
                                0</label>
                            <label class="g-exit">
                                <a class="bg-asset g_logout" rel="Thoát" title="Thoát" id="pclick-log-out">Logout
                                </a>
                            </label>
                        </div>
                        <div class="col-xs-12 option-bar-info">
                            <ul>
                                <li>
                                    <a href="#" style="color: #dc2606">
                                        <span class="g_id"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url_for("user_info")?>" target="_blank">Q.lý Cá nhân</a>
                                </li>
                                <li>
                                    <a href="<?php echo url_for("user_cash")?>" target="_blank" title="Nạp xu" rel="Nạp xu">Nạp xu</a>
                                </li>
                                <li>
                                    <a style="width:112px" href="<?php echo url_for("user_transaction")?>" target="_blank">Lịch sử giao dịch</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="frm_login">
                    <div class="login_box">
                        <div class="login_box_input2">
                            <span class="login_span_username">
                                <?php
                                echo $form['username'];
                                if ($form['username']->hasError()) {
                                    echo '<span class="help-inline">' . $form['username']->renderError() . '</span>';
                                }
                                ?>

                            </span>
                        </div>
                        <div class="login_box_input3">
                        <span class="login_span_password">
                            <?php
                            echo $form['password'];
                            if ($form['password']->hasError()) {
                                echo '<span class="help-inline">' . $form['password']->renderError() . '</span>';
                            }
                            ?>
                        </span>
                        </div>

                    </div>
                    <div class="login_box_button">
                        <input type="image" id="button_login1"
                               src="/theme/images/login.png"
                               onclick="submitForm();" style="width: 47px; height:46px;">
                    </div>

                    <br>
                    <br>

                    <div class="login_text">
                        <form action="http://vuagame.us/web/openid/example.php" method="post" id="form_openid">
                            <input type="hidden" name="openid_identifier" id="openid_identifier">
                            <a style="text-decoration:none;" id="bucket">Đăng nhập qua</a>
                                                        <a href="<?php echo url_for('page_loginfb')?>"><img src="/theme/images/btn_facebook.png" alt="Facebook"></a>
<!--                            <a href="--><?php //echo url_for('@page_loginfb') ?><!--" target="_blank"><img src="/theme/images/btn_facebook.png" alt="Facebook"></a>-->

                            <a class="login_google" href="javascript:void(0);" onclick=""><img src="/theme/images/btn_gmail.png"
                                                                          alt="Google"></a>
                            <a href="javascript:void(0);" onclick=""><img src="/theme/images/bnt_yahoo1.png"
                                                                          alt="Yahoo"></a>
                            <a href="http://vuagame.vn/web/forgotPassword.html">Quên mật khẩu!</a>
                        </form>
                        <script type="text/javascript">
                            function openID(url) {

                                document.getElementById("openid_identifier").value = url;
                                document.getElementById('form_openid').submit();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
<!-- END -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
<!--<script type="text/javascript" src="js/oauthpopup.js"></script>-->

<script type="text/javascript">
         $('.login_google').oauthpopup({
            path: '<?php echo url_for("page_login_google")?>',
            width:650,
            height:350
        });
        $('a.google_logout').googlelogout({
            redirect_url:'<?php echo url_for("page_login_google")?>'
        });
    //For Facebook  
      $('#facebook').oauthpopup({
            path: 'login.php?facebook',
            width:600,
            height:300
       });

    function submitFormLogin() {
        var requestUrl = '<?php echo url_for('@ajax_login') ?>';
        var username = $('#username').val();
        if (username == '') {
            alert('Username không được để trống.');
            return false;
        }
        var password = $('#pass').val();
        if (password == '') {
            alert('Password không được để trống.');
            return false;
        }
        var token = $('#g_login__csrf_token').val();
        $.ajax({
            async:false,
            type:"POST",
            url:requestUrl,
            data:{username:username, password:password, token:token },
            timeout:(5000),
            success:function (data) {
                var obj = $.parseJSON(data);
                var message = obj.errMessage;
                if (obj.errCode == 0) {
                    alert(message);
                    $('.g_username').append('Xin chào: ' + obj.username);
                    $('.frm_login').hide();
                    $('.frm_login_true').show();
                    $('.g_register').hide();
                } else {
                    alert(message);
                    $('.frm_login').show();
                    $('.g_register').show();
                    $('.frm_login_true').hide();
                }
            },
            beforeSend:function () {
            },
//        complete:function () {},
            error:function (objAJAXRequest, strError) {
                alert('Hệ thống đang quá tải.');
            }
        });
        return false;
    }

</script>

<style type="text/css">

    .close {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        filter: alpha(opacity = 20);
        opacity: .2;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        filter: alpha(opacity = 50);
        opacity: .5;
    }

    button.close {
        -webkit-appearance: none;
        padding: 0;
        cursor: pointer;
        background: transparent;
        border: 0;
    }

    .modal-open {
        /*overflow: hidden;*/
    }

    .modal {
        position: fixed;
        top: 25%;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: auto;
        /*overflow-y: scroll;*/
        -webkit-overflow-scrolling: touch;
        outline: 0;
    }

    .modal.fade .modal-dialog {
        -webkit-transition: -webkit-transform .3s ease-out;
        -moz-transition: -moz-transform .3s ease-out;
        -o-transition: -o-transform .3s ease-out;
        transition: transform .3s ease-out;
        -webkit-transform: translate(0, -25%);
        -ms-transform: translate(0, -25%);
        transform: translate(0, -25%);
    }

    .modal.in .modal-dialog {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        transform: translate(0, 0);
    }

    .modal-dialog {
        position: relative;
        width: auto;
        margin: 10px;
    }

    .modal-content {
        position: relative;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        outline: none;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #000;
    }

    .modal-backdrop.fade {
        filter: alpha(opacity = 0);
        opacity: 0;
    }

    .modal-backdrop.in {
        filter: alpha(opacity = 50);
        opacity: .5;
    }

    .modal-header {
        min-height: 16.42857143px;
        padding: 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .modal-header .close {
        margin-top: -2px;
    }

    .modal-title {
        margin: 0;
        line-height: 1.42857143;
    }

    .modal-body {
        position: relative;
        padding: 20px;
    }

    .modal-footer {
        padding: 19px 20px 20px;
        margin-top: 15px;
        text-align: right;
        border-top: 1px solid #e5e5e5;
    }

    .modal-footer .btn + .btn {
        margin-bottom: 0;
        margin-left: 5px;
    }

    .modal-footer .btn-group .btn + .btn {
        margin-left: -1px;
    }

    .modal-footer .btn-block + .btn-block {
        margin-left: 0;
    }

    @media (min-width: 768px) {
        .modal-dialog {
            width: 600px;
            margin: 30px auto;
        }

        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .modal-sm {
            width: 300px;
        }
    }

    @media (min-width: 992px) {
        .modal-lg {
            width: 900px;
        }
    }

    .modal-footer:before,
    .modal-footer:after {
        display: table;
        content: " ";
    }

    .modal-footer:after {
        clear: both;
    }

    #loginHome {
        width: 680px;
        height: 510px;
        margin: 0px auto;
        /*background: white;*/
    }
</style>