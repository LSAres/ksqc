<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>管理员列表</Title>
    <script type="text/javascript" src="/ksqc/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/ksqc/Public/css/styleSheetT.css">
</head>
<body>

<table>
    <tr>
        <th>管理员编号</th>
        <th>管理员账号</th>
        <th>登陆时间</th>
        <th>注册时间</th>
        <th>登陆IP</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($userArr)): foreach($userArr as $key=>$value): ?><tr>
            <td><?php echo ($value["sp_id"]); ?></td>
            <td><?php echo ($value["sp_username"]); ?></td>
            <td><?php echo (date("Y-m-d h:i:s",$value["sp_logintime"])); ?></td>
            <td><?php echo (date("Y-m-d h:i:s",$value["sp_addtime"])); ?></td>
            <td><?php echo ($value["sp_loginip"]); ?></td>
            <td>
                <a class="adminDelete" href="<?php echo U(MODULE_NAME.'/AdminControl/Deletesuper',array('sp_id'=>$value['sp_id']));?>" onclick="deleteClick()" >删除管理员</a>
                <br>
                <a href="<?php echo U(MODULE_NAME.'/AdminControl/adminPasswordUpdate',array('sp_id'=>$value['sp_id']));?>">修改管理员密码</a>
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
	$(function(){
		$(".adminDelete").click(function(){
			if(confirm("是否删除？")){}else{
				$(this).attr("href","#");
				location.reload();
			}
		});
	})
</script>
</html>