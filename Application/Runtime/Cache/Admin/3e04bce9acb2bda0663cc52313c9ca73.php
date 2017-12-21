<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>公告列表</Title>
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
        <th>操作</th>
    </tr>
    <?php if(is_array($userArr)): foreach($userArr as $key=>$value): ?><tr>
            <td><?php echo ($value["Title"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$value["add_time"])); ?></td>
            <td>
                <span class="documentCall documentSelect">查看公告</span>
                <textarea  class=" documentDisplay documentReadonly" readonly="readonly"    >
                  <?php echo ($value["content"]); ?>
                </textarea>
                <input type="button" value="关闭" class="documentButtonStyle documentClose">
            </td>
            <td>
                <a href="<?php echo U(MODULE_NAME.'/NoticControl/noticeTextChange',array('id'=>$value['id']));?>" class="documentCall documentUpdata">修改公告</a>
            </td>
            <td>
                <a class="noticeDelete" href="<?php echo U(MODULE_NAME.'/NoticControl/deletenew',array('id'=>$value['id']));?>" >删除公告</a>
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
	$(".noticeDelete").click(function(){
		if(confirm("是否确认删除？")){}else{
			$(this).attr("href","#");
			location.reload();
		}
	});
</script>
</html>