<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 2/2/15
 * Time: 11:14 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="left border666 overflow round5" id="top_<?php echo $idParent ?>"
     style="position: absolute;display: none;top: 30px; z-index: 999; ">
    <div class="left clear" id="top_qglist_body">

        <div class="left">
            <?php

            $subMenu = sfOutputEscaper::unescape($menus);
            $i = 1;
            foreach ($subMenu as $menu) {
                $link = '#';
                if ($menu['link'] != '') {
                    if (VtHelper::startsWith($menu['link'], '@')) {
                        $link = url_for($menu['link']);
                    } else {
                        $link = $menu['link'];
                    }
                }

                ?>

                <div class="top_qglist_item1  clear">
                    <a href="<?php echo $link ?>" title="<?php echo htmlspecialchars($menu['name']) ?>"
                       class="bold">
                        <img width="54" height="30"
                             src="<?php echo    VtHelper::getUrlImagePathThumb(sfConfig::get('app_flash'), $menu['image_path']); ?>"
                             alt="<?php echo $menu['name'] ?>"><?php echo VtHelper::truncate($menu['name'], 150, '...'); ?></a>
                </div>

                <script type="text/javascript">
                    $(function () {
                        $('#<?php echo $idParent ?>').hover(function () {
                            var left1 = $('#<?php echo $idParent ?>').offset().left;
                            var position1 = $('#<?php echo $idParent ?>').position();
                            $("#top_<?php echo $idParent ?>").css('left', position1.left + 'px');
                            $("#top_<?php echo $idParent ?>").stop(true, true).slideDown().show('slow');
                        }, function () {
                            $("#top_<?php echo $idParent ?>").stop(true, true).slideUp().hide('slow');
                        });

                        $("#top_<?php echo $idParent ?>").hover(function () {
                            $('#<?php echo $idParent ?>').addClass('topbar2_game2');
                            $(this).stop(true, true).show();
                        }, function () {
                            $('.#<?php echo $idParent ?>').removeClass('topbar2_game2');
                            $(this).stop(true, true).hide();
                        });
                    });
                </script>

                <?php } ?>
        </div>
    </div>
</div>