<?php
class ReportAction extends PersonalAction{
	public function add(){				
		$type = $_POST['type'];
		$arr = array("ask","answer");
		if(in_array($type, $arr) && $type=="ask"){
			$data['ask_id'] = $_POST['ask_id'];
			$report = M("AskReport");
			if($report->where('ask_id="'.$data['ask_id'].'" and reporterid="'.$_SESSION['id'].'"')->find()){
				echo json_encode("已经举报");exit;
			}
		}else if(in_array($type, $arr) && $type=="answer"){
			$data['answer_id'] = $_POST['answer_id'];
			$report = M("AnswerReport");
			if($report->where('answer_id="'.$data['answer_id'].'" and reporterid="'.$_SESSION['id'].'"')->find()){
				echo json_encode("已经举报");exit;
			}	
		}else{
			echo json_encode("错误");exit;
		}
						
		$data['reporterid'] = $_SESSION['id'];
		$report->add($data);
		echo json_encode($report->getLastSql());
		//$this->display("Public/login");
	}
}
?>