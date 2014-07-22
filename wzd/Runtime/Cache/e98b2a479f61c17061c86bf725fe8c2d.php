<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>mobius布局</title>
<link href="__PUBLIC__/css/layout_index.css" type="text/css" rel="stylesheet"> 
<style>
	
</style>
</head>
<body>
	<div id="main">
				<div id="header">
			<div class="toplogo fl"></div>
			<div class="search fl">
				<form>
				<input class="searchbox" type="text" style="border:1px solid red;">
				<select class="searchoption">
					<option>内容搜索</option>
					<option>主题搜索</option>
				</select>
				<input type="submit" class="searchsubmit" value="">
				</form>
			</div>
			<div class="searchad fl">
				<img src="__PUBLIC__/img/mobius/01.gif">
			</div>
		</div>				
		<div class="nav">			
			<?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mods): $mod = ($i % 2 );++$i; echo W($mods['module'],$mods); endforeach; endif; else: echo "" ;endif; ?>
		</div>
		 
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div id="footer">
	
	</div>	
</body>
</html>