<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>矿区选择</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,minimal-ui">
    <!-- viewport 后面加上 minimal-ui 在safri 体现效果 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- iphone safri 全屏 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- iphone safri 状态栏的背景颜色 -->
    <meta name="apple-mobile-web-app-title" content="一文鸡">
    <!-- iphone safri 添加到主屏界面的显示标题 -->
    <meta name="format-detection" content="telphone=no, email=no">
    <!-- 禁止数字识自动别为电话号码 -->
    <meta name="renderer" content="webkit">
    <!-- 启用360浏览器的极速模式(webkit) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">
    <!-- 是针对一些老的不识别viewport的浏览器，列如黑莓 -->
    <meta name="MobileOptimized" content="320">
    <!-- 微软的老式浏览器 -->
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <!-- 禁止百度转码 -->
    <meta name="screen-orientation" content="portrait">
    <!-- uc强制竖屏 -->
    <meta name="browsermode" content="application">
    <!-- UC应用模式 -->
    <meta name="full-screen" content="yes">
    <!-- UC强制全屏 -->
    <meta name="x5-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-fullscreen" content="true">
    <!-- QQ强制全屏 -->
    <meta name="x5-page-mode" content="app">
    <!-- QQ应用模式 -->
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="msapplication-TileColor" content="#000">
    <!-- Windows 8 磁贴颜色 -->
    <meta name="msapplication-TileImage" content="icon.png">
    <!-- Windows 8 磁贴图标 -->
    <link rel="Shortcut Icon" href="/ksqc/Public/fuguiji/favicon.ico">
    <!-- 浏览器tab图标 -->
    <link rel="apple-touch-icon" href="/ksqc/Public/fuguiji/images/icon.jpg">
    <!-- iPhone 和 iTouch，默认 57x57 像素，必须有 -->
    <link rel="apple-touch-icon" sizes="72x72" href="/ksqc/Public/fuguiji/images/icon.jpg">
    <!-- iPad，72x72 像素  -->
    <link rel="apple-touch-icon" sizes="114x114" href="/ksqc/Public/fuguiji/images/icon.jpg">
    <!-- Retina iPhone 和 Retina iTouch，114x114 像素 -->
    <link rel="stylesheet" href="/ksqc/Public/fuguiji/css/reset.css">
    <link rel="stylesheet" href="/ksqc/Public/fuguiji/css/style.css">
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/loign/login.css">
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/home/popup.css">
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/home/home.css">
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/shop/shop.css">
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/map_stylesheet.css">
</head>
<body>
<!--地图上方标题DIV-->
<div class="map_top">
    <span>现金:</span>
    <span>1000</span>
</div>
<!--返回按钮-->
<div class="backButton">返回</div>
<img src="/ksqc/Public/fuguiji/images/farm/cloud_one.png" id="cloud_1" alt="" style="display: none">
<img src="/ksqc/Public/fuguiji/images/farm/cloud_two.png" id="cloud_2" alt="" style="display: none">
<img src="/ksqc/Public/fuguiji/images/farm/cloud_three.png" id="cloud_3" alt="" style="display: none">
<!--地图显示区域-->
<div class="mapDiv">
    <!--点击层 -->
    <div class="map_div map_div1" >
        <img src="/ksqc/Public/fuguiji/images/farm/lockIcon.png" alt="" class="clock">
        <div class="mapClick" locationHref="">点击进入</div>
    </div>
    <!--点击层 -->
    <div class="map_div map_div2"  >
        <img src="/ksqc/Public/fuguiji/images/farm/lockIcon.png" alt="" class="clock">
        <div class="mapClick" locationHref="">点击进入</div>
    </div>
    <!--点击层 -->
    <div class="map_div map_div3"  >
        <img src="/ksqc/Public/fuguiji/images/farm/lockIcon.png" alt="" class="clock">
        <div class="mapClick" locationHref="">点击进入</div>
    </div>
    <!--点击层 -->
    <div class="map_div map_div4"  >
        <img src="/ksqc/Public/fuguiji/images/farm/lockIcon.png" alt="" class="clock">
        <div class="mapClick" locationHref="">点击进入</div>
    </div>
    <!--点击层 -->
    <div class="map_div map_div5" >
        <img src="/ksqc/Public/fuguiji/images/farm/lockIcon.png" alt="" class="clock">
        <div class="mapClick" locationHref="">点击进入</div>
    </div>
</div>
<!--提示DIV  确定 取消 两按钮-->
<div class="outerDiv promptDiv promptTrueOrFalse" style="display: none;">
    <div class="promptBlock">
        <div class="promptBlock_title">
        <span>提示！</span>
        </div>
        <div class="promptBlock_message">

        </div>
        <div class="promptBlock_foot">
            <!--确认取消按钮-->
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!--提示DIV 仅有确定按钮-->
<div class="outerDiv promptDiv promptOnlyTrue" style="display: none;">
    <div class="promptBlock">
        <div class="promptBlock_title">
        <span>提示！</span>
        </div>
        <div class="promptBlock_message">

        </div>
        <div class="promptBlock_foot">
            <!--确认按钮-->
            <span></span>
        </div>
    </div>
</div>
</body>
<script src="/ksqc/Public/fuguiji/js/jquery-1.7.2.min.js"></script>
<script src="/ksqc/Public/fuguiji/js/map_comment.js"></script>
<script>
    $(function(){
        /**
         * 提示框  确定 取消 两按钮*/
        /*点击确定后 更改赋值为1*/
        var trueOrFalse = 0;
        function promptTrueOrFalseCall(msg) {
            trueOrFalse = 0;
            $('.promptTrueOrFalse').fadeIn();
            $('.promptTrueOrFalse .promptBlock_message').text(msg);
        }
        $('.promptTrueOrFalse .promptBlock_foot span:nth-child(1)').click(function () {
            $('.promptTrueOrFalse').fadeOut();
            alert(11);
        });
        $('.promptTrueOrFalse .promptBlock_foot span:nth-child(2)').click(function () {
            $('.promptTrueOrFalse').fadeOut();
        });
        /**
         * 提示信息DIV 只有确定按钮*/
        function promptOnlyTrue(msg) {
            $('.promptOnlyTrue').fadeIn();
            $('.promptOnlyTrue .promptBlock_message').text(msg);
        }
        $('.promptOnlyTrue .promptBlock_foot span').click(function () {

            $('.promptOnlyTrue').fadeOut();
        });

        $('.map_div1 img').click(function(){
            promptTrueOrFalseCall('111是否花费*****开启矿区！！');
        });
        $('.map_div2 img').click(function(){
            promptOnlyTrue('222是否花费*****开启矿区！！');
        });
        $('.map_div3').click(function(){});
        $('.map_div4').click(function(){});
        $('.map_div5').click(function(){});
        /*点击进入 按钮点击后跳转地址*/
        $('.map_div a ').click(function(){
            var locationHref = $(this).attr('locationHref');
            alert('将要跳转到：' + locationHref);
        });
    })
</script>
</html>