<div id="page-body">
    <div class="clear w970 " id="home-game" style="width: 970px; height: auto; ">
        <div class="left" id="home-gamelist">
            <div class="gmdt-block border3d0300 bg12 round5 " style="width: 678px; margin-bottom: 0px;">
                <div class="clear tabl" style="background: none"><a style="background:none;float: right;padding-left: 3px;" class="tabr" href="#" title="Game Flash"> Game Flash</a><image src="<?php echo THEME; ?>/images/event.png" style="margin-top: 3px;"></div>
                <image src="theme/images/line_title.png" style="margin-left:22px; margin-top: -10px;"/>
                <div class="clear ebody overflow" style="padding-top: 0px;">
                    <div class="edetail clear left overflow" style="width: 640px;">

                        <div class="about-content" style="width: auto; margin-bottom: 0px;">

                            <div class="econtent clear overflow">
                                <form action="" id="mi-form-paging" method="post">
                                    <input type="hidden"   name="paging" id="mi_page" value="1"/>
                                    <input type="hidden"   name="category" id="mi_gameflash_category" value="<?php #echo $parameter->type; ?>"/>

                                    <div id="gameonline_content1">

                                        <ul>
                                            <?php
//                                            if (isset($gameflash) && $result->getRows() != null) {
                                                foreach ($listGameflash as $game) {
                                                    ?>
                                                    <li>
                                                        <a href="javascript:void(0)"
                                                           onclick="goGame('<?php echo  url_for("play_gameflash", array('slug' =>$game['slug'] )) ?>');">
                                                            <img src="<?php echo    VtHelper::getUrlImagePath(sfConfig::get('app_flash'), $game['screen']); ?>"
                                                                 width="90" height="67"

                                                                 title="<?php echo $game['name']; ?>"
                                                                />
                                                        </a>
                                                        <span class="name" title="<?php echo $game['name']; ?>"><?php echo VtHelper::subString($game['name'], 20); ?></span>
                                                    </li>
                                                <?php
//                                                }
                                            }
                                            ?>


                                        </ul>

                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>       