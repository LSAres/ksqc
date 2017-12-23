<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>富贵鸡</title>
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
    <link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/game_index.css">
    <style>
        nav {
            position: absolute;
            top: 3rem;
            width: 100%;
        }
    </style>
</head>
<body>

<!--游戏顶部-->
<div class="gameTop">
    <div class="gameTop-show">
        <div class="gameTop-showBlock">
            <img src="/ksqc/Public/fuguiji/images/farm/gameTopIcon_1.png"/>
            <span><?php echo ($store['miner_gold']); ?></span>
            <label style="display: none;">可操作点击</label>
            <div style="color: yellowgreen;">数值名称</div>
        </div>
        <div class="gameTop-showBlock">
            <img src="/ksqc/Public/fuguiji/images/farm/gameTopIcon_2.png"/>
            <span><?php echo ($store['diamonds']); ?></span>
            <label style="display: none;">可操作点击</label>
            <div style="color: yellowgreen;">数值名称</div>
        </div>
        <div class="gameTop-showBlock">
            <img src="/ksqc/Public/fuguiji/images/farm/gameTopIcon_3.png"/>
            <span><?php echo ($store['money']); ?></span>
            <label class="chargeCall"></label>
            <div style="color: #b9def0;">数值名称</div>
        </div>
    </div>
</div>


<!--充值-->
<div class="outerDiv chageDiv" style="display:none;">
    <!--关闭充值-->
    <img src="/ksqc/Public/fuguiji/images/home/close.png" class="closeCharge">
    <!--充值显示-->
    <div class="chargeInputBlock">
        <!--可用余额显示-->
        <div class="userWealth">可用金额 <span>500</span></div>
        <input type="text" placeholder="请输入充值金额为50倍数" class="chargeInput">
        <!--充值金额选择-->
        <div class="chargeNumSelect">
            <div class="chargeNumBlock selected">50</div>
            <div class="chargeNumBlock">100</div>
            <div class="chargeNumBlock">500</div>
            <div class="chargeNumBlock">1000</div>
            <div class="chargeNumBlock">20000</div>
            <div class="chargeNumBlock">100000</div>
        </div>
        <!--充值方式-->
        <div class="chargeType">
            <h3>充值方式</h3>
            <div class="chargeTypeSelect selected">
                <img src="/ksqc/Public/fuguiji/images/home/pay01.png" alt="">
                <span>充值方式名称</span>
            </div>
            <div class="chargeTypeSelect">
                <img src="/ksqc/Public/fuguiji/images/home/pay02.png" alt="">
                <span>充值方式名称</span>
            </div>
        </div>
        <!--确认充值按钮-->
        <div class="chargeButton"></div>
    </div>
</div>
<!--升级商店DIV 对应12矿层 共12个-->
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="1">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="2">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="3">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="4">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                    <img src="<?php echo ($v['img']); ?>" alt="" >
                    <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                    <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
                </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="5">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="6">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect" layer="7">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle" layer="8">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle" layer="9">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle" layer="10">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle" layer="11">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<div class=" outerDiv upgradeShow" style="display: none;">
    <div class="upgrade">
        <div class="upgradeTitle">
            <!--功能信息-->
            <span >升级页面</span>
            <!--关闭图片-->
            <img  src="/ksqc/Public/fuguiji/images/home/close.png" >
        </div>
        <!--商店头部信息-->
        <div class="upgradeHeader" layer="12">
            <!--左侧图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" class="upgradeHeader_left">
            <!--右侧显示框  分为数值条 和 矿层选择 看情况启用-->
            <!--矿层数值条-->
            <div class="upgradeHeader_rightDisplay">
                <img src="/ksqc/Public/fuguiji/images/farm/lv_up_icon.png" >
                <div></div>
                <label>LV_1</label>
            </div>

        </div>
        <!--升级选择-->
        <div class="upgradeSelect">
            <!--选择行-->
            <?php if(is_array($tool)): foreach($tool as $key=>$v): ?><div>
                <img src="<?php echo ($v['img']); ?>" alt="" >
                <span><?php echo ($v['name']); ?>(<?php echo ($v['miner_gold']); ?>)</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div><?php endforeach; endif; ?>
<!--             <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div>
            <div>
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg" alt="" >
                <span>升级功能的名称</span>
                <button class="risk" tool_id="<?php echo ($v['id']); ?>">升级</button>
            </div> -->
        </div>

    </div>
</div>
<!--好友-->
<div class="outerDiv friend" style="display: none;">
    <div class="friendAll">
        <!--好友关闭-->
        <img src="/ksqc/Public/fuguiji/images/home/close.png" class="closeFrienList">
        <!---->
        <div class="friendList">
            <!--好友信息块-->
            <div>
                <p>
                    <span>好友账号</span>
                    <label>注册时间</label>
                </p>
                <button>执行操作</button>
            </div>
            <div>
                <p>
                    <span>好友账号</span>
                    <label>注册时间</label>
                </p>
                <button>执行操作</button>
            </div>
            <div>
                <p>
                    <span>好友账号</span>
                    <label>注册时间</label>
                </p>
                <button>执行操作</button>
            </div>
        </div>
    </div>

</div>
<!--个人中心-->
<div class="outerDiv userCenter" style="display: none;">
    <!--关闭个人设置-->
    <img src="/ksqc/Public/fuguiji/images/pop/deal-bnt.png" alt="" class="closeUserCenter">
    <!---->
    <div class="userCenterControl">
        <!--显示框-->
        <div class="userCenter_functionDisplay">
            <input type="text" placeholder="提示用户输入的信息">
            <input type="text" placeholder="提示用户输入的信息">
            <input type="text" placeholder="提示用户输入的信息">
            <input type="text" placeholder="提示用户输入的信息">
            <input type="text" placeholder="提示用户输入的信息">
            <input type="submit" value="">
        </div>
        <div class="userCenter_functionDisplay" style="display: none;">
            <!--积分使用记录-->
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-1411</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="userCenter_functionDisplay" style="display: none;">
            <!--积分使用记录-->
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="userCenter_functionDisplay" style="display: none;">
            <!--积分使用记录-->
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="userCenter_functionDisplay" style="display: none;">
            <!--积分使用记录-->
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
            <div class="miningHistory">
                <div class="miningHistory_date">
                    <span>2014-14-14</span>
                    <label ></label>
                </div>
                <div class="miningHistory_message">
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                    <div>
                        <span>信息标题:</span>
                        <label>信息数值</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--底部功能切换-->
    <div class="userCenter_bottomFunctionSelect">
        <div>
            <img src="/ksqc/Public/fuguiji/images/farm/usercenter_2.png" alt="">
        </div>
        <div>
            <img src="/ksqc/Public/fuguiji/images/farm/usercenter_1.png" alt="">
        </div>
        <div>
            <img src="/ksqc/Public/fuguiji/images/farm/usercenter_3.png" alt="">
        </div>
        <div>
            <img src="/ksqc/Public/fuguiji/images/farm/usercenter_4.png" alt="">
        </div>
        <div>
            <img src="/ksqc/Public/fuguiji/images/farm/usercenter_5.png" alt="">
        </div>
    </div>

</div>
<!--现金商店-->
<div class="outerDiv catchShop" style="display: none;">
    <div class="catchShop_show">
        <!--关闭图片-->
        <img src="/ksqc/Public/fuguiji/images/home/close.png" class="closeCatchShop">
        <!--左侧功能选择-->
        <div class="catchShop_leftControl">
            <img src="/ksqc/Public/fuguiji/images/farm/catchShop_shop.png" >
            <img src="/ksqc/Public/fuguiji/images/farm/catchShop_exchange.png" >
            <img src="/ksqc/Public/fuguiji/images/farm/catchShop_Warehouse.png" alt="">
            <img src="/ksqc/Public/fuguiji/images/farm/catchShop_history.png" alt="">
        </div>
        <!--商品显示-->
        <!--宝箱模块-->
        <div class="catchShopDisplay catchShop_catchCatch">
            <!--宝箱顶部展示图片-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513244719437&di=89f01bb8c22a51d49251d23ae519a42d&imgtype=0&src=http%3A%2F%2Fb.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2Fd62a6059252dd42a19eb2379093b5bb5c8eab805.jpg" alt="" class="catchShop_catchCatch_top">
            <!--宝箱-->
            <div class="caseBlock">
                <img src="http://img1.qq.com/gamezone/pics/3899/3899503.jpg" alt="">
                <div> $100 </div>
            </div>
            <div class="caseBlock">
                <img src="http://img1.qq.com/gamezone/pics/3899/3899503.jpg" alt="">
                <div> $100 </div>
            </div>
        </div>
        <!--积分兑换-->
        <div class="catchShopDisplay pointExchange" style="display: none;">
            <!--积分互换标题-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513244719437&di=89f01bb8c22a51d49251d23ae519a42d&imgtype=0&src=http%3A%2F%2Fb.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2Fd62a6059252dd42a19eb2379093b5bb5c8eab805.jpg" alt="" class="pointExchange_title">
            <!--互换选择 -->
            <div class="exchangeDiv">
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513835295&di=4eaeed685c925eb5d7aed6acc8fdb90e&imgtype=jpg&er=1&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201408%2F02%2F20140802201903_CVyxc.jpeg" alt="">
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513240610106&di=3b23fafd8b561df6ce2c0b444b4e4d76&imgtype=0&src=http%3A%2F%2Fuploads.xuexila.com%2Fallimg%2F1510%2F651-151006192532950.jpg" alt="">
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513835313&di=7f4f19c63012bd36db5e58b0ea8cca01&imgtype=jpg&er=1&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201409%2F04%2F20140904185012_mzf5L.jpeg" alt="">
            </div>
            <!--图标/输入表单切换按钮-->
            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513835118&di=f5c64659251f2376ea348fc340e822eb&imgtype=jpg&er=1&src=http%3A%2F%2Fwenwen.soso.com%2Fp%2F20100724%2F20100724181115-560148952.jpg" alt="" class="exchange_inputChange">
            <!--兑换输入表单-->
            <form action="" method="post" class="exchange_inputForm exchange_1">
                <input type="text" placeholder="请输入兑换数量1">
                <!---->
                <div></div>
            </form>
            <form action="" method="post" class="exchange_inputForm exchange_2" style="display: none;">
                <input type="text" placeholder="请输入兑换数量2">
                <!---->
                <div></div>
            </form>
        </div>
        <!--仓库模块-->
         <div class="catchShopDisplay warehouse" style="display: none;">
             <!--物品块-->
             <div class="propsBlock">
                 <span class="propsNumber">x10</span>
                 <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513243634458&di=c86673820a598af4b7e3c284529aed78&imgtype=jpg&src=http%3A%2F%2Fimg1.imgtn.bdimg.com%2Fit%2Fu%3D764082391%2C695664485%26fm%3D214%26gp%3D0.jpg" alt="" class="propsImg">
                 <div class="propsUse">使用</div>
             </div>
             <div class="propsBlock">
                 <span class="propsNumber">x10</span>
                 <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513243634458&di=c86673820a598af4b7e3c284529aed78&imgtype=jpg&src=http%3A%2F%2Fimg1.imgtn.bdimg.com%2Fit%2Fu%3D764082391%2C695664485%26fm%3D214%26gp%3D0.jpg" alt="" class="propsImg">
                 <div class="propsUse">使用</div>
             </div>


         </div>
        <!--宝箱购买记录-->
        <div class="catchShopDisplay catchHistory" style="display: none;">
            <!--记录块-->
            <div class="catchHistory_block">
                <div class="catchHistory_block_time"> 2041-11-30 </div>
                <div class="catchHistory_block_message"><span>宝箱名称</span> * <span>1</span> <span>$100</span> </div>
            </div>
            <!--记录块-->
            <div class="catchHistory_block">
                <div class="catchHistory_block_time"> 2041-11-30 </div>
                <div class="catchHistory_block_message"><span>宝箱名称</span> * <span>1</span> <span>$100</span> </div>
            </div>

        </div>
    </div>

</div>

<!--游戏主页-->
<div class="gameBody" >
    <!--顶部 青天白云 搬运矿工-->
    <div class="gameBody_top">
        <img src="/ksqc/Public/fuguiji/images/farm/gameTopLeft.png" id="gameTopLeft" style="display: none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/gameTopRight.png" id="gameTopRight"  style="display: none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/top_leftHumen.png" id="gameTopLeftHumen"  style="display: none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/top_rightHumen.png" id="gameTopRightHumen"  style="display: none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/topHumenCome.png" id="topHumenCome"  style="display: none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/topHumengo.png" id="topHumengo"  style="display: none;"/>
        <!--蓝色-->
        <img src="/ksqc/Public/fuguiji/images/farm/tophumen1_1.png"  id="gameTopHumen" style="display:none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/tophumen2_1.png" id="gameTopHumen1" style="display:none;"/>
        <img src="/ksqc/Public/fuguiji/images/farm/tophumen3_1.png" id="gameTopHumen2" style="display:none;"/>
        <canvas class="gameBody_topCanvas" width="1024" height="768">您的浏览器或手机不支持此功能！</canvas>
        <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="topMineral" >
    </div>
    <!--下方 电梯和矿层-->
    <div class="gameBody_bottom">
        <!--下方左侧电梯-->
        <div class="gameBody_bottomLeft">
            <!--电梯图片-->
            <img src="/ksqc/Public/fuguiji/images/farm/elevatorBlock.png" id="elevatorBlockImg" style="display: none;">
            <img src="/ksqc/Public/fuguiji/images/farm/elevatorBlock1.png" id="elevatorBlockImg1" style="display: none;">
            <canvas class="gameBody_elevator" >您的浏览器或手机不支持此功能</canvas>
            <img src="/ksqc/Public/fuguiji/images/farm/mineralUp.gif" class="mineralUp" style="display: none; position: absolute; top: 1%; width: 100%;" >
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 6.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 14.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 22.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 30.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 38.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 46.5%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 54%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 62%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 70%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 78%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 86%; width: 100%;">
            <img src="/ksqc/Public/fuguiji/images/farm/mineralDown.gif" class="mineral" style="position: absolute; top: 94%; width: 100%;">

        </div>
        <!--下方右侧矿层-->
        <div class="gameBody_bottomRight">
            <!--上方占位图片-->
            <img src="/ksqc/Public/fuguiji/images/farm/game_bottom_TopImg.png" class="" />
            <!--矿层显示 -->
            <!--自定义属性 callnumber:用于JS呼出对应升级操作块-->
            <div class="seamDiv">
                <!--升级商店呼出按钮--->
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "1">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <!--矿层数字-->
                <span class="seamNumber">1</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "2">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">2</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "3">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">3</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "4">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">4</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "5">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">5</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "6">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">6</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "7">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">7</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "8">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">8</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "9">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">9</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "10">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">10</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "11">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">11</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>
            <!--矿层显示-->
            <div class="seamDiv">
                <img src="/ksqc/Public/fuguiji/images/farm/userSeamUp.png" class="seamUpCall" callnumber = "12">
                <canvas  width="1024" height="768" class="seam seamCanvas1">您的浏览器或手机不支持此功能</canvas>
                <span class="seamNumber">12</span>
                <!--箱子-->
                <img src="/ksqc/Public/fuguiji/images/farm/caseIcon.png" alt="" class="caseImg ">
            </div>


        </div>
        <!--下方占位图片-->
        <img src="/ksqc/Public/fuguiji/images/farm/game_bottom_TopImg.png" class="bottonPosition" style="display: block; width: 100%; height: 85px;"  />


    </div>

</div>


<!--页面底部滚动条切换-->
<div class="scrollChange">
    <img src="/ksqc/Public/fuguiji/images/farm/scrollTop.png" alt="">
    <img src="/ksqc/Public/fuguiji/images/farm/scrollBottom.png" alt="">
</div>
<!--页面底部-->
<div class="gemeFotter">

    <div>
        <img src="/ksqc/Public/fuguiji/images/farm/userTestIcon.png" alt="" class="">
    </div>
    <div>
        <img src="/ksqc/Public/fuguiji/images/farm/userFriend.png" alt="" class="friendCall">
    </div>
    <div>
        <img src="/ksqc/Public/fuguiji/images/farm/userCenter.png" alt="" class="userCenterCall">
    </div>
    <div>
        <img src="/ksqc/Public/fuguiji/images/farm/catchShopCall.png" alt="" class="catchShopCall">
    </div>
    <div>
        <a href="map.html">
            <img src="/ksqc/Public/fuguiji/images/farm/map_icon.png" class="mapCall"/>
        </a>
    </div>
</div>

<!--提示DIV  确定 取消 两按钮-->
<div class="outerDiv promptDiv promptTrueOrFalse" style="display: none;">
    <div class="promptBlock">
        <!--<div class="promptBlock_title">-->
            <!--<span>提示！</span>-->
        <!--</div>-->
        <div class="promptBlock_message">

        </div>
        <div class="promptBlock_foot">
            <span>确定</span>
            <span>取消</span>
        </div>
    </div>
</div>
<!--提示DIV 仅有确定按钮-->
<div class="outerDiv promptDiv promptOnlyTrue" style="display: none;">
    <div class="promptBlock">
        <!--<div class="promptBlock_title">-->
            <!--<span>提示！</span>-->
        <!--</div>-->
        <div class="promptBlock_message">

        </div>
        <div class="promptBlock_foot">
            <span>确定</span>
        </div>
    </div>
</div>

<!--<audio src="/ksqc/Public/fuguiji/music/bg.mp3" preload="" loop></audio>-->
<script src="/ksqc/Public/fuguiji/js/jquery-1.7.2.min.js"></script>
<script src="/ksqc/Public/fuguiji/js/game_index.js"></script>
<script>
$(function() {
    //点击每层的升级按钮
    $('.seamDiv img').on('click', function() {
        var layer = $(this).attr('callnumber');
        gcLayer(layer);
    });

    //道具升级
    $(document.body).on('click', '.risk', function() {
        var layer = $(this).parents('.upgradeSelect').attr('layer');
        var tool_id = $(this).attr('tool_id');
        console.log(layer+'---'+tool_id);
        $.ajax({
            type: "POST",
            url: "<?php echo U('Index/buyTool');?>",
            data: {layer: layer, tool_id: tool_id},
            dataType: "json",
            success: function(data){
                console.log(data);
                if (data['status'] == 'success') {
                    //更新钱
                    $('.gameTop-showBlock').eq(0).find('span').text(data['fathers_gold']);
                    gcLayer(layer);
                    alert(data['message']);
                } else {
                    alert(data['message']);    
                }
            }
        });
    });

    //领取 动态绑定click时间
    $(document.body).on('click', '.getMinerGold', function() {
        var layer = $(this).parents('.upgradeSelect').attr('layer');
        var tool_id = $(this).attr('tool_id');
        //alert(layer+'---'+tool_id);
        $.ajax({
            type: "POST",
            url: "<?php echo U('Index/getMinerGold');?>",
            data: {layer: layer, tool_id: tool_id},
            dataType: "json",
            success: function(data){
                console.log(data);
                if (data['status'] == 'success') {
                    alert('领取成功，领取了'+data['miner_gold']+'挖矿分');
                    //更新钱
                    $('.gameTop-showBlock').eq(0).find('span').text(data['fathers_gold']);
                    $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq(tool_id - 1).find('button').removeClass('getMinerGold');
                    $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq(tool_id - 1).find('button').addClass('risk');
                    $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq(tool_id - 1).find('button').text('升级');
                    $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq(tool_id - 1).find('button').css('background', '');
                } else {
                    alert(data['message']);
                }
            }
        });
        
    });

    //更新本层数据
    function gcLayer(layer)
    {
        $.ajax({
            type: "POST",
            url: "<?php echo U('Index/toolsCheckOut');?>",
            data: {layer: layer},
            dataType: "json",
            success: function(data){
                console.log(data);
                $('.upgradeShow').eq(layer - 1).find('.upgradeHeader_rightDisplay').find('div').css('width', (data['hours']*20)+'%');
                $.each(data['list'], function() {
                    
                    //买过的加上已购买
                    if ($('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('span').find('span').length > 0) {

                    } else {
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('span').append($('<span>已购买</span>'));
                    }
                    //到时间了更换按钮
                    if ($(this)[0]['is_pass'] == 1) {
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').off('click');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').text('领取');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').removeClass('risk');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').addClass('getMinerGold');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').css('background', 'green');
                    } else {
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').off('click');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').removeClass('risk');
                        $('.upgradeShow').eq(layer - 1).find('.upgradeSelect').find('div').eq($(this)[0]['tool_id'] - 1).find('button').text('已购买');
                    }
                    
                });
                
            }
        });
    }


    //仅供观赏的ajax
    $.ajax({
        type: "POST",
        url: "<?php echo U('Index/index');?>",
        data: {},
        dataType: "json",
        success: function(data){

        }
    });
})
</script>
</body>
</html>