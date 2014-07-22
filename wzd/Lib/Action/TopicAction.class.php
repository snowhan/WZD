<?php
class TopicAction extends CommonAction{
	public function index(){
		$topic = M("Topic");
		$res = $topic->select();
		$this->assign("topic",$res);
		$this->display();
	}
	
	public function topiclist(){
		$data = array();
		$arr = array('id','title','anonymous','uid','view','replys','realname','logo');
		$topic_id = $_GET['topic_id'];
		
		$topic = M("Topic");
		
		$topicname = $topic->where('id="'.$topic_id.'"')->getField("topicname");
		$this->assign("topicname",$topicname);
		
		$ask = D("AsksView");
		$ask_topic = M("asksTopic");
		$res = $ask_topic->where('topic_id="'.$topic_id.'"')->order('ask_id desc')->getField("ask_id",true);	
		foreach ($res as $value){			
			$temp = $ask->where('Asks.id="'.$value.'"')->select($arr);
			$data[] = $temp[0];
		}		
		
		$asksTagView = D("AsksTagView");
		$asksTopicView = D("AsksTopicView");
		
		foreach ($data as $key => $value){			
				$data[$key]["tags"] = $asksTagView->where("ask_id=".$value['id'])->select();
				$data[$key]["topics"] = $asksTopicView->where("ask_id=".$value['id'])->select();		
			}
		
		$this->assign("question",$data);
		
		$this->display();
	}
}
?>