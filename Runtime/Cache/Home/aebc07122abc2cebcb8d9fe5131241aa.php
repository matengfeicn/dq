<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
</head>

<body>
<form action="__ADMIN__&a=register" method="post">
	用户名<input name="uname"/> 
	密码<input type="password" name="pwd"/>
	重复密码<input type="password" />
	邮箱<input name="email"/>
	<input type="submit" value="提交"/>

</form>

</body>
</html>