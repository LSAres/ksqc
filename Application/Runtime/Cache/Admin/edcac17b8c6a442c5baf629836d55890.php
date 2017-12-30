<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>现金分记录</Title>
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
<!--<form action="<?php echo U(MODULE_NAME.'/WealthDetailed/userCapitalOffset');?>" method="post">-->
    <!--<label class="searchTitelDate" for="searchConditionSelect"> 会员帐号</label>-->
    <!--<input type="text"  placeholder="请输入搜索帐号" name="account"/>-->
    <!--<input type="submit" value="搜索"/>-->
<!--</form>-->



<table>
    <tr>
        <th>会员账号</th>
        <th>会员姓名</th>
        <th>现金分数量</th>
        <th>类型</th>
        <th>备注</th>
		<th>记录时间</th>
    </tr>
    <?php if(is_array($moneyArr)): foreach($moneyArr as $key=>$value): ?><tr>
            <td><?php echo ($value["account"]); ?></td>
            <td><?php echo ($value["username"]); ?></td>
            <td><?php echo ($value["money"]); ?></td>
            <td>
                <?php if($value["type"] == 0): ?>减少
                    <?php else: ?>
                        增加<?php endif; ?>
            </td>
			<td><?php echo ((isset($value["note"]) && ($value["note"] !== ""))?($value["note"]):无); ?></td>
			<td><?php echo (date($value["time"],"Y-m-d H:i:s")); ?></td>
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