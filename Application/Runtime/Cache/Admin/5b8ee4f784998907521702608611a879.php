<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>工具列表</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>

<table>
    <tr>
        <th>工具名称</th>
        <th>起始概率</th>
        <th>最高概率</th>
        <th>工具价格</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($arr)): foreach($arr as $key=>$value): ?><tr>
            <td><?php echo ($value["name"]); ?></td>
            <td><?php echo ($value["start"]); ?></td>
            <td><?php echo ($value["end"]); ?></td>
            <td><?php echo ($value["miner_gold"]); ?></td>
            <td>
                <a class="documentDelete" href="<?php echo U(MODULE_NAME.'/ParameterProbability/updateTool',array('id'=>$key));?>" >修改信息</a>
            </td>

        </tr><?php endforeach; endif; ?>
	

</table>

<!--底部页面切换选项卡-->
<div class="bottomPageSelect">
   <?php echo ($pageshow); ?>
</div>
</body>
<script type="text/javascript" src="/ksqc/Public/js/commentT.js"></script>
<script>
    function test()
    {
        document.getElementById("myform").submit();
    }
//	$(".documentDelete").click(function(){
//		if(confirm("是否确认删除？")){}else{
//			$(this).attr("href","#");
//			location.reload();
//		}
//	});
</script>
</html>