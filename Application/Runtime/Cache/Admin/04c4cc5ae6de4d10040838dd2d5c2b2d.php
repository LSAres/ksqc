<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>游戏公告页面</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>

<style type="text/css">
	*{
		margin:0;
		padding:0;
		box-sizing:border-box;
		fotn-size:10px;
	}
   .bodyOuter{
   		width:100%;
		height:100%;
   }
  
   
   .statisticsData-Message{
   		display:inline-block;
		width:25%;
		height:160px;
		display:inline-block;
		color:#fff;
		font-weight:bold;
		font-size:1.5rem;
		text-align:center;
		line-height: 80px;
		border-radius:15px;
		box-shadow:0 0 15px #000;
		margin-left: -6px;
		transition:all 2s;
   }
   .TitleText{
   		height:50%;
		border-radius:15px 15px 0 0 ;
	}
   .displayText{
   		height:50%;
		border-radius: 0 0 15px 15px;
	}
   .rotateAniamtion{
   		transform: rotateY(360deg); 
	}
    .statisticsData-Message:nth-child(2){background: #b037d6;}
  
   .statisticsData-Message:nth-child(3){background: #dc4560;}
   
   .statisticsData-Message:nth-child(4){background: #6c45e0;}
   
   .statisticsData-Message:nth-child(5){background: #398eea;}
   
   .statisticsData-Message:nth-child(6){background: #48dce4;}
   
   .statisticsData-Message:nth-child(7){background: #3ad681;}
   
   .statisticsData-Message:nth-child(8){background: #65d64a;}
   
   .statisticsData-Message:nth-child(9){background: #63a924;}
   
   .statisticsData-Message:nth-child(10){background: #cae830;}
   
   .statisticsData-Message:nth-child(11){background: #d09f2f;}
   
   .statisticsData-Message:nth-child(12){background: #8e2a2a;}
   
   .statisticsData-Message:nth-child(13){background: #a01a70;}
   .dateSearchDiv{
   		margin:20px 0;
		text-align:center;
   }
   .dateSearchDiv input{
   		margin:0px 20px;
   }
   .dateSearchDiv input[type='submit']{
   		width:100px;
   }
</style>
<body class="bodyOuter">
	<!--日期搜索-->
	<div class="dateSearchDiv">
		<form id="form_search" action="<?php echo U(MODULE_NAME.'/Index/searchValuePage');?>" method="post">
			<span>
				开始日期：
				<input type="date" name="starttime" id="startDate"/>
			</span>
			<span>
				结束日期：
				<input type="date" name="endtime" id="endDate"/>
			</span>
			<input type="submit" value="搜索"  id="dateSearch"/>
		</form>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			奖励积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($gold_sum) && ($gold_sum !== ""))?($gold_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			消费积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($buycar_money_sum) && ($buycar_money_sum !== ""))?($buycar_money_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			信用积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($report_money_sum) && ($report_money_sum !== ""))?($report_money_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			购物积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($bonus_sum) && ($bonus_sum !== ""))?($bonus_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<!--<div class="statisticsData-Message">
		<div class="TitleText">
			在途积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($frozen_money_sum) && ($frozen_money_sum !== ""))?($frozen_money_sum):0); ?>
		</div>
	</div>-->
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日交易量：
		</div>
		<div class="displayText">
			<?php echo ((isset($transaction_money_sum) && ($transaction_money_sum !== ""))?($transaction_money_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日回购量：
		</div>
		<div class="displayText">
			<?php echo ((isset($withdraw_money_sum) && ($withdraw_money_sum !== ""))?($withdraw_money_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日新增人数：
		</div>
		<div class="displayText">
			<?php echo ((isset($add_user_sum) && ($add_user_sum !== ""))?($add_user_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日新增消费积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($buycarmoney_sum) && ($buycarmoney_sum !== ""))?($buycarmoney_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日新增奖励积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($getgold_sum) && ($getgold_sum !== ""))?($getgold_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<div class="statisticsData-Message">
		<div class="TitleText">
			当日新增购物积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($getbonus_sum) && ($getbonus_sum !== ""))?($getbonus_sum):0); ?>
		</div>
	</div>
	<!--信息-->
	<!--<div class="statisticsData-Message">
		<div class="TitleText">
			当日新增奖励积分：
		</div>
		<div class="displayText">
			<?php echo ((isset($upsidemoney_sum) && ($upsidemoney_sum !== ""))?($upsidemoney_sum):0); ?>
		</div>
	</div>-->

</body>
<script>
	window.onload = function(){
	
		//获取所有右侧信息
		var rightMessageAll = document.getElementsByClassName("statisticsData-Message"); 
		/*随机旋转的元素下标*/
		var radowmNumber;
		//接受已有的Class名
		var rightMessageClassName;
		//定时执行动画
		var rightMessageAnimation = setInterval(function(){
			do{
				radowmNumber = Math.round(Math.random() *10);
			}while(radowmNumber > rightMessageAll.length)
			if(rightMessageAll[radowmNumber].classList.contains("rotateAniamtion")){
				rightMessageAll[radowmNumber].classList.remove("rotateAniamtion")
			}else{
				rightMessageAll[radowmNumber].classList.add("rotateAniamtion")
			}
			
			
		},3000);
		$("#dateSearch").click(function(){
			if($('#startDate').val() == "" || $('#startDate').val() == null || $('#endDate').val() == "" || $('#endDate').val() == null){
				alert("开始或结束日期不能为空")
				return false;
			}
		});
	
	}
	
	

</script>
</html>