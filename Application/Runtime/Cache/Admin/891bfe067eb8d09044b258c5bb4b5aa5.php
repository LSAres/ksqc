<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>管理员列表</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>
<!--顶部搜索DIV

<div class="topSearchDiv" style="display:none;">
    <label class="searchTitelDate" for="searchTitelOrStartDate">
        开始日期
    </label>
    <input type="date" class="searchDataStyle" id="searchTitelOrStartDate">
    <label class="searchTitelDate" for="searchTitelOrEndDate"> 结束日期</label>
    <input type="date" class="searchDataStyle" id="searchTitelOrEndDate">
    <label class="searchTitelDate" for="searchConditionSelect"> 搜索条件选择</label>
    <select name="" class="searchConditionSelect" id="searchConditionSelect">
        <option value="" selected="selected">请选择搜索条件</option>
        <option value="1111">1111111</option>
        <option value="2222">22222222222</option>
        <option value="3333">3333333</option>
        <option value="444">444444444</option>
        <option value="555">555555555</option>
        <option value="666">666666666件</option>
    </select>
    <input type="text" class="searchDataStyle searchInputStyle" placeholder="请输入搜索条件">
    <div class="conditionEndSearchStart">开始搜索</div>
</div>-->


<table>
    <tr>
        <th>执行操作</th>
		<th>操作数量</th>
        <th>执行日期</th>
        <th>执行人帐号</th>
		<th>用户帐号</th>
    </tr>
	
	<?php if(is_array($helpArr)): foreach($helpArr as $key=>$value): ?><tr>
			<td><?php echo ($value["type"]); ?></td>
			<td><?php echo ($value["num"]); ?></td>
			<td><?php echo (date("Y-m-d H:i:s",$value["time"])); ?></td>
			<td><?php echo ($value["sp_name"]); ?></td>
			<td><?php echo ($value["account"]); ?></td>
		</tr><?php endforeach; endif; ?>
	

</table>

<!--底部页面切换选项卡-->
<div class="bottomPageSelect">
    <?php echo ($pageshow); ?>
</div>
</body>
<script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
</html>