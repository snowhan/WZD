<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	你好<?php echo $_SESSION['username']; ?>
	<a href="__APP__/public/logout">登出</a><br>
	<a href="__APP__/Index/index">主页</a><br>
	<a href="__URL__/ask">我要提问</a><br>
	<a href="__APP__/number/index">个人中心</a>
	<div style="border:1px solid red;margin-top:50px;">
	<form action="__URL__/editInfo" method="post">
		姓名：<input name="realname" type="text" value="<?php echo ($userinfo["realname"]); ?>">
		学校：<input name="school" type="text" value="<?php echo ($userinfo["school"]); ?>">
		邮箱：<input name="email" type="text" value="<?php echo ($userinfo["email"]); ?>">
		<input type="submit" name="submitted" value="提交">
	</form>
	</div>
	
	<div style="border:1px solid green;margin-top:50px;">	
		<ul>
			<?php if(is_array($mytags)): $i = 0; $__LIST__ = $mytags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i;?><a href="__APP__/tags/id=<?php echo ($tags["id"]); ?>"><?php echo ($tags["tagname"]); ?></a><br><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<form action="__APP__/tags/add" method="post">
			标签名:<input type="text" name="tagname">
			<input type="submit" name="submitted" value="新增">
		</form>
	</div>
	
	<div style="border:1px solid blue;margin-top:50px;">
	<form action="__URL__/editPwd" method="post">
		原密码：<input type="text" value="" name="rawpassword">
		新密码：<input type="text" avlue="" name="newpassword">
		重复新密码：<input type="text" avlue="" name="renewpassword">
		<input type="submit" name="submitted" value="提交">
	</form>
	</div>
</body>
</html>