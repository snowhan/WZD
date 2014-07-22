<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	<a href="__URL__/login">登陆</a><br>
	<a href="__APP__/Index/index">主页</a><br>
	<form action="__URL__/checkreg" method="post">
		用户名：<input type="text" name="username">
		密码：<input type="text" name="password">
		重复密码：<input type="text" name="repassword">
		验证码:<input type="text" name="verify"><br>
		<input type="hidden" name="safe" value="<?php echo ($checkSes); ?>">
		<input type="submit" name="login" value="注册">
		<img src="__URL__/verify" alt="点击重新获取" onclick="javascript:this.src = this.src + '/1'">
	</form>	
</body>
</html>