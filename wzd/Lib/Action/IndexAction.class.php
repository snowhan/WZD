<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    protected function _initialize(){   
            if(!isset($_SESSION['username'])||$_SESSION["is_login"] != true){
                $this->redirect('Public/login');
            }
            parent::_initialize();      
    }
        
    public function index(){
            $this->display();
    } 
    
    public function askinfo(){
        $question = $this->getAskList();        
        $this->assign("question",$question);
        $this->display();   
    }
}