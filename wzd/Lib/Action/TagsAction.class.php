<?php
class TagsAction extends PersonalAction{
	/*
	 * 检查并新增标签
	 */
	public function add(){		
		$tagname = trim($_POST['tagname']);
		
		//检查表单是否正常,防止恶意提交
		if(empty($_POST) || empty($_POST['submitted'])){
			$this->error("请正确提交表单");		
		}
				
		//检查标签名称,并且进行过滤		
		if(!empty($tagname) && (strlen($tagname) <= 30)){
			if($this->check_sql($tagname)){			
				$tagname = $this->super_fliter($tagname);			
			}else{
				$this->error("你所提交的标签可能包含恶意代码");
			}
		}else{
			$this->error("标签长度至多为10个汉字");		
		}
		
		$tags = M("tags");
		$data = array();
		$data['uid'] = $_SESSION['id'];
		$data['tagname'] = $tagname;
		if($tags->add($data)){
			$this->redirect("number/setting");
		}else{
			$this->error("新增标签失败");
		}
	}	
	
	/*
	 * 删除标签
	 */
}
?>