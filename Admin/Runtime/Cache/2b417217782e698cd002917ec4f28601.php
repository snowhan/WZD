<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台登录页面</title>
</head>
<body>
    <a href="<?php echo U('wzd/Index/index');?>">返回首页</a>
	<form action="<?php echo U('admin/Public/checkLogin');?>" method="post">
		用户名：<input type="text" name="username">
		密码：<input type="text" name="password">
		验证码:<input type="text" name="verify"><br>
		<input type="submit" value="登陆">
		<img src="__URL__/verify" alt="点击重新获取" onclick="javascript:this.src = this.src + '/1'">
	</form>	
</body>
</html>