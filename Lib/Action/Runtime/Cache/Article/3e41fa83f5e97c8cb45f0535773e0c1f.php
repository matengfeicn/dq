<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
</head>
<body>
<table>
	<tr>
		<td>ID</td>
		<td>酒名</td>
		<td>类型</td>
		<td>创建时间</td>
		<td>价格</td>
		<td>剩余</td>
		<td colspan="3">操作</td>
	</tr>
	<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
		<td><?php echo ($vo["id"]); ?></td>
		<td><?php echo ($vo["title"]); ?></td>
		<td><?php echo ($vo["type"]); ?></td>
		<td><?php echo ($vo["creattime"]); ?></td>
		<td><?php echo ($vo["price"]); ?></td>
		<td><?php echo ($vo["total"]); ?></td>
		<td>pc预览</td>
		<td>手机预览</td>
		<td>生成页面</td>
	
	
	</tr><?php endforeach; endif; ?>

</table>
</body>
</html>