$(function () {
    $('.outerDiv').css({
        'height': $(window).outerHeight() + 'px'
    });

    /**
     * 滚动条切换*/
    $('.scrollChange img').click(function () {
        if($(this).index() == 0){
            $('.gameBody').animate({scrollTop: '0px'}, 500);
        }else{
            $('.gameBody').animate({scrollTop:$('.bottonPosition').offset().top}, 500);
        }
    });
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
    /**
     *充值功能
     * */
    /*点击呼出充值*/
    $('.chargeCall').on('click', function () {
        $('.chageDiv').fadeIn();
    });
    /*点击关闭充值*/
    $('.closeCharge').click(function () {
        $(this).parent().fadeOut();
    });
    /*充值方式点击切换*/
    $('.chargeTypeSelect ').click(function () {
        $('.chargeTypeSelect').removeClass('selected');
        $(this).addClass('selected');
    });
    /*充值金额选择*/
    $('.chargeNumBlock ').click(function () {
        $('.chargeNumBlock ').removeClass('selected');
        $(this).addClass('selected');
    });
    /*确定充值*/
    $('.chargeButton').click(function () {
        promptTrueOrFalseCall('确定充值？');
    });

    /**
     * 升级商店*/
    // $('.upgradeCall').click(function () {
    //     $('.upgradeShow').fadeIn();
    // });
    //关闭升级商店
    $('.upgradeTitle img').click(function () {
        $('.upgradeShow').fadeOut();
    });
    /*所有的 升级商店呼出按钮*/
    var seamUpCallAll = $('.seamUpCall');
    var upgradeAll = $('.upgradeShow');
    $(seamUpCallAll).click(function () {
        $(upgradeAll[parseInt($(this).attr('callnumber')) - 1]).fadeIn();
    });
    /**
     * 好友*/
    $('.friendCall').click(function () {
        $('.friend').fadeIn();
    });
    $('.closeFrienList').click(function () {
        $('.friend').fadeOut();
    });
    /*好友：赠送积分界面呼出*/
    $('.intergralBtn').click(function(){
        $('.intergralInputDiv').addClass('showAction');
    });
    $('.giveStop').click(function(){
        $('.intergralInputDiv').removeClass('showAction');
    });
    /*好友：赠送类型选择*/
    $('.intergralSelect').click(function(){
        $('.integralType').addClass('integralTypeShow');
       setTimeout(function(){
           var typeMessageAll = $('.integralType div');
           var showIndex = 0;
           var typeMessageShow = setInterval(function(){
               $(typeMessageAll[showIndex]).fadeIn(1000);
               if(showIndex >= typeMessageAll.length){
                   clearInterval(typeMessageShow);
               }else{
                   showIndex++;
               }

           },100);
       },1000);
    });
    $('.integralType div').click(function(){
        $('.intergralSelect').val($(this).text());
        $('.integralType div').fadeOut();
        $('.integralType').removeClass('integralTypeShow');
    });
    /**
     * 个人中心*/
    /*呼出个人中心*/
    $('.userCenterCall').click(function () {
        $('.userCenter').fadeIn();
    });
    /*关闭个人中心*/
    $('.closeUserCenter').click(function () {
        $('.userCenter').fadeOut();
    });
    /*个人中心：兑换记录切换*/
    $('.exchangeHistorySelect div').click(function(){
        $('.exchangeHistorySelect div').removeClass('active');
        $(this).addClass('active');
        var exchangeListAll = $('.exchangeHistoryList');
        $(exchangeListAll).hide();
        $(exchangeListAll[$(this).index()]).slideDown();

    });
    /*个人中心：记录点击向下箭头 展示详细信息*/
    $('.miningHistory_date').click(function () {
        $(this).parent().find('.miningHistory_message').slideToggle();
    });
    /*底部的功能按钮*/
    var userCenterBottomButton = $('.userCenter_bottomFunctionSelect div');
    var userCenterFunctionBlock = $('.userCenter_functionDisplay');
    $('.userCenter').css({
        'height': $(window).outerHeight() + 'px'
    });
    /*点击底部按钮切换对应显示块*/
    $(userCenterBottomButton).click(function () {
        $(userCenterBottomButton).removeClass('active');
        $(this).addClass('active');
        $(userCenterFunctionBlock).hide();
        $(userCenterFunctionBlock[$(this).index()]).fadeIn();
    });
    /**
     * 商店*/
    /*获取所有的显示块*/
    var catchShopAll = $('.catchShopDisplay');
    /*所有的选择切换图片*/
    var catchShopSelectImgAll = $('.catchShop_leftControl img');
    /*呼出现金商店*/
    $('.catchShopCall').click(function () {
        $('.catchShop').fadeIn();
    });
    /*关闭现金商店*/
    $('.closeCatchShop').click(function () {
        $('.catchShop').fadeOut();
    });
    /*点击图片 切换对应的商店*/
    $(catchShopSelectImgAll).click(function () {
        $(catchShopAll).hide();
        $(catchShopAll[$(this).index()]).fadeIn();
    });
    /**
     * 商店：宝箱购买*/
    $('.caseBlock div').click(function () {
        promptTrueOrFalseCall('是否购买宝箱？');
    });
    /**
     * 商店：积分互换*/
    /*获取可以切换位置的图片*/
    var exchangeImgAll = $('.exchangeDiv img');
    /*获取可以切换的输入表单*/
    var exchange_inputAll = $('.exchange_inputForm');
    /*记录图片的位置*/
    var exchangeImgAll_position;
    /*避免用户连续点击计数*/
    var clickTime = 0;
    /*判断当前显示的表单*/
    var showForm = 0;
    $('.exchange_inputChange').click(function () {
        if (clickTime == 0) {
            clickTime = 1;
            setTimeout(function () {
                clickTime = 0;
            }, 1000);
            /*图片位置互换*/
            exchangeImgAll_position = $(exchangeImgAll[0]).css('transform');
            $(exchangeImgAll[0]).css('transform', $(exchangeImgAll[2]).css('transform'));
            $(exchangeImgAll[2]).css('transform', exchangeImgAll_position);
            /*输入表单切换*/
            $(exchange_inputAll).hide();
            if (showForm == 0) {
                showForm = 1;
                $(exchange_inputAll[showForm]).fadeIn();
            } else {
                showForm = 0;
                $(exchange_inputAll[showForm]).fadeIn();
            }
        } else {
            /*点击间隔小于2秒 不执行操作*/
        }

    });
    /*点击兑换确定按钮 提示信息*/
    $('.exchange_inputForm div').click(function () {
        promptTrueOrFalseCall('是否兑换？');
    });
    /**
     *仓库模块*/
    $('.propsUse').click(function () {
        promptOnlyTrue('暂时无法使用道具！');
    });
    /**
     *
     * 游戏模块*/
    $('.gameBody').css({
        'height': $(window).outerHeight() + 'px'
    });
    /**游戏顶部canvas绘制*/
    var gameTopCanvas = document.getElementsByClassName('gameBody_topCanvas')[0];
    var topCtx = gameTopCanvas.getContext('2d');
    /**顶部：左侧传送机器绘制*/
    var top_leftMachinePoint = {x: 0, y: 368, w: 300, h: 400};
    var leftMachineImg = document.getElementById('gameTopLeft');

    function top_leftMachine(ctx) {
        ctx.beginPath();
        ctx.drawImage(leftMachineImg, top_leftMachinePoint.x, top_leftMachinePoint.y, top_leftMachinePoint.w, top_leftMachinePoint.h);
        ctx.stroke();
        ctx.closePath();
    }

    top_leftMachine(topCtx);

    /**顶部：右侧机器*/
    var top_rightMachinePoint = {x: (topCtx.canvas.width - 220), y: 368, w: 220, h: 400};
    var topRightMachineImg = document.getElementById('gameTopRight');

    function top_rightMachine(ctx) {
        ctx.beginPath();
        ctx.drawImage(topRightMachineImg, top_rightMachinePoint.x, top_rightMachinePoint.y, top_rightMachinePoint.w, top_rightMachinePoint.h);
        ctx.stroke();
        ctx.closePath();
    }

    /**顶部：人物绘制*/
    /**/
    var topHumenPoint = {
        x: 205,
        y: 690,
        w: 140,
        h: 80,
        g: 5,
        acp_x: 70,
        acp_y: 55,
        max_width: 900,
        min_width: 200,
        imgWidthLength: 2220,
        img_SX: 70,
        img_SY: 55,
        img_swidth: 430
    };
    var topHumenImg_go = document.getElementById('topHumengo');
    var topHumenImg_com = document.getElementById('topHumenCome');
    var topLeftHumen = document.getElementById('gameTopLeftHumen');
    var topRightHumen = document.getElementById('gameTopRightHumen');
    var topHumenDraw = topHumenImg_go;
    function topleftHumenAction (ctx){
        ctx.beginPath();
        ctx.drawImage(topLeftHumen,20,635,150,120);
        ctx.stroke();
        ctx.closePath();
    }
    function topRightHumenAction (ctx){
        ctx.beginPath();
        ctx.drawImage(topRightHumen,820,670,200,110);
        ctx.stroke();
        ctx.closePath();
    }
    function topHumenAction(ctx, drawImg) {
        ctx.beginPath();
        ctx.drawImage(drawImg, topHumenPoint.acp_x, topHumenPoint.acp_y, 420, 345, topHumenPoint.x, topHumenPoint.y, topHumenPoint.w, topHumenPoint.h);
        ctx.stroke();
        ctx.closePath();
    }

    function topHumenMove(ctx, drawImg) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        if ((topHumenPoint.x + topHumenPoint.w) >= topHumenPoint.max_width) {
            topHumenPoint.g = -topHumenPoint.g;
            topHumenDraw = topHumenImg_com;
            clearInterval(topActive);
            setTimeout(function(){
                topActive = setInterval(function () {
                    topHumenMove(topCtx, topHumenDraw);
                }, 100);
            },2000);
        }
        if (topHumenPoint.x < topHumenPoint.min_width) {
            topHumenPoint.g -= (topHumenPoint.g * 2);
            topHumenDraw = topHumenImg_go;
            clearInterval(topActive);
            document.getElementsByClassName('topMineral')[0].style.display = 'block';
            setTimeout(function(){
                document.getElementsByClassName('topMineral')[0].style.display = 'none';
                topActive = setInterval(function () {
                    topHumenMove(topCtx, topHumenDraw);
                }, 100);
            },2000);
        }
        if (topHumenPoint.acp_x >= topHumenPoint.imgWidthLength) {
            topHumenPoint.acp_x = topHumenPoint.img_SX;
        }


        top_leftMachine(ctx);
        top_rightMachine(ctx);
        topleftHumenAction(ctx);
        topRightHumenAction(ctx);
        topHumenAction(ctx, drawImg);
        topHumenPoint.x += topHumenPoint.g;
        topHumenPoint.acp_x += topHumenPoint.img_swidth;
    }

    /**顶部：场景绘制*/
    var topActive = setInterval(function () {
        topHumenMove(topCtx, topHumenDraw);
    }, 80);


    /**矿层绘制*/
    /*获取矿层数组*/
    var seam = document.getElementsByClassName('seam');
    /*声明所有矿层上下文环境*/
    var seam_ctx = new Array();
    for (var i = 0; i < seam.length; i++) {
        seam_ctx[i] = seam[i].getContext('2d');
    }

    /*获取人物图片*/
    /*挖矿人物图片*/
    var seamHumen_1 = document.getElementById('gameTopHumen');  //无位移 挖矿人物图片
    var seamHumen_2 = document.getElementById('gameTopHumen1'); //右位移 空手行走人物图片
    var seamHumen_3 = document.getElementById('gameTopHumen2'); //左位移 背包行走人物图片
    var maxRight = 750;     //人物右移动 最大宽度
    var minLeft = 160;      //人物左移动 最小宽度
    var imgWidthLength = 1900;      //图片的最大宽度
    var img_SX = 170;        //截取图片的 X轴坐标
    var img_swidth = 370;   //截取图片的跨度

    /*第一矿层 */
    /*用于接受绘制的人物图片*/
    var seam_1_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_1_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_1_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 150, acp_y: 60};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_1_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 150, acp_y: 60, g: 8};  //第二个行走人物
    var seam_1_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 150, acp_y: 60, g: 5};  //第三个行走人物
    /*绘制人物方法*/
    function seam_1_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_1_point_1.acp_x, seam_1_point_1.acp_y, 305, 320, seam_1_point_1.x, seam_1_point_1.y, seam_1_point_1.w, seam_1_point_1.h);
        ctx.drawImage(drawImg2, seam_1_point_2.acp_x, seam_1_point_2.acp_y, 305, 320, seam_1_point_2.x, seam_1_point_2.y, seam_1_point_2.w, seam_1_point_2.h);
        ctx.drawImage(drawImg3, seam_1_point_3.acp_x, seam_1_point_3.acp_y, 305, 320, seam_1_point_3.x, seam_1_point_3.y, seam_1_point_3.w, seam_1_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_1_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_1_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_1_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_1_point_2.x + seam_1_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_1_DrawImg_2 = seamHumen_3;
            seam_1_point_2.g = -seam_1_point_2.g;

        }
        if (seam_1_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_1_DrawImg_2 = seamHumen_2;
            seam_1_point_2.g -= (seam_1_point_2.g * 2);
        }
        if (seam_1_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_1_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_1_point_3.x + seam_1_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_1_DrawImg_3 = seamHumen_3;
            seam_1_point_3.g = -seam_1_point_3.g;
        }
        if (seam_1_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_1_DrawImg_3 = seamHumen_2;
            seam_1_point_3.g -= (seam_1_point_3.g * 2);
        }
        if (seam_1_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_1_point_3.acp_x = img_SX;
        }

        seam_1_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_1_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_1_point_2.x += seam_1_point_2.g;                           //变更 人物移动x轴坐标
        seam_1_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_1_point_3.x += seam_1_point_3.g;                           //变更 人物移动x轴坐标
        seam_1_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第2矿层 */
    /*用于接受绘制的人物图片*/
    var seam_2_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_2_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_2_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_2_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 11};  //第二个行走人物
    var seam_2_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 9};  //第三个行走人物
    /*绘制人物方法*/
    function seam_2_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_2_point_1.acp_x, seam_2_point_1.acp_y, 305, 320, seam_2_point_1.x, seam_2_point_1.y, seam_2_point_1.w, seam_2_point_1.h);
        ctx.drawImage(drawImg2, seam_2_point_2.acp_x, seam_2_point_2.acp_y, 305, 320, seam_2_point_2.x, seam_2_point_2.y, seam_2_point_2.w, seam_2_point_2.h);
        ctx.drawImage(drawImg3, seam_2_point_3.acp_x, seam_2_point_3.acp_y, 305, 320, seam_2_point_3.x, seam_2_point_3.y, seam_2_point_3.w, seam_2_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_2_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_2_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_2_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_2_point_2.x + seam_2_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_2_DrawImg_2 = seamHumen_3;
            seam_2_point_2.g = -seam_2_point_2.g;

        }
        if (seam_2_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_2_DrawImg_2 = seamHumen_2;
            seam_2_point_2.g -= (seam_2_point_2.g * 2);
        }
        if (seam_2_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_2_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_2_point_3.x + seam_2_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_2_DrawImg_3 = seamHumen_3;
            seam_2_point_3.g = -seam_2_point_3.g;
        }
        if (seam_2_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_2_DrawImg_3 = seamHumen_2;
            seam_2_point_3.g -= (seam_2_point_3.g * 2);
        }
        if (seam_2_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_2_point_3.acp_x = img_SX;
        }

        seam_2_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_2_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_2_point_2.x += seam_2_point_2.g;                           //变更 人物移动x轴坐标
        seam_2_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_2_point_3.x += seam_2_point_3.g;                           //变更 人物移动x轴坐标
        seam_2_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第3矿层 */
    /*用于接受绘制的人物图片*/
    var seam_3_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_3_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_3_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_3_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 12};  //第二个行走人物
    var seam_3_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 11};  //第三个行走人物
    /*绘制人物方法*/
    function seam_3_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_3_point_1.acp_x, seam_3_point_1.acp_y, 305, 320, seam_3_point_1.x, seam_3_point_1.y, seam_3_point_1.w, seam_3_point_1.h);
        ctx.drawImage(drawImg2, seam_3_point_2.acp_x, seam_3_point_2.acp_y, 305, 320, seam_3_point_2.x, seam_3_point_2.y, seam_3_point_2.w, seam_3_point_2.h);
        ctx.drawImage(drawImg3, seam_3_point_3.acp_x, seam_3_point_3.acp_y, 305, 320, seam_3_point_3.x, seam_3_point_3.y, seam_3_point_3.w, seam_3_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_3_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_3_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_3_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_3_point_2.x + seam_3_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_3_DrawImg_2 = seamHumen_3;
            seam_3_point_2.g = -seam_3_point_2.g;

        }
        if (seam_3_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_3_DrawImg_2 = seamHumen_2;
            seam_3_point_2.g -= (seam_3_point_2.g * 2);
        }
        if (seam_3_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_3_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_3_point_3.x + seam_3_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_3_DrawImg_3 = seamHumen_3;
            seam_3_point_3.g = -seam_3_point_3.g;
        }
        if (seam_3_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_3_DrawImg_3 = seamHumen_2;
            seam_3_point_3.g -= (seam_3_point_3.g * 2);
        }
        if (seam_3_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_3_point_3.acp_x = img_SX;
        }

        seam_3_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_3_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_3_point_2.x += seam_3_point_2.g;                           //变更 人物移动x轴坐标
        seam_3_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_3_point_3.x += seam_3_point_3.g;                           //变更 人物移动x轴坐标
        seam_3_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第4矿层 */
    /*用于接受绘制的人物图片*/
    var seam_4_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_4_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_4_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_4_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 13};  //第二个行走人物
    var seam_4_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 10};  //第三个行走人物
    /*绘制人物方法*/
    function seam_4_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_4_point_1.acp_x, seam_4_point_1.acp_y, 305, 320, seam_4_point_1.x, seam_4_point_1.y, seam_4_point_1.w, seam_4_point_1.h);
        ctx.drawImage(drawImg2, seam_4_point_2.acp_x, seam_4_point_2.acp_y, 305, 320, seam_4_point_2.x, seam_4_point_2.y, seam_4_point_2.w, seam_4_point_2.h);
        ctx.drawImage(drawImg3, seam_4_point_3.acp_x, seam_4_point_3.acp_y, 305, 320, seam_4_point_3.x, seam_4_point_3.y, seam_4_point_3.w, seam_4_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_4_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_4_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_4_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_4_point_2.x + seam_4_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_4_DrawImg_2 = seamHumen_3;
            seam_4_point_2.g = -seam_4_point_2.g;

        }
        if (seam_4_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_4_DrawImg_2 = seamHumen_2;
            seam_4_point_2.g -= (seam_4_point_2.g * 2);
        }
        if (seam_4_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_4_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_4_point_3.x + seam_4_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_4_DrawImg_3 = seamHumen_3;
            seam_4_point_3.g = -seam_4_point_3.g;
        }
        if (seam_4_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_4_DrawImg_3 = seamHumen_2;
            seam_4_point_3.g -= (seam_4_point_3.g * 2);
        }
        if (seam_4_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_4_point_3.acp_x = img_SX;
        }

        seam_4_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_4_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_4_point_2.x += seam_4_point_2.g;                           //变更 人物移动x轴坐标
        seam_4_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_4_point_3.x += seam_4_point_3.g;                           //变更 人物移动x轴坐标
        seam_4_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第5矿层 */
    /*用于接受绘制的人物图片*/
    var seam_5_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_5_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_5_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_5_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 11};  //第二个行走人物
    var seam_5_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 9};  //第三个行走人物
    /*绘制人物方法*/
    function seam_5_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_5_point_1.acp_x, seam_5_point_1.acp_y, 305, 320, seam_5_point_1.x, seam_5_point_1.y, seam_5_point_1.w, seam_5_point_1.h);
        ctx.drawImage(drawImg2, seam_5_point_2.acp_x, seam_5_point_2.acp_y, 305, 320, seam_5_point_2.x, seam_5_point_2.y, seam_5_point_2.w, seam_5_point_2.h);
        ctx.drawImage(drawImg3, seam_5_point_3.acp_x, seam_5_point_3.acp_y, 305, 320, seam_5_point_3.x, seam_5_point_3.y, seam_5_point_3.w, seam_5_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_5_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_5_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_5_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_5_point_2.x + seam_5_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_5_DrawImg_2 = seamHumen_3;
            seam_5_point_2.g = -seam_5_point_2.g;

        }
        if (seam_5_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_5_DrawImg_2 = seamHumen_2;
            seam_5_point_2.g -= (seam_5_point_2.g * 2);
        }
        if (seam_5_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_5_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_5_point_3.x + seam_5_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_5_DrawImg_3 = seamHumen_3;
            seam_5_point_3.g = -seam_5_point_3.g;
        }
        if (seam_5_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_5_DrawImg_3 = seamHumen_2;
            seam_5_point_3.g -= (seam_5_point_3.g * 2);
        }
        if (seam_5_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_5_point_3.acp_x = img_SX;
        }

        seam_5_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_5_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_5_point_2.x += seam_5_point_2.g;                           //变更 人物移动x轴坐标
        seam_5_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_5_point_3.x += seam_5_point_3.g;                           //变更 人物移动x轴坐标
        seam_5_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第6矿层 */
    /*用于接受绘制的人物图片*/
    var seam_6_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_6_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_6_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_6_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 13};  //第二个行走人物
    var seam_6_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 8};  //第三个行走人物
    /*绘制人物方法*/
    function seam_6_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_6_point_1.acp_x, seam_6_point_1.acp_y, 305, 320, seam_6_point_1.x, seam_6_point_1.y, seam_6_point_1.w, seam_6_point_1.h);
        ctx.drawImage(drawImg2, seam_6_point_2.acp_x, seam_6_point_2.acp_y, 305, 320, seam_6_point_2.x, seam_6_point_2.y, seam_6_point_2.w, seam_6_point_2.h);
        ctx.drawImage(drawImg3, seam_6_point_3.acp_x, seam_6_point_3.acp_y, 305, 320, seam_6_point_3.x, seam_6_point_3.y, seam_6_point_3.w, seam_6_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_6_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_6_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_6_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_6_point_2.x + seam_6_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_6_DrawImg_2 = seamHumen_3;
            seam_6_point_2.g = -seam_6_point_2.g;

        }
        if (seam_6_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_6_DrawImg_2 = seamHumen_2;
            seam_6_point_2.g -= (seam_6_point_2.g * 2);
        }
        if (seam_6_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_6_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_6_point_3.x + seam_6_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_6_DrawImg_3 = seamHumen_3;
            seam_6_point_3.g = -seam_6_point_3.g;
        }
        if (seam_6_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_6_DrawImg_3 = seamHumen_2;
            seam_6_point_3.g -= (seam_6_point_3.g * 2);
        }
        if (seam_6_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_6_point_3.acp_x = img_SX;
        }

        seam_6_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_6_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_6_point_2.x += seam_6_point_2.g;                           //变更 人物移动x轴坐标
        seam_6_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_6_point_3.x += seam_6_point_3.g;                           //变更 人物移动x轴坐标
        seam_6_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第7矿层 */
    /*用于接受绘制的人物图片*/
    var seam_7_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_7_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_7_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_7_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 12};  //第二个行走人物
    var seam_7_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 10};  //第三个行走人物
    /*绘制人物方法*/
    function seam_7_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_7_point_1.acp_x, seam_7_point_1.acp_y, 305, 320, seam_7_point_1.x, seam_7_point_1.y, seam_7_point_1.w, seam_7_point_1.h);
        ctx.drawImage(drawImg2, seam_7_point_2.acp_x, seam_7_point_2.acp_y, 305, 320, seam_7_point_2.x, seam_7_point_2.y, seam_7_point_2.w, seam_7_point_2.h);
        ctx.drawImage(drawImg3, seam_7_point_3.acp_x, seam_7_point_3.acp_y, 305, 320, seam_7_point_3.x, seam_7_point_3.y, seam_7_point_3.w, seam_7_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_7_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_7_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_7_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_7_point_2.x + seam_7_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_7_DrawImg_2 = seamHumen_3;
            seam_7_point_2.g = -seam_7_point_2.g;

        }
        if (seam_7_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_7_DrawImg_2 = seamHumen_2;
            seam_7_point_2.g -= (seam_7_point_2.g * 2);
        }
        if (seam_7_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_7_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_7_point_3.x + seam_7_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_7_DrawImg_3 = seamHumen_3;
            seam_7_point_3.g = -seam_7_point_3.g;
        }
        if (seam_7_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_7_DrawImg_3 = seamHumen_2;
            seam_7_point_3.g -= (seam_7_point_3.g * 2);
        }
        if (seam_7_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_7_point_3.acp_x = img_SX;
        }

        seam_7_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_7_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_7_point_2.x += seam_7_point_2.g;                           //变更 人物移动x轴坐标
        seam_7_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_7_point_3.x += seam_7_point_3.g;                           //变更 人物移动x轴坐标
        seam_7_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第8矿层 */
    /*用于接受绘制的人物图片*/
    var seam_8_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_8_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_8_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_8_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 11};  //第二个行走人物
    var seam_8_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 8};  //第三个行走人物
    /*绘制人物方法*/
    function seam_8_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_8_point_1.acp_x, seam_8_point_1.acp_y, 305, 320, seam_8_point_1.x, seam_8_point_1.y, seam_8_point_1.w, seam_8_point_1.h);
        ctx.drawImage(drawImg2, seam_8_point_2.acp_x, seam_8_point_2.acp_y, 305, 320, seam_8_point_2.x, seam_8_point_2.y, seam_8_point_2.w, seam_8_point_2.h);
        ctx.drawImage(drawImg3, seam_8_point_3.acp_x, seam_8_point_3.acp_y, 305, 320, seam_8_point_3.x, seam_8_point_3.y, seam_8_point_3.w, seam_8_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_8_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_8_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_8_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_8_point_2.x + seam_8_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_8_DrawImg_2 = seamHumen_3;
            seam_8_point_2.g = -seam_8_point_2.g;

        }
        if (seam_8_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_8_DrawImg_2 = seamHumen_2;
            seam_8_point_2.g -= (seam_8_point_2.g * 2);
        }
        if (seam_8_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_8_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_8_point_3.x + seam_8_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_8_DrawImg_3 = seamHumen_3;
            seam_8_point_3.g = -seam_8_point_3.g;
        }
        if (seam_8_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_8_DrawImg_3 = seamHumen_2;
            seam_8_point_3.g -= (seam_8_point_3.g * 2);
        }
        if (seam_8_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_8_point_3.acp_x = img_SX;
        }

        seam_8_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_8_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_8_point_2.x += seam_8_point_2.g;                           //变更 人物移动x轴坐标
        seam_8_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_8_point_3.x += seam_8_point_3.g;                           //变更 人物移动x轴坐标
        seam_8_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第9矿层 */
    /*用于接受绘制的人物图片*/
    var seam_9_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_9_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_9_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_9_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 11};  //第二个行走人物
    var seam_9_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 9};  //第三个行走人物
    /*绘制人物方法*/
    function seam_9_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_9_point_1.acp_x, seam_9_point_1.acp_y, 305, 320, seam_9_point_1.x, seam_9_point_1.y, seam_9_point_1.w, seam_9_point_1.h);
        ctx.drawImage(drawImg2, seam_9_point_2.acp_x, seam_9_point_2.acp_y, 305, 320, seam_9_point_2.x, seam_9_point_2.y, seam_9_point_2.w, seam_9_point_2.h);
        ctx.drawImage(drawImg3, seam_9_point_3.acp_x, seam_9_point_3.acp_y, 305, 320, seam_9_point_3.x, seam_9_point_3.y, seam_9_point_3.w, seam_9_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_9_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_9_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_9_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_9_point_2.x + seam_9_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_9_DrawImg_2 = seamHumen_3;
            seam_9_point_2.g = -seam_9_point_2.g;

        }
        if (seam_9_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_9_DrawImg_2 = seamHumen_2;
            seam_9_point_2.g -= (seam_9_point_2.g * 2);
        }
        if (seam_9_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_9_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_9_point_3.x + seam_9_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_9_DrawImg_3 = seamHumen_3;
            seam_9_point_3.g = -seam_9_point_3.g;
        }
        if (seam_9_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_9_DrawImg_3 = seamHumen_2;
            seam_9_point_3.g -= (seam_9_point_3.g * 2);
        }
        if (seam_9_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_9_point_3.acp_x = img_SX;
        }

        seam_9_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_9_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_9_point_2.x += seam_9_point_2.g;                           //变更 人物移动x轴坐标
        seam_9_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_9_point_3.x += seam_9_point_3.g;                           //变更 人物移动x轴坐标
        seam_9_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第10矿层 */
    /*用于接受绘制的人物图片*/
    var seam_10_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_10_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_10_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_10_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 12};  //第二个行走人物
    var seam_10_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 8};  //第三个行走人物
    /*绘制人物方法*/
    function seam_10_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_10_point_1.acp_x, seam_10_point_1.acp_y, 305, 320, seam_10_point_1.x, seam_10_point_1.y, seam_10_point_1.w, seam_10_point_1.h);
        ctx.drawImage(drawImg2, seam_10_point_2.acp_x, seam_10_point_2.acp_y, 305, 320, seam_10_point_2.x, seam_10_point_2.y, seam_10_point_2.w, seam_10_point_2.h);
        ctx.drawImage(drawImg3, seam_10_point_3.acp_x, seam_10_point_3.acp_y, 305, 320, seam_10_point_3.x, seam_10_point_3.y, seam_10_point_3.w, seam_10_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_10_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_10_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_10_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_10_point_2.x + seam_10_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_10_DrawImg_2 = seamHumen_3;
            seam_10_point_2.g = -seam_10_point_2.g;

        }
        if (seam_10_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_10_DrawImg_2 = seamHumen_2;
            seam_10_point_2.g -= (seam_10_point_2.g * 2);
        }
        if (seam_10_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_10_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_10_point_3.x + seam_10_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_10_DrawImg_3 = seamHumen_3;
            seam_10_point_3.g = -seam_10_point_3.g;
        }
        if (seam_10_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_10_DrawImg_3 = seamHumen_2;
            seam_10_point_3.g -= (seam_10_point_3.g * 2);
        }
        if (seam_10_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_10_point_3.acp_x = img_SX;
        }

        seam_10_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_10_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_10_point_2.x += seam_10_point_2.g;                           //变更 人物移动x轴坐标
        seam_10_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_10_point_3.x += seam_10_point_3.g;                           //变更 人物移动x轴坐标
        seam_10_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第11矿层 */
    /*用于接受绘制的人物图片*/
    var seam_11_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_11_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_11_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_11_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 13};  //第二个行走人物
    var seam_11_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 8};  //第三个行走人物
    /*绘制人物方法*/
    function seam_11_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_11_point_1.acp_x, seam_11_point_1.acp_y, 305, 320, seam_11_point_1.x, seam_11_point_1.y, seam_11_point_1.w, seam_11_point_1.h);
        ctx.drawImage(drawImg2, seam_11_point_2.acp_x, seam_11_point_2.acp_y, 305, 320, seam_11_point_2.x, seam_11_point_2.y, seam_11_point_2.w, seam_11_point_2.h);
        ctx.drawImage(drawImg3, seam_11_point_3.acp_x, seam_11_point_3.acp_y, 305, 320, seam_11_point_3.x, seam_11_point_3.y, seam_11_point_3.w, seam_11_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_11_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_11_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_11_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_11_point_2.x + seam_11_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_11_DrawImg_2 = seamHumen_3;
            seam_11_point_2.g = -seam_11_point_2.g;

        }
        if (seam_11_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_11_DrawImg_2 = seamHumen_2;
            seam_11_point_2.g -= (seam_11_point_2.g * 2);
        }
        if (seam_11_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_11_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_11_point_3.x + seam_11_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_11_DrawImg_3 = seamHumen_3;
            seam_11_point_3.g = -seam_11_point_3.g;
        }
        if (seam_11_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_11_DrawImg_3 = seamHumen_2;
            seam_11_point_3.g -= (seam_11_point_3.g * 2);
        }
        if (seam_11_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_11_point_3.acp_x = img_SX;
        }

        seam_11_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_11_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_11_point_2.x += seam_11_point_2.g;                           //变更 人物移动x轴坐标
        seam_11_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_11_point_3.x += seam_11_point_3.g;                           //变更 人物移动x轴坐标
        seam_11_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }

    /*第12矿层 */
    /*用于接受绘制的人物图片*/
    var seam_12_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_12_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_12_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_12_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 12};  //第二个行走人物
    var seam_12_point_3 = {x: 160, y: 520, w: 150, h: 200, acp_x: 100, acp_y: 77, g: 10};  //第三个行走人物
    /*绘制人物方法*/
    function seam_12_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_12_point_1.acp_x, seam_12_point_1.acp_y, 305, 320, seam_12_point_1.x, seam_12_point_1.y, seam_12_point_1.w, seam_12_point_1.h);
        ctx.drawImage(drawImg2, seam_12_point_2.acp_x, seam_12_point_2.acp_y, 305, 320, seam_12_point_2.x, seam_12_point_2.y, seam_12_point_2.w, seam_12_point_2.h);
        ctx.drawImage(drawImg3, seam_12_point_3.acp_x, seam_12_point_3.acp_y, 305, 320, seam_12_point_3.x, seam_12_point_3.y, seam_12_point_3.w, seam_12_point_3.h);
        ctx.stroke();
        ctx.closePath();
    }

    /*修改人物 移动坐标点，判断到达相应坐标点 变更绘制图片*/
    function seam_12_imgMove(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);      //清空画布

        if (seam_12_point_1.acp_x >= imgWidthLength) {                 //固定挖矿人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_12_point_1.acp_x = img_SX;
        }
        /**************/
        if ((seam_12_point_2.x + seam_12_point_2.w) >= maxRight) {      //第二个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_12_DrawImg_2 = seamHumen_3;
            seam_12_point_2.g = -seam_12_point_2.g;

        }
        if (seam_12_point_2.x < minLeft) {                             //第二个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_12_DrawImg_2 = seamHumen_2;
            seam_12_point_2.g -= (seam_12_point_2.g * 2);
        }
        if (seam_12_point_2.acp_x >= imgWidthLength) {                 //第二个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_12_point_2.acp_x = img_SX;
        }
        /**************/
        if ((seam_12_point_3.x + seam_12_point_3.w) >= maxRight) {      //第三个人物 如果绘制X轴坐标 大于最大移动距离 反向运动，变更绘制图片
            seam_12_DrawImg_3 = seamHumen_3;
            seam_12_point_3.g = -seam_12_point_3.g;
        }
        if (seam_12_point_3.x < minLeft) {                             //第三个人物 如果绘制X轴坐标 小于最小移动距离 正向运动，变更绘制图片
            seam_12_DrawImg_3 = seamHumen_2;
            seam_12_point_3.g -= (seam_12_point_3.g * 2);
        }
        if (seam_12_point_3.acp_x >= imgWidthLength) {                 //第三个人物 如果截取的X轴坐标超过图片长度 变更为初始坐标
            seam_12_point_3.acp_x = img_SX;
        }

        seam_12_drawImg(ctx, drawImg1, drawImg2, drawImg3);             //调用绘制人物方法
        //第一个人物
        seam_12_point_1.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第2个人物
        seam_12_point_2.x += seam_12_point_2.g;                           //变更 人物移动x轴坐标
        seam_12_point_2.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
        //第3个人物
        seam_12_point_3.x += seam_12_point_3.g;                           //变更 人物移动x轴坐标
        seam_12_point_3.acp_x += img_swidth;                             //变更 图片截取X轴坐标点
    }




    /**
     * 手动点击挖矿 10秒*/
    var minerActionImg = document.getElementsByClassName('minerAction');       //获取所有手动挖矿的点击按钮
    for(var i = 0; i < minerActionImg.length; i ++){

       minerActionImg[i].onclick = function(){
           var controlNum = this.getAttribute('controlSeam');   //获取元素内的自定义 属性 判断控制的矿层
           var thisElement =  this;     //获取当前点击的图片元素
           thisElement.style.display = 'none';  //点击后隐藏当前图标
           /*10秒后 显示已经隐藏的当前的图片*/
           setTimeout(function(){
               thisElement.style.display = 'block';
           },10000);

           if(controlNum == 1){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_1_imgMove(seam_ctx[0], seamHumen_1, seam_1_DrawImg_2, seam_1_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 2){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_2_imgMove(seam_ctx[1], seamHumen_1, seam_2_DrawImg_2, seam_2_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 3){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_3_imgMove(seam_ctx[2], seamHumen_1, seam_3_DrawImg_2, seam_3_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 4){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_4_imgMove(seam_ctx[3], seamHumen_1, seam_4_DrawImg_2, seam_4_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 5){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_5_imgMove(seam_ctx[4], seamHumen_1, seam_5_DrawImg_2, seam_5_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 6){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_6_imgMove(seam_ctx[5], seamHumen_1, seam_6_DrawImg_2, seam_6_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 7){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_7_imgMove(seam_ctx[6], seamHumen_1, seam_7_DrawImg_2, seam_7_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 8){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_8_imgMove(seam_ctx[7], seamHumen_1, seam_8_DrawImg_2, seam_8_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 9){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_9_imgMove(seam_ctx[8], seamHumen_1, seam_9_DrawImg_2, seam_9_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 10){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_10_imgMove(seam_ctx[9], seamHumen_1, seam_10_DrawImg_2, seam_10_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 11){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_11_imgMove(seam_ctx[10], seamHumen_1, seam_11_DrawImg_2, seam_11_DrawImg_3);
                   }
               },80);
           }
           if(controlNum == 12){
               var timeCount = 10000; //一万毫秒 = 10秒
               var minerInterval = setInterval(function(){
                   timeCount -= 80;
                   if(timeCount <= 0){
                       clearInterval(minerInterval);
                   }else{
                       seam_12_imgMove(seam_ctx[11], seamHumen_1, seam_12_DrawImg_2, seam_12_DrawImg_3);
                   }
               },80);
           }
       }
    }
    /*无条件 自动挖矿 用于执行动画测试*/
    setInterval(function () {
        seam_1_imgMove(seam_ctx[0], seamHumen_1, seam_1_DrawImg_2, seam_1_DrawImg_3);
        seam_2_imgMove(seam_ctx[1], seamHumen_1, seam_2_DrawImg_2, seam_2_DrawImg_3);
        seam_3_imgMove(seam_ctx[2], seamHumen_1, seam_3_DrawImg_2, seam_3_DrawImg_3);
        seam_4_imgMove(seam_ctx[3], seamHumen_1, seam_4_DrawImg_2, seam_4_DrawImg_3);
        seam_5_imgMove(seam_ctx[4], seamHumen_1, seam_5_DrawImg_2, seam_5_DrawImg_3);
        seam_6_imgMove(seam_ctx[5], seamHumen_1, seam_6_DrawImg_2, seam_6_DrawImg_3);
        seam_7_imgMove(seam_ctx[6], seamHumen_1, seam_7_DrawImg_2, seam_7_DrawImg_3);
        seam_8_imgMove(seam_ctx[7], seamHumen_1, seam_8_DrawImg_2, seam_8_DrawImg_3);
        seam_9_imgMove(seam_ctx[8], seamHumen_1, seam_9_DrawImg_2, seam_9_DrawImg_3);
        seam_10_imgMove(seam_ctx[9], seamHumen_1, seam_10_DrawImg_2, seam_10_DrawImg_3);
        seam_11_imgMove(seam_ctx[10], seamHumen_1, seam_11_DrawImg_2, seam_11_DrawImg_3);
        seam_12_imgMove(seam_ctx[11], seamHumen_1, seam_12_DrawImg_2, seam_12_DrawImg_3);
    }, 80);
    //自动挖矿的时间数组 如果为0 则不执行自动操作
    //var timeArray = [0,10000,10000,0,0,0,0,0,0,0,0,0];
    var timeArray = allLayerSecond;
    //判断时间数组的的值 如果不为0 隐藏手动挖矿按钮
    // autoMaticFunction();
    function autoMaticFunction(){
        /*** 1 **/
        if(timeArray[0] > 0){
            minerActionImg[0].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_1 = setInterval(function(){
                timeArray[0] -= 80;                     //时间每次减少80毫秒
                if(timeArray[0] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_1);
                    minerActionImg[0].style.display = 'block';
                }
                seam_1_imgMove(seam_ctx[0], seamHumen_1, seam_1_DrawImg_2, seam_1_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[0].style.display = 'block';
        }
        /*** 2 **/
        if(timeArray[1] > 0){
            minerActionImg[1].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_2 = setInterval(function(){
                timeArray[1] -= 80;                     //时间每次减少80毫秒
                if(timeArray[1] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_2);
                    minerActionImg[1].style.display = 'block';
                }
                seam_2_imgMove(seam_ctx[1], seamHumen_1, seam_2_DrawImg_2, seam_2_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[1].style.display = 'block';
        }
        /*** 3 **/
        if(timeArray[2] > 0){
            minerActionImg[2].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_3 = setInterval(function(){
                timeArray[2] -= 80;                     //时间每次减少80毫秒
                if(timeArray[2] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_3);
                    minerActionImg[2].style.display = 'block';
                }
                seam_3_imgMove(seam_ctx[2], seamHumen_1, seam_3_DrawImg_2, seam_3_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[2].style.display = 'block';
        }
        /*** 4 **/
        if(timeArray[3] > 0){
            minerActionImg[3].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_4 = setInterval(function(){
                timeArray[3] -= 80;                     //时间每次减少80毫秒
                if(timeArray[3] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_4);
                    minerActionImg[3].style.display = 'block';
                }
                seam_4_imgMove(seam_ctx[3], seamHumen_1, seam_4_DrawImg_2, seam_4_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[3].style.display = 'block';
        }
        /*** 5 **/
        if(timeArray[4] > 0){
            minerActionImg[4].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_5 = setInterval(function(){
                timeArray[4] -= 80;                     //时间每次减少80毫秒
                if(timeArray[4] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_5);
                    minerActionImg[4].style.display = 'block';
                }
                seam_5_imgMove(seam_ctx[4], seamHumen_1, seam_5_DrawImg_2, seam_5_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[4].style.display = 'block';
        }
        /*** 6 **/
        if(timeArray[5] > 0){
            minerActionImg[5].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_6 = setInterval(function(){
                timeArray[5] -= 80;                     //时间每次减少80毫秒
                if(timeArray[5] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_6);
                    minerActionImg[5].style.display = 'block';
                }
                seam_6_imgMove(seam_ctx[5], seamHumen_1, seam_6_DrawImg_2, seam_6_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[5].style.display = 'block';
        }
        /*** 7 **/
        if(timeArray[6] > 0){
            minerActionImg[6].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_7 = setInterval(function(){
                timeArray[6] -= 80;                     //时间每次减少80毫秒
                if(timeArray[6] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_7);
                    minerActionImg[6].style.display = 'block';
                }
                seam_7_imgMove(seam_ctx[6], seamHumen_1, seam_7_DrawImg_2, seam_7_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[6].style.display = 'block';
        }
        /*** 8 **/
        if(timeArray[7] > 0){
            minerActionImg[7].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_8 = setInterval(function(){
                timeArray[7] -= 80;                     //时间每次减少80毫秒
                if(timeArray[7] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_8);
                    minerActionImg[7].style.display = 'block';
                }
                seam_8_imgMove(seam_ctx[7], seamHumen_1, seam_8_DrawImg_2, seam_8_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[7].style.display = 'block';
        }
        /*** 9 **/
        if(timeArray[8] > 0){
            minerActionImg[8].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_9 = setInterval(function(){
                timeArray[8] -= 80;                     //时间每次减少80毫秒
                if(timeArray[8] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_9);
                    minerActionImg[8].style.display = 'block';
                }
                seam_9_imgMove(seam_ctx[8], seamHumen_1, seam_9_DrawImg_2, seam_9_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[8].style.display = 'block';
        }
        /*** 10 **/
        if(timeArray[9] > 0){
            minerActionImg[9].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_10 = setInterval(function(){
                timeArray[9] -= 80;                     //时间每次减少80毫秒
                if(timeArray[9] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_10);
                    minerActionImg[9].style.display = 'block';
                }
                seam_10_imgMove(seam_ctx[9], seamHumen_1, seam_10_DrawImg_2, seam_10_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[9].style.display = 'block';
        }
        /*** 11 **/
        if(timeArray[10] > 0){
            minerActionImg[10].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_11 = setInterval(function(){
                timeArray[10] -= 80;                     //时间每次减少80毫秒
                if(timeArray[10] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_11);
                    minerActionImg[10].style.display = 'block';
                }
                seam_11_imgMove(seam_ctx[10], seamHumen_1, seam_11_DrawImg_2, seam_11_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[10].style.display = 'block';
        }
        /*** 12 **/
        if(timeArray[11] > 0){
            minerActionImg[11].style.display = 'none';   //隐藏手动挖矿按钮
            var automatic_12 = setInterval(function(){
                timeArray[11] -= 80;                     //时间每次减少80毫秒
                if(timeArray[11] <= 0){                  //如果时间小于或者等于0 终止执行 并显示手动按钮
                    clearInterval(automatic_12);
                    minerActionImg[11].style.display = 'block';
                }
                seam_12_imgMove(seam_ctx[11], seamHumen_1, seam_12_DrawImg_2, seam_12_DrawImg_3);   //要执行的循环操作
            },80);

        }else{
            minerActionImg[11].style.display = 'block';
        }
    }





    /**电梯*/

    /*获取电梯背景图*/
    var elevatorBlockImg = document.getElementById('elevatorBlockImg');     //下降的电梯
    var elevatorBlockImg1 = document.getElementById('elevatorBlockImg1');    //上升的电梯
    var drawImage = elevatorBlockImg;
    var elevatorPoint = {x: 0, y: 20, w: 1000, h: 200, g: 5};
    /*电梯停止坐标点*/
    var seamSum = openLayerCount; //接受已经开启的矿层数 结合电梯停止的坐标点  应用于电梯的停止判断
    var elevatorStopPoint = [200, 450, 700, 950, 1200, 1450, 1700, 1950, 2200, 2450, 2700, 2950];

    /*获取绘制电梯的上下文环境*/
    var leftElevator = document.getElementsByClassName('gameBody_elevator')[0];
    leftElevator.width = 1024;
    leftElevator.height = 768;
    /*右侧矿层的箱子*/
    var rightSeamCase = document.getElementsByClassName('caseImg');
    /*左侧矿石落下动态图*/
    var mineralDown = document.getElementsByClassName('mineral');
    /*x:X轴坐标  w:图片宽度 h：图片高度 sx截取图片的起始X点 sy截取图片的y点 sw图片截取的跨度*/
    var elevatorNum_strokePoint = {x:200,w:600,h:100,sx:750,sy:18,sw:1560,sh:1580} ;

    /*根据矿层数量的多少  自动更改 左侧电梯的长度 同时加上 右侧矿层的上方padding*/
    var gameBody_bottomLeftHeight = 85; //左侧Div的初始高度
    for (var i = 0; i < seam.length; i++) {
        gameBody_bottomLeftHeight += 135; //根据矿层数量修改电梯Div的高度
        leftElevator.height += elevatorPoint.h; //修改左侧电梯CANVAS的Y轴分辨率

    }
    /*修改左侧DIV的高度*/
    document.getElementsByClassName('gameBody_bottomLeft')[0].style.height = gameBody_bottomLeftHeight + 'px';
    var leftElevator_Ctx = leftElevator.getContext('2d');
    /*绘制电梯*/
    function elevatorAction(ctx,dramImg) {
        ctx.beginPath();
        ctx.drawImage(dramImg, elevatorPoint.x, elevatorPoint.y, elevatorPoint.w, elevatorPoint.h);
        ctx.stroke();
        ctx.closePath();

    }
    /*电梯运动坐标变化*/
    function elevatorMove(ctx,drawImg) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

        if ((elevatorPoint.y) > elevatorStopPoint[seamSum-1]) {
            drawImage = elevatorBlockImg1;
            elevatorPoint.g = -elevatorPoint.g;
        }
        if (elevatorPoint.y < 20) {
            drawImage = elevatorBlockImg;
            document.getElementsByClassName('mineralUp')[0].style.display = 'block';
            elevatorPoint.g -= (elevatorPoint.g * 2);
            clearInterval(elevatorSetInterval);
            setTimeout(function () {
                document.getElementsByClassName('mineralUp')[0].style.display = 'none';
                elevatorSetInterval = setInterval(function () {
                    elevatorStop(elevatorSetInterval);
                    elevatorMove(leftElevator_Ctx,drawImage);
                }, 20);
            }, 3000);
        }
        elevatorPoint.y += elevatorPoint.g;
        elevatorAction(ctx,drawImg);
    };
    function elevatorStop(clearName) {
        /*判断电梯移动坐标点 是否到达相应矿层*/
        if (elevatorPoint.g < 0) {
            for (var i = 0; i < elevatorStopPoint.length; i++) {
                if (elevatorPoint.y == elevatorStopPoint[i]) {
                    clearInterval(clearName);
                    rightSeamCase[i].style.transform = 'rotate(-80deg)';
                    mineralDown[i].style.display = 'block';
                    setTimeout(function () {
                        rightSeamCase[i].style.transform = 'rotate(-0deg)';
                        mineralDown[i].style.display = 'none';
                        elevatorSetInterval = setInterval(function () {
                            elevatorStop(elevatorSetInterval);
                            elevatorMove(leftElevator_Ctx,drawImage);
                        }, 20);
                    }, 2000);
                    break;
                }
            }

        }
    }
    var elevatorSetInterval = setInterval(function () {
        elevatorStop(elevatorSetInterval);
        elevatorMove(leftElevator_Ctx,drawImage);
    }, 10);




});