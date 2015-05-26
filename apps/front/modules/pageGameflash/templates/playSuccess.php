<div id="page-body">
    <div class="clear w970 " id="home-game" style="width: 970px; height: auto; ">
        <div class="left" id="home-gamelist">
            <div class="gmdt-block border3d0300 bg12 round5 " style="width: 678px; margin-bottom: 0px;">
                <div class="clear tabl" style="background: none"><a style="background:none;float: right;padding-left: 3px;" class="tabr" href="#" title="Game Flash"> Game Flash</a><image src="/images/event.png" style="margin-top: 3px;"></div>
                <image src="theme/images/line_title.png" style="margin-left:22px; margin-top: -10px;"/>
                <div class="clear ebody overflow" style="padding-top: 0px;">
                    <div class="edetail clear left overflow" style="width: 640px;">

                        <div class="about-content" style="width: auto; margin-bottom: 0px;">

                            <div class="econtent clear overflow">
                                <form action="" id="mi-form-paging" method="post">
                                    <input type="hidden"   name="paging" id="mi_page" value="1"/>
                                    <input type="hidden"   name="category" id="mi_gameflash_category" value="<?php #echo $parameter->type; ?>"/>

                                    <div id="gameonline_content1">
                                        <h1><?php echo $gameflash->getName()?></h1>
                                        <object width="650px" height="400px"

                                                data="<?php echo  sfConfig::get("app_url_media_file") . '/' . sfConfig::get('app_flash') .'/'. $gameflash->getFlash()?>"
                                                <param value="true" name="allowfullscreen">
                                                <param value="always" name="allowscriptaccess">
                                                <param value="opaque" name="wmode">
                                                <param value="high" name="quality">
                                                <param value="false" name="cachebusting">
                                        ></object>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>