<?php
if (isset($menuFooter) && count($menuFooter) > 0) {
    echo '<ul>';
    foreach ($menuFooter as $menu) {
        $link = '';
        if ($menu['link'] != '') {
            if (VtHelper::startsWith($menu['link'], '@')) {
                $link = url_for($menu['link']);
            } else {
                $link = $menu['link'];
            }
        }
        ?>
<li><a href="<?php echo $link; ?>"  title="<?php echo htmlspecialchars($menu['name']) ?>"><?php echo VtHelper::truncate($menu['name'], 30, '...'); ?></a></li>
        <?php
    }
    echo '</ul>';
}
?>