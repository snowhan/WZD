<?php
class FavoriteAction extends CommonAction{
	//收藏夹
	public function favoritelist(){
		$this->checkLogin();
		$fav_answer = M("favoriteAnswer");
		$answer = M("answers");
		$favorite = M("favorite");
		
		$fid = $_GET['fid'];
		if(!$favorite->where('uid="'.$_SESSION['id'].'" and fid="'.$fid.'"')->find()){
			$this->error();
		}
		
		$answer_id = $fav_answer->where('fid="'.$fid.'"')->getField("answer_id",true);
		foreach($answer_id as $value){
			$data[] = $answer->where('id="'.$value.'"')->select();
		}
		var_dump($data);
		$this->display();
	}
	
	//新增收藏
	public function add(){
		$this->checkLogin();
		$answer_id = $_POST['answer_id'];
		$fav_id = $_POST['favorite_id'];	
		
		$favorite = M("favorite");
		
		$fav_answer = M("favoriteAnswer");
		//判断用户是否有该收藏夹
		foreach ($fav_id as $value){
			if(!$favorite->where('uid="'.$_SESSION['id'].'" and fid="'.$value.'"')->find()){
				echo json_encode("错误收藏夹");exit;
			}
		}		
		
		//判断该收藏夹是否拥有该收藏
		foreach ($fav_id as $value){
			if(!$fav_answer->where('fid="'.$value.'" and answer_id="'.$answer_id.'"')->find()){
				$data['answer_id'] = $answer_id;
				$data['fid'] = $value;
				$fav_answer->add($data);	
			}		
		}
		
		
		echo json_encode("收藏成功".$answer_id);
	}
}
?>