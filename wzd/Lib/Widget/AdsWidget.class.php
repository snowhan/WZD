<?php
class AdsWidget extends Widget{
	function render($data){		
		$params = $data['params'];		
		$params = parseParams($params);
				
		$content=$this->renderFile(empty($params['style'])?'':$params['style'],$data);
 		return $content;	
	}	
}
?>