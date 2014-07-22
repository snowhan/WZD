<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($title); ?></title>
<link href="/mobius/Public/css/base.css" rel="stylesheet" type="text/css">
<style>		
	.middle{
		margin:0 auto;
		width:960px;
		position:relative;
		height:100%;		
	}	
	#head{
		width:100%;
		height:112px;
		background:url("__PUBLIC__/img/mobius/layoutindex/top_bg1.jpg");	
	}
	
	.logo{		
		position:absolute;	
		top:26px;
		left:0px;		
	}
	
	.tel{
		position:absolute;
		top:26px;
		right:0px;
	}
	
	.neck{
		width:100%;
	}
	
	.con{
		margin:0 auto;
		height:auto;
		width:960px;		
		margin-top:10px;		
	}
	
	.left{		
		width:610px;
		height:auto;
		border:1px solid #D4D4D4;
		margin-bottom:10px;			
	}
	
	.right{
		width:330px;
		height:auto;
		float:right;
	}
	
	.foot{
		clear:both;
		width:100%;
		height:75px;
		border-top:1px solid #D4D4D4;
		background:#323232;	
		text-align:center;
		color:white;
	}		
</style>
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/loadcss.js"></script>
</head>
<body>
	<div id="head">
		<div class="middle">			
			<a href="#"><img class="logo" src="__PUBLIC__/img/mobius/layoutindex/logo.gif"></a>
			<img class="tel" src="__PUBLIC__/img/mobius/layoutindex/400.gif">
		</div>
	</div>	
	<div class="neck">
		<?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mods): $mod = ($i % 2 );++$i; echo W($mods['module'],$mods); endforeach; endif; else: echo "" ;endif; ?>
	</div>		
	<script>//自动加载css,js
headload(['__PUBLIC__/css/mobius/article.css']);
</script>
<div class="con">
		<div class="left fl">
			<div class="art">
				<div class="arttitle"><span>简介:<?php echo ($article['aalias']); ?></span>
					<span style="float:right">所在地:<?php echo ($article['province']); ?></span>
				</div>
				<div class="artcon"><?php echo ($article['introtext']); ?></div>
				<div class="artstatus">
					<div class="fl">
					<span class="artnow">当前状态:<?php if(($article['status'] == 0)): ?>未解决
					<?php elseif($article['status'] == 1): ?>待解决
					<?php else: ?>暂停<?php endif; ?></span>					
					<span>浏览次数:<?php echo ($article['hits']); ?></span>
					</div>
					<div style="float:right">			
					<span>信息发布时间:<?php echo ($article['publish_up']); ?></span>
					<span>审核通过时间:<?php echo ($article['publish_down']); ?></span>
					<a href="__APP__/Index/contact"><input type="button" value="联系我们"></a>									
					</div>			
				</div>
			</div>		
		</div>
		<div class="right">
			<?php if(is_array($right)): $i = 0; $__LIST__ = $right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mods2): $mod = ($i % 2 );++$i; echo W($mods2['module'],$mods2); endforeach; endif; else: echo "" ;endif; ?>
		</div>
</div>
	<div class="foot">
	<div>
		<span>Copyright &copy; 2008-2014 Dowater All Rights Reserved.</span><br>
			<span>中国麦比乌斯公司版权所有</span>	
	</div>
</div>

</body>
</html>