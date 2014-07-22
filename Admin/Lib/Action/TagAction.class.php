<?php

/*
 * 标签
 */
class TagAction extends CommonAction{
    
    //标签列表
    public function tag_list(){
        $this->tags=D('Tag')->relation(TRUE)->select();
        //dump($this->tags);
        $this->display();
    }
    
    public function tag_delete(){
        $tag_id=I('tag_id',0,'intval');
        //tag跟问题有关联
        M('asks_tag')->where("tag_id=%d",array($tag_id))->delete();
        if(M('tags')->where("id=%d",array($tag_id))->delete()){
            $this->redirect('tag_list');
        }else{
            $this->error('删除失败');
        }
    }
}

