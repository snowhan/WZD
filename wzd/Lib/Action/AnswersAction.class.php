<?php
class AnswersAction extends PersonalAction{
	public function add(){
		//记得判断用户是否登录，因为是用ａｊａｘ，所以不能使用checklogin,要另外写
		
		//记得过滤答案		
		$data['content'] = $_POST['answer'];
		$data['uid'] = $_SESSION['id'];
		$data['ask_id'] = $_POST['ask_id'];
		$data['createtime'] = $this->standardDate(time());
		$data['anonymous'] = $_POST['anonymous'];			
		
		$answer = M("answers");
		$answer->add($data);
		$user = M("user");
		$user->where('id="'.$_SESSION['id'].'"')->setInc("answers");
		$ask = M("asks");
		$ask->where('id="'.$data['ask_id'].'"')->setInc("replys");
		echo json_encode($data);
	} 
	
	/*
	 * 回答的点赞，点踩，没有帮助
	 */
	public function evaluate(){
		//过滤传过来的id
		$id = $_POST['answer_id'];
		$type = $_POST['type'];
		//三种方式
		$arr = array(0=>'praise',1=>'hate',2=>'useless',3=>'thanks');
		
		if(!in_array($type,$arr)){
			echo json_encode("错误");exit;
		}
		
		$key = array_keys($arr,$type);
				
		$review = M("review");
		//检查是否点赞
		if($key[0] == 0 || $key[0]==1){
			if($review->where('uid="'.$_SESSION['id'].'" and type="'.$key[0].'" and answer_id="'.$id.'"')->find()){
				echo json_encode("错误");exit;
			}
		}else{
			if($review->where('uid="'.$_SESSION['id'].'" and type="'.$key[0].'" and answer_id="'.$id.'"')->find()){
				echo json_encode("错误");exit;
			}
		}
		
		$data['uid'] = $_SESSION['id'];
		$data['type'] = $key;
		$data['answer_id'] = $id;
		
		$review->add($data);
		
		$answer = M("answers");
		$answer->where('id="'.$id.'"')->setInc($type);
		$user = M("user");
		$user->where('id="'.$_SESSION['id'].'"')->setInc($type);
			
		//echo json_encode($key);
	}
	
	/*
	 * 对某回答的评论
	 */
	public function followlist(){
		$answer_id = $_POST['answer_id'];
		
		$follows = M("follows");
		$res = $follows->where('answer_id="'.$answer_id.'"')->select();
		$user = M("user");
		foreach ($res as &$value){
			$uid = $value['uid'];
			$value['realname'] = $user->where('id='.$uid)->limit(1)->getField("realname");
			$puid = $follows->where('id="'.$value['pid'].'"')->limit(1)->getField("uid");
			$value['othername'] = $user->where("id=".$puid)->limit(1)->getField("realname");
		}		
		if(empty($res)){
			echo json_encode(0);
		}else{
			echo json_encode($res);
		}			
	} 
	
	/*
	 * 添加评论
	 */
	public function followadd(){
		//不能为空
		//检查是否存在该问题
		$data['answer_id'] = $_POST['answer_id'];
		//检查是否存在该父路径
		$data['pid'] = $_POST['pid'];
		//检查内容
		$data['content'] = $_POST['content'];
		$data['uid'] = $_SESSION['id'];
		$data['createtime'] = $this->standardDate();
		$follows = M("follows");		
		$follows->add($data);
		echo json_encode("成功");
	}
}
?>