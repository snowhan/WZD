<?php
class AskAction extends CommonAction{
	public function index(){
		//对id经行检测,问题id
		$id = $_GET['id'];
		//$_SESSION['ask_id'] = $id;			
		$ask = M("asks");
		$ask->where('id="'.$id.'"')->setInc("view");
		
		$question = $this->getAskList($id);		
		$this->assign("question",$question);
		
		//收藏夹
		$favorite = M("favorite");
		$fav = $favorite->where('uid="'.$_SESSION['id'].'"')->select();
		$this->assign("fav",$fav);
		$this->display();	
	}
	/*
	 * 检查并新增问题
	 */
	public function add(){		
		$this->checkLogin();		
		$data = array();		
		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		$anonymous = trim($_POST['anonymous']);
		$data['title'] = $title;
		$data['content'] = $content;
		$data['anonymous'] = $anonymous;
		$data['uid'] =$_SESSION["id"];  
	
		//检查表单是否正常,防止恶意提交
		if(empty($_POST) || empty($_POST['submitted'])){
			$this->error("请正确提交表单");		
		}	
		/*
		//检查匿名选项
		if(empty($anonymous)){
			$data["anonymous"] = 0;
		}else{
			if(ctype_digit($anonymous) || $anonymous != 1){
				$this->error("请正确填写匿名选项");
			}else{
				$data["anonymous"] = intval($anonymous);
			}
		}
		
		//检查用户是否拥有该标签
		if(!empty($tag_id) && ctype_digit($tag_id)){
			$tags = M("tags");
			if($tags->where("uid=".$_SESSION['id']." and id=".$tag_id)->find()){
				//$data["tag_id"] = (int)$tag_id;
			}else{
				$this->error("标签错误");
			}
		}else{
			$this->error("标签错误");
		}		
		
		//检查标题格式,并且进行过滤
		if(!empty($title) && (strlen($title)>=9 && strlen($username) <= 120)){
			if($this->check_sql($title)){			
				$data['title'] = $this->super_fliter($title);			
			}else{
				$this->error("你所提交的标题可能包含恶意代码");
			}
		}else{
			$this->error("标题长度至少为3个汉字，至多为40个汉字");		
		}
		
		//检查内容格式,并且进行过滤		
		if(!empty($content) && (strlen($content)>=9 && strlen($content) <= 120)){
			if($this->check_sql($content)){			
				$data["content"] = $this->super_fliter($content);			
			}else{
				$this->error("你所提交的标题可能包含恶意代码");
			}
		}else{
			$this->error("标题长度至少为3个汉字，至多为40个汉字");		
		}		
		*/	
		$asks_topic = M("asksTopic");		
		$asks_tag = M("asksTag");
		$user = M("User");
		$ask = M("asks");
		$ask_id = $ask->add($data);	
		$topic = M("topic");
		$user->where('id="'.$_SESSION['id'].'"')->setInc("asks");		
		
		//新增问题，标签关系
		foreach($_POST['tag_id'] as $id){
			$tagdata['tag_id'] = $id;
			$tagdata['ask_id'] = $ask_id;			
			$asks_tag->add($tagdata);
		}
		
		//新增问题，话题关系
		foreach($_POST['topic_id'] as $id){
			$topic->where('id="'.$id.'"')->setInc("questions");
			$topicdata['topic_id'] = $id;
			$topicdata['ask_id'] = $ask_id;
			$asks_topic->add($topicdata);
		}				
		$this->redirect("Index/askinfo");	
	}		
			
	public function focus(){
		
	}
}