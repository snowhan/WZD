<?php

/*
 * 问题
 */
class AsksAction extends CommonAction{
    
    //问题列表
    public function asks_list(){
        $asks=D('Asks')->relation('creator')->select();
        $this->assign('asks',$asks);
        $this->display();
    }
    
    public function asks_report(){
        $report=D('Ask_report')->relation(TRUE)->select();
        $this->assign('report',$report);
        $this->display();
    }
    
    public function asks_delete(){
        $ask_id=I('ask_id','','intval');
        //topic和tag与asks有关联
        M('asks_topic')->where("ask_id=%d",array($ask_id))->delete();
        M('asks_tag')->where("ask_id=%d",array($ask_id))->delete();
        if(M('asks')->where("id=%d",array($ask_id))->delete()){
            $this->redirect('asks_list');
        }else{
            $this->error('删除失败');
        }
    }
    
    public function report_del(){
        $report_id=I('report_id','','intval');
        if(M('ask_report')->where("id=%d",array($report_id))->delete()){
            $this->redirect('asks_report');
        }else{
            $this->error('删除失败');
        }
    }
}

