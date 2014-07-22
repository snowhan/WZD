<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	你好<h2><?php echo $_SESSION['username']; ?></h2>
	<a href="__APP__/public/login">登陆</a>
	<a href="__APP__/public/logout">登出</a>
	<a href="__APP__/number/index">个人中心</a>
	<a href="__APP__/Index/askinfo">问题广场</a>
	<a href="__APP__/topic/index">话题</a>	
</body>
</html>