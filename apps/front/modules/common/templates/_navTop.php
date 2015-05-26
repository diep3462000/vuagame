<?php
/**
 * Created by PhpStorm.
 * User: vtsoft
 * Date: 4/25/14
 * Time: 10:38 AM
 */
use_javascript(sfConfig::get("app_js_path") . 'frontend/base64.js');
use_javascript(sfConfig::get("app_js_path") . 'frontend/common_function.js');
use_javascript(sfConfig::get("app_js_path") . 'frontend/vtSearchSuggestion.js');
use_javascript(sfConfig::get("app_js_path") . 'vtFrontend.js');
use_javascript(sfConfig::get("app_js_path") . 'global.js');
use_javascript(sfConfig::get("app_js_path") . 'frontend/vtLogin.js');
?>
<div class="container">
    <div class="s-f-left menu-top">
        <?php
        include_component('moduleLink', 'menuHeader', array('limit' => 5));
        ?>
    </div>

    <div class="box-login" id="global-search">
		 <form class="s-f-left frm-input-append" action="<?php echo url_for1('@searchpage') ?>" method="POST">
			<input class="span2" type="text" id="global-keywords" name="q" type="text" maxlength="50" autocomplete="off" onkeypress="return doClick(event,'searchIcon')" placeholder="<?php echo __('Tìm kiếm...') ?>">
			<input class="span2" id="searchIcon" value="" type="submit">
		</form>
        <div id="suggestions" class="dropdown-box" style="display:none;"></div>
		<?php if ($isAuth): ?>
			<a href="<?php //echo url_for1('@update_user') ?>" class="home"><?php echo $userName; ?></a>
			<a href="<?php echo url_for1('@logout'); ?>"><?php echo __('Thoát') ?></a>
		<?php else: ?>
			<a href="<?php echo url_for1('@pageregister') ?>" class="home"><?php echo __('Đăng ký') ?></a>
			<a href="<?php echo url_for1('@pagelogin'); ?>"><?php echo __('Đăng nhập') ?></a>
		<?php endif; ?>
        
    </div>
</div>
<script type="text/javascript">
    var reqSearch='<?php echo __('Vui lòng nhập vào ô tìm kiếm'); ?>';
    var keywordMessage='<?php echo __('Từ khóa tìm kiếm...'); ?>';
    var messageResult='<?php echo __(' Tìm kiếm với '); ?>';
    var productService='<?php echo __('Dịch vụ - sản phẩm'); ?>';
    var notFound='<?php echo __('Không tìm thấy kết quả với '); ?>';
    var notData='<?php echo __('Không tìm thấy dữ liệu '); ?>';
</script>
<script>
    var searchCommonLink = '<?php echo url_for2("searchpage", array('query' => 'searchCommonLink')) ?>';
</script>
<?php include_partial('common/messageCity'); ?>