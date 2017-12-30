<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>后台管理登录界面</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
	<script type="text/javascript" src="/ksqc/Public/js/drag.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
	<link rel="stylesheet" href="/ksqc/Public/css/drag.css">
	<style>
		.loginPageBackGroundImg{
			background: url(/ksqc/Public/image/loginBackGroundImg.jpg);
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}
		.loginTestTitle{
            position: fixed;
            top: 10%;
            text-align: center;
            font-size: 3rem;
            height: 9rem;
            color: #24b8bf;
            background: url(/ksqc/Public/image/loginTitle.png);
            width: 100%;
            background-size: 33% 100%;
            background-position: center;
            background-repeat: no-repeat;
		}
		.loginDefauleFont {
			background:#999 !important;
		}
	</style>
</head>
<body>
<!--外围背景DIV-->
<div class="loginPageBackGroundImg">
<div class="loginTestTitle">

</div>
    <!--内容显示区域-->
    <div class="loginMessageDisplayDiv">
        <!--登录框-->
        <div class="loginDiv">
            <form action="<?php echo U('login/idcheck');?>" id="myform" method="post">
                <!--登录框题头-->
                <span class="loginMessageTitleDiv">
                    <span class="leftArrow"></span>
                    <span class="loginTitle">
                        用户登录
                        <span class="loginBottomMessage">
                            USERS LOGIN
                        </span>
                    </span>
                    <span class="rightArrow"></span>

                </span>
                <span class="longinMessageInput">
                    <span class="inputMessageTitle">用户名：</span>
                    <input type="text" name="id" placeholder="您的用户名">
                </span>
                <span class="longinMessageInput">
                    <span class="inputMessageTitle">密码：</span>
                    <input type="password" name="password" placeholder="您的密码">
                </span>
				<span class="longinMessageInput">
					<span class="inputMessageTitle">验证码：</span>
					<input type="text" class="input3" placeholder="验证码" name="verify" id="verify" style="font-size: 0.24rem" />
					<img src="<?php echo U(MODULE_NAME.'/Login/verify');?>" id="code"  onclick="change_code()" alt="" class="verify" style="width: 32%;margin-bottom: 0;display: block;margin: 2% auto;">
				</span>
				<!--<div id="drag"><div class="drag_bg"></div><div class="drag_text" onselectstart="return false;" unselectable="on">拖动滑块验证</div><div class="handler handler_bg"></div></div>-->
                <span class="loginButton" >
                    登录
                </span>
				
            </form>
        </div>
    </div>








</div>

</body>
<script>
	var verifyURL="<?php echo U(MODULE_NAME.'/Login/verify');?>";
	function change_code(){
		$("#code").attr("src",verifyURL+'/'+Math.random());
		return false;
	}
	$('.loginButton').click(function(){
		document.getElementById("myform").submit();    							 
	})
   $('#drag').drag();
</script>

</html>