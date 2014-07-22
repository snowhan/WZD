<?php
class MenuWidget extends Widget{
	function render($data){			
		$params = $data['params'];		
		$params = parseParams($params);
			
		$menuitem = D('Menuitem','Admin');
		$list=$menuitem->field("id,name,link,order,access,concat(path,'-',id) as bpath")
		->order("bpath,id")->where('menuid='.$params['menuid'])->select();
				
		$data['milist']=$list;		
		$content=$this->renderFile(empty($params['style'])?'verticalmenu':$params['style'],$data);
 		return $content;	
	}	
}
?>