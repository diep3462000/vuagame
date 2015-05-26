<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 5:46 PM
 * To change this template use File | Settings | File Templates.
 */


if(count($advertise)>0){
    $type=$advertise[0]['view_type'];
    $advertiseImage=$advertise[0]['AdvertiseImage'];
    $count=count($advertiseImage);
}

?>
    <script type="text/javascript">
        $(document).ready( function(){
            // buttons for next and previous item
            var buttons = { previous:$('#jslidernews1 .button-previous') ,
                next:$('#jslidernews1 .button-next') };
            $('#jslidernews1').lofJSidernews( { interval : 4000,
                direction		: 'opacitys',
                easing			: 'easeInOutExpo',
                duration		: 1200,
                auto		 	: true,
                maxItemDisplay  : 4,
                navPosition     : 'horizontal', // horizontal
                navigatorHeight : 32,
                navigatorWidth  : 80,
                mainWidth		: 675,
                buttons			: buttons } );
        });
    </script>
<?php if(isset($count) && $count>0) : ?>
    <?php if($type==1):?>
        <div class="clear w970 " id="home-feature" style="height: 300px;">
            <!--begin leader board-->
            <div class="w635 left" style="width: 675px;">
                <!-- <img src="images/banner.jpg" width="675px" height="295px"/>-->
                <div id="jslidernews1" class="lof-slidecontent" style="width:675px; height:295px;">

                    <!-- MAIN CONTENT -->
                    <div class="main-slider-content" style="width:675px; height:295px;">
                        <div class="sliders-wrapper" style="width: 675px;">
                            <ul class="sliders-wrap-inner" style="left: 0px; width: 4725px;">
                                <?php for($i=0; $i<count($advertiseImage); $i++): ?>

                                <li style="width: 675px;">
                                    <a href="<?php echo htmlspecialchars($advertiseImage[$i]['link'])?>"  class="readmore">
                                        <img class="lazy" style="width:675px; height:295px;" src="<?php echo sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[$i]['file_path']; ?>"
                                             title="Nạp nhiều thưởng lớn. Vua Bịp tha hồ ">
                                    </a>
                                    <!--<div class="slider-description">
                                        <div class="slider-meta">
                                            <a target="_parent" title="Miss Happy Woman's Day 8/3" href="#Category-1">Create at</a>
                                            <i> - 2013-12-20 17:02:39</i>
                                        </div>
                                        <h4>Sự kiện</h4>
                                        <p>Nạp nhiều thưởng lớn. Vua Bịp tha hồ "chém"<br />											<a href="javascript:void(0);" onclick="eventDetail('migame_form_event_detail','event_id','120');" class="readmore">Chi tiết</a>


                                        </p>
                                    </div>-->
                                </li>
                                <?php endfor; ?>




                            </ul></div>
                    </div>
                    <!-- END MAIN CONTENT -->
                    <!-- NAVIGATOR -->
                    <div class="navigator-content">
                        <div class="button-next">Next</div>
                        <div class="navigator-wrapper" style="width: 320px; height: 32px;">
                            <ul class="navigator-wrap-inner" style="width: 560px; left: 0px;">
                                <?php for($i=0; $i<count($advertiseImage); $i++): ?>
                                    <li class="active" style="height: 32px; width: 80px;">
                                        <img class="lazy" src="<?php echo sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[$i]['file_path']; ?>" style="width:76px; height:31px;">
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="button-previous">Previous</div>
                    </div>
                    <!----------------- END OF NAVIGATOR --------------------->
                    <!-- BUTTON PLAY-STOP -->
                    <div class="button-control action-stop"><span></span></div>
                    <!-- END OF BUTTON PLAY-STOP -->

                </div>


                <!------------------------------------- END OF THE CONTENT ------------------------------------------------->
                <!--
               <object type="application/x-shockwave-flash" data="http://localhost/mi/images/banner/photogallery.swf?ver=1.0" width="630" height="248" id="asset" style="visibility: visible;"><param name="wmode" value="transparent"><param name="flashvars" value="id=ciao_adv"></object>
                -->
            </div>

            <!--end leader board-->




        </div>
    <?php elseif($type==0):?>
        <div id="slider-1" style="<?php if($advertise[0]['height']>0) echo 'height: '.$advertise[0]['height'].'px;';  ?>  width: 100%">
            <a href="<?php echo htmlspecialchars($advertiseImage[0]['link'])?>">
                <div style="background: url('<?php echo sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[0]['file_path']; ?>') center top no-repeat; height: <?php  echo $advertise[0]['height']? $advertise[0]['height']: 355; ?>px; width: 100%">
                    <div class="container">
                        <div id="info-2" class="pos-right type-2">
        <!--                    <p class="title">--><?php //echo $advertise[0]->name?><!--</p>-->
        <!--                    <p class="description">--><?php //echo $advertise[0]->description?><!--</p>-->
        <!--                    <a href="#">Tìm hiểu thêm</a>-->
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php elseif($type==2): ?>
         <div id="slider-1" style="height: 355px;">
             <!---Flash --->
             <a href="<?php echo htmlspecialchars($advertiseImage[0]['link'])?>">
                <object height="<?php echo ($advertise[0]['height']>0)?$advertise[0]['height']:'350' ?>px" width="<?php echo ($advertise[0]['width']>0)?$advertise[0]['width'].'px':'100%' ?>" type="application/x-shockwave-flash" data="<?php echo sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[0]['file_path']; ?>">
                    <param value="true" name="allowfullscreen">
                    <param value="always" name="allowscriptaccess">
                    <param value="opaque" name="wmode">
                    <param value="high" name="quality">
                    <param value="false" name="cachebusting">
                    <param value="" name="flashvars">
                    <embed height="<?php echo $advertise[0]['height'] ?>px" width="<?php echo $advertise[0]['width'] ?>px" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" href="<?php echo sfConfig::get('app_url_media_file').'/'.sfConfig::get('app_advertise_images').$advertiseImage[0]['file_path']; ?>" wmode="opaque">
                </object>
             </a>
         </div>
    <?php endif; ?>
<?php else: ?>
    <div id="slider-1" style="height: 10px;"></div>
<?php endif; ?>