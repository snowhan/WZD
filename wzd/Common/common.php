<?php
	function parseParams($params){
		$p=explode(",",$params);
		$r=array();
		foreach ($p as $v){
			$tmp=explode('=',$v);
			$r[$tmp[0]]=$tmp[1];
		}
		return $r;
	}
	
	function parseLink($link,$itemid=0){
		$l=explode("/",$link);
		$url=$l[1]."/".$l[4]."-".$itemid;
		return $url;
	}
	
	function getTree($data){
		$menuitem = D('MenuItem','Admin');
		static $flag = false;
		if(!$flag){
			echo '<ul class="topul">';
				$flag = true;
		}else{
			echo '<ul style="display:none">';
		}																			
		foreach($data as $key => $value){					
			$ndata = $menuitem->where("pid=".$value['id'])->select();					
										
			if(!empty($ndata)){	
				echo '<li class="showli"><a href="'.$value['link'].'">'. $value['name']."</a>";					
				getTree($ndata);												
			}else{
				echo '<li><a href="'.$value['link'].'">'. $value['name']."</a></li>";
			}										
		}
		echo "</ul>";
		$flag = false;			
	}						
?>