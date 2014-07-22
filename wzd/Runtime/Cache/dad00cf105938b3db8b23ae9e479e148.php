<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	你好<?php echo $_SESSION['username']; ?>
	<a href="__APP__/public/login">登陆</a>
	<a href="__APP__/public/logout">登出</a>
	<a href="__APP__/number/index">个人中心</a>
	<a href="__APP__/Index/askinfo">问题广场</a>
	<?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><hr>
		话题名称:<a href="__APP__/topic/topiclist?topic_id=<?php echo ($topic['id']); ?>"><?php echo ($topic['topicname']); ?></a><br>
		描述:<?php echo ($topic['description']); ?><br>
		拥有话问题数:<?php echo ($topic['questions']); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>