<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
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
	<link rel="Shortcut Icon" href="favicon.ico">
	<!-- 浏览器tab图标 -->
	<link rel="apple-touch-icon" href="images/icon.jpg">
	<!-- iPhone 和 iTouch，默认 57x57 像素，必须有 -->
	<link rel="apple-touch-icon" sizes="72x72" href="images/icon.jpg">
	<!-- iPad，72x72 像素  -->
	<link rel="apple-touch-icon" sizes="114x114" href="images/icon.jpg">
	<!-- Retina iPhone 和 Retina iTouch，114x114 像素 -->
	<link rel="stylesheet" href="/ksqc/Public/fuguiji/css/reset.css">
	<link rel="stylesheet" href="/ksqc/Public/fuguiji/css/style.css">
	<link type="text/css" rel="stylesheet" href="/ksqc/Public/fuguiji/css/loign/login.css">
	<script type="text/javascript">

        //         //平台、设备和操作系统
        var system = {
            win: false,
            mac: false,
            xll: false,
            ipad:false
        };
        //         //检测平台
        var p = navigator.platform;
        system.win = p.indexOf("Win") == 0;
        system.mac = p.indexOf("iMac") == 0;
        system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
        //system.ipad = (navigator.userAgent.match(/iPad/i) != null)?true:false;
        //跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面
        // if (system.win || system.mac || system.xll||system.ipad) {
        if (system.win || system.mac || system.xll) {
            //window.location.href = "http://fgj.xysya.top/hello.php"; //电脑访问跳转页面
        }

	</script>

</head>
<body>
<div id="loadingbg">
	<div id="loadingwrap">
		<img class="j" src="/ksqc/Public/fuguiji/images/loading/chicken.png" alt="">
		<div class="loading-out">
			<img class="l" src="/ksqc/Public/fuguiji/images/loading/loading-line.png" alt="">
			<div class="loading-out-inner">
				<div class="loading-back" style="width: 0%"></div>
				<div id="loading">0%</div>
			</div>
		</div>
		<img src="/ksqc/Public/fuguiji/images/loading/loading-txt.png" alt="" class="loading-txt">
	</div>
</div>
<div id="page" class="page">
	<div class="login">
		<div class="login-input" style="margin-top:-8px;" >
			<div  >
				<label for="phone">手机</label>
				<input type="text" name="phone" maxlength="20">
			</div>
			<div style="padding:0;margin:0;" >
				<label for="password">密码</label>
				<input type="password" name="password">
			</div>
			<a class="loginBtn" style="padding:10px;"></a></div>
		<a class="regBtn" style="top: calc(80% - 202px);"></a>
		<a class="forgetBtn" style="top: calc(80% - 202px);"></a></div>

	<div class="loginbg">
		<div class="logo" style="top: 2%;"></div>
	</div>
	<div id="canvas" class="canvas">
		<!--  <canvas width="320" height="568"></canvas>-->
	</div>
	<div class="login-alert" id="forgetPassword" style="display:none;    height: calc(100vw*598/602);">
		<div class="login-alert-board fgpw-board">
			<div class="fgpw-context">
				<div><input type="text" name="fphone" placeholder="已注册手机号" maxlength="20"/></div>
				<div class="fcaptcha"><input type="text" name="fcaptcha" placeholder="验证码" maxlength="6"/></div>
				<div><input type="password" name="newPassword" placeholder="新密码"/></div>
				<div><input type="password" name="confirmPassword" placeholder="确认密码"/></div>
				<a class="send-captcha">获取验证码</a>
			</div>
			<a class="close-btn closefgpwBtn"></a>
			<a class="only-confirm fgpwBtn"></a>
		</div>
	</div>
	<div class="login-alert" id="Regsiter" style="display:none;">
		<div class="login-alert-board fgpw-board">
			<div class="fgpw-context">
				<div><input type="text" name="realname" required placeholder="真实姓名"/></div>
				<div><input type="text" name="mobile" required placeholder="请输入你要注册的手机号" maxlength="20"/></div>
				<div class="fcaptcha"><input type="text" required name="code" placeholder="验证码" maxlength="6"/></div>
				<div><input type="password" name="pwd" required placeholder="设置密码"/></div>
				<div><input type="password" name="payPwd" required placeholder="确认密码"/></div>
				<div><input type="text" name="leadMobile" value="<<?php echo ($_GET['user']); ?>>" required placeholder="上级手机号"/></div>
				<a class="send-captcha">获取验证码</a>
			</div>
			<a class="close-btn closefgpwBtn"></a>
			<a class="only-confirm  reg"></a>
		</div>
	</div>
	<div class="login-alert login-alert-msg" id="alertMsg" style="display:none;">
		<div class="login-alert-board msg-board">
			<div class="context">
				<div class="text">您填写的信息有误，请注意检查~</div>
			</div>
			<a class="only-confirm"></a>
		</div>
	</div>
</div>
<div class="loading-pic" style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/btn.png" class="loading" alt="" style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/forget.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/loginbg.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/logo.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/logo.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f1.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f2.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f3.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f4.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f5.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f6.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/login/f7.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/loading/loading.jpg" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/loading/loading-line.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/loading/loading-txt.png" class="loading" alt=""  style="display: none;">
	<img src="/ksqc/Public/fuguiji/images/loading/chicken.png" class="loading" alt=""  style="display: none;">
</div>
<!--<audio src="/ksqc/Public/fuguiji/music/bg.mp3" preload="" loop></audio>-->
<script src="/ksqc/Public/fuguiji/js/jquery-1.7.2.min.js"></script>
<script src="/ksqc/Public/fuguiji/js/function.js"></script>
<script>
    $(function () {
        var o = {
            alertMsg: function (text,fn) {
                // this.$el.append(util.loadTpl($('#alertMsgTpl')));
                $('#alertMsg').show();
                var w = $('#alertMsg .msg-board').width();
                var h = w * 481 / 587;
                $('#alertMsg .msg-board').height(h);
                $('#alertMsg .msg-board').css({top: 'calc((100% - ' + h + 'px)/2)'});
                if (text)$('#alertMsg .msg-board .text').text(text);
                $(".only-confirm").click(function () {
                    o.closeMsg();
                    if(fn)
                    {
                        fn()
                    }
                });
            },
            closeMsg: function () {
                $('#alertMsg').hide();
            },
            login: function () {
                var phone = $.trim($('input[name="phone"]').val()),
                    password = $.trim($('input[name="password"]').val());
//			var reg = /^[1][0-9]{10}$/;	//1开头11位数字
                if (!phone) {
                    this.alertMsg('请输入手机号');
                    return;
                }
                if (!password) {
                    this.alertMsg('请输入密码');
                    return;
                }
                //登录，发送ajax请求


            },
            canvas: function () {
                var W, H, _this = this;
                W = $('#canvas').width();
                H = $('#canvas').height();
                window.onresize = function () {
                    W = $('#canvas').width();
                    H = $('#canvas').height();
                };
                var canvas = document.createElement("canvas");
                canvas.width = W;
                canvas.height = H;
                document.getElementById('canvas').appendChild(canvas);
                var ctx = canvas.getContext("2d");
                var particles = [{x: Math.round(0.6 * W), y: Math.round(0.1 * H), no: 1},
                    {x: Math.round(0.02 * W), y: Math.round(0.4 * H), no: 2},
                    {x: Math.round(0.75 * W), y: Math.round(0.4 * H), no: 3},
                    {x: Math.round(0.9 * W), y: Math.round(0.5 * H), no: 4},
                    {x: Math.round(0.12 * W), y: Math.round(0.62 * H), no: 5},
                    {x: Math.round(0.5 * W), y: Math.round(0.65 * H), no: 6},
                    {x: Math.round(0.2 * W), y: Math.round(0.91 * H), no: 7}];

                var pw = 46;

                function draw() {
                    ctx.clearRect(0, 0, W, H);	//清空画布
                    ctx.beginPath();	//开始绘制
                    for (var i = 0; i < particles.length; i++) {
                        var p = particles[i];
                        var img = new Image();
                        img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                        console.log("i:" + i);
                        console.log("x:" + p.x);
                        console.log("y:" + p.y);
                        ctx.drawImage(img, p.x, p.y, pw, pw);
                    }
                    ctx.closePath(); //结束绘制
                    ctx.fill();		//填充
                }

                var po = {x: 0, y: 0};

                function update(cpo) {
                    po.x += Math.round(cpo.g / 10) / 2;
                    po.y += Math.round(cpo.b / 10) / 2;

                    canvas.width = W;
                    canvas.height = H;
                    ctx.clearRect(0, 0, W, H);	//清空画布
                    ctx.beginPath();	//开始绘制

                    for (var i = 0; i < particles.length; i++) {
                        var p = particles[i];
                        var yw = (p.x + po.x) % W,
                            yh = (p.y + po.y) % H;
                        //1
                        if ((yw < W - pw || yw > 0) && (yh < H - pw || yh > 0)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw, yh, pw, pw);
                        }
                        if ((yw < W || yw > W - pw) && (yh < H - pw || yh > 0)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw - W, yh, pw, pw);
                        }
                        if ((yw < -W + pw || yw > -W) && (yh < H - pw || yh > 0)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw + W, yh, pw, pw);
                        }
                        //2
                        if ((yw < W - pw || yw > 0) && (yh < H || yh > H - pw)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw, yh - H, pw, pw);
                        }
                        if ((yw < W || yw > W - pw) && (yh < H || yh > H - pw)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw - W, yh - H, pw, pw);
                        }
                        if ((yw < -W + pw || yw > -W) && (yh < H || yh > H - pw)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw + W, yh - H, pw, pw);
                        }
                        //3
                        if ((yw < W - pw || yw > 0) && (yh < -H + pw || yh > -H)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw, yh + H, pw, pw);
                        }
                        if ((yw < W || yw > W - pw) && (yh < -H + pw || yh > -H)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw - W, yh + H, pw, pw);
                        }
                        if ((yw < -W + pw || yw > -W) && (yh < -H + pw || yh > -H)) {
                            var img = new Image();
                            img.src = '/ksqc/Public/fuguiji/images/login/f' + p.no + '.png';
                            ctx.drawImage(img, yw + W, yh + H, pw, pw);
                        }
                    }
                    ctx.closePath(); //结束绘制
                    ctx.fill();		//填充

                }

                draw();	//初始化
                function fl() {
                    update({g: 10, b: 0});
                }

                function orientationHandler(event) {
                    if (event.gamma && event.beta) {
                        update({g: event.gamma, b: event.beta});
                    } else {
                        _this.timer = self.setInterval(fl, 15);
                    }
                }

                if (window.DeviceOrientationEvent) {
                    window.addEventListener("deviceorientation", orientationHandler, false);
                }
            }
        }
        o.canvas();
        $(".forgetBtn").click(function () {
            $("#forgetPassword").show();
        });
        $(".regBtn").click(function () {
            $("#Regsiter").show();
        });
        $(".closefgpwBtn").click(function () {
            $("#forgetPassword").hide();
            $("#Regsiter").hide();
        });

        $(".loginBtn").click(function () {
            o.login();
        });


    });
</script>
<script type="text/javascript">
    var loadNum = 0;
    var imgNum = $('.loading').length;
    var txtGrad = parseInt(100 / imgNum);
    var bgGrad = parseInt(200 / imgNum);
    $('.loading').each(function(){
        if($(this)[0].complete){
            loadNum += 1;
            $("#loading").text(loadNum*txtGrad+"%");
            $(".loading-back").width(loadNum*txtGrad+"%");
            if(loadNum>=imgNum){
                $("#loading").text("100%");
                $(".loading-back").width("100%%");
//				$("#loadingbg").animate({opacity:"0"},function(){
//					$(this).hide()
//				})
                $("#loadingbg").hide();
            }
        }else{
            $(this).load(function(){
                loadNum += 1;
                $("#loading").text(loadNum*txtGrad+"%");
                $(".loading-back").width(loadNum*txtGrad+"%");
                if(loadNum>=imgNum){
                    $("#loading").text("100%");
                    $(".loading-back").width("100%");
//					$("#loadingbg").animate({opacity:"0"},function(){
//						$(this).hide()
//					})
                    $("#loadingbg").hide();
                }
            })
        }
    })
</script>
<script>
    $(function () {

        /**
         * 找回密码
         */
        $('.fgpwBtn').click(function () {
            var fphone = $('input[name=fphone]').val();
            var fcaptcha = $('input[name=fcaptcha]').val();
            var newPassword = $('input[name=newPassword]').val();
            var confirmPassword = $('input[name=confirmPassword]').val();

            if(!fphone){
                alertMsg('请输入手机号');
                return false;
            }
            if(!fcaptcha){
                alertMsg('请输入验证码');
                return false;
            }
            if(!newPassword){
                alertMsg('请输入新密码');
                return false;
            }
            if(!confirmPassword){
                alertMsg('请输入确认密码');
                return false;
            }
            if(newPassword != confirmPassword) {
                alertMsg('密码不一致');
                return false;
            }

            $.ajax({
                url:host + "/Login/forgetPwd",
                type:"post",
                data:{mobile:fphone,pwd:newPassword,code:fcaptcha},
                dataType:"json",
                success:function(data){
                    if(data.errcode != 10000){
                        alertMsg(data.msg);
                    }else{
                        alertMsg("找回成功");
                        window.location.reload();
                    }

                }
            });

        });
        var wait=60;
        function time(o) {
            if (wait == 0) {
                $(o).text("免费获取短信");
                wait = 60;
            } else {
                $(o).text("重新发送(" + wait + ")");
                console.log(o);
                wait--;
                setTimeout(function() {
                        time(o)
                    },
                    1000)
            }
        }

        /**
         * 发送验证码
         */
        $('.send-captcha').click(function(){
            var fphone = $('input[name=fphone]').val();
            var mobile = $('input[name=mobile]').val();

            if(!fphone && !mobile){
                alertMsg('请输入手机号');
                return false;
            }
            if(!fphone){
                fphone = mobile;
            }
            if(wait < 60 && wait != 0){
                return false;
            }
            var thas = this;
            $.ajax({
                url:host + "/Tool/sendCode",
                type:"post",
                data:{mobile:fphone},
                dataType:"json",
                success:function(data){
                    if(data.errcode != 10000){
                        alertMsg(data.msg);
                    }else{
                        alertMsg("发送成功");
                        time(thas);
                    }

                }
            });

        });

        $(".reg").on('touchstart',function() {
            //alert(1)
            var leadMobile = $('input[name=leadMobile]').val();
            var mobile = $('input[name=mobile]').val();
            var pwd = $('input[name=pwd]').val();
            var payPwd = $('input[name=payPwd]').val();
            var realname = $('input[name=realname]').val();
            var code = $('input[name=code]').val();
            var data = {leadMobile:leadMobile,mobile:mobile,pwd:pwd,payPwd:payPwd,realname:realname,code:code};
            if(!leadMobile){
                alertMsg("请填写上级手机号");
                return false;
            }
            if(!mobile){
                alertMsg("请填写手机号");
                return false;
            }
            if(!pwd){
                alertMsg("请填写密码");
                return false;
            }
            if(!payPwd){
                alertMsg("请填写确认密码");
                return false;
            }
            if(!realname){
                alertMsg("请填写名字");
                return false;
            }
            if(!code){
                alertMsg("请填写验证码");
                return false;
            }
            if(payPwd != pwd){
                alertMsg("两次密码不一致");
                return false;
            }
            $.ajax({
                url:host + "/Login/reg",
                type:"post",
                data:data,
                dataType:"json",
                success:function(data){
                    if(data.errcode != 10000){
                        alertMsg(data.msg);
                    }else{
                        alertMsg("注册成功");
                        history.go(0);
                    }

                }
            });

        });

        $('.loginBtn').click(function(){
            var phone = $('input[name=phone]').val();
            var password = $('input[name=password]').val();

            if(!phone){
                alertMsg('请输入手机号');
                return false;
            }
            if(!password){
                alertMsg('请输入密码');
                return false;
            }
            $.ajax({
                //url:host + "/Login/testid",
				url:"<?php echo U('Login/testid');?>",
                type:"post",
                data:{mobile:phone,pwd:password},
                dataType:"json",
                success:function(data){
				    console.log(data);
                    if(data.success!=1){
                        alertMsg(data.msg);
                    }else{
                        alertMsg("登录成功",function(){
//                            sessionStorage.setItem('userInfo',JSON.stringify(data.result[0]));
//                            var token = data.result[0].token;
//                            var url = "<<?php echo U('Index/farm');?>>?token="+token;
							var url = "<?php echo U('Index/farm');?>";
                            self.location=url;
                        });

                    }
                }
            });
        });




    })
</script>
</body>
</html>