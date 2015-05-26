<?php
    $count = count($listClan);
    $page = (int)(!isset($_REQUEST['pageId']) ? 1 : $_REQUEST['pageId']);
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $limit;
    //$publisher_id = sfContext::getInstance()->getUser()->getMemberId();
?>
<?php foreach($listClanPagination as $key => $valClan):?>
    <li class="odd">
        <img src="http://gamevina.com/skin/images/icons/smallavatar.png" width="40" height="40" alt="">
        <strong><a href="http://gamevina.com/clan-info/51"><?php echo $valClan['name'] ?></a></strong>
        <p>Cấp độ: <?php echo $valClan['level']?></p>
        <p>Quỹ bang: <b><?php echo number_format($valClan['clanmoney'])  ?> Mi</b></p>
    </li>
<?php endforeach ?>
<?php
    include_partial("ajax/createPageLink", array('count' => $count, 'limit'=>$limit, 'page'=>$page));
?>
<!--<div class="paging divclear">-->
<!--    <a class="current" href="#">1</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-2">2</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-3">3</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-4">4</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-5">5</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-6">6</a> <a class="paginate" href="http://gamevina.com/clan-info/51/page-2">»</a>-->
<!--</div>-->

<script type="text/javascript">
    function changePagination(pageId) {
        var csrf_value = $("#ajax_token").val();
        var url = '<?php echo url_for('ajax_load_clan_list_pagination') ?>';
        $.ajax({
            type: "POST",
            url: url,
            data: 'pageId='+pageId+"&token="+csrf_value,
            cache: false,
            success: function (result) {
                $(".all-team").html(result);
            }
        });
    }
</script>