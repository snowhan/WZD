<?php if (!defined('THINK_PATH')) exit();?>
<script>//自动加载css,js
headload(['__PUBLIC__/css/mobius/widget/mainmenu3.css']);
</script>
<div class="nav">
	<div class="middle">
		<h3 class="menulogo fl"><a href="#"></a></h3>
		<?php getTree($milist); ?>
		<div class="headerbar">
			<div class="search">
			<form>
				<div class="item fl">
				<span>全部</span>
				</div>
				<input type="text" value="" class="fl">
				<a href="#" class="fl">搜索</a>
			</form>
			</div>
			<div class="login"></div>
		</div>
	</div>				
</div>