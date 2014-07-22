<?php
class CommonAction extends Action{		
	protected $fliter = null;
	
	protected  function _initialize(){		
		header("Content-Type:text/html; charset=utf-8");
		date_default_timezone_set('RPC');
		include_once(APP_PATH."Lib/Util/CheckFliter.class.php");
		$this->fliter = new CheckFliter();
		//给表单数据两端清除空格					
	}
	
	/*
	 *检查用户是否登录
	 */
	protected function checkLogin(){
		if(!$_SESSION['is_login']){
			$this->redirect("public/login");
		}		
	}
	
	/*
	 * 生成session防止表单页面重复提交
	 */
	public function setCheckSes(){
		$CONSTANT = 'ckywzd';		
		if(!isset($_SESSION)){
			session_start();		
		}
		$_SESSION['check'] = md5($CONSTANT.rand(1,100));
		$this->assign('checkSes',$_SESSION['check']);			
	} 
	
		
	/**
	* 对用户提交信息进行过滤
	* @param  string $value  
	* @return string $value 
	*/
	private function fliter_script($value) {
		$value = preg_replace("/(javascript:)?on(click|load|key|mouse|error|abort|move|unload|change|dblclick|move|reset|resize|submit)/i","&111n\\2",$value);
		$value = preg_replace("/(.*?)<\/script>/si","",$value);
		$value = preg_replace("/(.*?)<\/iframe>/si","",$value);
		$value = preg_replace ("//iesU", '', $value);
		return $value;
	}

	private function fliter_html($value) {
	 	if (function_exists('htmlspecialchars')) return htmlspecialchars($value);
	 	return str_replace(array("&", '"', "'", "<", ">"), array("&", "\"", "'", "<", ">"), $value);
	}

	private function fliter_sql($value) {
		// 去除斜杠
		if (get_magic_quotes_gpc()){
  			$value = stripslashes($value);
  		}				
		 return $value;
	}

	protected function check_sql($value){
		$re = "/(|\'|(\%27)|\;|(\%3b)|\=|(\%3d)|\(|(\%28)|\)|(\%29)|(\/*)|(\%2f%2a)|(\*/)|(\%2a%2f)|\+| (\%2b)|\<|(\%3c)|\>|(\%3e)|\(--))|\[|\%5b|\]|\%5d)/";
		if(preg_match($re, $value)){
			return 0;
		}else{
			return 1;
		}
	}
	
	protected function super_fliter($value){
		$value = $this->fliter_script($value);
		$value = $this->fliter_html($value);
		$value = $this->fliter_sql($value);
		return $value;
	}
	
	/*
	 * 时间戳转标准时间格式Y-m-d H:i:s
	 */
	protected function standardDate($time=null){		
		if(empty($time)){
			$time = time();
		}
		return date("Y-m-d H:i:s",$time);
	}
	
	/*
	 * 获取与问题有关的所有信息
	 */
	protected function getAskList($id=null,$limit=null){
		$flag=0;
		$ask = D("AsksView");	
		$arr = array('id','title','anonymous','uid','view','replys','realname','logo');
		//对id,limit经行检查	
		if(!empty($id)){			
			$question = $ask->where('Asks.id="'.$id.'"')->find();			
			$flag = 1;			
		}else{
			if(empty($limit)){
				$question = $ask->order('id desc')->select($arr);
			}else{
				$question = $ask->order('id desc')->select($arr)->limit($limit);
			}
		}

		$asksTagView = D("AsksTagView");
		$asksTopicView = D("AsksTopicView");			
		if($flag){		
			$answersView = D("AnswersView");	
			$question['answers'] = $answersView->where("ask_id=".$id)->select();		
			$question["tags"] = $asksTagView->where("ask_id=".$id)->select();
			$question["topics"] = $asksTopicView->where("ask_id=".$id)->select();						
		}else{
			foreach ($question as $key => $value){			
				$question[$key]["tags"] = $asksTagView->where("ask_id=".$value['id'])->select();
				$question[$key]["topics"] = $asksTopicView->where("ask_id=".$value['id'])->select();		
			}	
		}		
		return $question;
	}
}
?>