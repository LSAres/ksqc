$(function () {
    $('.liTitle').click(function () {
        if ($(this).next().css("display") == "block") {
            $(this).removeClass('liTitleActive');
            $('.ulDiv ').slideUp();
        }else{
            $('.liTitle').removeClass('liTitleActive');
            $(this).addClass('liTitleActive');
            $('.ulDiv ').slideUp();
            $(this).next().slideDown(1000);
        }



    });
    $('.ulDiv li').click(function () {
        $('.ulDiv li').removeClass('liActive');
        $(this).addClass('liActive');
    });
    /*点击控制左侧控制列表的收缩*/
    $('#controDiv').click(function () {
        var divWidth = $('.leftControle').css('width');
        if (divWidth != '0px') {
            $(this).removeClass('leftControDiv');
            $(this).addClass('rightControDiv');
            $('.leftControle').css({
                'width': '0px',
                'transition': '1s'
            });
            $('.rightPageChange').css({
                'width': '99%',
                'transition': '1s'
            });
        } else {
            $(this).addClass('leftControDiv');
            $(this).removeClass('rightControDiv');
            $('.leftControle').css({
                'width': '15%',
                'transition': '1s'
            });
            $('.rightPageChange').css({
                'width': '84%',
                'transition': '1s'
            });
        }
    });
    /*
     *
     *点击切换右侧显示页面
     *
     **/
    //会员管理功能
    $('.testOne').click(function () {
        $('iframe').attr('src', '../UserAdministration/administrationPage.html');
    });
    //财富汇总明细
    $('.userCapitalOffset').click(function () {
        $('iframe').attr('src', '../WealthDetailed/userCapitalOffset.html');
    });

    //公告选项
    $(".addNoticePage").click(function () {
        $('iframe').attr('src', '../NoticControl/addNoticePage.html');

    });
    $('.noticeListPage').click(function () {
        $('iframe').attr('src', '../NoticControl/noticeListPage.html');
    });

    //参数概率
    $('.functionValueReset').click(function () {
        $('iframe').attr('src', '../ParameterProbability/functionValueResetPage.html');
    });
	 $('.capitalLog').click(function () {
        $('iframe').attr('src', '../ParameterProbability/capitalLogPage.html');
    });
    $('.helpDocument').click(function () {
        $('iframe').attr('src', '../ParameterProbability/helpDocumentList.html');
    });
    $('.addHelpDocument').click(function () {
        $('iframe').attr('src', '../ParameterProbability/addHelpDocument.html');

    })
    //后台管理
    $('.websiteSwitch').click(function () {
        $('iframe').attr("src", "../BackstageControl/websiteSwitchPage.html");
    });
    //管理员选项
    $('.adminAppend').click(function () {
        $('iframe').attr('src', '../AdminControl/adminAppendPage.html');
    });
    $('.adminList').click(function () {
        $('iframe').attr('src', '../AdminControl/adminListPage.html');
    });


    //显示列表选择按钮 class:tableSelectButton
    $(".tableSelectButton").click(function(){
        var tableList = $(".tableListDiv");
        $(".tableListDiv").hide();
        if($(this).index() == 0){
            $(tableList[$(this).index()]).fadeIn();
        }
        if($(this).index() == 1){
            $(tableList[$(this).index()]).fadeIn();
        }
        if($(this).index() == 2){
            $(tableList[$(this).index()]).fadeIn();
        }
    });
	
    //金额，交易，提示框 命名为.panduan
	$(".panduan").click(function(){
		if(confirm("是否执行此项操作")){
	}else{
		return false;
    }				 
  });


})