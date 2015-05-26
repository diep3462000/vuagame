<?php
/**
 * Created by PhpStorm.
 * User: vtsoft
 * Date: 4/26/14
 * Time: 11:41 AM
 */
$rootMenu=array();
foreach($footerMenu as $menu){
    if($menu['level']==0){
        $rootMenu[]=$menu;
    }
}

$count=count($rootMenu);
?>

<div class="container">

    <?php
        if($count>1){
            echo '<div class="row row-first">';
            $j=3;
            if($count<=3){
                $j=$count;
            }
            for($i=0;$i<$j; $i++) {
                echo '<div class="col-three">';
                $link='#';
                if($rootMenu[$i]['link']!=''){
                    if(VtHelper::startsWith($rootMenu[$i]['link'],'@')){
                        $link=url_for($rootMenu[$i]['link']);
                    }else{
                        $link=$rootMenu[$i]['link'];
                    }
                }

                $path= '/uploads' . '/' . sfConfig::get('app_category_images') . $rootMenu[$i]['image_path'];
                echo '<div class="box">';
                echo '   <div class="link-top">';
                echo '<a class="icon-link" href="'. $link .'">';
                echo '<img width="28px" height="28px" src="'. VtHelper::getImagePath($path, 'link_32_32') .'"/>';
                echo '</a>';
                echo '      <a class="title" href="'. htmlspecialchars($link) .'">';
                //echo '         <span id="icon-website-thanh-vien" class="icon-thumb"></span>';
                echo '           <div class="head" title="'.htmlspecialchars($rootMenu[$i]['name']) .'">' . VtHelper::truncate(htmlspecialchars($rootMenu[$i]['name']), 80, '...') . '</div>';
                echo '             <div class="clear"></div>';
                echo '      </a>';
                echo ' </div>';
                echo ' <ul class="link-sub">';
                foreach($footerMenu as $menu){
                    if($rootMenu[$i]['id']==$menu['parent_id']){
                        if($menu['link']!=''){
                            if(VtHelper::startsWith($menu['link'],'@')){
                                $link=url_for($menu['link']);
                            }else{
                                $link=$menu['link'];
                            }
                        }
                        echo '<li title="'.htmlspecialchars($menu['name']) .'">';
                        echo '<a href="'.htmlspecialchars($link) .'">'.VtHelper::truncate(htmlspecialchars($menu['name']), 80, '...') .'</a>';
                        echo '</li>';
                    }
                }
                echo ' </ul>';
                echo '</div>';
                echo '</div>';
            }
            echo '<div class="clear"></div>';
            echo '</div>';
            if($count>3){
                echo '<div class="row row-last">';
                for($i=3;$i<$count; $i++) {
                    if($i==6)
                    {
                        break;
                    }
                    echo '<div class="col-three">';
                    $link='#';
                    if($rootMenu[$i]['link']!=''){
                        if(VtHelper::startsWith($rootMenu[$i]['link'],'@')){
                            $link=url_for($rootMenu[$i]['link']);
                        }else{
                            $link=$rootMenu[$i]['link'];
                        }
                    }
                    $path= '/uploads' . '/' . sfConfig::get('app_category_images') . $rootMenu[$i]['image_path'];
//                    $path= sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_category_images') . $rootMenu[$i]['image_path'];
                    echo '<div class="box">';
                    echo '   <div class="link-top">';
                    echo '<a class="icon-link" href="'. htmlspecialchars($link) .'">';
                    echo '<img width="28px" height="28px" src="'. VtHelper::getImagePath($path, 'link_32_32') .'"/>';
                    echo '</a>';
                    echo '      <a class="title" href="'. htmlspecialchars($link) .'">';

                    echo '           <div class="head" title="'. htmlspecialchars($rootMenu[$i]['name']) .'">' . VtHelper::truncate(htmlspecialchars($rootMenu[$i]['name']), 80, '...') . '</div>';
                    echo '             <div class="clear"></div>';
                    echo '      </a>';
                    echo ' </div>';
                    echo ' <ul class="link-sub">';
                    foreach($footerMenu as $menu){
                        if($rootMenu[$i]['id']==$menu['parent_id']){
                            if($menu['link']!=''){
                                if(VtHelper::startsWith($menu['link'],'@')){
                                    $link=url_for($menu['link']);
                                }else{
                                    $link=$menu['link'];
                                }
                            }
                            echo '<li title="'.htmlspecialchars($menu['name']) .'">';
                            echo '<a href="'. htmlspecialchars($link) .'">'. VtHelper::truncate(htmlspecialchars($menu['name']), 80, '...') .'</a>';
                            echo '</li>';
                        }
                    }
                    echo ' </ul>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '<div class="clear"></div>';
                echo '</div>';
            }
        }
    ?>
</div>