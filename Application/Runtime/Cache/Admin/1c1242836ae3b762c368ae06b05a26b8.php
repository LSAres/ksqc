<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>帮助文档</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>

<table>
    <tr>
        <th>文档标题</th>
        <th>添加时间</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($helpArr)): foreach($helpArr as $key=>$value): ?><tr>
            <td><?php echo ($value["title"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$value["time"])); ?></td>
            <td>
                <span class="documentCall documentSelect">查看文章</span>
                <textarea  class=" documentDisplay documentReadonly" readonly="readonly"    >
                   <?php echo ($value["content"]); ?>
                </textarea>
                <input type="button" value="关闭" class="documentButtonStyle documentClose">
            </td>
            <td>
                <a href="<?php echo U(MODULE_NAME.'/ParameterProbability/edithelpintroduce',array('id'=>$value['id']));?>" >修改文章</a><br/>
                <a class="documentDelete" href="<?php echo U(MODULE_NAME.'/ParameterProbability/deletehelpintroduce',array('id'=>$value['id']));?>" >删除文章</a>
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
	$(".documentDelete").click(function(){
		if(confirm("是否确认删除？")){}else{
			$(this).attr("href","#");
			location.reload();
		}
	});
//    $('.documentChange').click(function(){
//        $(this).parent().submit();
//    })
</script>
</html>