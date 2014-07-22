<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/ueditor/themes/default/css/ueditor.css"/>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
	你好<?php echo $_SESSION['username']; ?>
	<a href="__APP__/public/login">登陆</a>
	<a href="__APP__/public/logout">登出</a>
	<a href="__APP__/number/index">个人中心</a>
	<form action="__APP__/ask/add" method="post">
		标题:<input type="text" name="title"><br>			
		内容:<script id="editor" type="text/plain" style="width:1024px;height:500px;" name="content"></script>
		是否匿名:<input type="checkbox" name="anonymous" value="1">
		<br>选择标签:		
			<?php if(is_array($mytags)): $k = 0; $__LIST__ = $mytags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($k % 2 );++$k; echo ($tags["tagname"]); ?><input type="checkbox" name="tag_id[<?php echo ($k-1); ?>]" value="<?php echo ($tags["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
		<br>选择话题：
		<?php if(is_array($topicname)): $k = 0; $__LIST__ = $topicname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tname): $mod = ($k % 2 );++$k; echo ($tname); ?><input type="checkbox" name="topic_id[<?php echo ($k-1); ?>]" value="<?php echo ($topicid{$k-1}); ?>"><?php endforeach; endif; else: echo "" ;endif; ?> 	
		<input type="submit" value="提交" name="submitted">
	</form>

</body>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');
</script>
</html>