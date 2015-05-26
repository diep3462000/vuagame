<?php
/**
 * Created by JetBrains PhpStorm.
 * User: conghuyvn8x
 * Date: 2/8/15
 * Time: 10:53 PM
 * To change this template use File | Settings | File Templates.
 */
$checklogin = $sf_user->isLogin();
$objUser = sfContext::getInstance()->getUser() ;
$username = $objUser->getFullname()? $objUser->getFullname() : $objUser->getUsername();;
$gameByUser = GUserTable::getInstance()->getUserByUsername($objUser->getUsername());
$gmoney = $gameByUser ? $gameByUser->getGameCash() : 0;


?>
<script type="text/javascript">
    var requestUrlLoginTrue = "<?php echo url_for('@ajax_login_true') ?>";
    var requestUrlLogout = "<?php echo url_for('@ajax_logout') ?>";
    $(document).ready(function () {
    <?php if (sfContext::getInstance()->getUser()->isLogin()) { ;?>
        var username = "<?php echo $username ?>";
        var user_id = "<?php echo $objUser->getMemberId() ?>";
        var money ="<?php echo $gmoney ?>"
        $('.g_username').append(username);
        $(".xu-value").append(money);
        $('.g_id').append("ID: " + user_id);
        $('.frm_login').hide();
        $('.frm_login_true').show();
        $('.g_register').hide();
        <?php
    } else {
        ?>
        $('.frm_login').show();
        $('.g_register').show();
        $('.frm_login_true').hide();
        <?php
    } ?>
    });
</script>
<style type="text/css">
    .g_logout:hover {
        cursor: pointer;
    }
</style>