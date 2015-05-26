<div class="logo">
    <a href="<?php echo url_for1('homepage'); ?>"><img src="/img/logo-vt.png" class="img-logo"></a>
</div>
<div class="box-menu-right">
    <div id="myslidemenu" class="jqueryslidemenu container-main">
        <?php
            include_component('moduleMenu', 'mainMenu',array('limit'=>7));
        ?>
    </div>
</div>
