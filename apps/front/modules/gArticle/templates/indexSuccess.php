<div class="left" id="home-gamelist">
    <div class="gmdt-block border3d0300 bg12 round5 " style="width: 678px; margin-bottom: 0px;">
        <div class="clear tabl" style="background: none">
            <a style="background:none; float: right;padding-left: 3px;" class="tabr" href="#"
               title="<?php echo htmlentities($objArticle->title) ?>"> <?php echo htmlentities($objArticle->title) ?></a>

        </div>
        <img src="/theme/images/line_title.png" style="margin-left:22px; margin-top: -10px;">

        <div class="clear ebody overflow" style="padding-top: 0px;">
            <div class="edetail clear left overflow" style="width: 640px;">
                <?php echo sfOutputEscaper::unescape($objArticle->body) ?>
            </div>
        </div>
    </div>
</div>
<?php include_component('template', 'rightHomeGameNew', array()); ?>