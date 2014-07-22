<?php
class PublicAction extends CommonAction{
	public function _initialize(){		
		parent::_initialize();						
	}
	
	/*
	 * 登陆页面
	 */
	public function login(){
		$this->display();			
	}
	
	/*
	 * 验证码生成
	 */
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}		
	
	/*
	 * 登陆检查
	 */		
	public function checklogin(){		
		//检查是否正确提交表单		
		if(empty($_POST) || empty($_POST['login'])){
			$this->error("请正确提交表单");				
		}
		// else if($_SESSION['verify'] != md5($_POST['verify'])){					
		// 	$this->error('验证码输入错误');
		// }
								
		//检查用户名格式,并且进行过滤
		if($this->fliter->checkUsername($_POST['username'])){
			$username = $this->fliter->getResult();
		}else{
			$this->error($this->fliter->getErrorinfo());
		}
		
		//检查密码格式,并且进行过滤
		if($this->fliter->checkPwd($_POST['password'])){
			$password = $this->fliter->getResult();
		}else{
			$this->error($this->fliter->getErrorinfo());
		}		
		
		//查询数据库
		$user = M("user");
				
		$name = $user->where('username="'.$username.'" and status=1')->getField("username");	
		if(!empty($username)){			
			$pwd = $user->where('password="'.md5($password).'"')->getField("password");
			if(!empty($pwd)){				
				$id = $user->where('password="'.md5($password).'"')->getField("id");
				$_SESSION["username"] = $name;
				$_SESSION["is_login"] = true;
				$_SESSION["id"] = $id;
				$user->where('id="'.$id.'"')->setField("lastlogintime",$this->standardDate(time()));				
				$this->redirect("Index/index");
			}else{
				$this->error("密码错误");
			}			
		}else{			
			$this->error("用户名不存在");
		}			
	}
	
	/*
	 * 退出登陆
	 */
	public function logout(){
		//判断用户是否正在登陆				
		if(!empty($_SESSION["is_login"])){
			//正在登陆中
			unset($_SESSION["is_login"]);
			unset($_SESSION["username"]);
			$_SESSION = array();
			session_destroy();
			$this->assign('jumpUrl',__URL__.'/login');
			$this->success('登出成功');				
		}else{
			//已经退出登陆
			$this->error('已经登出了');
		}	
	}	
	
	/*
	 *注册页面
	 */
	public function register(){		
		$this->display();	
	}
	
	/*
	 * 检查注册
	 */
	public function checkreg(){		
		//检查表单是否正常,防止恶意提交
		if(empty($_POST) || empty($_POST['login'])){
			$this->error("请正确提交表单");		
		}
		// else if($_SESSION['verify'] != md5($_POST['verify'])){					
		// 	$this->error('验证码输入错误');
		// }
						
		//检查用户名格式,并且进行过滤
		if($this->fliter->checkUsername($_POST['username'])){
			$username = $this->fliter->getResult();
		}else{
			$this->error($this->fliter->getErrorinfo());
		}
		
		//检查密码格式,并且进行过滤
		if($this->fliter->checkPwd($_POST['password'],$_POST['repassword'])){
			$password = $this->fliter->getResult();
		}else{
			$this->error($this->fliter->getErrorinfo());
		}			
		
		$user = new UserModel();
		/*
		 * 检查用户名是否注册
		 */
		if($user->where('username="'.$username.'"')->find()){
			$this->error("该用户已经存在");			
		}else{
			$sql = sprintf('insert into wzd_user(username,password,registertime,lastlogintime) values("%s","%s","%s","%s")',
				$username,md5($password),$this->standardDate(time()),$this->standardDate(time()));
				
			if($user->execute($sql)){								
				$this->redirect("public/login");
			}else{				
				$this->error("注册失败");
			}										
		}
	}		
} 
?>