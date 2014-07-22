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
	<a href="__APP__/topic/index">话题</a>
	<?php if(is_array($question)): $i = 0; $__LIST__ = $question;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$questions): $mod = ($i % 2 );++$i;?><hr><p>
		<a href="__APP__/ask/index?id=<?php echo ($questions['id']); ?>" target="_blank">问题id:<?php echo ($questions['id']); ?></a><br>
		标题:<?php echo ($questions['title']); ?><br>
		是否匿名:<?php echo ($questions['anonymous']); ?><br>
		用户id:<?php echo ($questions['uid']); ?><br>
		查看次数:<?php echo ($questions['view']); ?><br>
		回答数:<?php echo ($questions['replys']); ?><br>
		名字:<?php echo ($questions['realname']); ?><br>
		头像:<?php echo ($questions['logo']); ?><br>
		标签：
		<?php if(is_array($questions['tags'])): $i = 0; $__LIST__ = $questions['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; echo ($tag["tagname"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
   		 所属话题:<br>
   		 <?php if(is_array($questions['topics'])): $i = 0; $__LIST__ = $questions['topics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; echo ($tag["topicname"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
   		 </p><?php endforeach; endif; else: echo "" ;endif; ?>	
</body>
</html>