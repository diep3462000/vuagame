<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 2/9/15
 * Time: 6:14 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="home-gamenews-block bg12 round5 topgame_bg"
     style="width: 267px; height: 388px; margin-bottom: 0px;">

    <div class="clear" id="homeTopTaps">
        <a class="tabr-inactive" href="javascript:;" onclick="showTopDaiGia()"
           title="Top đại gia, game online" style="text-align: center; width: 100%;"><b>
            <span>Tin mới nhất</span></b></a>
    </div>
    <div class="clear userTop" id="topCaoThu">
        <?php
        if ($objArticle) {
            foreach ($objArticle as $items) {
                ?>
                <div class="article1">
                    <p class="p_title"><a
                        href="<?php echo url_for('@page_article_detail?slug=' . $items->slug) ?>"><?php echo VtHelper::truncate($items->title, 50) ?></a>
                    </p>
                    <span class="span_content"><?php echo VtHelper::truncate($items->header, 100) ?></span>
                </div>
                <?php
            }
        }?>

    </div>
</div>

<style type="text/css">
    .article1 {
        padding: 5px 5px 0px 10px;
    }

    .p_title {
        font-weight: bold;
    }

    .span_content {
        font-weight: normal;
    }
</style>