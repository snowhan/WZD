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
			<?php echo W('Test');?>
		</div>
		 
		<div><h1><?php echo ($test); ?></h1></div>
		<div><h1>sssssssssssss</h1></div>
		<div></div>
		<div></div>
	</div>
	<div id="footer">
	
	</div>	
</body>
</html>