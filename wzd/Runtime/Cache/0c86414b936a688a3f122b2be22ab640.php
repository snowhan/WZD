<?php if (!defined('THINK_PATH')) exit();?>
<script>//¶¯Ì¬¼ÓÔØcss,js
headload(['__PUBLIC__/css/mobius/widget/mainmenu2.css']);
</script>
<div class="nav">
	<div class="middle">
		<div class="navhead fl"></div>	
			<?php getTree($milist); ?>				
		<div class="navtail fl"></div>
	</div>
</div>