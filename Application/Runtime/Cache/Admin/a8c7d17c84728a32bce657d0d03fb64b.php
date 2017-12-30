<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>衣服列表</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>

<table>
    <tr>
        <th>衣服编号</th>
        <th>衣服名称</th>
        <th>衣服价格</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($arr)): foreach($arr as $key=>$value): ?><tr>
            <td><?php echo ($key); ?></td>
            <td><?php echo ($value["name"]); ?></td>
            <td><?php echo ($value["price"]); ?></td>
            <td>
                <a class="documentDelete" href="<?php echo U(MODULE_NAME.'/ParameterProbability/updateClothes',array('id'=>$key));?>" >修改价格</a>
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