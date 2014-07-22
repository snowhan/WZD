<?php
class LatestNewsWidget extends Widget{	
	function render($data){		
		$params = $data['params'];		
		$params = parseParams($params);
		     
		$catid = explode("&",$params['cid']);
		$where = "(catid={$catid[0]} OR catid={$catid[1]}) AND published=1"; 		
		$article=D('Article','Admin');
    	$list=$article->order('created desc,id desc')->limit('20')
    	->where($where)->select();        	    	
    	$data['alist'] = $list;    	
    		
		$content=$this->renderFile(empty($params['style'])?'verticalmenu':$params['style'],$data);
 		return $content; 
	}
}
?>