<?php

/**
 * Tạo cấu trúc HTML cho menu nhiều cấp theo dạng của bootstrap.
 * @param  array $menus      Mảng chứa cây menu giống như được tạo ra bởi hàm VtpMenuTable::getMenuTree()
 * @param  string $menu_class class của menu cấp 1. Dùng để tạo style riêng cho menu.
 * @return void             Hàm xuất luôn ra HTML. Không trả về giá trị.
 */
?>
<ul class="<?php echo $menu_class; ?>">
<?php
	$i=1;
    foreach ($menus as $menu) :
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
    ?>
        <li <?php echo ($i==1)?'class="home"':'class="', implode(' ', $classes), '"'; ?> >
            <a title="<?php echo htmlspecialchars($menu['name']) ?>" href="<?php echo $link ?>"><?php echo VtHelper::truncate($menu['name'], 150,'...'); ?></a>
            <?php
            if (!empty($menu['submenu'])){
                include_partial('moduleMenu/buildMenu', array(
                    'menus' => $menu['submenu'],
                    // 'menu_class' => 'dropdown-menu'
                    'menu_class' => ''
                ));
            }
            ?>
        </li>
    <?php
	$i++;
    endforeach; ?>
</ul>