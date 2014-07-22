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
headload(['__PUBLIC__/css/mobius/contact.css']);
</script>
<div class="con">
	<div class="contact">
		<div class="contactdiv">
			<img src="/mobius/Public//img/mobius/face_2.jpg">
			<span>联系我们</span>
		</div>
		<div>
			<p>服务热线：400-600-2094 </p>
			<p>传真号码：+86-371-69190002 </p>
			<p>电子邮箱：project#dowater.com (请改#为@) </p>
			<p>通信地址： 中国 · 郑州郑东新区CBD商务内环路12号7层  </p>
		</div>
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