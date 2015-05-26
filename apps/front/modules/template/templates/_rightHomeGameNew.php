<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 1/31/15
 * Time: 12:51 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="right" id="home-gamenews">
    <!-- BEGIN TOP//-->

    <div class="home-gamenews-block bg12 round5 topgame_bg tab-content"
         style="width: 267px; height: 388px; margin-bottom: 0px;">
        <div class="clear" id="homeTopTaps">
            <div class="tabl overflow">
                <a class="tabr-active" href="javascript:;" onclick="showTopCaoThu()"
                   title="Top đại gia, game online"><b>Cao Thủ</b></a>
            </div>
            <div class="tabl-inactive">
                <a class="tabr-inactive" href="javascript:;" onclick="showTopDaiGia()"
                   title="Top đại gia, game online"><b>Đại
                        Gia</b></a>
            </div>
            <div class="tabl-inactive">
                <a class="tabr-inactive" href="javascript:;" onclick="showTopVip()"
                   title="Top đại gia, game online"><b>Bang
                        Hội</b></a>
            </div>
        </div>
            <ul class="list-tab" id="tabCaoThu">
                <?php foreach ($listCaoThu as $i => $cao_thu) :?>
                    <li>
                        <span><?php echo $i +1?></span>
                        <a href="<?php echo url_for('user_details', array('user_name' => $cao_thu['username']))?>"><?php echo $cao_thu['username']?></a>
                        <strong><?php echo $cao_thu['name_level']?></strong>
                    </li>
                <?php endforeach ?>
            </ul>

            <ul class="list-tab hidden" id="tabDaiGia">
                <?php foreach ($listDaiGia as $i => $dai_gia) :?>
                    <li>
                        <span><?php echo $i +1?></span>
                        <a href="<?php echo url_for('user_details', array('user_name' => $dai_gia['username']))?>"><?php echo $dai_gia['username']?></a>
                        <strong><?php echo number_format($dai_gia['gameCash'])?> Mi</strong>
                    </li>
                <?php endforeach ?>
            </ul>

            <ul class="list-tab hidden" id="tabVip">
                <?php foreach ($listClan as $i => $clan) :?>
                <li>
                    <span><?php echo $i + 1?></span>
                    <a href="<?php echo url_for('clan_info', array('clan_id' => $clan['id'] ))?>"><?php echo $clan['name']?></a>
                    <strong>Cấp độ: <?php echo $clan['level']?></strong>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
<!--        <div class="clear userTop" id="topCaoThu">-->
<!--            <form action="http://vuagame.us/web/member.html" method="post" id="migame_form_member_info">-->
<!--                <input type="hidden" name="token" value="member.detail">-->
<!--                <input type="hidden" name="member_id" id="member_id" value="">-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="clear userTop" id="topDaiGia" style="display: none;">-->
<!--            <form action="http://vuagame.us/web/member.html" method="post" id="migame_form_member_info">-->
<!--                <input type="hidden" name="token" value="member.detail">-->
<!--                <input type="hidden" name="member_id" id="member_id" value="">-->
<!--            </form>-->
<!---->
<!--        </div>-->


        <div class="clear userTop" id="topVip" style="display: none;">
            <form action="http://vuagame.us/web/chitietbang.html" method="post" id="migame_form_clan_detail">
                <input type="hidden" name="token" value="clan.detail">
                <input type="hidden" name="clan_page" value="1">
                <input type="hidden" name="clan_id" id="clan_id" value="">
            </form>
        </div>
    </div>


    <?php
    include_component('gArticle', 'GArticle');
    ?>

    <!-- END TOP//-->
    <div class="right" id="home-gamenews">
        <div style="width: 270px;">
            <div class="right p2" style="position: relative;">
                <a href="http://vuagame.us/web/ssogamemobile.php" title="Kho game miễn phí"><img class="lazy"
                                                                                                 src="/theme/images/kengame.net.png">
                </a>

            </div>
        </div>
    </div>
</div>

