<?php
class CheckFliter{
	private $type = array("密码","用户名","邮箱");
	private $str = "";
	private $error = "";	
	private $infoType = "";
	private $fliter = null;
	
	/**
	 * 单例模式
	 */
	public function __construct(){
		
	} 
	
	/**
	 * 初始化数据
	 */
	private function init($str,$typeNum){
		$this->str = trim($str);
		$this->error = "不存在错误";;
		if($typeNum >= 0 && $typeNum < count($this->type)){
			$this->infoType = $this->type[$typeNum];
		}else{
			$this->error = "参数错误";
			return false;
		}		
		return true;
	}
	
	/**
	 * 检查字符串长度
	 * type=1表示在两数之间
	 * type=2表示在两数之外
	 * type=3表示在小于等于某数
	 * type=4表示在大于等于某数
	 */
	private function checkLength($type=1,$slen=0,$elen=0){		
		if(empty($this->str)){
			$this->error = "不能为空";
			return false;			
		}		
		$strLen = strlen($this->str);
		switch($type){
			case 1:
				if(!(($strLen >= $slen) && ($strLen <= $elen))){
					$this->error="长度必须在".$slen."至".$elen."之间";
					return false;}	
				break;
			case 2:
				if(!($strLen <= $slen || $strLen >= $elen)){
					$this->error="长度必须小于".($slen+1)."或大于".($elen-1);
					return false;	echo "aa";			
				}
				break;
			case 3:
				if(!($strLen <= $slen)){
					$this->error="长度必须小于".$slen;
					return false;				
				}
			case 4:
				if(!($strLen >= $slen)){
					$this->error="长度必须大于".$slen;
					return false;
				}
		}		
		return true;
	} 	
	
	/**
	* 安全过滤类-过滤javascript,css,iframes,object等不安全参数 过滤级别高	
	* @param  string $value 需要过滤的值
	* @return string
	*/
	private function fliter_script() {
		$this->str = preg_replace("/(javascript:)?on(click|load|key|mouse|error|abort|move|unload|change|dblclick|move|reset|resize|submit)/i","&111n\\2",$this->str);
		$this->str = preg_replace("/(.*?)<\/script>/si","",$this->str);
		$this->str = preg_replace("/(.*?)<\/iframe>/si","",$this->str);
		$this->str = preg_replace ("//iesU", '', $this->str);		
	}	
	
	private function fliter_html(){
		//白名单
		$this->str = strip_tags($this->str,"<p>");
		/*
		$this->str = filter_var($this->str, FILTER_SANITIZE_STRING);
		if(function_exists('htmlspecialchars')){
			$this->str = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
		}else{
			str_replace(array("&", '"', "'", "<", ">"), array("&amp;", "&quot;", "&apos;", "&lt;", "&gt;"), $value);
		}	
		*/	
	}
	
	/**
	* 安全过滤类-对进入的数据加下划线 防止SQL注入
	* @param  string $value 需要过滤的值
	* @return string
	*/
	private function fliter_sql() {
		$sql = array("select", 'insert', "update", "delete", "\'", "\/\*",
		     "\.\.\/", "\.\/", "union", "into", "load_file", "outfile");
		$sql_re = array("","","","","","","","","","","","");
		$this->str = str_replace($sql, $sql_re, $this->str);
	}
	
	private function super_filter(){
		$this->fliter_sql();
		$this->fliter_script();
		$this->fliter_html();
	}
		
	private function super_check(){
		$orginStr = $this->str;
		$this->super_filter();
		if(md5($orginStr) != md5($this->str)){
			$this->error = "存在非法字符";
			return false;
		}else {
			return true;
		}
	}
	
	/**
	 * 检查密码
	 * @param string $pwd 密码
	 * int $slen 密码长度最小值
	 * int $elen 密码长度最大值
	 * @return string
	 */
	public function checkPwd($pwd,$rePwd = null,$slen=6,$elen=20){
		if(!$this->init($pwd,0)) return false; 		
		if(!$this->super_check()){
			return false;
		}else{			
			if(!$this->checkLength(1,$slen,$elen)) return false;				
			if(!ctype_alnum($this->str)){
				$this->error = "必须为数字与字母的组合";
				return false;			
			}
			if(!empty($rePwd)){
				if(md5($this->str) != md5($rePwd)){
					$this->error = "两次密码输入不一致";
					return false;
				}
			}
			return true;						
		}		
	}
	
	/**
	 * 检查用户名
	 * @param string $username 用户名
	 * int $slen 用户名长度最小值
	 * int $elen 用户名长度最大值
	 * @return string
	 */
	public function checkUsername($username,$slen=6,$elen=20){
		if(!$this->init($username,1)) return false; 		
		if(!$this->super_check()){
			return false;
		}else{			
			if(!$this->checkLength(1,$slen,$elen)) return false;				
			if(!ctype_alnum($this->str)){
				$this->error = "必须为数字或字母的组合";
				return false;			
			}
			return true;						
		}		
	}
		
	/**
	 * 检查数字
	 */
	public function checkNum($num){
		if(ctype_digit($num)){
			$this->str = intval($num);
			return true;
		}else{
			$this->error = "不是数字";
			return false;
		}
	}
	
	/**
	 * 获取处理后字符串
	 */
	public function getResult(){
		return $this->str;
	}
	
	/**
	 * 获取错误信息
	 */
	public function getErrorinfo(){
		if(empty($this->error)){
			return "不存在错误";
		}
		return $this->infoType.$this->error;
	}
	
	
	
	
	
}
?>