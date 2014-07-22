<?php

/*
 * 主题
 */
class TopicAction extends CommonAction{
    
    //主题列表
    public function topic_list(){
        $topic=M('topic')->select();
        $this->assign('topic',$topic);
        $this->display();
    }
    
    public function topic_delete(){
        $topic_id=I('topic_id',0,'intval');
        M('asks_topic')->where("topic_id=%d",array($topic_id))->delete();
        if(M('topic')->where("d=%d",array($topic_id))->delete()){
            $this->redirect('topic_list');
        }else{
            $this->error('删除失败');
        }
    }
}

