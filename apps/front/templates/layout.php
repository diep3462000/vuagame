<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta content="tai game,tai game mien phi,Game, game mi?n phí,Download game,Game Android,game mi?n phí,Tai Game Free,Game Online,Game Offline,Game Hanh Dong,Game Dua Xe,Game Hay,Game Di Dong,game android,game online,game hay,game dua xe,game dao vang,game hanh dong,game dot kich" lang="vi-VN" name="robots" />
    <meta content="T?i game miễn phí cho điện thoạii di động dành cho dòng máy Android. Game phù hơp với tấtt cả các dòng máy android" lang="vi-VN" name="description" />
    <meta content="tai game,ios,tiến lên miền nam, phỏm, cờ tướng, cờ vua, xì tố, caro,binh,xeng, bia,liêng,tai game mien phi,Game, game miễn phí,Download game,Game Android,game miễn phí,Tai Game Free,Game Online,Game Offline,Game Hanh Dong,Game Dua Xe,Game Hay,Game Di Dong,game android,game online,game hay,game dua xe,game dao vang,game hanh dong,game dot kich" lang="vi-VN" name="keywords" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="shortcut icon" href="/images/favicon.png" sizes="24x18" type="image/png">
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<body>
<div id="wrapfull">
    <?php include_component('template', 'loginCheck', array()) ?>
    <?php include_component('template', 'loginHeader', array()) ?>
    <?php include_component('template', 'menuTopGame', array()) ?>
    <?php //include_component('template', 'menuTop', array()) ?>
    <div id="page-body">

        <div class="clear w970 " id="home-game" style="width: 960px; height: auto; ">
            <?php echo $sf_content ?>
            <?php
            include_component('template', 'footer', array());
            ?>

<!--            <script type="text/javascript" src="/js/jqModal.js"></script>-->



        </div>
    </div>

</body>
</html>
