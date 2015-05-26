
<body style="margin:0 auto;">
<div id="playgame_wrapper">
    <div id="playgame_header">
        <div id="new_menu">
            <a href="#"
               onclick="confirmAction('home','index.php');"
               style="cursor:pointer;text-decoration: none;">
                <img src="template/images/home.png" width="110" height="26px;" style="vertical-align:middle; float:left"/>
            </a>
            <a href="#"
               onclick="confirmAction('gameonline','gameonline.php');"
               style="cursor:pointer;text-decoration: none;">
                <img src="template/images/game-online.png" width="120" height="26px;" style="vertical-align:middle; padding-left:30px; float:left;"/>
            </a>
            <a
                href="#"
                onclick="confirmAction('gameflash','gameflash.php');"
                style="cursor:pointer;text-decoration: none;">
                <img src="template/images/game-flash.png" width="119" height="26px;" style="vertical-align:middle; padding-left:30px; float:left;"/>
            </a>
            <a
                href="#"
                onclick="confirmAction('blog','blog.php');"
                style="cursor:pointer;text-decoration: none;">
                <img src="template/images/blog.png" width="75" height="26px;" style="vertical-align:middle; padding-left:30px; float:left;"/>
            </a>
            <marquee direction="left" scrolldelay="100" class="marquee">
                Trao giải thưởng 1 Iphone 4 cho game thủ giỏi nhất tháng 11/2011
            </marquee>
            <?php if(sfContext::getInstance()->getUser()->isLogin())  {?>
                <a href="#"
                   onclick="confirmAction('logout','index.php?action=logout');"
                   title="Đăng xuất khỏi hệ thống"
                   style="cursor:pointer;text-decoration: none;">
                    <img src="template/sub_images2/logout.png" width="32" height="30px;"

                         style="vertical-align:middle; padding-left:55px; float:left;"/>
                </a>

            <?php } ?>
        </div>
    </div>


        <div id="playgame_body" style="background-image: url(template/images/play-bg.jpg);">
            <div id="play_screen" >
                <embed
                    src="/gate/game/flash/Game.swf?<?php echo $game;?>"
                    width="910px"
                    height="620px"
                    allowscriptaccess="always"
                    allowfullscreen="true"
                    id="player1"
                    name="player1"

                    />
            </div>
        </div>
   </div>