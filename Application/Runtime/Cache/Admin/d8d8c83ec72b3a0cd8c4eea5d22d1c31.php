<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>用户积分冲减</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
	<style>
		.codeInputDiv{
			width: 50%;
			border: solid 1px;
			margin: 0 auto;
			padding: 2% 0;
			position: absolute;
			background: #fff;
			top: 25%;
			left: 35%;
			display:none;
		}
		.codeInputDiv_inputRow{
			text-align:center;}
		.codeInputDiv_inputRow span{
			display: inline-block;
			width: 16%;
			text-align: right;
		}
		.codeInputDiv_inputRow input{
			margin-left: 5%;
			text-align: center;
		}
		.codeInputDiv_submit{
			width: 20%;
			margin: 3% auto;
			padding: 1% 2%;
			border: solid 1px;
			text-align: center;
			border-radius: 15px;
		}
	</style>
</head>
<body>
<!--顶部搜索DIV-->
<form action="<?php echo U(MODULE_NAME.'/WealthDetailed/userCapitalOffset');?>" method="post">
    <label class="searchTitelDate" for="searchConditionSelect"> 会员帐号</label>
    <input type="text"  placeholder="请输入搜索帐号" name="account"/>
    <input type="submit" value="搜索"/>
</form>



<table>
    <tr>
        <th>会员账号</th>
        <th>会员姓名</th>
        <th>挖矿分</th>
        <th>钻石分</th>
		<th>现金分</th>
		<th>牌照分</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($userArr)): foreach($userArr as $key=>$value): ?><tr>
            <td><?php echo ($value["account"]); ?><input type="text" style="display:none;" class="userId_num" value="<?php echo ($value["id"]); ?>" /></td>
            <td><?php echo ($value["username"]); ?></td>
            <td><?php echo ($value["miner_gold"]); ?></td>
            <td><?php echo ($value["diamonds"]); ?></td>
			<td><?php echo ($value["money"]); ?></td>
			<td><?php echo ($value["brand"]); ?></td>
            <td>
                <a class="upClick" href="<?php echo U(MODULE_NAME.'/WealthDetailed/userCapitalOffset_Rechange',array('id'=>$value['id']));?>">
                    修改用户积分
                </a>
            </td>
        </tr><?php endforeach; endif; ?>
	

</table>

<!--底部页面切换选项卡-->
<!--底部页面切换选项卡-->
<div class="bottomPageSelect">
    <?php echo ($pageshow); ?>
</div>
</body>
<script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
<script>
    function test() {
        document.getElementById("form_search").submit();
    }
//	$('.upClick').click(function(){
//		$('.codeInputDiv').fadeIn();
//		var num =$(this).parent().parent().find('.userId_num').val();
//		$('#userID_inputRow').attr('value',num);
//	});
	$('.codeInputDiv_submit_true').click(function(){
		document.getElementById("myform").submit();
	});
	$('.codeInputDiv_submit_false').click(function(){
		$('.codeInputDiv').hide();
	});
	
var P = {
    inits: 60,
    currs: 60,
    timer: function() {
        if (P.currs == 0) {
            P.currs = this.inits;
            $('#send_smscode').attr('disabled', false).val('获取验证码')
        } else {
            $('#send_smscode').attr('disabled', true).val(P.currs + '秒后重新发送');
            P.currs--;
            setTimeout("P.timer()", 1000)
        }
    }
};
$('#send_smscode').on('click', function() {
        P.timer();
		 $.ajax({
            url:'<?php echo U(MODULE_NAME.'/UserAdministration/sendsms');?>',
            data:{mobile:1},
            dataType:'json',
            type: "POST",
            success:function(r){
                if(r.success){
                    alert(r.msg);
                     
                }else{
                    alert(r.msg);
                }
            }
        })
    });
	
</script>

</html>