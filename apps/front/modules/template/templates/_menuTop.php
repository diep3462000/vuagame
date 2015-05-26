<?php
/**
 * Created by JetBrains PhpStorm.
 * User: huync2
 * Date: 1/31/15
 * Time: 12:46 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<!-- start menu-->
<div id="page-top">
    <div id="topbar2">
        <div class="w970 f11 clear" style="position: relative;">
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;home&#39;,&#39;1&#39;]);"
               title="Trang chủ" href="http://vuagame.us/web" id="topbar2_home">TRANG CHỦ</a>
            <!--<a onmouseover="_gaq.push(['_trackEvent', 'menu', 'hover', 'event','1']);" title="Tin tức, sự kiện" href="/web/event.htm" class="top_glist" id="topbar2_event"></a>-->
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;gioithieu&#39;,&#39;1&#39;]);"
               title="Giới thiệu" href="http://vuagame.us/web/intro.html" id="topbar2_intro">GIỚI THIỆU</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;gameonline&#39;,&#39;1&#39;]);"
               title="Game online" href="http://vuagame.us/web/gameonline.html" class="top_glist"
               id="topbar2_gameonline">GAME ONLINE</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;bandidong&#39;,&#39;1&#39;]);"
               title="Bản di động" href="http://vuagame.us/web/gamemobile.html" id="topbar2_bandidong">BẢN DI ĐỘNG</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;gamemobile&#39;,&#39;1&#39;]);"
               title="Game mobile" href="http://vuagame.us/web/ssogamemobile.php" id="topbar2_gamemobile">GAME
                MOBILE</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;gameflash&#39;,&#39;1&#39;]);"
               title="Game flash" href="http://vuagame.us/web/gameflash.html" id="topbar2_gameflash">GAME FLASH</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;banghoi&#39;,&#39;1&#39;]);"
               title="Bang hội" href="http://vuagame.us/web/banghoi.html" id="topbar2_banghoi">BANG HỘI</a>
            <a onmouseover="_gaq.push([&#39;_trackEvent&#39;, &#39;menu&#39;, &#39;hover&#39;, &#39;quydinh&#39;,&#39;1&#39;]);"
               title="Quy định" href="http://vuagame.us/web/quydinh.html" id="topbar2_quydinh">QUY ĐỊNH</a>
            <!-- Place this tag where you want the +1 button to render -->

            <div class="fb-like fb_edge_widget_with_comment fb_iframe_widget"
                 style="margin: 4px; padding-top: 3px; display: inline-table;"
                 data-href="http://www.facebook.com/caygameonline" data-send="false" data-layout="button_count"
                 data-width="85" data-show-faces="false" fb-xfbml-state="rendered"
                 fb-iframe-plugin-query="app_id=&amp;href=http%3A%2F%2Fwww.facebook.com%2Fcaygameonline&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=85">
                <span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="f2c0fc037c" width="85px"
                                                                                         height="1000px" frameborder="0"
                                                                                         allowtransparency="true"
                                                                                         scrolling="no"
                                                                                         title="fb:like Facebook Social Plugin"
                                                                                         src="./theme/images/like.html"
                                                                                         style="border: none; visibility: visible; width: 84px; height: 20px;"
                                                                                         class=""></iframe></span></div>
            <!--<a class="right sky_menu" href="skype:migame_support?chat" title="Hỗ trợ sản phẩm"></a>
            <a class="right yahoo_menu" href="ymsgr:sendIM?migame_service" title="Hỗ trợ sản phẩm"></a>   -->
            <div class="left border666 overflow round5" id="top_qglist"
                 style="position: absolute; top: 30px; left: 155px; z-index: 999; display: none;">
                <div class="left clear" id="top_qglist_body">
                    <div class="left">
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0)" onclick="goGame(&#39;/web/playgame.php?game=tlmn&#39;,0);"
                               title="Tiến lên Miền Nam" class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/tien-len-mn.png"
                                     alt="Tiến lên Miền Nam"> Tiến lên Miền Nam </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0)" onclick="goGame(&#39;/web/playgame.php?game=demla&#39;,0);"
                               title="Tiến lên Miền Nam Đếm lá" class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/tien-len-dem-la.png"
                                     alt="Tiến lên Miền Nam Đếm lá"> Tiến lên Miền Nam Đếm lá </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=mienbac&#39;,&#39;0&#39;);"
                               title="Tiến lên Miền Bắc" class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/tien-len-mb.png"
                                     alt="Tiến lên Miền Bắc"> Tiến lên Miền Bắc </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=phom&#39;,&#39;0&#39;);" title="Phỏm"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/phom.png"
                                     alt="Phỏm"> Phỏm </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=poker&#39;,&#39;0&#39;);" title="Poker Mỹ"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/poker.png"
                                     alt="Poker Mỹ"> Poker Mỹ </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=baucuaca&#39;,&#39;0&#39;);"
                               title="Bầu Cua Cá" class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/tom-cua-ca.png"
                                     alt="Bầu Cua Cá"> Bầu Cua Cá </a>
                        </div>
                        <div class="top_qglist_item1 colleft clear hidebottomborder">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=xeng&#39;,&#39;0&#39;);" title="Xèng"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/xeng.png"
                                     alt="Xèng"> Xèng </a>
                        </div>
                    </div>
                    <div class="left">
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=bacay&#39;,&#39;0&#39;);" title="Ba Cây"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/3-cay.png"
                                     alt="Ba Cây"> Ba Cây </a>
                        </div>
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=xito&#39;,&#39;0&#39;);" title="Xì Tố"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/xito.png"
                                     alt="Xì Tố"> Xì Tố </a>
                        </div>
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=cotuong&#39;,&#39;0&#39;);" title="Cờ Tướng"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/co-tuong.png"
                                     alt="Cờ Tướng"> Cờ Tướng </a>
                        </div>
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=baisam&#39;,&#39;0&#39;);" title="Bài Sâm"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/bai-sam.png"
                                     alt="Bài Sâm"> Bài Sâm </a>
                        </div>
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=lieng&#39;,&#39;0&#39;);" title="Liêng"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/lieng.png"
                                     alt="Liêng"> Liêng </a>
                        </div>
                        <div class="top_qglist_item1  clear">
                            <a href="javascript:void(0);"
                               onclick="goGame(&#39;/web/playgame.php?game=maubinh&#39;,&#39;0&#39;);" title="Mậu Binh"
                               class="bold">
                                <img width="54" height="30"
                                     src="./theme/images/mau-binh.png"
                                     alt="Mậu Binh"> Mậu Binh </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(function(){

            $('#Game_flash').hover(function(){
                $("#top_qglist").stop(true,true).slideDown().show('slow');
            },function(){
                $("#top_qglist").stop(true,true).slideUp().hide('slow');
            });
            $("#top_qglist").hover(function(){
                $('#Game_flash').addClass('topbar2_game2');
                $(this).stop(true,true).show();
            },function(){
                $('#Game_flash').removeClass('topbar2_game2');
                $(this).stop(true,true).hide();
            });
        })
    </script>
<!--end menu-->