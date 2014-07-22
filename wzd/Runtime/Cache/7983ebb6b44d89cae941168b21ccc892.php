<?php if (!defined('THINK_PATH')) exit();?>
<script>//×Ô¶¯¼ÓÔØcss,js
headload(['__PUBLIC__/css/mobius/rightblock.css']);
</script>
<div class="rightblock">
	<div class="index-hd">
		<a href="#"><span><?php echo ($title); ?></span><span>>></span></a>
	</div>
	<ul class="showblock">
	<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><li><i class="list-arrow"></i><a href="<?php echo U('Article/view?id='.$art['id']);?>"><?php echo ($art['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
	</ul>
</div>