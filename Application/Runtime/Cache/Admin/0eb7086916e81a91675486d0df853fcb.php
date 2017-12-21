<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>添加新管理员</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>
<!--顶部搜索DIV-->
<div class="topSearchDiv">
    <div class="updateTitleMessage">
        管理员添加
    </div>
</div>
<form action="<?php echo U(MODULE_NAME.'/AdminControl/addsuper');?>" method="post" id="myform">
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            新增管理员帐号
        </span>
        <input type="text" name="sp_username" class="updateMessageInput" placeholder="请输入管理员帐号">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            新增管理员密码
        </span>
        <input type="text" name="sp_password" class="updateMessageInput" placeholder="请输入管理员密码">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            确认管理员密码
        </span>
        <input type="text" name="sp_passwordT" class="updateMessageInput" placeholder="请输入管理员密码">
    </div>
	<div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            新增二级密码
        </span>
        <input type="text" name="sp_password_two" class="updateMessageInput" placeholder="请输入管理员密码">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            确认二级密码
        </span>
        <input type="text" name="sp_password_twoT" class="updateMessageInput" placeholder="请输入管理员密码">
    </div>


    <div class="updateTrue"  onClick="test()">
        确认添加
    </div>
</form>


</body>
<script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
<script>
    $(function(){
        var testListData =$('#testList option');
        function textFor() {
            for(var i=0; i<testListData.length;i++){
                alert(testListData[i].val());

            }
            return 1;
        }
        $('.updateTrue').click(function(){

            textFor()
        });
    })

    function test()
    {
        document.getElementById("myform").submit();
    }




</script>
</html>