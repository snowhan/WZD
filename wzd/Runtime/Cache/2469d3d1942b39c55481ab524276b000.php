<?php if (!defined('THINK_PATH')) exit();?>
<script>//自动加载css,js
headload(['__PUBLIC__/css/mobius/widget/mainmenu.css']);
</script>
<div class="nav">
	<div class="navmiddle">
		<?php getTree($milist); ?>		
	</div>				
</div>