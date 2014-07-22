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
	<a href="__APP__/Index/askinfo">问题广场</a><br>
	<a href="__APP__/topic/index">话题</a><br>
	<a href="__URL__/setting">设置</a><br>
	回答数：<?php echo ($userinfo["answers"]); ?><br>
	提问数：<?php echo ($userinfo["asks"]); ?><br>
	签名：<?php echo ($userinfo["signame"]); ?><br>
	上次登陆时间：<?php echo ($userinfo["lastlogintime"]); ?><br>
	注册时间：<?php echo ($userinfo["registertime"]); ?><br>
	真名：<?php echo ($userinfo["realname"]); ?><br>
	感谢数：<?php echo ($userinfo["thanks"]); ?><br>
	赞数：<?php echo ($userinfo["praise"]); ?><br>
	头像：<img src="<?php echo ($userinfo["logo"]); ?>"><br>
	学校：<?php echo !empty($userinfo["school"])? $userinfo["school"]:"未填写";?><br>
	性别:<?php echo ($userinfo["sex"]); ?><br>	
	收藏夹:
	<?php if(is_array($myFav)): $i = 0; $__LIST__ = $myFav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$favorite): $mod = ($i % 2 );++$i;?><a href="__APP__/favorite/favoritelist?fid=<?php echo ($favorite['fid']); ?>"><?php echo ($favorite['ftitle']); ?></a>,<?php endforeach; endif; else: echo "" ;endif; ?><br>
	我关注的问题:
	<?php if(is_array($myFocusask)): $i = 0; $__LIST__ = $myFocusask;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focusask): $mod = ($i % 2 );++$i;?><a href="__APP__/ask/index?id=<?php echo ($focusask['focusid']); ?>"><?php echo ($focusask['title']); ?></a>,<br><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>