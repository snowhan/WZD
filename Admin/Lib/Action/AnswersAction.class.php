<?php

/*
 * 回答
 */
class AnswersAction extends CommonAction{
    
    //回答列表
    public function answers_list(){
        $answers=D('Answers')->order('createtime')->relation(TRUE)->select();
        $this->assign('answers',$answers);
        $this->display();
    }
    
    //回答举报列表
    public function answers_report(){
        $report=D('Answer_report')->relation(TRUE)->select();
        $this->assign('report',$report);
        $this->display();
    }
    
    public function answers_delete(){
        $answer_id=I('ans_id','','intval');
        //回答与favorite_answer有关联，favourite打错了
        M('favorite_answer')->where("answer_id=%d",array($answer_id))->delete();
        if(M('answers')->where("id=%d",array($answer_id))->delete()){
            $this->redirect('answers_list');
        }else{
            $this->error('删除失败');
        }
    }
    
    public function report_del(){
        $report_id=I('report_id','','intval');
        if(M('answer_report')->where("id=%d",array($report_id))->delete()){
            $this->redirect('answers_report');
        }else{
            $this->error('删除失败');
        }
    }
}

