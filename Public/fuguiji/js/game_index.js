$(function () {
    $('.outerDiv').css({
        'height': $(window).outerHeight() + 'px'
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
     * 滚动条切换*/
    $('.scrollChange img').click(function () {
        if($(this).index() == 0){
            $('.gameBody').animate({scrollTop: '0px'}, 500);
        }else{
            $('.gameBody').animate({scrollTop:$('.bottonPosition').offset().top}, 500);
        }
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
    $('.exchange_inputForm').click(function () {
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
        w: 120,
        h: 80,
        g: 5,
        acp_x: 80,
        acp_y: 72,
        max_width: 780,
        min_width: 200,
        imgWidthLength: 1900,
        img_SX: 50,
        img_SY: 72,
        img_swidth: 400
    };
    var topHumenImg_go = document.getElementById('gameTopHumen1');
    var topHumenImg_com = document.getElementById('gameTopHumen2');
    var topHumenDraw = topHumenImg_go;

    function topHumenAction(ctx, drawImg) {
        ctx.beginPath();
        ctx.drawImage(drawImg, topHumenPoint.acp_x, topHumenPoint.acp_y, 340, 320, topHumenPoint.x, topHumenPoint.y, topHumenPoint.w, topHumenPoint.h);
        ctx.stroke();
        ctx.closePath();
    }

    function topHumenMove(ctx, drawImg) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        if ((topHumenPoint.x + topHumenPoint.w) >= topHumenPoint.max_width) {
            topHumenPoint.g = -topHumenPoint.g;
            topHumenDraw = topHumenImg_com;
        }
        if (topHumenPoint.x < topHumenPoint.min_width) {
            topHumenPoint.g -= (topHumenPoint.g * 2);
            topHumenDraw = topHumenImg_go;
        }
        if (topHumenPoint.acp_x >= topHumenPoint.imgWidthLength) {
            topHumenPoint.acp_x = topHumenPoint.img_SX;
        }
        topHumenAction(ctx, drawImg);
        top_leftMachine(ctx);
        top_rightMachine(ctx);
        topHumenPoint.x += topHumenPoint.g;
        topHumenPoint.acp_x += topHumenPoint.img_swidth;
    }

    /**顶部：场景绘制*/
    var topActive = setInterval(function () {
        topHumenMove(topCtx, topHumenDraw);
    }, 100);


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
    var img_SX = 100;        //截取图片的 X轴坐标
    var img_swidth = 380;   //截取图片的跨度

    /*第一矿层 */
    /*用于接受绘制的人物图片*/
    var seam_1_DrawImg_2 = seamHumen_2;     //第一个人物 初始图片 向左移动帧图
    var seam_1_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_1_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_1_point_2 = {x: 160, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 10};  //第二个行走人物
    var seam_1_point_3 = {x: 190, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_1_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_1_point_1.acp_x, seam_1_point_1.acp_y, 340, 320, seam_1_point_1.x, seam_1_point_1.y, seam_1_point_1.w, seam_1_point_1.h);
        ctx.drawImage(drawImg2, seam_1_point_2.acp_x, seam_1_point_2.acp_y, 340, 320, seam_1_point_2.x, seam_1_point_2.y, seam_1_point_2.w, seam_1_point_2.h);
        ctx.drawImage(drawImg3, seam_1_point_3.acp_x, seam_1_point_3.acp_y, 340, 320, seam_1_point_3.x, seam_1_point_3.y, seam_1_point_3.w, seam_1_point_3.h);
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
    var seam_2_point_2 = {x: 350, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 10};  //第二个行走人物
    var seam_2_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_2_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_2_point_1.acp_x, seam_2_point_1.acp_y, 340, 320, seam_2_point_1.x, seam_2_point_1.y, seam_2_point_1.w, seam_2_point_1.h);
        ctx.drawImage(drawImg2, seam_2_point_2.acp_x, seam_2_point_2.acp_y, 340, 320, seam_2_point_2.x, seam_2_point_2.y, seam_2_point_2.w, seam_2_point_2.h);
        ctx.drawImage(drawImg3, seam_2_point_3.acp_x, seam_2_point_3.acp_y, 340, 320, seam_2_point_3.x, seam_2_point_3.y, seam_2_point_3.w, seam_2_point_3.h);
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
    var seam_3_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_3_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_3_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_3_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -10};  //第二个行走人物
    var seam_3_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_3_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_3_point_1.acp_x, seam_3_point_1.acp_y, 340, 320, seam_3_point_1.x, seam_3_point_1.y, seam_3_point_1.w, seam_3_point_1.h);
        ctx.drawImage(drawImg2, seam_3_point_2.acp_x, seam_3_point_2.acp_y, 340, 320, seam_3_point_2.x, seam_3_point_2.y, seam_3_point_2.w, seam_3_point_2.h);
        ctx.drawImage(drawImg3, seam_3_point_3.acp_x, seam_3_point_3.acp_y, 340, 320, seam_3_point_3.x, seam_3_point_3.y, seam_3_point_3.w, seam_3_point_3.h);
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
    var seam_4_point_2 = {x: 250, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 13};  //第二个行走人物
    var seam_4_point_3 = {x: 560, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 10};  //第三个行走人物
    /*绘制人物方法*/
    function seam_4_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_4_point_1.acp_x, seam_4_point_1.acp_y, 340, 320, seam_4_point_1.x, seam_4_point_1.y, seam_4_point_1.w, seam_4_point_1.h);
        ctx.drawImage(drawImg2, seam_4_point_2.acp_x, seam_4_point_2.acp_y, 340, 320, seam_4_point_2.x, seam_4_point_2.y, seam_4_point_2.w, seam_4_point_2.h);
        ctx.drawImage(drawImg3, seam_4_point_3.acp_x, seam_4_point_3.acp_y, 340, 320, seam_4_point_3.x, seam_4_point_3.y, seam_4_point_3.w, seam_4_point_3.h);
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
    var seam_5_point_2 = {x: 420, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 9};  //第二个行走人物
    var seam_5_point_3 = {x: 270, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 11};  //第三个行走人物
    /*绘制人物方法*/
    function seam_5_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_5_point_1.acp_x, seam_5_point_1.acp_y, 340, 320, seam_5_point_1.x, seam_5_point_1.y, seam_5_point_1.w, seam_5_point_1.h);
        ctx.drawImage(drawImg2, seam_5_point_2.acp_x, seam_5_point_2.acp_y, 340, 320, seam_5_point_2.x, seam_5_point_2.y, seam_5_point_2.w, seam_5_point_2.h);
        ctx.drawImage(drawImg3, seam_5_point_3.acp_x, seam_5_point_3.acp_y, 340, 320, seam_5_point_3.x, seam_5_point_3.y, seam_5_point_3.w, seam_5_point_3.h);
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
    var seam_6_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_6_DrawImg_3 = seamHumen_3;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_6_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_6_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -13};  //第二个行走人物
    var seam_6_point_3 = {x: 300, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -8};  //第三个行走人物
    /*绘制人物方法*/
    function seam_6_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_6_point_1.acp_x, seam_6_point_1.acp_y, 340, 320, seam_6_point_1.x, seam_6_point_1.y, seam_6_point_1.w, seam_6_point_1.h);
        ctx.drawImage(drawImg2, seam_6_point_2.acp_x, seam_6_point_2.acp_y, 340, 320, seam_6_point_2.x, seam_6_point_2.y, seam_6_point_2.w, seam_6_point_2.h);
        ctx.drawImage(drawImg3, seam_6_point_3.acp_x, seam_6_point_3.acp_y, 340, 320, seam_6_point_3.x, seam_6_point_3.y, seam_6_point_3.w, seam_6_point_3.h);
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
    var seam_7_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_7_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_7_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_7_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -10};  //第二个行走人物
    var seam_7_point_3 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_7_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_7_point_1.acp_x, seam_7_point_1.acp_y, 340, 320, seam_7_point_1.x, seam_7_point_1.y, seam_7_point_1.w, seam_7_point_1.h);
        ctx.drawImage(drawImg2, seam_7_point_2.acp_x, seam_7_point_2.acp_y, 340, 320, seam_7_point_2.x, seam_7_point_2.y, seam_7_point_2.w, seam_7_point_2.h);
        ctx.drawImage(drawImg3, seam_7_point_3.acp_x, seam_7_point_3.acp_y, 340, 320, seam_7_point_3.x, seam_7_point_3.y, seam_7_point_3.w, seam_7_point_3.h);
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
    var seam_8_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_8_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_8_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_8_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -12};  //第二个行走人物
    var seam_8_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_8_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_8_point_1.acp_x, seam_8_point_1.acp_y, 340, 320, seam_8_point_1.x, seam_8_point_1.y, seam_8_point_1.w, seam_8_point_1.h);
        ctx.drawImage(drawImg2, seam_8_point_2.acp_x, seam_8_point_2.acp_y, 340, 320, seam_8_point_2.x, seam_8_point_2.y, seam_8_point_2.w, seam_8_point_2.h);
        ctx.drawImage(drawImg3, seam_8_point_3.acp_x, seam_8_point_3.acp_y, 340, 320, seam_8_point_3.x, seam_8_point_3.y, seam_8_point_3.w, seam_8_point_3.h);
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
    var seam_9_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_9_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_9_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_9_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -10};  //第二个行走人物
    var seam_9_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_9_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_9_point_1.acp_x, seam_9_point_1.acp_y, 340, 320, seam_9_point_1.x, seam_9_point_1.y, seam_9_point_1.w, seam_9_point_1.h);
        ctx.drawImage(drawImg2, seam_9_point_2.acp_x, seam_9_point_2.acp_y, 340, 320, seam_9_point_2.x, seam_9_point_2.y, seam_9_point_2.w, seam_9_point_2.h);
        ctx.drawImage(drawImg3, seam_9_point_3.acp_x, seam_9_point_3.acp_y, 340, 320, seam_9_point_3.x, seam_9_point_3.y, seam_9_point_3.w, seam_9_point_3.h);
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
    var seam_10_point_2 = {x: 320, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 8};  //第二个行走人物
    var seam_10_point_3 = {x: 460, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_10_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_10_point_1.acp_x, seam_10_point_1.acp_y, 340, 320, seam_10_point_1.x, seam_10_point_1.y, seam_10_point_1.w, seam_10_point_1.h);
        ctx.drawImage(drawImg2, seam_10_point_2.acp_x, seam_10_point_2.acp_y, 340, 320, seam_10_point_2.x, seam_10_point_2.y, seam_10_point_2.w, seam_10_point_2.h);
        ctx.drawImage(drawImg3, seam_10_point_3.acp_x, seam_10_point_3.acp_y, 340, 320, seam_10_point_3.x, seam_10_point_3.y, seam_10_point_3.w, seam_10_point_3.h);
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
    var seam_11_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_11_DrawImg_3 = seamHumen_3;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_11_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_11_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -8};  //第二个行走人物
    var seam_11_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -13};  //第三个行走人物
    /*绘制人物方法*/
    function seam_11_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_11_point_1.acp_x, seam_11_point_1.acp_y, 340, 320, seam_11_point_1.x, seam_11_point_1.y, seam_11_point_1.w, seam_11_point_1.h);
        ctx.drawImage(drawImg2, seam_11_point_2.acp_x, seam_11_point_2.acp_y, 340, 320, seam_11_point_2.x, seam_11_point_2.y, seam_11_point_2.w, seam_11_point_2.h);
        ctx.drawImage(drawImg3, seam_11_point_3.acp_x, seam_11_point_3.acp_y, 340, 320, seam_11_point_3.x, seam_11_point_3.y, seam_11_point_3.w, seam_11_point_3.h);
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
    var seam_12_DrawImg_2 = seamHumen_3;     //第一个人物 初始图片 向左移动帧图
    var seam_12_DrawImg_3 = seamHumen_2;     //第二个人物 初始图片 向左移动帧图
    /*矿层：人物坐标点,挖矿人物 */
    var seam_12_point_1 = {x: 700, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72};       //固定挖矿人物的坐标点对象
    /*矿层：空手/背包 行走人物 1*/
    var seam_12_point_2 = {x: 450, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: -10};  //第二个行走人物
    var seam_12_point_3 = {x: 170, y: 520, w: 150, h: 200, acp_x: 40, acp_y: 72, g: 12};  //第三个行走人物
    /*绘制人物方法*/
    function seam_12_drawImg(ctx, drawImg1, drawImg2, drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1, seam_12_point_1.acp_x, seam_12_point_1.acp_y, 340, 320, seam_12_point_1.x, seam_12_point_1.y, seam_12_point_1.w, seam_12_point_1.h);
        ctx.drawImage(drawImg2, seam_12_point_2.acp_x, seam_12_point_2.acp_y, 340, 320, seam_12_point_2.x, seam_12_point_2.y, seam_12_point_2.w, seam_12_point_2.h);
        ctx.drawImage(drawImg3, seam_12_point_3.acp_x, seam_12_point_3.acp_y, 340, 320, seam_12_point_3.x, seam_12_point_3.y, seam_12_point_3.w, seam_12_point_3.h);
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


    /*循环调用人物绘制，判断人物坐标方法*/
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


    /**电梯*/

    /*获取电梯背景图*/
    var elevatorBlockImg = document.getElementById('elevatorBlockImg');
    /*电梯层数数字背景图*/
    var elevatorNum_background = document.getElementById('elevatorNumber');
    var elevatorPoint = {x: 0, y: 0, w: 1000, h: 200, g: 5};
    var elevatorStopPoint = [200, 450, 700, 950, 1200, 1450, 1700, 1950, 2200, 2450, 2700, 2950];
    var leftElevator = document.getElementsByClassName('gameBody_elevator')[0];
    leftElevator.width = 1024;
    leftElevator.height = 768;
    /*根据矿层数量的多少  自动更改 左侧电梯的长度 同时加上 右侧矿层的上方padding*/
    var gameBody_bottomLeftHeight = 85;
    for (var i = 0; i < seam.length; i++) {
        gameBody_bottomLeftHeight += 135;
        leftElevator.height += elevatorPoint.h;

    }
    document.getElementsByClassName('gameBody_bottomLeft')[0].style.height = gameBody_bottomLeftHeight + 'px';
    var leftElevator_Ctx = leftElevator.getContext('2d');
    /*绘制电梯*/
    function elevatorAction(ctx) {
        ctx.beginPath();
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[0],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[1],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[2],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[3],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[4],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[5],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[6],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[7],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[8],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[9],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[10],600,100);     //电梯层数
        ctx.drawImage(elevatorNum_background,200,elevatorStopPoint[11],600,100);     //电梯层数
        ctx.font = '100  Arial';
        ctx.fillText("1",300,elevatorStopPoint[0] + 60);
        ctx.drawImage(elevatorBlockImg, elevatorPoint.x, elevatorPoint.y, elevatorPoint.w, elevatorPoint.h);
        ctx.fillStyle = '#fff';
        ctx.fill();
        ctx.stroke();
        ctx.closePath();

    }

    /*电梯运动坐标变化*/
    function elevatorMove(ctx) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

        if ((elevatorPoint.y + elevatorPoint.h ) >= ctx.canvas.height) {
            elevatorPoint.g = -elevatorPoint.g;
        }
        if (elevatorPoint.y < 0) {
            elevatorPoint.g -= (elevatorPoint.g * 2);
        }
        elevatorPoint.y += elevatorPoint.g;
        elevatorAction(ctx);
    };

    var elevatorSetInterval = setInterval(function () {
        elevatorStop(elevatorSetInterval);
        elevatorMove(leftElevator_Ctx);
    }, 20);

    function elevatorStop(clearName) {
        /*判断电梯移动坐标点 是否到达相应矿层*/
        if (elevatorPoint.g < 0) {
            for (var i = 0; i < elevatorStopPoint.length; i++) {
                if (elevatorPoint.y == elevatorStopPoint[i]) {
                    clearInterval(clearName);
                    setTimeout(function () {
                        elevatorSetInterval = setInterval(function () {
                            elevatorStop(elevatorSetInterval);
                            elevatorMove(leftElevator_Ctx);
                        }, 20);
                    }, 1000);
                    break;
                }
            }

        }
    }


});