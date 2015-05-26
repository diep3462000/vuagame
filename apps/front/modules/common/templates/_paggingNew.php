<?php
$params = array();
if (isset($vtParams)) {
    foreach ($vtParams as $key => $value) {
        $params = array_merge(array($key => $value), $params);
    }
}
?>
<?php if ($pager->haveToPaginate()): ?>
    <div class="box-pagging pag-gallary">

        <?php if ($pager->getPage() != $pager->getFirstPage()): ?>
<!--            <a href="--><?php //echo url_for($redirectUrl, array_merge(array('page' => 1), $params)); ?><!--"></a>-->
            <a class="page-prev" href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getPreviousPage()), $params)); ?>"></a>
        <?php endif; ?>
        <?php foreach ($pager->getLinks() as $page): ?>

            <?php if ($page == $pager->getPage()): ?>
                <a href="#" class="active"><?php echo $page ?></a>
            <?php else: ?>
                <a class="page-item" href="<?php echo url_for($redirectUrl, array_merge(array('page' => $page), $params)) ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if ($pager->getPage() != $pager->getLastPage()) : ?>

            <a class="page-next" href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getNextPage()), $params)); ?>"></a>
<!--            <a href="--><?php //echo url_for($redirectUrl, array_merge(array('page' => $pager->getLastPage()), $params)); ?><!--"></a>-->
        <?php endif; ?>

    </div>
    <!--    <div class="clear"></div>-->
<?php endif; ?>
