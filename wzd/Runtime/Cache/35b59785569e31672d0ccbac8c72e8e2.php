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
headload(['__PUBLIC__/css/mobius/article/articlelist.css']);
</script>
<div class="con">
		<div class="left fl">
			<div class="list">
				<div class="listheader">
					<a href="__URL__/articleList/type/new" <?php if(($select) == "new"): ?>class="selecta"<?php endif; ?>><span>最新发布</span></a>
					<a href="__URL__/articleList/type/hot" <?php if(($select) == "hot"): ?>class="selecta"<?php endif; ?>><span>热门项目</span></a>
					<a href="__URL__/articleList/type/progress" <?php if(($select) == "progress"): ?>class="selecta"<?php endif; ?>><span>最新进展</span></a>															
				</div>
				<ul>
				<li class="firstli">
					<span class="listfirst">标题</span>
					<span class="listsecond" style="font-size:14px;">需求描述</span>
					<span class="listthird">所在地</span>
					<span class="listforth">状态</span>
					<span class="listfifth">审核</span>
				</li>
				<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($i % 2 );++$i;?><li>
						<span class="listfirst"><i class="listarrow"></i><a href="<?php echo U('Article/view?id='.$arts['aid']);?>"><?php echo ($arts['atitle']); ?></a></span>
						<span class="listsecond"><?php echo ($arts['aalias']); ?></span>
						<span class="listthird"><?php echo ($arts['province']); ?></span>
						<span class="listforth">						
						<?php if(($arts['status'] == 0)): ?><img class="listforth" src="__PUBLIC__/img/mobius/article/icn_time.gif">
						<?php elseif($arts['status'] == 1): ?><img class="listforth" src="__PUBLIC__/img/mobius/article/failure.gif">
						<?php else: ?><img class="listforth" src="__PUBLIC__/img/mobius/article/status1.jpg"><?php endif; ?>
						</span>
						<span class="listfifth"><?php echo ($arts['publish_up']); ?></span>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="page"><?php echo ($show); ?></div>
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