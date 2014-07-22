<?php
class NumberAction extends PersonalAction{
	private $uid = ""; 
	
	public function _initialize(){		
		parent::_initialize();
		$this->uid = $_SESSION['id'];				
	}		
	
	/**
	 * 获取个人信息
	 */
	private function getUserInfo($uid){
		if(!empty($uid)){
			$this->uid = $uid;
		}		
		$user = M("user");
		$userinfo = $user->where("id=".$this->uid)->find();
		$this->assign("userinfo",$userinfo);		
		$this->getFavorite();
		$this->getFocusask();
	}
	
	/**
	 * 获取个人收藏夹
	 */
	private function getFavorite(){
		$favorite = M("favorite");
		$myFav = $favorite->where('uid="'.$this->uid.'"')->field("fid,ftitle")->select();
		$this->assign("myFav",$myFav);
	}
	
	/**
	 * 获取个人关注的问题
	 */
	private function getFocusask(){
		$focusAsklist = M("focusAsklist");
		$sql = 'select fa.focusid,a.title from wzd_focus_asklist fa left join wzd_asks a on fa.focusid = a.id where a.status=1 and fa.uid="'.$this->uid.'"';
		$myFocusask = $focusAsklist->query($sql);
		$this->assign("myFocusask",$myFocusask);
	} 
	
	/**
	 * 获取个人标签
	 */
	private function getMyTags(){
		$tags = new Model("tags");		
		$sql = sprintf('select id,tagname from __TABLE__ where uid=%d',$_SESSION['id']);
		$myTags = $tags->query($sql);
		$this->assign("myTags",$myTags);				
	} 

	/**
	 * 获取topic
	 */
	private function getTopic(){		
		$topic = new Model("topic");	
		$topicid = $topic->getField("id",true);	
		$topicname = $topic->getField("topicname",true);
		$this->assign("topicid",$topicid);
		$this->assign("topicname",$topicname);		
	}
		
	/**
	 * 个人中心
	 */
	public function index(){
		$this->getUserInfo();			
		$this->display();
	}
	
	/**
	 *查看其它用户信息 
	 */
	public function guestindex(){
		$uid = $_GET['uid'];
		if($this->fliter->checkNum($uid)){
			$this->getUserInfo($this->fliter->getResult());
		}else{
			$this->error($this->fliter->getErrorinfo());
		}					
		$this->display();
	}
	
	/**
	 * 提问页面
	 */
	public function ask(){
		$this->getMyTags();
		$this->getTopic();
		$this->display();
	}
		
	/**
	 *修改个人信息，新增标签页面 
	 */
	public function setting(){
		$this->getMyTags();	
		$this->getUserInfo();		
		$this->display();
	} 
	
	/**
	 *修改个人信息
	 */
	public function editInfo(){
		$data = array();
		$realname = trim($_POST['realname']);
		$school = trim($_POST['school']);
		$email = trim($_POST['email']);	
				
		//检查表单是否正常,防止恶意提交
		if(empty($_POST) || empty($_POST['submitted'])){
			$this->error("请正确提交表单");		
		}		
				
		//检查真实姓名格式,并且进行过滤
		if(!empty($realname) && (strlen($realname) <= 60)){
			if($this->check_sql($realname)){			
				$data["realname"] = $this->super_fliter($realname);			
			}else{
				$this->error("你所提交的标题可能包含恶意代码");
			}
		}else{
			$this->error("真实姓名不能为为空且至多为20个汉字");		
		}
		
		//检查学校格式,并且进行过滤	
		if(empty($school)){
			$data["school"] = "";
		}else{
			if($this->check_sql($school) && (strlen($school) < 20)){			
				$data["school"] = $this->super_fliter($school);			
			}else{
				$this->error("你所提交的标题可能包含恶意代码");
			}			
		}	

		//检查email格式,并且进行过滤	
		if(empty($email)){
			$data["email"] = "";
		}else{
			if($this->check_sql($email) && (strlen($email) < 40)){				
				if(preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){			
					$data["email"] = $this->super_fliter($email);		
				}else{
					$this->error("你所提交的email格式不对");
				}	
			}else{
				$this->error("你所提交的email可能包含恶意代码");
			}
		}
		
		$user = M("User");		
		if($user->where('id="'.$_SESSION["id"].'"')->save($data)){
			$this->redirect("number/setting");
		}else{
			$this->redirect("number/setting");
		}				
	}
	
	/*
	 * 修改密码
	 */
	public function editPwd(){
		$data = array();
		$rawpassword = trim($_POST['rawpassword']);
		$newpassword = trim($_POST['newpassword']);
		$renewpassword = trim($_POST['renewpassword']);	
				
		//检查表单是否正常,防止恶意提交
		if(empty($_POST) || empty($_POST['submitted'])){
			$this->error("请正确提交表单");		
		}			
						
		//检查原密码,并且进行过滤
		if(!empty($rawpassword) && (strlen($rawpassword)>=6 && strlen($rawpassword) <= 20)){
			if(ctype_alnum($rawpassword) && $this->check_sql($rawpassword)){
				$rawpassword = $this->super_fliter($rawpassword);
				$user = new UserModel();				
				if(!$user->where('id='.$_SESSION['id'].' and password="'.md5($rawpassword).'"')->find()){
					$this->error("原密码输入错误");
				}
			}else{
				$this->error("密码不能包含除数字或字母以为的符号");
			}
		}else{
			$this->error("密码长度至少为6，至多为20");		
		}
		
		//检查新密码格式,并且进行过滤
		if(!empty($newpassword) && (strlen($newpassword)>6 && strlen($newpassword) <= 20)){	
			if(ctype_alnum($newpassword) && $this->check_sql($newpassword)){
				if($newpassword != $renewpassword){
					$this->error("两次密码输入不一致");					
				}else{
					$newpassword = $this->super_fliter($newpassword);
					if($user->where("id=".$_SESSION['id'])->setField("password", md5($newpassword))){
						$this->success("密码更新成功");
					}else{
						$this->error("密码更新失败");
					}
				}
			}else{				
				$this->error("密码格式错误");
			}
		}else{
			$this->error("密码格式错误");		
		}					
	}

}