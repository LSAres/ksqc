$(function(){
    $('.outerDiv').css({
        'height':$(window).outerHeight() + 'px'
    });
    /**
     * 提示框  确定 取消 两按钮*/
    /*点击确定后 更改赋值为1*/
    var trueOrFalse=0;
    function promptTrueOrFalseCall(msg){
        trueOrFalse = 0;
        $('.promptTrueOrFalse').fadeIn();
        $('.promptTrueOrFalse .promptBlock_message').text(msg);


    }
    $('.promptTrueOrFalse .promptBlock_foot span:nth-child(1)').click(function(){
        $('.promptTrueOrFalse').fadeOut();
        alert(11);
    });
    $('.promptTrueOrFalse .promptBlock_foot span:nth-child(2)').click(function(){
        $('.promptTrueOrFalse').fadeOut();
    });
    /**
     * 提示信息DIV 只有确定按钮*/
    function promptOnlyTrue(msg){
        $('.promptOnlyTrue').fadeIn();
        $('.promptOnlyTrue .promptBlock_message').text(msg);
    }
    $('.promptOnlyTrue .promptBlock_foot span').click(function(){

        $('.promptOnlyTrue').fadeOut();
    });


    /**
    *充值功能
    * */

    /*点击呼出充值*/
    $('.chargeCall').on('click',function(){
        $('.chageDiv').fadeIn();
    });
    /*点击关闭充值*/
    $('.closeCharge').click(function(){
        $(this).parent().fadeOut();
    });
    /*充值方式点击切换*/
    $('.chargeTypeSelect ').click(function(){
        $('.chargeTypeSelect').removeClass('selected');
        $(this).addClass('selected');
    });
    /*充值金额选择*/
    $('.chargeNumBlock ').click(function(){
        $('.chargeNumBlock ').removeClass('selected');
        $(this).addClass('selected');
    });
    /*确定充值*/
    $('.chargeButton').click(function(){
        promptTrueOrFalseCall('确定充值？');
    });

    /**
     * 升级商店*/
    $('.upgradeCall').click(function(){
        $('.upgradeShow').fadeIn();
    });
    $('.upgradeTitle img').click(function(){
        $('.upgradeShow').fadeOut();
    });
    /**
     * 好友*/
    $('.friendCall').click(function(){
        $('.friend').fadeIn();
    });
    $('.closeFrienList').click(function(){
        $('.friend').fadeOut();
    });
    /**
     * 个人中心*/
    /*呼出个人中心*/
    $('.userCenterCall').click(function(){
        $('.userCenter').fadeIn();
    });
    /*关闭个人中心*/
    $('.closeUserCenter').click(function(){
        $('.userCenter').fadeOut();
    });
    /*底部的功能按钮*/
    var userCenterBottomButton = $('.userCenter_bottomFunctionSelect img');
    var userCenterFunctionBlock = $('.userCenter_functionDisplay');
    $('.userCenter').css({
        'height':$(window).outerHeight() + 'px'
    });
    /*点击底部按钮切换对应显示块*/
    $(userCenterBottomButton).click(function(){
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
    $('.catchShopCall').click(function(){
        $('.catchShop').fadeIn();
    });
    /*关闭现金商店*/
    $('.closeCatchShop').click(function(){
        $('.catchShop').fadeOut();
    });
    /*点击图片 切换对应的商店*/
    $(catchShopSelectImgAll).click(function(){
        $(catchShopAll).hide();
        $(catchShopAll[$(this).index()]).fadeIn();
    });
    /**
     * 商店：宝箱购买*/
    $('.caseBlock div').click(function(){
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
    $('.exchange_inputChange').click(function(){
        if(clickTime == 0){
            clickTime = 1;
            setTimeout(function(){
                clickTime = 0;
            },1000);
            /*图片位置互换*/
            exchangeImgAll_position = $(exchangeImgAll[0]).css('transform');
            $(exchangeImgAll[0]).css('transform',$(exchangeImgAll[2]).css('transform'));
            $(exchangeImgAll[2]).css('transform',exchangeImgAll_position);
            /*输入表单切换*/
            $(exchange_inputAll).hide();
            if(showForm == 0){
                showForm = 1;
                $(exchange_inputAll[showForm]).fadeIn();
            }else{
                showForm = 0;
                $(exchange_inputAll[showForm]).fadeIn();
            }
        }else{
            /*点击间隔小于2秒 不执行操作*/
        }

    });
    /*点击兑换确定按钮 提示信息*/
    $('.exchange_inputForm').click(function(){
        promptTrueOrFalseCall('是否兑换？');
    });
    /**
     *仓库模块*/
    $('.propsUse').click(function(){
        promptOnlyTrue('暂时无法使用道具！');
    });
    /**
     *
     * 游戏模块*/
    $('.gameBody').css({
        'height':$(window).outerHeight() + 'px'
    });
    /**游戏顶部canvas绘制*/
    var gameTopCanvas = document.getElementsByClassName('gameBody_topCanvas')[0];
    var topCtx = gameTopCanvas.getContext('2d');
    /**顶部：左侧传送机器绘制*/
    var top_leftMachinePoint = {x:0,y:368,w:300,h:400};
    var leftMachineImg = document.getElementById('gameTopLeft');

    function  top_leftMachine(ctx) {
        ctx.beginPath();
        ctx.drawImage(leftMachineImg ,top_leftMachinePoint.x,top_leftMachinePoint.y ,top_leftMachinePoint.w, top_leftMachinePoint.h);
        ctx.stroke();
        ctx.closePath();
    }
    top_leftMachine(topCtx);

    /**顶部：右侧机器*/
    var top_rightMachinePoint = {x:(topCtx.canvas.width - 220),y:368,w:220,h:400};
    var topRightMachineImg = document.getElementById('gameTopRight');
    function  top_rightMachine(ctx) {
        ctx.beginPath();
        ctx.drawImage(topRightMachineImg,top_rightMachinePoint.x,top_rightMachinePoint.y ,top_rightMachinePoint.w, top_rightMachinePoint.h);
        ctx.stroke();
        ctx.closePath();
    }
    /**顶部：人物绘制*/
    /* x:图片X轴 y: 图片Y轴 w:图片宽度 h:图片高度 d:图片直径（用于操作帧图片）g:人物移动速度 acp_x:截取图像宽度 acp_y：截取图像高度 */
    var topHumentPoint = {x:170,y:668,w:100,h:150,d:0,g:0.1,acp_x:0,acp_y:80};
    var topHumentImg = document.getElementById('gameTopHumen');
    function top_humen(ctx){
        ctx.beginPath();
        ctx.drawImage(topHumentImg,topHumentPoint.acp_x,topHumentPoint.acp_y,400,500,topHumentPoint.x,topHumentPoint.y,topHumentPoint.w,topHumentPoint.h);
        ctx.strokeStyle = "#000";
        ctx.stroke();
        ctx.closePath();
    }
    /**顶部：人物行动*/
    function top_humenMove(){
        if(topHumentPoint.x >= (top_rightMachinePoint.x - topHumentPoint.w) ){
            topHumentPoint.g = -topHumentPoint.g;
        }
        if(topHumentPoint.x <= (top_leftMachinePoint.x + top_leftMachinePoint.w) ){
            topHumentPoint.g = (topHumentPoint.g + 4);
        }
        if(topHumentPoint.acp_x >= 1400){
            topHumentPoint.acp_x = 0;
        }
        topHumentPoint.acp_x += 380;
        topHumentPoint.x += topHumentPoint.g;

    }
    /**顶部：场景绘制*/
    var topActive = setInterval(function(){
        topCtx.clearRect(0,0,topCtx.canvas.width,topCtx.canvas.height);
        top_leftMachine(topCtx);
        top_rightMachine(topCtx);
        top_humenMove();
        top_humen(topCtx);

    },200);



    /**矿层绘制*/
    /*获取矿层数组*/
    var seam = document.getElementsByClassName('seam');
    /*声明所有矿层上下文环境*/
    var seam_ctx = new Array() ;
    for(var i=0; i<seam.length; i++){
        seam_ctx[i] = seam[i].getContext('2d');
    }

    /*获取人物图片*/
    /*挖矿人物图片*/
    var seamHumen_1 = document.getElementById('gameTopHumen');
    var seamHumen_2 = document.getElementById('gameTopHumen1');
    var seamHumen_3 = document.getElementById('gameTopHumen2');


    /*第一矿层 */
    /*矿层：人物坐标点,挖矿人物 */
    var seam_1_point_1 = {x:700,y:520,w:150,h:200,acp_x:40,acp_y:72};
    /*矿层：空手/背包 行走人物 1*/
    var seam_1_point_2 = {x:150,y:520,w:150,h:200,acp_x:40,acp_y:72,g:2};
    var seam_1_point_3 = {x:150,y:520,w:150,h:200,acp_x:40,acp_y:72,g:2};
    var seam_1_point_4 = {x:150,y:520,w:150,h:200,acp_x:40,acp_y:72,g:2};
    function seam_1_drawImg(ctx,drawImg1,drawImg2,drawImg3) {
        ctx.beginPath();
        //绘制挖矿人物
        ctx.drawImage(drawImg1,seam_1_point_1.acp_x,seam_1_point_1.acp_y,340,320,seam_1_point_1.x,seam_1_point_1.y,seam_1_point_1.w,seam_1_point_1.h);
        ctx.drawImage(drawImg2,seam_1_point_1.acp_x,seam_1_point_1.acp_y,340,320,seam_1_point_1.x,seam_1_point_1.y,seam_1_point_1.w,seam_1_point_1.h);
        ctx.stroke();
        ctx.closePath();
    }
    function seam_1_imgMove(ctx,drawImg1,drawImg2,drawImg3){
        ctx.clearRect(0,0,ctx.canvas.width,ctx.canvas.height);
        if(seam_1_point_1.acp_x >= 1950){
            seam_1_point_1.acp_x = 40;
        }
        seam_1_drawImg(ctx,drawImg1,drawImg2,drawImg3);
        seam_1_point_1.acp_x += 390;
    }


    setInterval(function(){
        seam_1_imgMove(seam_ctx[0],seamHumen_1,seamHumen_2,seamHumen_3);
    },100);






    /**电梯*/

    /*获取电梯背景图*/
    var elevatorBlockImg = document.getElementById('elevatorBlockImg');
    var elevatorPoint = {x:0,y:0,w:1000,h:200,g:1};
    var leftElevator = document.getElementsByClassName('gameBody_elevator')[0];
    leftElevator.width = 1024;
    leftElevator.height = 768;
    /*根据矿层数量的多少  自动更改 左侧电梯的长度 同时加上 右侧矿层的上方padding*/
    var gameBody_bottomLeftHeight = 85;
    for(var i=0; i<seam.length; i++){
        gameBody_bottomLeftHeight += 135;
        leftElevator.height += elevatorPoint.h;

    }
    document.getElementsByClassName('gameBody_bottomLeft')[0].style.height = gameBody_bottomLeftHeight + 'px';
    var leftElevator_Ctx = leftElevator.getContext('2d');
    /*绘制电梯*/
    function elevatorAction (ctx){
        ctx.beginPath();
        ctx.drawImage(elevatorBlockImg,elevatorPoint.x,elevatorPoint.y,elevatorPoint.w,elevatorPoint.h);
        ctx.stroke();
        ctx.closePath();

    }
    /*电梯运动坐标变化*/
    function elevatorMove(ctx){
        ctx.clearRect(0,0,ctx.canvas.width,ctx.canvas.height);
        if((elevatorPoint.y + elevatorPoint.h ) >= ctx.canvas.height ){
            elevatorPoint.g = -elevatorPoint.g;
        }
        if(elevatorPoint.y  <= 0){
            elevatorPoint.g += 2;
        }
        elevatorPoint.y += elevatorPoint.g;
        elevatorAction(ctx);
    };
   var elevatorSetInterval = setInterval(function(){
        elevatorMove(leftElevator_Ctx);
    },50);




});