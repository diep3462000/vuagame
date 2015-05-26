<?php

/**
 * Tạo cấu trúc HTML cho menu nhiều cấp theo dạng của bootstrap.
 * @param  array $menus      Mảng chứa cây menu giống như được tạo ra bởi hàm VtpMenuTable::getMenuTree()
 * @param  string $menu_class class của menu cấp 1. Dùng để tạo style riêng cho menu.
 * @return void             Hàm xuất luôn ra HTML. Không trả về giá trị.
 */
$menus = sfOutputEscaper::unescape($menuTree);
?>
<?php
$i = 1;
foreach ($menus as $menu) {
    $link = '#';
    if ($menu['link'] != '') {
        if (VtHelper::startsWith($menu['link'], '@')) {
            $link = url_for($menu['link']);
        } else {
            $link = $menu['link'];
        }
    }
    $classes = array();
    if ($menu['active'] > 0) {
        $classes[] = 'active';
    }

    if ($menu_class == 'dropdown-menu' && !empty($menu['submenu'])) {
        $classes[] = 'dropdown-submenu';
    }
    $idParent = str_replace(' ', '_', VtHelper::removeStringUtf8($menu['name']));
    ?>
<a title="<?php echo htmlspecialchars($menu['name']) ?>" href="<?php echo $link ?>" class="topbar2_menu"
   id="<?php echo $idParent; ?>"><?php echo VtHelper::truncate($menu['name'], 150, '...'); ?></a>

<?php
    if (!empty($menu['submenu'])) {
        include_partial('moduleMenu/subMenuGame', array(
            'menus' => $menu['submenu'],
            // 'menu_class' => 'dropdown-menu'
            'idParent' => $idParent
        ));
    }
    ?>

<?php
    $i++;
}
?>

<style type="text/css">
    .topbar2_menu {
        /*width: 80px;*/
        padding-right: 10px;
        height: 33px;
        display: block;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
