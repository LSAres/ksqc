<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>修改会员财富</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>
<!--顶部搜索DIV-->
<!--<div class="topSearchDiv">-->
    <!--<div class="updateTitleMessage">-->
        <!--修改功能参数请慎重修改！！！-->
    <!--</div>-->
<!--</div>-->
<form action="<?php echo U(MODULE_NAME.'/WealthDetailed/userCapitalOffset_RechangeT');?>" method="post" id="myform">
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            会员账号
        </span>
        <input type="text" class="updateMessageInput" value="<?php echo ($userInfo["account"]); ?>" readonly="readonly">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            会员姓名
        </span>
        <input type="text" class="updateMessageInput" value="<?php echo ($userInfo["username"]); ?>" readonly="readonly">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            挖矿分
        </span>
        <input type="text" class="updateMessageInput" name="report_money" value="<?php echo ($storeInfo["miner_gold"]); ?>">
    </div>
    <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            钻石分
        </span>
        <input type="text" class="updateMessageInput" name="buycar_money" value="<?php echo ($storeInfo["diamonds"]); ?>">
    </div>
	 <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            现金分
        </span>
        <input type="text" class="updateMessageInput" name="gold" value="<?php echo ($storeInfo["money"]); ?>">
    </div>
	 <div class="upadateMessageDisplay">
        <span class="updateMessageTitle">
            牌照分
        </span>
        <input type="text" class="updateMessageInput" name="bonus" value="<?php echo ($storeInfo["brand"]); ?>">
    </div>
    <input type="text" class="updateMessageInput" name="id" value="<?php echo ($storeInfo["id"]); ?>" style="display: none">
</form>


<div class="updateTrue" onClick="test()">
    修改
</div>


</body>
<script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
<script>
    function test() {
        document.getElementById("myform").submit();
    }
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




</script>
</html>