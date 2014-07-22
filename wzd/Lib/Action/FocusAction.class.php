<?php
class FocusAction extends PersonalAction{
	public function add(){
		$type = $_POST['type'];
		$arr = array("ask","user");
		if(in_array($type, $arr) && $type=="ask"){
			$data['focusid'] = $_POST['ask_id'];
			$report = M("FocusAsklist");
			if($report->where('focusid="'.$data['focusid'].'" and uid="'.$_SESSION['id'].'"')->find()){
				echo json_encode("已经举报");exit;
			}
			$data['uid'] = $_SESSION['id'];
			$report->add($data);
		}else if(in_array($type, $arr) && $type=="user"){
			$data['focusid'] = $_POST['uid'];
			$report = M("FocusUserlist");
			if($report->where('focusid="'.$data['focusid'].'" and uid="'.$_SESSION['id'].'"')->find()){
				echo json_encode("已经举报");exit;				
			}	
			$data['uid'] = $_SESSION['id'];
			$report->add($data);
		}else{
			echo json_encode("错误");exit;
		}
								
		echo json_encode($report->getLastSql());
		//$this->display("Public/login");
	}
}
?>