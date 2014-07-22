<?php if (!defined('THINK_PATH')) exit();?>
<div class="section">
	<ul>
	<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>		
			<a href="<?php echo U('Section/view/id/'.$row['id']);?>"><?php echo ($row['title']); ?></a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>